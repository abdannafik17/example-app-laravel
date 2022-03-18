<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', ['siswa' => $siswa]);
    }

    public function edit($id)
    {        
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {      
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect('siswa');  
    }

    public function create()
    {
        return view('siswa.create');
    }

   
    public function store(Request $request)
    {

        $siswa = Siswa::create($request->all());
        

        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::whereId($id)->delete();
        return redirect('siswa');
    }
}

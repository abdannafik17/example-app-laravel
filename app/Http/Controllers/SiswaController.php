<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;

use App\Models\Siswa;
use App\Models\Telepon;
use App\Models\Kelas;

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
        $list_kelas = Kelas::all();
        $siswa->no_telepon = !empty($siswa->telepon->no_telepon) ? $siswa->telepon->no_telepon : '-';
        return view('siswa.edit', ['siswa' => $siswa, 'list_kelas' => $list_kelas]);
    }

    public function update(SiswaRequest $request, $id)
    {      
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        //update no hp
        $telepon = $siswa->telepon;
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        return redirect('siswa');  
    }

    public function create()
    {
        $listKelas = Kelas::all();
        return view('siswa.create', ['list_kelas' => $listKelas]);
    }

   
    public function store(SiswaRequest $request)
    {

        $siswa = Siswa::create($request->all());
        
        $telepon = new Telepon();
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::whereId($id)->delete();
        return redirect('siswa');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;

use App\Models\Siswa;
use App\Models\Telepon;
use App\Models\Kelas;
use App\Models\Hobi;

use App\Exports\ExportSiswa;
use App\Imports\ImportSiswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct ()
    {
        $this->middleware('admin')->except("index", "show");
    }

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
        $listHobi = Hobi::all();
        $siswa->no_telepon = !empty($siswa->telepon->no_telepon) ? $siswa->telepon->no_telepon : '-';
        return view('siswa.edit', ['siswa' => $siswa, 'list_kelas' => $list_kelas, 'list_hobi' => $listHobi]);
    }

    public function update(SiswaRequest $request, $id)
    {      
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        //update no hp
        $telepon = $siswa->telepon;
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        //update hobi
        if(!empty($request->input('hobi'))) {
            $siswa->hobi()->sync($request->input('hobi'));
        }
        
        return redirect('siswa');  
    }

    public function create()
    {
        $listKelas = Kelas::all();
        $listHobi = Hobi::all();
        return view('siswa.create', ['list_kelas' => $listKelas, 'list_hobi' => $listHobi]);
    }

    
    public function import()
    {
        return view('siswa.import');
    }

    public function store(SiswaRequest $request)
    {

        $siswa = Siswa::create($request->all());
        
        $telepon = new Telepon();
        $telepon->no_telepon = $request->input('no_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->attach($request->input('hobi'));

        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::whereId($id)->delete();
        return redirect('siswa');
    }

    public function export() 
    {
        $siswa = Siswa::all();

        $data = [];
        $dt = [];
        foreach($siswa as $val) {
            $dt['nisn'] = $val->nisn;
            $dt['nama'] = $val->nama;
            $dt['tempat_lahir'] = $val->tempat_lahir;
            $dt['tanggal_lahir'] = date('d M Y', strtotime($val->tanggal_lahir));
            $dt['jenis_kelamin'] = $val->jenis_kelamin;
            $dt['no_hp'] = $val->telepon->no_telepon;
            $dt['kelas'] = $val->kelas->nama_kelas;

            $hobi = [];
            foreach($val->hobi as $valHobi) {
                array_push($hobi, $valHobi['nama_hobi']);
            }
            $hobiString = implode(', ', $hobi);
            
            $dt['hobi'] = $hobiString;

            array_push($data, (object)$dt);
        }
        
        return Excel::download(new ExportSiswa($data), 'siswa.xlsx');
    }

    public function storeImport(Request $request)
    {
        Excel::import(new ImportSiswa, $request->file('file'));

        return redirect('siswa');
    }
}

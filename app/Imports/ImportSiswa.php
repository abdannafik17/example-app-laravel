<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Models\Siswa;
use App\Models\Telepon;

class ImportSiswa implements ToModel
{
    public function model(array $row)
    {
        $siswa = new Siswa();
        $siswa->nisn = $row[0];
        $siswa->nama = $row[1];
        $siswa->tempat_lahir = $row[2];
        $siswa->tanggal_lahir = $row[3];
        $siswa->jenis_kelamin = $row[4];
        $siswa->id_kelas = $row[5];
        $siswa->save();

        $telepon = new Telepon();
        $telepon->id_siswa = $siswa->id;
        $telepon->no_telepon = $row[6];
        $telepon->save();
    }
}

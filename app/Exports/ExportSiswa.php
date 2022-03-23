<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Siswa;

class ExportSiswa implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    public function headings():array 
    {
        return [
            'ID', 'NISN', 'NAMA SISWA', 'TEMPAT LAHIR', 'TGL LAHIR',
            'JENIS KELAMIN', 'WAKTU INPUT', 'WAKTU EDIT', 'ID KELAS'
        ];
    }
}

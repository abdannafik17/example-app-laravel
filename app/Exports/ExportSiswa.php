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

    protected $data = [];

    public function __construct ($data)
    {
        $this->data = $data;
    }
    
    public function collection()
    {
        return collect($this->data);
    }

    public function headings():array 
    {
        return [
            'NISN', 'NAMA SISWA', 'TEMPAT LAHIR', 'TGL LAHIR',
            'JENIS KELAMIN', 'NO HP', 'KELAS', 'HOBI' 
        ];
    }
}

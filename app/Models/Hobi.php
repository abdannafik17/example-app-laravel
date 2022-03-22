<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;

    protected $table = 'hobi';

    protected $fillable = ['nama_hobi'];

    public function siswa()
    {
        return $this->belongsToMany('App\Models\Siswa', 'hobi_siswa', 'id_hobi', 'id_siswa');
    }
}

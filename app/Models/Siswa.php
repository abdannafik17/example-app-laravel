<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table='siswa';

    protected $guarded = ['id', 'created_at'];

    public function telepon()
    {
        return $this->hasOne('App\Models\Telepon','id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas','id_kelas');
    }

    public function hobi()
    {
        return $this->belongsToMany('App\Models\Hobi', 'hobi_siswa', 'id_siswa', 'id_hobi');
    }
}

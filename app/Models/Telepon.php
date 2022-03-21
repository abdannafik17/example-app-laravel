<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    use HasFactory;

    protected $table  = 'telepon';
    protected $primaryKey = 'id_siswa';

    protected $fillable = ['id_siswa', 'no_telepon'];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'id');
    }
}

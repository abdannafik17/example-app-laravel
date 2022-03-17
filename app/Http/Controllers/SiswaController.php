<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = ['Fulan', 'Budi', 'Tini'];
        return view('siswa.index', ['siswa' => $siswa]);
    }
}

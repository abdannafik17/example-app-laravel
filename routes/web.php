<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.homepage');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/student/{id}/{name}', function($id, $nama){
    return 'Halaman Student dengan ID '.$id.' nama : '.$nama;
});

Route::get('master/halaman-pegawai', function(){
    return 'Halaman Pegawai';
})->name('employee');

Route::get('emp', function(){
    return redirect()->route('employee');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

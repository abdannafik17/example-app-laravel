<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;

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

// Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
// Route::post('/siswa', [SiswaController::class, 'store']);
// Route::get('/siswa/create', [SiswaController::class, 'create']);
// Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
// Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
// Route::get('/siswa/{id}', [SiswaController::class, 'show']);
// Route::get('/siswa', [SiswaController::class, 'index']);

Route::resource('siswa', SiswaController::class);


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

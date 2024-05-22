<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.dashboard-login');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/lupa-katasandi', function () {
    return view('auth.lupa-katasandi');    
});
Route::get('/lengkapi-data-diri', function () {
    return view('auth.lengkapi-data-diri');    
});
Route::get('/verifikasi-otp', function () {
    return view('auth.verifikasi-otp');    
});
Route::get('/buat-katasandi-baru', function () {
    return view('auth.buat-katasandi-baru');    
});

Route::prefix('mahasiswa')->group(function () {

    Route::get('/seminar', function () {
        return view('mahasiswa.seminar');    
    })->name('seminar');

    Route::get('/seminar/tambah', function () {
        return view('mahasiswa.seminar-tambah');    
    })->name('seminar-tambah');

    Route::get('/seminar/detail', function () {
        return view('mahasiswa.seminar-detail');    
    })->name('seminar-detail');

    Route::get('/seminar/ubah', function () {
        return view('mahasiswa.seminar-ubah');    
    })->name('seminar-ubah');

    Route::get('/seminar/cek-revisi', function () {
        return view('mahasiswa.seminar-cek-revisi');    
    })->name('seminar-cek-revisi');

});

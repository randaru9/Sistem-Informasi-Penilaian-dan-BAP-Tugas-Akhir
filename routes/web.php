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

    Route::prefix('seminar')->group(function () {
        Route::get('/', function () {
            return view('mahasiswa.seminar.seminar');
        })->name('seminar');

        Route::get('/tambah', function () {
            return view('mahasiswa.seminar.seminar-tambah');
        })->name('seminar-tambah');

        Route::get('/detail', function () {
            return view('mahasiswa.seminar.seminar-detail');
        })->name('seminar-detail');

        Route::get('/ubah', function () {
            return view('mahasiswa.seminar.seminar-ubah');
        })->name('seminar-ubah');

        Route::get('/cek-revisi', function () {
            return view('mahasiswa.seminar.seminar-cek-revisi');
        })->name('seminar-cek-revisi');

        Route::get('/cek-revisi/detail', function () {
            return view('mahasiswa.seminar.seminar-cek-revisi-detail');
        })->name('seminar-cek-revisi-detail');

        Route::get('/cek-revisi/detail/unduh', function () {
            return view('mahasiswa.seminar.seminar-form-revisi');
        })->name('seminar-form-revisi');
    });

    Route::prefix('yudisium')->group(function () {
        Route::get('/', function () {
            return view('mahasiswa.yudisium.yudisium');
        })->name('yudisium');
        Route::get('/tambah', function () {
            return view('mahasiswa.yudisium.yudisium-tambah');
        })->name('yudisium-tambah');
        Route::get('/detail', function () {
            return view('mahasiswa.yudisium.yudisium-detail');
        })->name('yudisium-detail');
        Route::get('/ubah', function () {
            return view('mahasiswa.yudisium.yudisium-ubah');
        })->name('yudisium-ubah');
    });

    Route::prefix('profil')->group(function () {
        Route::get('/', function () {
            return view('mahasiswa.profil.profil');
        })->name('profil');
        Route::get('/ubah-biodata', function () {
            return view('mahasiswa.profil.profil-ubah-biodata');
        })->name('profil-ubah-biodata');
        Route::get('/ubah-email', function () {
            return view('mahasiswa.profil.profil-ubah-email');
        })->name('profil-ubah-email');
        Route::get('/ubah-katasandi', function () {
            return view('mahasiswa.profil.profil-ubah-katasandi');
        })->name('profil-ubah-katasandi');
        Route::get('/verifikasi-email', function () {
            return view('mahasiswa.profil.profil-verifikasi-email');
        })->name('profil-verifikasi-email');
    });
});

Route::prefix('dosen')->group(function () {
    Route::prefix('penilaian')->group(function () {
        Route::get('/', function () {
            return view('dosen.penilaian.penilaian');
        })->name('penilaian');

        Route::get('/detail', function () {
            return view('dosen.penilaian.penilaian-detail');
        })->name('penilaian-detail');

        Route::get('/penilaian-tambah', function () {
            return view('dosen.penilaian.penilaian-tambah');
        })->name('penilaian-tambah');

        Route::get('/revisi-tambah', function () {
            return view('dosen.penilaian.revisi-tambah');
        })->name('penilaian-revisi-tambah');

        Route::get('/cek-nilai', function () {
            return view('dosen.penilaian.cek-nilai');
        })->name('penilaian-cek-nilai');

        Route::get('/cek-revisi', function () {
            return view('dosen.penilaian.cek-revisi');
        })->name('penilaian-cek-revisi');

        Route::get('/ubah-nilai', function () {
            return view('dosen.penilaian.ubah-nilai');
        })->name('penilaian-ubah-nilai');
        
        Route::get('/ubah-revisi', function () {
            return view('dosen.penilaian.ubah-revisi');
        })->name('penilaian-ubah-revisi');
    });
});


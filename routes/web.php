<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SeminarController;
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

Route::post('/login', [AuthController::class, 'Login'])->name('login');

Route::get('/lupa-katasandi', function () {
    return view('auth.lupa-katasandi');
})->name('lupa-katasandi');

Route::post('/generate-otp-lupa-katasandi', [AuthController::class, 'GenerateOtpLupaKatasandi'])->name('generate-otp-lupa-katasandi');

Route::get('/lengkapi-data-diri', function () {
    return view('auth.lengkapi-data-diri');
})->name('lengkapi-data-diri');

Route::post('/lengkapi-data-diri', [AuthController::class, 'LengkapiDataDiri'])->name('lengkapi-data-diri-post');

Route::get('/verifikasi-otp', function () {
    return view('auth.verifikasi-otp');
})->name('verifikasi-otp');

Route::post('/verifikasi-otp', [AuthController::class, 'VerifikasiOtp'])->name('verifikasi-otp-post');

Route::get('/buat-katasandi-baru', function () {
    return view('auth.buat-katasandi-baru');
})->name('buat-katasandi-baru');

Route::post('/buat-katasandi-baru', [AuthController::class, 'BuatKatasandiBaruWithOtp'])->name('buat-katasandi-baru-post');

Route::prefix('mahasiswa')->group(function () {

    Route::prefix('seminar')->group(function () {
        Route::get('/', [SeminarController::class, 'SeminarMahasiswaView'])->name('seminar');

        Route::get('/tambah', [SeminarController::class, 'CreateSeminarView'])->name('seminar-tambah');

        Route::post('/tambah', [SeminarController::class, 'CreateSeminar'])->name('seminar-tambah-post');

        Route::get('/detail', [SeminarController::class, 'GetOneSeminarView'])->name('seminar-detail');

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
        Route::get('/', [PenggunaController::class, 'ProfilView'])->name('profil-mahasiswa');

        Route::get('/ubah-biodata', function () {
            return view('mahasiswa.profil.profil-ubah-biodata');
        })->name('profil-ubah-biodata-mahasiswa');

        Route::post('/ubah-biodata', [PenggunaController::class, 'UpdateBiodataMahasiswa'])->name('profil-ubah-biodata-mahasiswa-post');

        Route::get('/ubah-email', function () {
            return view('mahasiswa.profil.profil-ubah-email');
        })->name('profil-ubah-email-mahasiswa');

        Route::post('/ubah-email', [PenggunaController::class, 'GenerateOtpUpdateEmail'])->name('profil-ubah-email-mahasiswa-post');

        Route::get('/verifikasi-email', function () {
            return view('mahasiswa.profil.profil-verifikasi-email');
        })->name('profil-verifikasi-email-mahasiswa');

        Route::post('/verifikasi-email', [PenggunaController::class, 'VerifikasiOtpEmail'])->name('profil-verifikasi-email-mahasiswa-post');

        Route::get('/ubah-katasandi', function () {
            return view('mahasiswa.profil.profil-ubah-katasandi');
        })->name('profil-ubah-katasandi-mahasiswa');

        Route::post('/ubah-katasandi', [PenggunaController::class, 'UpdateKatasandi'])->name('profil-ubah-katasandi-mahasiswa-post');
        
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

    Route::prefix('bap')->group(function () {
        Route::get('/', function () {
            return view('dosen.bap.bap');
        })->name('bap');
        Route::get('/tambah-tanda-tangan', function () {
            return view('dosen.bap.bap-tambah-tanda-tangan');
        })->name('bap-tambah-tanda-tangan');
        Route::get('/unduh', function () {
            return view('dosen.bap.bap-ketua-sidang');
        });
    });

    Route::prefix('profil')->group(function () {
        Route::get('/', function () {
            return view('dosen.profil.profil');
        })->name('profil');
        Route::get('/ubah-biodata', function () {
            return view('dosen.profil.profil-ubah-biodata');
        })->name('profil-ubah-biodata');
        Route::get('/ubah-email', function () {
            return view('dosen.profil.profil-ubah-email');
        })->name('profil-ubah-email');
        Route::get('/ubah-katasandi', function () {
            return view('dosen.profil.profil-ubah-katasandi');
        })->name('profil-ubah-katasandi');
        Route::get('/verifikasi-email', function () {
            return view('dosen.profil.profil-verifikasi-email');
        })->name('profil-verifikasi-email');
    });
});

Route::prefix('admin')->group(function () {
    Route::prefix('bap')->group(function () {
        Route::get('/', function () {
            return view('admin.bap.bap');
        })->name('bap');
        Route::get('/rekap-nilai', function () {
            return view('admin.bap.bap-rekap-nilai');
        })->name('bap-rekap-nilai');
        Route::get('/detail', function () {
            return view('admin.bap.bap-detail');
        })->name('bap-detail');
        Route::get('/detail-proses', function () {
            return view('admin.bap.bap-detail-proses');
        })->name('bap-detail-proses');
        Route::get('/form-penilaian', function () {
            return view('admin.bap.bap-form-penilaian');
        })->name('bap-form-penilaian');
        Route::get('/unduh-form-penilaian', function () {
            return view('admin.bap.form-penilaian');
        })->name('bap-unduh-form-penilaian');
        Route::get('/lihat-bap1', function () {
            return view('admin.bap.bap-lihat-bap1');
        })->name('bap-lihat-bap1');
        Route::get('/unduh-bap1', function () {
            return view('admin.bap.bap1');
        })->name('bap-unduh-bap1');
        Route::get('/lihat-bap2', function () {
            return view('admin.bap.bap-lihat-bap2');
        })->name('bap-lihat-bap2');
        Route::get('/unduh-bap2', function () {
            return view('admin.bap.bap2');
        })->name('bap-unduh-bap2');
    });

    Route::prefix('yudisium')->group(function () {
        Route::get('/', function () {
            return view('admin.yudisium.yudisium');
        })->name('yudisium');
        Route::get('/detail', function () {
            return view('admin.yudisium.yudisium-detail');
        })->name('yudisium-detail');
    });

    Route::prefix('dosen')->group(function () {

        Route::get('/', [PenggunaController::class, 'GetAllPenggunaDosen'])->name('dosen');

        Route::get('/detail', [PenggunaController::class, 'GetOnePengggunaDosenById'])->name('dosen-detail');

        Route::get('/buat-akun', function () {
            return view('admin.dosen.dosen-buat-akun');
        })->name('dosen-buat-akun');

        Route::post('/buat-akun', [PenggunaController::class, 'CreatePenggunaDosen'])->name('dosen-buat-akun-post');

        Route::get('/parsing-akun', function () {
            return view('admin.dosen.dosen-parsing-akun');
        })->name('dosen-parsing-akun');

        Route::get('/ubah-katasandi', function () {
            return view('admin.dosen.dosen-ubah-katasandi');
        })->name('dosen-ubah-katasandi');

        Route::post('/ubah-katasandi', [PenggunaController::class, 'UpdateKatasandiForPengguna'])->name('dosen-ubah-katasandi-post');

        Route::post('/update-koordinator', [PenggunaController::class, 'UpdateKoordindator'])->name('dosen-update-koordinator');

        Route::post('/hapus-pengguna', [PenggunaController::class, 'HapusPengguna'])->name('hapus-pengguna-dosen');
    });

    Route::prefix('mahasiswa')->group(function () {

        Route::get('/', [PenggunaController::class, 'GetAllPenggunaMahasiswa'])->name('mahasiswa');

        Route::get('/detail', [PenggunaController::class, 'GetOnePengggunaMahasiswaById'])->name('mahasiswa-detail');

        Route::get('/buat-akun', function () {
            return view('admin.mahasiswa.mahasiswa-buat-akun');
        })->name('mahasiswa-buat-akun');

        Route::post('/buat-akun', [PenggunaController::class, 'CreatePenggunaMahasiswa'])->name('mahasiswa-buat-akun-post');

        Route::get('/parsing-akun', function () {
            return view('admin.mahasiswa.mahasiswa-parsing-akun');
        })->name('mahasiswa-parsing-akun');

        Route::get('/ubah-katasandi', function () {
            return view('admin.mahasiswa.mahasiswa-ubah-katasandi');
        })->name('mahasiswa-ubah-katasandi');

        Route::post('/ubah-katasandi', [PenggunaController::class, 'UpdateKatasandiForPengguna'])->name('mahasiswa-ubah-katasandi-post');

        Route::post('/hapus-pengguna', [PenggunaController::class, 'HapusPengguna'])->name('hapus-pengguna');

    });

    Route::prefix('profil')->group(function () {
        Route::get('/', function () {
            return view('admin.profil.profil');
        })->name('profil');
        Route::get('/ubah-email', function () {
            return view('admin.profil.profil-ubah-email');
        })->name('profil-ubah-email');
        Route::get('/verifikasi-email', function () {
            return view('admin.profil.profil-verifikasi-email');
        })->name('profil-verifikasi-email');
        Route::get('/ubah-katasandi', function () {
            return view('admin.profil.profil-ubah-katasandi');
        })->name('profil-ubah-katasandi');
    });
});

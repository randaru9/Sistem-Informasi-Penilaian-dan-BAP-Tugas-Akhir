<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RevisiController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\YudisiumController;
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

        Route::get('/ubah', [SeminarController::class, 'UpdateSeminarView'])->name('seminar-ubah');

        Route::post('/ubah', [SeminarController::class, 'UpdateSeminar'])->name('seminar-ubah-post');

        Route::get('/cek-revisi', [RevisiController::class, 'CekRevisiMahasiswaView'])->name('seminar-cek-revisi');

        Route::get('/cek-revisi/detail', [RevisiController::class, 'CekDetailRevisiView'])->name('seminar-cek-revisi-detail');

        Route::get('/cek-revisi/detail/unduh', [RevisiController::class, 'FormRevisiView'])->name('seminar-form-revisi');
    });

    Route::prefix('yudisium')->group(function () {
        Route::get('/', [YudisiumController::class, 'GetAllYudisiumByPenggunaId'])->name('yudisium-mahasiswa');

        Route::get('/tambah', [YudisiumController::class, 'CreateYudisiumView'])->name('yudisium-tambah');

        Route::post('/tambah', [YudisiumController::class, 'CreateYudisium'])->name('yudisium-tambah-post');

        Route::get('/detail', [YudisiumController::class, 'GetOneYudisiumById'])->name('yudisium-detail-mahasiswa');

        Route::get('/ubah', [YudisiumController::class, 'UpdateYudisiumView'])->name('yudisium-ubah');

        Route::post('/ubah', [YudisiumController::class, 'UpdateYudisium'])->name('yudisium-ubah-post');
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
        Route::get('/', [SeminarController::class, 'PenilaianPage'])->name('penilaian');

        Route::get('/detail', [SeminarController::class, 'DetailPenilaianView'])->name('penilaian-detail');

        Route::get('/penilaian-tambah', [PenilaianController::class, 'CreatePenilaianView'])->name('penilaian-tambah');

        Route::post('/penilaian-tambah', [PenilaianController::class, 'CreatePenilaian'])->name('penilaian-tambah-post');

        Route::get('/revisi-tambah', [RevisiController::class, 'CreateRevisiView'])->name('penilaian-revisi-tambah');

        Route::post('/revisi-tambah', [RevisiController::class, 'CreateRevisi'])->name('penilaian-revisi-tambah-post');

        Route::get('/cek-nilai', [PenilaianController::class, 'CekNilaiView'])->name('penilaian-cek-nilai');

        Route::get('/cek-revisi', [RevisiController::class, 'CekRevisiView'])->name('penilaian-cek-revisi');

        Route::get('/ubah-nilai', [PenilaianController::class, 'UpdateNilaiView'])->name('penilaian-ubah-nilai');

        Route::post('/ubah-nilai', [PenilaianController::class, 'UpdatePenilaian'])->name('penilaian-ubah-nilai-post');

        Route::get('/ubah-revisi', [RevisiController::class, 'UpdateRevisiView'])->name('penilaian-ubah-revisi');

        Route::post('/ubah-revisi', [RevisiController::class, 'UpdateRevisi'])->name('penilaian-ubah-revisi-post');

        Route::post('/ubah-status-revisi', [RevisiController::class, 'UpdateStatusRevisiToDone'])->name('penilaian-ubah-status-revisi-post');
    });

    Route::prefix('bap')->group(function () {
        Route::get('/', [SeminarController::class, 'BAPDosenView'])->name('bap-dosen');
        Route::get('/tambah-tanda-tangan', [SeminarController::class, 'Bap1DosenView'])->name('bap-tambah-tanda-tangan');
        Route::get('/unduh', function () {
            return view('dosen.bap.bap-ketua-sidang');
        });
    });

    Route::prefix('profil')->group(function () {
        Route::get('/', [PenggunaController::class, 'ProfilView'])->name('profil-dosen');

        Route::get('/ubah-biodata', function () {
            return view('dosen.profil.profil-ubah-biodata');
        })->name('profil-ubah-biodata-dosen');

        Route::post('/ubah-biodata-dosen', [PenggunaController::class, 'UpdateBiodataDosen'])->name('profil-ubah-biodata-dosen-post');

        Route::get('/ubah-email', function () {
            return view('dosen.profil.profil-ubah-email');
        })->name('profil-ubah-email-dosen');

        Route::post('/ubah-email', [PenggunaController::class, 'GenerateOtpUpdateEmail'])->name('profil-ubah-email-dosen-post');

        Route::get('/verifikasi-email', function () {
            return view('dosen.profil.profil-verifikasi-email');
        })->name('profil-verifikasi-email-dosen');

        Route::post('/verifikasi-email', [PenggunaController::class, 'VerifikasiOtpEmail'])->name('profil-verifikasi-email-dosen-post');

        Route::get('/ubah-katasandi', function () {
            return view('dosen.profil.profil-ubah-katasandi');
        })->name('profil-ubah-katasandi-dosen');

        Route::post('/ubah-katasandi', [PenggunaController::class, 'UpdateKatasandi'])->name('profil-ubah-katasandi-dosen-post');
    });
});

Route::prefix('admin')->group(function () {
    Route::prefix('bap')->group(function () {

        Route::get('/', [SeminarController::class, 'BapAdminView'])->name('bap-admin');

        Route::get('/rekap-nilai', function () {
            return view('admin.bap.bap-rekap-nilai');
        })->name('bap-rekap-nilai');

        Route::get('/detail', [SeminarController::class, 'BapDetailAdminView'])->name('bap-detail');

        Route::get('/detail-proses', [SeminarController::class, 'BAPDetailProsesView'])->name('bap-detail-proses');
        
        Route::get('/form-penilaian', [PenilaianController::class, 'FormPenilaianView'])->name('bap-form-penilaian');

        Route::get('/unduh-form-penilaian', [PenilaianController::class, 'UnduhFormPenilaianView'])->name('bap-unduh-form-penilaian');

        Route::get('/lihat-bap1', [SeminarController::class, 'Bap1View'])->name('bap-lihat-bap1');

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
        Route::get('/', [YudisiumController::class, 'YudisiumView'])->name('yudisium');
        Route::get('/detail', [YudisiumController::class, 'DetailYudisiumAdminView'])->name('yudisium-detail');
        Route::post('/yudisium/accept', [YudisiumController::class, 'AcceptYudisium'])->name('yudisium-accept');
        Route::post('/yudisium/reject', [YudisiumController::class, 'RejectYudisium'])->name('yudisium-reject');
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
        Route::get('/', [PenggunaController::class, 'ProfilView'])->name('profil-admin');

        Route::get('/ubah-email', function () {
            return view('admin.profil.profil-ubah-email');
        })->name('profil-ubah-email-admin');

        Route::post('/ubah-email', [PenggunaController::class, 'GenerateOtpUpdateEmail'])->name('profil-ubah-email-admin-post');

        Route::get('/verifikasi-email', function () {
            return view('admin.profil.profil-verifikasi-email');
        })->name('profil-verifikasi-email-admin');

        Route::post('/verifikasi-email', [PenggunaController::class, 'VerifikasiOtpEmail'])->name('profil-verifikasi-email-admin-post');

        Route::get('/ubah-katasandi', function () {
            return view('admin.profil.profil-ubah-katasandi');
        })->name('profil-ubah-katasandi-admin');

        Route::post('/ubah-katasandi', [PenggunaController::class, 'UpdateKatasandi'])->name('profil-ubah-katasandi-admin-post');

    });
});

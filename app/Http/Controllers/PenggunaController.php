<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\VerifikasiOtp;
use App\Http\Requests\Pengguna\CreateDosen;
use App\Http\Requests\Pengguna\CreateMahasiswa;
use App\Http\Requests\Pengguna\ParsingPenggunaRequest;
use App\Http\Requests\Pengguna\UpdateBiodataDosen;
use App\Http\Requests\Pengguna\UpdateBiodataMahasiswaRequest;
use App\Http\Requests\Pengguna\UpdateEmail;
use App\Http\Requests\Pengguna\UpdateKatasandiForPenggunaRequest;
use App\Http\Requests\Pengguna\UpdateKatasandiRequest;
use App\Imports\DosenImport;
use App\Imports\MahasiswaImport;
use App\Mail\OTP;
use App\Mail\OTPEmail;
use App\Models\Pengguna;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaController extends Controller
{

    // (Profil) //
    public function ProfilView()
    {
        if (auth()->user()->role_id == 3) {
            $data = Pengguna::where('id', auth()->user()->id)->get(['id', 'nama', 'nim', 'email', 'ttd'])->first();
            return view('mahasiswa.profil.profil', compact('data'));
        } elseif (auth()->user()->role_id == 2) {
            $data = Pengguna::where('id', auth()->user()->id)->get(['id', 'nama', 'nip', 'email', 'ttd'])->first();
            return view('dosen.profil.profil', compact('data'));
        } else {
            $data = Pengguna::where('id', auth()->user()->id)->get(['id', 'nama', 'nip', 'email', 'ttd'])->first();
            return view('admin.profil.profil', compact('data'));
        }
    }

    public function GenerateOtpUpdateEmail(UpdateEmail $request)
    {
        session()->forget('otp');
        $data = Pengguna::where('id', auth()->user()->id)->first();
        $request->session()->put('email', $request->safe()->email);
        //catch email req and send email
        $data->update([
            'otp' => random_int(100000, 999999)
        ]);
        Mail::to(session()->get('email'))->send(new OTPEmail($data->only(['nama', 'otp'])));
        if (auth()->user()->role_id == 3) {
            return redirect()->route('profil-verifikasi-email-mahasiswa');
        } elseif (auth()->user()->role_id == 2) {
            return redirect()->route('profil-verifikasi-email-dosen');
        } else {
            return redirect()->route('profil-verifikasi-email-admin');
        }
    }

    public function regenerateOtp()
    {
        $data = Pengguna::where('id', auth()->user()->id)->first();
        $data->update([
            'otp' => random_int(100000, 999999)
        ]);
        // resend otp via email in session 
        Mail::to(session()->get('email'))->send(new OTPEmail($data->only(['nama', 'otp'])));
        if (auth()->user()->role_id == 3) {
            return redirect()->route('profil-verifikasi-email-mahasiswa');
        } elseif (auth()->user()->role_id == 2) {
            return redirect()->route('profil-verifikasi-email-dosen');
        } else {
            return redirect()->route('profil-verifikasi-email-admin');
        }
    }

    public function VerifikasiOtpEmail(VerifikasiOtp $request)
    {
        $data = Pengguna::where('id', auth()->user()->id)->first();
        if ($data->otp == $request->safe()->otp) {
            $data->update([
                'otp' => null,
                'email' => $request->session()->get('email')
            ]);
            $request->session()->forget('email');
            if (auth()->user()->role_id == 3) {
                return redirect()->route('profil-mahasiswa');
            } elseif (auth()->user()->role_id == 2) {
                return redirect()->route('profil-dosen');
            } else {
                return redirect()->route('profil-admin');
            }

        }
        return back()->withInput()->with('otp', 'OTP yang anda masukkan salah');
    }

    //Update Katasandi
    public function UpdateKatasandi(UpdateKatasandiRequest $request)
    {
        $data = Pengguna::where('id', auth()->user()->id)->first();
        if (Hash::check($request->safe()->katasandi_lama, $data->password)) {
            if ($request->safe()->katasandi_baru == $request->safe()->konfirmasi_katasandi) {
                $data->update([
                    'password' => $request->safe()->katasandi_baru
                ]);
                if (auth()->user()->role_id == 3) {
                    return redirect()->route('profil-mahasiswa');
                } elseif (auth()->user()->role_id == 2) {
                    return redirect()->route('profil-dosen');
                } else {
                    return redirect()->route('profil-admin');
                }
            }
            return back()->with('katasandi_baru', 'Konfirmasi Katasandi Baru Tidak Sesuai');
        }
        return back()->with('katasandi_lama', 'Katasandi Lama Tidak Sesuai');
    }


    // (Mahasiswa) //

    // Update Biodata Mahasiswa
    public function UpdateBiodataMahasiswa(UpdateBiodataMahasiswaRequest $request)
    {
        $data = Pengguna::where('id', auth()->user()->id)->first();
        $data->update([
            'nama' => $request->safe()->nama ?? $data->nama,
            'nim' => $request->safe()->nim ?? $data->nim
        ]);
        return redirect()->route('profil-mahasiswa');
    }


    // (Dosen) //

    // Update Biodata
    public function UpdateBiodataDosen(UpdateBiodataDosen $request)
    {
        $data = Pengguna::where('id', auth()->user()->id)->first();
        $data->update([
            'nama' => $request->safe()->nama ?? $data->nama,
            'nip' => $request->safe()->nip ?? $data->nip,
            'ttd' => $request->safe()->ttd ?? $data->ttd
        ]);
        if ($request->safe()->ttd) {
            if ($data->ttd) {
                Storage::delete($data->ttd);
            }
            $ttd = $request->safe()->ttd->store("/ttd/dosen/{$data->id}");
            $data->update([
                'ttd' => $ttd
            ]);
        }
        return redirect()->route('profil-dosen');
    }

    // (Admin) //

    // Create Pengguna (Mahasiswa)
    public function CreatePenggunaMahasiswa(CreateMahasiswa $request)
    {
        $mahasiswa = Pengguna::withTrashed()->where('nim', $request->safe()->nim)->orWhere('nama', $request->safe()->nama)->first();
        if ($mahasiswa == null) {
            Pengguna::create([
                'nama' => $request->safe()->nama,
                'nim' => $request->safe()->nim,
                'password' => $request->safe()->katasandi,
                'role_id' => 3,
            ]);
            return redirect()->route('mahasiswa');
        }
        $mahasiswa->restore();
        $mahasiswa->update([
            'nama' => $request->safe()->nama,
            'nim' => $request->safe()->nim,
            'email' => null,
            'otp' => null,
            'password' => $request->safe()->katasandi
        ]);
        return redirect()->route('mahasiswa');
    }

    // Get All Pengguna (Mahasiswa)
    public function GetAllPenggunaMahasiswa(Request $request)
    {
        $data = Pengguna::where('role_id', 3)->where(function (Builder $query) use ($request) {
            if (isset($request->search)) {
                $query->where('nama', 'LIKE', "%{$request->search}%")
                    ->orWhere('nim', 'LIKE', "%{$request->search}%");
            }
        })->paginate(5, ['id', 'nama', 'nim'])->toArray();
        return view('admin.mahasiswa.mahasiswa', compact(['data']));
    }

    // Get One Pengguna (Mahasiswa)
    public function GetOnePengggunaMahasiswaById(Request $request)
    {
        $data = Pengguna::where('id', $request->id)->get(['id', 'nama', 'nim', 'email'])->first();
        if ($data != null) {
            return view('admin.mahasiswa.mahasiswa-detail', compact(['data']));
        }
        return redirect()->route('mahasiswa');
    }

    // Create Pengguna (Dosen)
    public function CreatePenggunaDosen(CreateDosen $request)
    {
        $dosen = Pengguna::withTrashed()->where('nip', $request->safe()->nip)->orWhere('nama', $request->safe()->nama)->first();
        if ($dosen == null) {
            Pengguna::create([
                'nama' => $request->safe()->nama,
                'nip' => $request->safe()->nip,
                'email' => $request->safe()->email,
                'password' => $request->safe()->katasandi,
                'role_id' => 2,
            ]);
            return redirect()->route('dosen');
        }
        $dosen->restore();
        $dosen->update([
            'nama' => $request->safe()->nama,
            'nip' => $request->safe()->nip,
            'email' => $request->safe()->email,
            'otp' => null,
            'password' => $request->safe()->katasandi
        ]);
        return redirect()->route('dosen');
    }

    public function ParsingPenggunaDosen(ParsingPenggunaRequest $request)
    {
        Excel::import(new DosenImport, $request->safe()->file);
        return redirect()->route('dosen');
    }

    public function ParsingPenggunaMahasiswa(ParsingPenggunaRequest $request)
    {
        Excel::import(new MahasiswaImport, $request->safe()->file);
        return redirect()->route('mahasiswa');
    }

    // Get All Pengguna (Dosen)
    public function GetAllPenggunaDosen(Request $request)
    {
        $data = Pengguna::where('role_id', 2)->where(function (Builder $query) use ($request) {
            if (isset($request->search)) {
                $query->where('nama', 'LIKE', "%{$request->search}%")
                    ->orWhere('nip', 'LIKE', "%{$request->search}%");
            }
        })->paginate(5, ['id', 'nama', 'nip'])->toArray();
        return view('admin.dosen.dosen', compact(['data']));
    }

    // Get One Pengguna (Dosen)
    public function GetOnePengggunaDosenById(Request $request)
    {
        $data = Pengguna::where('id', $request->id)->get(['id', 'nama', 'nip', 'email', 'is_koordinator'])->first();
        if ($data != null) {
            return view('admin.dosen.dosen-detail', compact(['data']));
        }
        return redirect()->route('dosen');
    }

    public function UpdateKoordinator(Request $request)
    {
        $koordinator = Pengguna::where('is_koordinator', 1)->first();
        if ($koordinator != null && $koordinator->id != $request->query('id')) {
            $koordinator->update([
                'is_koordinator' => 0
            ]);
        }
        $new_koordinator = Pengguna::where('id', $request->query('id'))->first();
        if ($new_koordinator != null) {
            if ($new_koordinator->is_koordinator == 1) {
                return back()->with('koordinator', 'Pengguna ini sudah menjadi Koordinator');
            }
            $new_koordinator->update([
                'is_koordinator' => 1
            ]);
            return back()->with('koordinator', 'Menjadikan Koordinator sukses');
        }
        return redirect()->route('dosen');
    }

    public function UpdateKatasandiForPengguna(UpdateKatasandiForPenggunaRequest $request)
    {
        $pengguna = Pengguna::where('id', $request->query('id'))->first();
        if ($pengguna != null) {
            if ($request->safe()->katasandi == $request->safe()->konfirmasi_katasandi) {
                $pengguna->update([
                    'password' => $request->safe()->katasandi
                ]);
                if ($pengguna->role_id == 3) {
                    return redirect()->route('mahasiswa');
                }
                return redirect()->route('dosen');
            }
            return back()->with('katasandi', 'Kata sandi tidak sama');
        }
        return back()->with('pengguna', 'Pengguna tidak ditemukan');
    }

    public function HapusPengguna(Request $request)
    {
        $pengguna = Pengguna::where('id', $request->query('id'))->first();
        if ($pengguna != null) {
            if ($pengguna->is_koordinator == 1) {
                $pengguna->update([
                    'is_koordinator' => 0
                ]);
            }
            $pengguna->delete();
            if ($pengguna->role_id == 3) {
                return redirect()->route('mahasiswa');
            }
            return redirect()->route('dosen');
        }
        return back()->with('pengguna', 'Pengguna tidak ditemukan');
    }

}

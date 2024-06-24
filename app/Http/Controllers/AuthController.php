<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\BuatKatasandiBaruwithOtp;
use App\Http\Requests\Auth\GenerateOtp;
use App\Http\Requests\Auth\LengkapiDataDiri;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\VerifikasiOtp;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Login $request)
    {
        $data = Pengguna::where('nim', $request->safe()->nim_nip)->orWhere('nip', $request->safe()->nim_nip)->first();
        if ($data !== null) {
            if (Hash::check($request->safe()->katasandi, $data->password)) {
                Auth::login($data);
                if ($data->otp != null) {
                    $data->update([
                        'otp' => null
                    ]);
                }

                if ($data->role_id == 1) {
                    return redirect()->route('bap');
                }

                if ($data->role_id == 2) {
                    return redirect()->route('penilaian');
                }

                if ($data->role_id == 3) {
                    if ($data->email !== null) {
                        return redirect()->route('seminar');
                    }
                    return redirect()->route('lengkapi-data-diri');
                }
            }
        }
        return back()->with('error', 'NIM/NIP atau Katasandi salah');
    }

    public function GenerateOtpLupaKatasandi(GenerateOtp $request)
    {
        $data = Pengguna::where('email', $request->safe()->email)->first();
        $data->update([
            'otp' => random_int(100000, 999999)
        ]);
        return redirect()->route('verifikasi-otp', ['email' => $request->safe()->email]);
    }

    public function VerifikasiOtp(VerifikasiOtp $request)
    {
        if (auth()->user()) {
            $data = Pengguna::where('id', auth()->user()->id)->first();
            if ($data !== null) {
                if ($data->otp == $request->safe()->otp) {
                    $data->update([
                        'otp' => null,
                        'email' => $request->query('email'),
                        'password' => $request->query('katasandi')
                    ]);
                    return redirect()->route('seminar');
                }
                return back()->with('error', 'OTP yang anda masukkan salah');
            }
            return redirect()->route('login');
        }

        $data = Pengguna::where('email', $request->query('email'))->first();
        if ($data !== null) {
            if ($data->otp == $request->safe()->otp) {
                return redirect()->route('buat-katasandi-baru', ['email' => $request->query('email'), 'otp' => $request->safe()->otp]);
            }
            return back()->with('error', 'OTP yang anda masukkan salah');
        }
        return redirect()->route('lupa-katasandi');
    }

    public function BuatKatasandiBaruWithOtp(BuatKatasandiBaruwithOtp $request)
    {
        $data = Pengguna::where('email', $request->query('email'))->first();
        if ($data !== null) {
            if ($data->otp == $request->query('otp')) {
                if ($request->safe()->katasandi == $request->safe()->konfirmasi_katasandi) {
                    $data->update([
                        'otp' => null,
                        'password' => $request->safe()->katasandi
                    ]);
                    return redirect()->route('login');
                }
                return back()->with('error', 'Katasandi yang anda masukkan tidak sama');
            }
            return redirect()->route('verifikasi-otp', ['email' => $request->query('email')]);
        }
        return redirect()->route('lupa-katasandi');
    }

    public function LengkapiDataDiri(LengkapiDataDiri $request)
    {
        $data = Pengguna::where('id', Auth::user()->id)->first();
        if ($data !== null) {
            if ($request->safe()->katasandi !== $request->safe()->konfirmasi_katasandi) {
                return back()->with('error', 'Katasandi yang anda masukkan tidak sama');
            }

            $data->update([
                'otp' => random_int(100000, 999999)
            ]);

            return redirect()->route('verifikasi-otp', ['email' => $request->safe()->email, 'katasandi' => $request->safe()->katasandi]);
        }
        return redirect()->route('login');
    }
}

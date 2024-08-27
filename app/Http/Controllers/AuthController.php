<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\BuatKatasandiBaruwithOtp;
use App\Http\Requests\Auth\GenerateOtp;
use App\Http\Requests\Auth\LengkapiDataDiri;
use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\VerifikasiOtp;
use App\Mail\OTP;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                    return redirect()->route('bap-admin');
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
        if ($data == null) {
            return back()->with('error', 'Email yang anda masukkan tidak terdaftar');
        }
        session()->put('email', $request->safe()->email);
        try {
            $data->update([
                'otp' => random_int(100000, 999999)
            ]);
            Mail::to($data->email)->send(new OTP($data->only(['nama', 'otp'])));
        } catch (\Exception $e) {
            $data->update([
                'otp' => null
            ]);
            return back()->with('error', 'Email yang anda masukkan tidak aktif');
        }
        return redirect()->route('verifikasi-otp');
    }

    public function RegenerateOtpLupaKatasandi()
    {
        $data = Pengguna::where('id', auth()->user()->id)->first();
        try {
            $data->update([
                'otp' => random_int(100000, 999999)
            ]);
            Mail::to(session()->get('email'))->send(new OTP($data->only(['nama', 'otp'])));
        } catch (\Exception $e) {
            $data->update([
                'otp' => null
            ]);
            return back()->with('error', 'Email yang anda masukkan tidak aktif');
        }
        return redirect()->route('verifikasi-otp');
    }

    public function VerifikasiOtp(VerifikasiOtp $request)
    {
        if (auth()->user()) {
            $data = Pengguna::where('id', auth()->user()->id)->first();
            if ($data !== null) {
                if ($data->otp == $request->safe()->otp) {
                    $data->update([
                        'otp' => null,
                        'email' => session()->get('email'),
                        'password' => session()->get('katasandi'),
                    ]);
                    session()->forget('email');
                    session()->forget('katasandi');
                    return redirect()->route('seminar');
                }
                return back()->with('error', 'OTP yang anda masukkan salah');
            }
            return redirect()->route('login');
        }

        $data = Pengguna::where('email', session()->get('email'))->first();
        if ($data !== null) {
            if ($data->otp == $request->safe()->otp) {
                $request->session()->put('otp', $request->safe()->otp);
                return redirect()->route('buat-katasandi-baru');
            }
            return back()->with('error', 'OTP yang anda masukkan salah');
        }
        return redirect()->route('lupa-katasandi');
    }

    public function BuatKatasandiBaruWithOtp(BuatKatasandiBaruwithOtp $request)
    {
        $data = Pengguna::where('email', session()->get('email'))->first();
        if ($data !== null) {
            if ($data->otp == session()->get('otp')) {
                if ($request->safe()->katasandi == $request->safe()->konfirmasi_katasandi) {
                    $data->update([
                        'otp' => null,
                        'password' => $request->safe()->katasandi
                    ]);
                    session()->forget('email');
                    session()->forget('otp');
                    return redirect()->route('login');
                }
                return back()->with('error', 'Katasandi yang anda masukkan tidak sama');
            }
            return redirect()->route('verifikasi-otp');
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

            Mail::to($request->safe()->email)->send(new OTP($data->only(['nama', 'otp'])));
            session()->put('email', $request->safe()->email);
            session()->put('katasandi', $request->safe()->katasandi);

            return redirect()->route('verifikasi-otp');
        }
        return redirect()->route('login');
    }

    public function Logout()
    {
        if (auth()->check()) {
            auth()->logout();
        }

        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pengguna\CreateDosen;
use App\Http\Requests\Pengguna\CreateMahasiswa;
use App\Http\Requests\Pengguna\UpdateBiodataDosen;
use App\Http\Requests\Pengguna\UpdateBiodataMahasiswaRequest;
use App\Http\Requests\Pengguna\UpdateKatasandiForPenggunaRequest;
use App\Http\Requests\Pengguna\UpdateKatasandiRequest;
use App\Models\Pengguna;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{

    // (Profil) //
    public function ProfilView(){
        $data = Pengguna::where('id', auth()->user()->id)->get(['id', 'nama', 'nim', 'email'])->first();
        return view('mahasiswa.profil.profil', compact('data'));
    }


    // (Mahasiswa) //

    // Update Biodata
    public function UpdateBiodataMahasiswa(UpdateBiodataMahasiswaRequest $request)
    {
        $data = Pengguna::where('id', $request->safe()->id)->update($request->safe()->all());
        return response()->json($data);
    }

    //Update Katasandi
    public function UpdateKatasandi(UpdateKatasandiRequest $request)
    {
        $katasandi_lama = Pengguna::where('id', $request->safe()->id)->value('katasandi');
        if ($katasandi_lama == $request->safe()->katasandi_lama) {
            if ($request->safe()->katasandi_baru == $request->safe()->konfirmasi_katasandi_baru) {
                $data = Pengguna::where('id', $request->safe()->id)->update([
                    'katasandi' => $request->safe()->katasandi_baru
                ]);
                return response()->json($data);
            }
            //back with message
        }
        //back with message
    }

    // (Dosen) //

    // Update Biodata
    public function UpdateBiodataDosen(UpdateBiodataDosen $request)
    {
        $data = Pengguna::where('id', $request->safe()->id)->update($request->safe()->all());
        return response()->json($data);
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
        $mahasiswa = Pengguna::withTrashed()->where('nip', $request->safe()->nip)->orWhere('nama', $request->safe()->nama)->first();
        if ($mahasiswa == null) {
            Pengguna::create([
                'nama' => $request->safe()->nama,
                'nip' => $request->safe()->nip,
                'email' => $request->safe()->email,
                'password' => $request->safe()->katasandi,
                'role_id' => 2,
            ]);
            return redirect()->route('dosen');
        }
        $mahasiswa->restore();
        $mahasiswa->update([
            'nama' => $request->safe()->nama,
            'nip' => $request->safe()->nip,
            'email' => $request->safe()->email,
            'otp' => null,
            'password' => $request->safe()->katasandi
        ]);
        return redirect()->route('dosen');
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

    public function UpdateKoordindator(Request $request){
        $koordinator = Pengguna::where('is_koordinator', 1)->first();
        if($koordinator != null && $koordinator->id != $request->query('id')){
            $koordinator->update([
                'is_koordinator' => 0
            ]);
        }
        $new_koordinator = Pengguna::where('id', $request->query('id'))->first();
        if($new_koordinator != null){
            if($new_koordinator->is_koordinator == 1){
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
                if($pengguna->role_id == 3){
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
            $pengguna->delete();
            if($pengguna->role_id == 3){
                return redirect()->route('mahasiswa');
            }
            return redirect()->route('dosen');
        }
        return back()->with('pengguna', 'Pengguna tidak ditemukan');
    }

}

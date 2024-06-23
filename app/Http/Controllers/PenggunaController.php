<?php

namespace App\Http\Controllers;

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
    // (Mahasiswa) //

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

    public function GetAllPenggunaMahasiswa(Request $request)
    {
        $data = Pengguna::where(function (Builder $query) use ($request) {
            if (isset($request->search)) {
                $query->where('nama', 'LIKE', "%{$request->search}%")
                    ->orWhere('nim', 'LIKE', "%{$request->search}%");
            }
        })->paginate(5, ['id', 'nama', 'nim'])->toArray();
        return view('admin.mahasiswa.mahasiswa', compact(['data']));
    }

    public function GetOnePengggunaMahasiswaById(Request $request)
    {
        $data = Pengguna::where('id', $request->id)->get(['id', 'nama', 'nim', 'email'])->first();
        if($data != null){
            return view('admin.mahasiswa.mahasiswa-detail', compact(['data']));
        }
        return redirect()->route('mahasiswa');
    }

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

    public function UpdateKatasandiForPengguna(UpdateKatasandiForPenggunaRequest $request)
    {
        $mahasiswa = Pengguna::where('id',$request->query('id'))->first();
        if ($mahasiswa != null) {
            if ($request->safe()->katasandi == $request->safe()->konfirmasi_katasandi) {
                $mahasiswa->update([
                    'password' => $request->safe()->katasandi
                ]);
                return redirect()->route('mahasiswa');
            }
            return back()->with('katasandi', 'Kata sandi tidak sama');
        }
        return back()->with('mahasiswa', 'Mahasiswa tidak ditemukan');
    }

    public function HapusPengguna(Request $request)
    {
        $mahasiswa = Pengguna::where('id', $request->query('id'))->first();
        if($mahasiswa != null){
            $mahasiswa->delete();
            return redirect()->route('mahasiswa');
        }
        return back()->with('mahasiswa', 'Mahasiswa tidak ditemukan');
    }

}

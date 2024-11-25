<?php

namespace App\Http\Controllers;

use App\Http\Requests\BAP\AddTTDBAP1Request;
use App\Http\Requests\BAP\CreateBAP1Request;
use App\Http\Requests\BAP\UpdateBAP1Request;
use App\Http\Requests\BAP\UpdateRentangNilai;
use App\Http\Requests\Seminar\GetByIdRequest;
use App\Models\BAP1;
use App\Models\RentangNilai;
use App\Models\Seminar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BAPController extends Controller
{
    // (Dosen) //
    public function AddTTDBAP1(Request $request){
        if ($request->query('id')){
            $data = BAP1::where('id', $request->query('id'))->first();
            if(auth()->user()->ttd == null){
                return back()->with('ttd', 'Silahkan isi tanda tangan pada profil terlebih dahulu');
            }
            $ttd = auth()->user()->ttd;
            $data->update([
                'status_tanda_tangan_id' => 2,
                'ttd' => $ttd
            ]);
            return redirect()->route('bap-dosen');
        }
        return redirect()->route('bap-dosen');
    }

    public function DeleteTTDBAP1(Request $request){
        if ($request->query('id')){
            $data = BAP1::where('id', $request->query('id'))->first();
            $data->update([
                'status_tanda_tangan_id' => 1,
                'ttd' => null
            ]);
            return redirect()->route('bap-dosen');
        }
        return redirect()->route('bap-dosen');
    }

    public function UbahRentangNilaiView(){
        $data = RentangNilai::all();
        return view('admin.bap.ubah-rentang-nilai', compact('data'));
    }

    public function UbahRentangNilai(UpdateRentangNilai $request){
        RentangNilai::where('id', 1)->update([
            'min' => $request->min_a,
        ]);
        RentangNilai::where('id', 2)->update([
            'min' => $request->min_ab,
        ]);
        RentangNilai::where('id', 3)->update([
            'min' => $request->min_b,
        ]);
        RentangNilai::where('id', 4)->update([
            'min' => $request->min_bc,
        ]);
        RentangNilai::where('id', 5)->update([
            'min' => $request->min_c,
        ]);
        return redirect()->route('ubah-rentang-nilai');
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BAP\AddTTDBAP1Request;
use App\Http\Requests\BAP\CreateBAP1Request;
use App\Http\Requests\BAP\UpdateBAP1Request;
use App\Http\Requests\Seminar\GetByIdRequest;
use App\Models\BAP1;
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



}

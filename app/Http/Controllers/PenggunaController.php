<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pengguna\UpdateBiodataMahasiswaRequest;
use App\Http\Requests\Pengguna\UpdateKatasandiRequest;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    // (Mahasiswa) //

    // Update Biodata
    public function UpdateBiodataMahasiswa(UpdateBiodataMahasiswaRequest $request){
        $data = Pengguna::where('id', $request->safe()->id)->update($request->safe()->all());
        return response()->json($data);
    }

    //Update Katasandi
    public function UpdateKatasandi(UpdateKatasandiRequest $request){
        $katasandi_lama = Pengguna::where('id', $request->safe()->id)->value('katasandi');
        if($katasandi_lama == $request->safe()->katasandi_lama){
            if($request->safe()->katasandi_baru == $request->safe()->konfirmasi_katasandi_baru){
                $data = Pengguna::where('id', $request->safe()->id)->update([
                    'katasandi' => $request->safe()->katasandi_baru
                ]);
                return response()->json($data);
            }
            //back with message
        }
        //back with message
    }
}

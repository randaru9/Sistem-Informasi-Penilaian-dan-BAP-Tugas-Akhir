<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pengguna\UpdateBiodataMahasiswaRequest;
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
    
}

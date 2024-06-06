<?php

namespace App\Http\Controllers;

use App\Http\Requests\Yudisium\GetByPenggunaIdRequest;
use App\Models\Yudisium;
use Illuminate\Http\Request;

class YudisiumController extends Controller
{
    // (Mahasiswa) //

    // Get All Yudisium by Pengguna Id
    public function GetYudisiumByPenggunaId(GetByPenggunaIdRequest $request){
        $data = Yudisium::where('pengguna_id', $request->safe()->pengguna_id)->get();
        return response()->json($data);
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Yudisium\CreateRequest;
use App\Http\Requests\Yudisium\GetByPenggunaIdRequest;
use App\Models\Yudisium;
use Carbon\Carbon;
use Illuminate\Http\Request;

class YudisiumController extends Controller
{
    // (Mahasiswa) //

    // Create Yudisium
    public function CreateYudisium(CreateRequest $request){
        $time = Carbon::now();
        $yudisium = $request->safe()->all();
        $yudisium['berkas'] = $request->safe()['berkas']->store("yudisium/{$yudisium['pengguna_id']}/$time");
        $data = Yudisium::create($yudisium);
        return response()->json($data);
    }    

    // Get All Yudisium by Pengguna Id
    public function GetAllYudisiumByPenggunaId(GetByPenggunaIdRequest $request){
        $data = Yudisium::where('pengguna_id', $request->safe()->pengguna_id)->get();
        return response()->json($data);
    }


}

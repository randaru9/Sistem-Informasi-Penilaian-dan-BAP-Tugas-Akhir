<?php

namespace App\Http\Controllers;

use App\Http\Requests\Yudisium\CreateRequest;
use App\Http\Requests\Yudisium\GetByPenggunaIdRequest;
use App\Http\Requests\Yudisium\GetOneByIdRequest;
use App\Http\Requests\Yudisium\UpdateRequest;
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

    // Get One Yudisium by Id
    public function GetOneYudisiumById(GetOneByIdRequest $request){
        $data = Yudisium::where('id', $request->safe()->id)->first();
        return response()->json($data);
    }

    // Update Yudisium by Id
    public function UpdateYudisium(UpdateRequest $request){
        $time = Carbon::now();
        $yudisium = $request->safe()->all();
        $yudisium['berkas'] = $request->safe()['berkas']->store("yudisium/{$yudisium['pengguna_id']}/$time");
        $data = Yudisium::where('id', $request->safe()->id)->update($yudisium);
        return response()->json($data);
    }

    // (Admin) //

    // Get All Yudisium
    public function GetAllYudisium(){
        $data = Yudisium::with(['Penggunas','StatusYudisiums','PeriodeWisudas'])->paginate(5);
        return response()->json($data);
    }

    
}

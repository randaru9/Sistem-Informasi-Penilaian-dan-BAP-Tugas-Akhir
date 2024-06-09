<?php

namespace App\Http\Controllers;

use App\Http\Requests\Revisi\CreateRequest;
use App\Http\Requests\Revisi\GetAllBySeminarIdRequest;
use App\Http\Requests\Revisi\GetOneByIdRequest;
use App\Models\Revisi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RevisiController extends Controller
{
    // (Mahasiswa) //

    // Get All Revisi By Seminar Id with Status
    public function GetAllRevisiBySeminarIdWithStatus(GetAllBySeminarIdRequest $request){
        $data = Revisi::where('seminar_id', $request->safe()->seminar_id)->with('StatusRevisis')->get();
        return response()->json($data);
    }

    // Get One Revisi By Id
    public function GetOneRevisiById(GetOneByIdRequest $request){
        $data = Revisi::where('id', $request->safe()->id)->first();
        return response()->json($data);
    }

    // (Dosen) //

    // Create Revisi
    public function CreateRevisi(CreateRequest $request){
        $time = Carbon::now();
        $revisi = $request->safe()->all();
        $revisi['berkas'] = $request->safe()['berkas']->store("revisi/{$revisi['seminar_id']}/$time");
        $data = Revisi::create($revisi);
        return response()->json($data);
    }

    
}

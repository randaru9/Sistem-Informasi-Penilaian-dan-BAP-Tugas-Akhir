<?php

namespace App\Http\Controllers;

use App\Http\Requests\Revisi\CreateRequest;
use App\Http\Requests\Revisi\GetAllBySeminarIdRequest;
use App\Http\Requests\Revisi\GetOneByIdRequest;
use App\Http\Requests\Revisi\UpdateRequest;
use App\Models\Revisi;
use App\Models\Seminar;
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

    public function CreateRevisiView(Request $request){
        if($request->query('id') !== null){
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function($query){
                    $query->select(['id', 'nama']);
                },
                'JenisSeminars' => function($query){
                    $query->select(['id', 'keterangan']);
                } 
            ])->first()->toArray();
                
            return view('dosen.penilaian.revisi-tambah',compact('data'));
                
        }
        return redirect()->route('penilaian');
    }

    // Create Revisi
    public function CreateRevisi(CreateRequest $request){
        if($request->query('id') !== null){
            Revisi::create([
                'seminar_id' => $request->query('id'),
                'pengguna_id' => auth()->user()->id,
                'status_revisi_id' => '1',
                'keterangan' => $request->safe()->keterangan
            ]);
            return redirect()->route('penilaian-detail', ['id' => $request->query('id')]);
        }
        return redirect()->route('penilaian');
    }

    // Update Revisi by Revisi Id
    public function UpdateRevisiByRevisiId(UpdateRequest $request){
        $data = Revisi::where('id', $request->safe()->id)->update($request->safe()->all());
        return response()->json($data);
    }

    // Update Status Revisi to "Selesai"
    public function UpdateStatusRevisiToDone(GetOneByIdRequest $request){
        $data = Revisi::where('id', $request->safe()->id)->update([
            'status_revisi_id' => '3', // Must be actual id of 'Selesai'
        ]);
        return response()->json($data);
    }
    
    
}

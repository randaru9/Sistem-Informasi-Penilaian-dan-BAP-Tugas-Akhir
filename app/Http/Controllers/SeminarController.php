<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seminar\CreateRequest;
use App\Http\Requests\Seminar\GetByIdRequest;
use App\Http\Requests\Seminar\GetByPenggunaIdRequest;
use App\Http\Requests\Seminar\UpdateRequest;
use App\Models\Pengguna;
use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    // (Mahasiswa) //

    // Get All Seminar By Pengguna Id with Count Revisi (for Status)
    public function GetSeminarByPenggunaIdWithCountRevisi(GetByPenggunaIdRequest $request){
        
        $data = Seminar::where('pengguna_id', $request->safe()->pengguna_id)->withCount([
            'Revisis' => function ($query) {
                $query->whereHas('StatusRevisis', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            }
        ])->get();

        return response()->json($data);

    }

    // Create Seminar
    public function CreateSeminar(CreateRequest $request){

        $data = Seminar::create($request->safe()->all());

        return response()->json($data);

    }

    // Get One Seminar By Id with Count Revisi (for Status)
    public function GetOneSeminarByIdWithCountRevisi(GetByIdRequest $request){
        $data = Seminar::where('id', $request->safe()->id)->withCount([
            'Revisis' => function ($query) {
                $query->whereHas('StatusRevisis', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            }
        ])->first();

        return response()->json($data);
    }

    // Update Seminar
    public function UpdateSeminar(UpdateRequest $request){
        $data = Seminar::where('id', $request->safe()->id)->update($request->safe()->all());
        return response()->json($data);
    }

    // (Dosen) //

    // Get All Seminar (yang Terlibat) With Penilaian and Revisi
    public function GetAllInvoledSeminar (GetByPenggunaIdRequest $request){
        $data = Seminar::where('pembimbing_1_id', $request->safe()->pengguna_id)->orWhere('pembimbing_2_id', $request->safe()->pengguna_id)->orWhere('penguji_1_id', $request->safe()->pengguna_id)->orWhere('penguji_2_id', $request->safe()->pengguna_id)->with([
            'Revisis' => function ($query) use ($request) {
                $query->where('pengguna_id', $request->safe()->pengguna_id);
            },
            'Penilaians' => function ($query, $request) {
                $query->where('pengguna_id', $request->safe()->pengguna_id);
            }
        ]);

        return response()->json($data);
    }

    // Get One Seminar (yang Terlibat) With Penilaian and Revisi

    public function GetOneInvoledSeminar (GetByIdRequest $request){
        $data = Seminar::where('id', $request->safe()->id)->with([
            'Revisis' => function ($query) use ($request) {
                $query->where('pengguna_id', $request->safe()->pengguna_id)->with('StatusRevisis');
            },
            'Penilaians' => function ($query, $request) {
                $query->where('pengguna_id', $request->safe()->pengguna_id)->with('StatusPenilaians');
            }
        ])->first();

        return response()->json($data);
    }

    // Get All Seminar (yang Terlibat Pimpinan Sidang) With BAP 

    public function GetAllInvoledSeminarByPimpinanSidangWithBAP1 (GetByPenggunaIdRequest $request){
        $data = Seminar::where('pimpinan_sidang_id', $request->safe()->pengguna_id)->with('BAP1s');
        return response()->json($data);
    }

    // Get One Seminar with Penilaian and Pengguna (Beri Tanda Tangan BAP1 Page)
    public function GetOneSeminarWithPenilaianAndPengguna (GetByIdRequest $request){
        $data = Seminar::where('id', $request->safe()->id)->with([
            'Penilaians' => function ($query) {
                $query->with(['Penggunas']);
            }, 
            'PimpinanSidangs'
        ]);

        return response()->json($data);
    }

    



    
    

}

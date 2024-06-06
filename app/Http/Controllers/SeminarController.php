<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seminar\GetByPenggunaIdRequest;
use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    // Get All Seminar By Pengguna Id with Count Revisi (for Status)
    public function GetSeminarByPenggunaIdWithCountRevisi(GetByPenggunaIdRequest $request){
        
        $data = Seminar::where('pengguna_id', $request->pengguna_id)->withCount([
            'Revisis' => function ($query) {
                $query->whereHas('StatusRevisis', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            }
        ])->get();

        return response()->json($data);

    }
}

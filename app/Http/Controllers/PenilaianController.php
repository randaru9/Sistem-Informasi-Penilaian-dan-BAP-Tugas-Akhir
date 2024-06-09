<?php

namespace App\Http\Controllers;

use App\Http\Requests\Penilaian\CreateRequest;
use App\Http\Requests\Penilaian\GetBySeminarIdAndPenggunaIdRequest;
use App\Models\Penilaian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{

    // (Dosen) //

    // Create Penilaian and Update Status Penilaian to "Selesai"
    public function CreatePenilaian(CreateRequest $request){
        $time = Carbon::now();
        $data = Penilaian::create([
            'pengguna_id' => $request->safe()->pengguna_id,
            'seminar_id' => $request->safe()->seminar_id,
            'status_penilaian_id' => '1', // Must change to actual id
            'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan_draft_tugas_akhir_dan_ppt,
            'penyajian_atau_presentasi' => $request->safe()->penyajian_atau_presentasi,
            'penguasaan_materi' => $request->safe()->penguasaan_materi,
            'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
            'etika_dan_sopan_santun' => $request->safe()->etika_dan_sopan_santun,
            'nilai_bimbingan' => $request->safe()->nilai_bimbingan,
            'ttd' => $request->safe()->ttd->store('penilaian/'.$request->safe()->pengguna_id.'/'.$time),
        ]);
        return response()->json($data);
    }

    // Get One Penilaian by Seminar Id and Pengguna Id
    public function GetPenilaianBySeminarIdAndPenggunaId(GetBySeminarIdAndPenggunaIdRequest $request){
        $data = Penilaian::where('seminar_id', $request->safe()->seminar_id)->where('pengguna_id', $request->safe()->pengguna_id)->first();
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Penilaian\CreateRequest;
use App\Http\Requests\Penilaian\GetBySeminarIdAndPenggunaIdRequest;
use App\Http\Requests\Penilaian\UpdateRequest;
use App\Models\Penilaian;
use App\Models\Seminar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{

    // (Dosen) //

    public function CreatePenilaianView(Request $request){
        if($request->query('id') !== null){
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function($query){
                    $query->select(['id', 'nama']);
                },
                'JenisSeminars' => function($query){
                    $query->select(['id', 'keterangan']);
                } 
            ])->first()->toArray();
            return view('dosen.penilaian.penilaian-tambah', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    // Create Penilaian and Update Status Penilaian to "Selesai"
    public function CreatePenilaian(CreateRequest $request){
        if($request->query('id') !== null){
            $id = auth()->user()->id;
            $ttd = $request->safe()->ttd->store("/ttd/penilaian/{$id}");
            Penilaian::create([
                'pengguna_id' => $id,
                'seminar_id' => $request->query('id'),
                'status_penilaian_id' => 1,
                'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan,
                'penyajian_atau_presentasi' => $request->safe()->penyajian,
                'penguasaan_materi' => $request->safe()->penguasaan,
                'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
                'etika_dan_sopan_santun' => $request->safe()->etika,
                'nilai_bimbingan' => $request->safe()->bimbingan,
                'ttd' => $ttd
            ]);
            return redirect()->route('penilaian-detail', ['id' => $request->query('id')]);
        }
        return redirect()->route('penilaian');
    }

    // Get One Penilaian by Seminar Id and Pengguna Id
    public function CekNilaiView(GetBySeminarIdAndPenggunaIdRequest $request){
        if($request->query('id') !== null){
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function($query){
                    $query->select(['id', 'nama']);
                },
                'JenisSeminars' => function($query){
                    $query->select(['id', 'keterangan']);
                },
                'Penilaians' => function($query) use ($request, $id){
                    $query->where('pengguna_id', $id)
                    ->where('seminar_id', $request->query('id'));
                } 
            ])->first()->toArray();
            return view('dosen.penilaian.cek-nilai', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    // Update Penilaian by Penilaian Id
    public function UpdatePenilaianByPenilaianId(UpdateRequest $request){
        $time = Carbon::now();
        $penilaian = $request->safe()->all();
        if($penilaian['ttd'] != null){
            $penilaian['ttd'] = $request->safe()['ttd']->store('penilaian/'.$penilaian['pengguna_id'].'/'.$time);
        }
        $data = Penilaian::where('id', $request->safe()->id)->update($penilaian);
        return response()->json($data);
    }

    
}

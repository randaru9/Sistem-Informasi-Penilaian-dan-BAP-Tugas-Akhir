<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seminar\CreateRequest;
use App\Http\Requests\Seminar\GetByIdRequest;
use App\Http\Requests\Seminar\GetByPenggunaIdRequest;
use App\Http\Requests\Seminar\UpdateRequest;
use App\Models\BAP1;
use App\Models\BAP2;
use App\Models\JenisSeminar;
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

    // Create Seminar View

    public function CreateSeminarView(){
        $dosen = Pengguna::where('role_id', 2)->get();
        $jenis = JenisSeminar::all();
        return view('mahasiswa.seminar.seminar-tambah', compact(['dosen', 'jenis']));
    }

    // Create Seminar
    public function CreateSeminar(CreateRequest $request){

        $koordinator = Pengguna::where('is_koordinator', 1)->first();

        $bap1 = BAP1::create([
            'status_tanda_tangan_id' => 1,
        ]);

        $bap2 = BAP2::create([
            'koordinator' => $koordinator->id,
        ]);

        $id = auth()->user()->id;

        $draft = $request->safe()->draft->store("seminar/{$id}");

        Seminar::create([
           'bap1_id' => $bap1->id,
           'bap2_id' => $bap2->id,
           'pengguna_id' => auth()->user()->id,
           'pembimbing_1_id' => $request->safe()->pembimbing1,
           'pembimbing_2_id' => $request->safe()->pembimbing2,
           'penguji_1_id' => $request->safe()->penguji1,
           'penguji_2_id' => $request->safe()->penguji2,
           'pimpinan_sidang_id' => $request->safe()->pimpinan,
           'jenis_seminar_id' => $request->safe()->jenis,
           'judul' => $request->safe()->judul,
           'tanggal' => $request->safe()->tanggal,
           'waktu' => $request->safe()->waktu,
           'draft' => $draft
        ]);

        return redirect()->route('seminar');
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

    // (Admin) //

    // Get All Seminar with Revisi and Penilaian

    public function GetAllSeminarWithRevisiAndPenilaian(){
        $data = Seminar::withCount([
            'Revisis as revisi_selesai' => function ($query) {
                $query->whereHas('status_revisis', function ($query) {
                    $query->where('keterangan', 'Selesai');
                });
            },
            'Revisis as revisi_belum_selesai' => function ($query) {
                $query->whereHas('status_revisis', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            },
            'Penilaians as penilaian_selesai' => function ($query) {
                $query->whereHas('status_penilaians', function ($query) {
                    $query->where('keterangan', 'Selesai');
                });
            },
            'Penilaians as penilaian_belum_selesai' => function ($query) {
                $query->whereHas('status_penilaians', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            },
            'Penilaians as penilaian_terlambat' => function ($query) {
                $query->whereHas('status_penilaians', function ($query) {
                    $query->where('keterangan', 'Terlambat');
                });
            },
        ])->paginate(5);

        return response()->json($data);
    }

    // Get One Seminar with Revisi, Penilaian, and BAP1, and BAP2

    public function GetOneSeminarWithRevisiAndPenilaianAndBAP(GetByIdRequest $request){

        $data = Seminar::where('id', $request->safe()->id)->with(['BAP1s', 'BAP2s'])->withCount([
            'Revisis as revisi_selesai' => function ($query) {
                $query->whereHas('status_revisis', function ($query) {
                    $query->where('keterangan', 'Selesai');
                });
            },
            'Revisis as revisi_belum_selesai' => function ($query) {
                $query->whereHas('status_revisis', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            },
            'Penilaians as penilaian_selesai' => function ($query) {
                $query->whereHas('status_penilaians', function ($query) {
                    $query->where('keterangan', 'Selesai');
                });
            },
            'Penilaians as penilaian_belum_selesai' => function ($query) {
                $query->whereHas('status_penilaians', function ($query) {
                    $query->where('keterangan', 'Belum Selesai');
                });
            },
            'Penilaians as penilaian_terlambat' => function ($query) {
                $query->whereHas('status_penilaians', function ($query) {
                    $query->where('keterangan', 'Terlambat');
                });
            },
        ])->first();
        
        return response()->json($data);
    }
    
    // Detail Proses

    public function DetailProsesSeminar (GetByIdRequest $request){
        $data = Seminar::where('id', $request->safe()->id)->with(['Pembimbing1s', 'Pembimbing2s', 'Penguji1s', 'Penguji2s', 'Penilaians' => function ($query) { 
            $query->with(['Penggunas, StatusPenilaians']);
        }, 'Revisis' => function ($query) {
            $query->with(['Penggunas, StatusRevisis']);
        }, ])->first();

        return response()->json($data);
    }

}

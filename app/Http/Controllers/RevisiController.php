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
    public function GetAllRevisiBySeminarIdWithStatus(GetAllBySeminarIdRequest $request)
    {
        $data = Revisi::where('seminar_id', $request->safe()->seminar_id)->with('StatusRevisis')->get();
        return response()->json($data);
    }

    // Get One Revisi By Id
    public function GetOneRevisiById(GetOneByIdRequest $request)
    {
        $data = Revisi::where('id', $request->safe()->id)->first();
        return response()->json($data);
    }

    public function CekRevisiMahasiswaView(Request $request){
        if ($request->query('id') !== null) {
            $data = Seminar::select(['id', 'bap1_id', 'bap2_id', 'pengguna_id', 'pembimbing_1_id', 'pembimbing_2_id', 'penguji_1_id', 'penguji_2_id'])->where('id', $request->query('id'))->with([
                'Revisis' => function ($query) {
                    $query->select(['id', 'pengguna_id', 'seminar_id', 'status_revisi_id'])->with([
                        'Penggunas' => function ($query) {
                            $query->select(['id', 'nama']);
                        }, 
                        'StatusRevisis' => function ($query) {
                            $query->select(['id', 'keterangan']);
                        }
                    ]);
                }
            ])->get()->toArray();
            // dd($data);
            return view('mahasiswa.seminar.seminar-cek-revisi', compact('data'));
        }
        return redirect()->route('seminar');
    }

    // (Dosen) //

    public function CreateRevisiView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama']);
                },
                'JenisSeminars' => function ($query) {
                    $query->select(['id', 'keterangan']);
                }
            ])->first()->toArray();

            return view('dosen.penilaian.revisi-tambah', compact('data'));

        }
        return redirect()->route('penilaian');
    }

    // Create Revisi
    public function CreateRevisi(CreateRequest $request)
    {
        if ($request->query('id') !== null) {
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

    public function CekRevisiView(Request $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama']);
                },
                'JenisSeminars' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'Revisis' => function ($query) use ($request, $id) {
                    $query->where('pengguna_id', $id)
                        ->where('seminar_id', $request->query('id'));
                }
            ])->first()->toArray();

            return view('dosen.penilaian.cek-revisi', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    public function CekDetailRevisiView(Request $request){
        if ($request->query('id') !== null) {
            $data = Revisi::select(['id', 'pengguna_id', 'seminar_id', 'status_revisi_id', 'keterangan'])->where('id', $request->query('id'))->with([
                'Seminars' => function ($query) {
                    $query->select(['id', 'pengguna_id', 'pembimbing_1_id', 'pembimbing_2_id', 'penguji_1_id', 'penguji_2_id', 'judul', 'tanggal', 'waktu', 'jenis_seminar_id'])
                    ->with([
                    'Penggunas' => function ($query) {
                        $query->select(['id', 'nama', 'nim']);
                    },
                ]);
                },
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama', 'nip']);
                }
            ])->first()->toArray();
            return view('mahasiswa.seminar.seminar-cek-revisi-detail', compact('data'));
        }
        return redirect()->route('seminar');
    }

    public function FormRevisiView(Request $request){
        if ($request->query('id') !== null) {
            $data = Revisi::select(['id', 'pengguna_id', 'seminar_id', 'status_revisi_id', 'keterangan'])->where('id', $request->query('id'))->with([
                'Seminars' => function ($query) {
                    $query->select(['id', 'pengguna_id', 'pembimbing_1_id', 'pembimbing_2_id', 'penguji_1_id', 'penguji_2_id', 'judul', 'tanggal', 'waktu', 'jenis_seminar_id'])
                    ->with([
                    'Penggunas' => function ($query) {
                        $query->select(['id', 'nama', 'nim']);
                    },
                ]);
                },
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama', 'nip']);
                }
            ])->first()->toArray();
            return view('mahasiswa.seminar.seminar-form-revisi', compact('data'));
        }
        return redirect()->route('seminar');
    }

    public function UpdateRevisiView(Request $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama']);
                },
                'JenisSeminars' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'Revisis' => function ($query) use ($request, $id) {
                    $query->where('pengguna_id', $id)
                        ->where('seminar_id', $request->query('id'));
                }
            ])->first()->toArray();
            return view('dosen.penilaian.ubah-revisi', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    // Update Revisi by Revisi Id
    public function UpdateRevisi(UpdateRequest $request)
    {
        if ($request->query('id') !== null) {
            Revisi::where('seminar_id', $request->query('id'))->update([
                'keterangan' => $request->safe()->keterangan
            ]);
            return redirect()->route('penilaian-detail', ['id' => $request->query('id')]);
        }
        return redirect()->route('penilaian');
    }

    // Update Status Revisi to "Selesai"
    public function UpdateStatusRevisiToDone(Request $request)
    {   
        if($request->query('id') !== null) {
            Revisi::where('seminar_id', $request->query('id'))->where('pengguna_id', auth()->user()->id)->update([
                'status_revisi_id' => 2,
            ]);
            return redirect()->route('penilaian-detail', ['id' => $request->query('id')]);
        }
        return redirect()->route('penilaian');
    }


}

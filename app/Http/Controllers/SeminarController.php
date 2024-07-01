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
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeminarController extends Controller
{
    // (Mahasiswa) //

    // Get All Seminar By Pengguna Id with Count Revisi (for Status)
    public function SeminarMahasiswaView()
    {

        $data = Seminar::where('pengguna_id', auth()->user()->id)->with('JenisSeminars')->withCount([
            'Revisis as count_revisi',
            'Revisis as count_revisi_selesai' => function ($query) {
                $query->where('status_revisi_id', 2);
            },
        ])->paginate(5)->toArray();

        return view('mahasiswa.seminar.seminar', compact('data'));

    }

    // Create Seminar View
    public function CreateSeminarView()
    {
        $dosen = Pengguna::where('role_id', 2)->get();
        $jenis = JenisSeminar::all();
        return view('mahasiswa.seminar.seminar-tambah', compact(['dosen', 'jenis']));
    }

    // Create Seminar
    public function CreateSeminar(CreateRequest $request)
    {

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
    public function GetOneSeminarView(Request $request)
    {

        if ($request->query('id') !== null) {

            $data = Seminar::select('id', 'judul', 'tanggal', 'waktu', 'draft', 'pembimbing_1_id', 'pembimbing_2_id', 'penguji_1_id', 'penguji_2_id', 'pimpinan_sidang_id', 'jenis_seminar_id')->where('id', $request->query('id'))->with([
                'JenisSeminars' => function ($query) {
                    $query->select('id', 'keterangan');
                },
                'Pembimbing1s' => function ($query) {
                    $query->select('id', 'nama');
                },
                'Pembimbing2s' => function ($query) {
                    $query->select('id', 'nama');
                },
                'Penguji1s' => function ($query) {
                    $query->select('id', 'nama');
                },
                'Penguji2s' => function ($query) {
                    $query->select('id', 'nama');
                },
                'PimpinanSidangs' => function ($query) {
                    $query->select('id', 'nama');
                }
            ])->withCount([
                        'Revisis as count_revisi',
                        'Revisis as count_revisi_selesai' => function ($query) {
                            $query->where('status_revisi_id', 2);
                        },
                    ])->first()->toArray();

            return view('mahasiswa.seminar.seminar-detail', compact('data'));
        }

        return redirect()->route('seminar');
    }

    public function UpdateSeminarView(Request $request)
    {

        if ($request->query('id') !== null) {
            $dosen = Pengguna::where('role_id', 2)->get();
            $jenis = JenisSeminar::all();
            $data = Seminar::where('id', $request->query('id'))->first()->toArray();
            return view('mahasiswa.seminar.seminar-ubah', compact(['data', 'dosen', 'jenis']));
        }

        return redirect()->route('seminar');
    }

    // Update Seminar
    public function UpdateSeminar(UpdateRequest $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->first();

            if ($request->draft !== null) {
                Storage::delete($data->draft);
                $draft = $request->safe()->draft->store("seminar/{$id}");
                $data->update([
                    'draft' => $draft
                ]);
            }

            $data->update([
                'pembimbing_1_id' => $request->safe()->pembimbing1,
                'pembimbing_2_id' => $request->safe()->pembimbing2,
                'penguji_1_id' => $request->safe()->penguji1,
                'penguji_2_id' => $request->safe()->penguji2,
                'pimpinan_sidang_id' => $request->safe()->pimpinan,
                'jenis_seminar_id' => $request->safe()->jenis,
                'judul' => $request->safe()->judul,
                'tanggal' => $request->safe()->tanggal,
                'waktu' => $request->safe()->waktu,
            ]);

            return redirect()->route('seminar-detail', ['id' => $request->query('id')]);

        }

        return redirect()->route('seminar');

    }

    // (Dosen) //

    // Get All Seminar (yang Terlibat) With Penilaian and Revisi
    public function PenilaianPage(Request $request)
    {
        $data = Seminar::select('id', 'tanggal', 'waktu', 'pengguna_id', 'jenis_seminar_id')
            ->withCount([
                'Penilaians as count_penilaian',
                'Penilaians as count_penilaian_selesai' => function ($query) {
                    $query->where('status_penilaian_id', 1);
                },
                'Revisis as count_revisi',
                'Revisis as count_revisi_selesai' => function ($query) {
                    $query->where('status_revisi_id', 2);
                }

            ])->with([
                    'Penggunas' => function ($query) {
                        $query->select('id', 'nama');
                    },
                    'JenisSeminars' => function ($query) {
                        $query->select('id', 'keterangan');
                    }
                ])
            ->whereHas('Penggunas', function (Builder $query) use ($request) {
                if (isset($request->search)) {
                    $query->where('nama', 'LIKE', "%{$request->search}%");
                }
            })
            ->where(function ($query) {
                $query->where('pembimbing_1_id', auth()->user()->id)
                      ->orWhere('pembimbing_2_id', auth()->user()->id)
                      ->orWhere('penguji_1_id', auth()->user()->id)
                      ->orWhere('penguji_2_id', auth()->user()->id);
            })
            ->paginate(5)->toArray();

        return view('dosen.penilaian.penilaian', compact('data'));
    }

    // Get One Seminar (yang Terlibat) With Penilaian and Revisi

    public function DetailPenilaianView(Request $request)
    {
        if($request->query('id') !== null){
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'JenisSeminars'=>function($query){
                    $query ->select('id', 'keterangan');
                },
                'Penggunas' => function ($query) {
                    $query->select('id', 'nama');
                },
                'Penilaians' => function ($query) use ($request, $id) {
                    $query->select(['id', 'seminar_id', 'pengguna_id', 'status_penilaian_id'])
                    ->where('pengguna_id', $id)
                    ->where('seminar_id', $request->query('id'))
                    ->with(['StatusPenilaians' => function ($query) {
                        $query->select('id', 'keterangan');
                    }]);
                },
                'Revisis' => function ($query) {
                    $query->with(['StatusRevisis']);
                },
            ])->withCount([
                'Penilaians as count_penilaian' => function ($query) use ($request, $id) {
                    $query->where('status_penilaian_id', 1)
                    ->where('seminar_id', $request->query('id'))
                    ->where('pengguna_id', $id);
                }, 
                'Revisis as count_revisi',
            ])->first()->toArray();

            dd($data);

            return view('dosen.penilaian.penilaian-detail', compact('data'));
        }

        return redirect()->route('penilaian');
    }

    // Get All Seminar (yang Terlibat Pimpinan Sidang) With BAP 

    public function GetAllInvoledSeminarByPimpinanSidangWithBAP1(GetByPenggunaIdRequest $request)
    {
        $data = Seminar::where('pimpinan_sidang_id', $request->safe()->pengguna_id)->with('BAP1s');
        return response()->json($data);
    }

    // Get One Seminar with Penilaian and Pengguna (Beri Tanda Tangan BAP1 Page)
    public function GetOneSeminarWithPenilaianAndPengguna(GetByIdRequest $request)
    {
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

    public function GetAllSeminarWithRevisiAndPenilaian()
    {
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

    public function GetOneSeminarWithRevisiAndPenilaianAndBAP(GetByIdRequest $request)
    {

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

    public function DetailProsesSeminar(GetByIdRequest $request)
    {
        $data = Seminar::where('id', $request->safe()->id)->with([
            'Pembimbing1s',
            'Pembimbing2s',
            'Penguji1s',
            'Penguji2s',
            'Penilaians' => function ($query) {
                $query->with(['Penggunas, StatusPenilaians']);
            },
            'Revisis' => function ($query) {
                $query->with(['Penggunas, StatusRevisis']);
            },
        ])->first();

        return response()->json($data);
    }

}

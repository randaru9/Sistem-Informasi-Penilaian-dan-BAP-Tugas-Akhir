<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use App\Http\Requests\Seminar\CreateRequest;
use App\Http\Requests\Seminar\ExportRekapNilai;
use App\Http\Requests\Seminar\GetByIdRequest;
use App\Http\Requests\Seminar\GetByPenggunaIdRequest;
use App\Http\Requests\Seminar\UpdateRequest;
use App\Models\BAP1;
use App\Models\BAP2;
use App\Models\JenisSeminar;
use App\Models\Pengguna;
use App\Models\Penilaian;
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

    public function UnduhDraft(Request $request){
        if ($request->query('path') !== null) {
            $user = auth()->user()->nama;
            if($request->query('jenis') == 1){
                $name = "Draft Seminar Proposal $user";
            }else{
                $name = "Draft Tugas Akhir $user";
            }
            return response()->download(Storage::path($request->query('path')), $name);
        }
    }

    // (Dosen) //

    public function UnduhDraftPenilaian(Request $request){
        if ($request->query('path') !== null) {
            $user = Seminar::where('id', $request->query('id'))->with('Penggunas')->firstOrFail()->toArray();
            $user = $user['penggunas']['nama'];
            if($request->query('jenis') == 1){
                $name = "Draft Seminar Proposal $user";
            }else{
                $name = "Draft Tugas Akhir $user";
            }
            return response()->download(Storage::path($request->query('path')), $name);
        }
    }

    // Get All Seminar (yang Terlibat) With Penilaian and Revisi
    public function PenilaianPage(Request $request)
    {
        $data = Seminar::select('id', 'tanggal', 'waktu', 'pengguna_id', 'jenis_seminar_id')
            ->withCount([
                'Penilaians as count_penilaian' => function ($query) {
                    $query->where('pengguna_id', auth()->user()->id);
                },
                'Penilaians as count_penilaian_selesai' => function ($query) {
                    $query->where('pengguna_id', auth()->user()->id)
                    ->where('status_penilaian_id', 1);
                },
                'Penilaians as count_penilaian_terlambat' => function ($query) {
                    $query->where('pengguna_id', auth()->user()->id)
                    ->where('status_penilaian_id', 2);
                },
                'Revisis as count_revisi' => function ($query) {
                    $query->where('pengguna_id', auth()->user()->id);
                },
                'Revisis as count_revisi_selesai' => function ($query) {
                    $query->where('pengguna_id', auth()->user()->id)
                    ->where('status_revisi_id', 2);
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

    public function BAPDosenView(Request $request){
        $data = Seminar::select(['id','tanggal','waktu','pengguna_id','jenis_seminar_id', 'bap1_id'])->where('pimpinan_sidang_id', auth()->user()->id)->with(['JenisSeminars:id,keterangan', 'Penggunas:id,nama', 'BAP1s:id,status_tanda_tangan_id,ttd', 'Penilaians'])->whereHas('Penggunas', function (Builder $query) use ($request) {
            if (isset($request->search)) {
                $query->where('nama', 'LIKE', "%{$request->search}%");
            }
        })->whereHas('Penilaians', function (Builder $query) {
            $query->where('status_penilaian_id', 1);
        }, '>', 3)->paginate(5)->toArray();
        return view('dosen.bap.bap', compact('data'));
    }

    public function DetailPenilaianView(Request $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'JenisSeminars' => function ($query) {
                    $query->select('id', 'keterangan');
                },
                'Penggunas' => function ($query) {
                    $query->select('id', 'nama');
                },
                'Penilaians' => function ($query) use ($request, $id) {
                    $query->select(['id', 'seminar_id', 'pengguna_id', 'status_penilaian_id'])
                        ->where('pengguna_id', $id)
                        ->where('seminar_id', $request->query('id'))
                        ->with([
                            'StatusPenilaians' => function ($query) {
                                $query->select('id', 'keterangan');
                            }
                        ]);
                },
                'Revisis' => function ($query) use ($request, $id) {
                    $query
                        ->where('pengguna_id', $id)
                        ->where('seminar_id', $request->query('id'))
                        ->with([
                            'StatusRevisis' => function ($query) {
                                $query->select('id', 'keterangan');
                            }
                        ]);
                },
            ])->withCount([
                        'Penilaians as count_penilaian' => function ($query) use ($request, $id) {
                            $query->where('seminar_id', $request->query('id'))
                                ->where('pengguna_id', $id);
                        },
                        'Revisis as count_revisi' => function ($query) use ($request, $id) {
                            $query->where('seminar_id', $request->query('id'))
                                ->where('pengguna_id', $id);
                        },
                    ])->first()->toArray();
            return view('dosen.penilaian.penilaian-detail', compact('data'));
        }

        return redirect()->route('penilaian');
    }

    public function Bap1DosenView(Request $request)
    {
        if($request->query('id') !== null){
            $data = Seminar::where('id', $request->query('id'))->with(['Penggunas:id,nama,nim', 'Penilaians', 'Pembimbing1s:id,nama,nip', 'Pembimbing2s:id,nama,nip', 'Penguji1s:id,nama,nip', 'Penguji2s:id,nama,nip', 'PimpinanSidangs:id,nama,nip', 'BAP1s'])->first();

            if($data){
                $collection = $data->toArray();
                $collection['penilaian_pembimbing_1'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['penilaian_pembimbing_2'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_1'] = optional($data->penilaians->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_2'] = optional($data->penilaians->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];
            }
            return view('dosen.bap.bap-tambah-tanda-tangan', compact('collection'));
        }
        return redirect()->route('bap-dosen');
    }

    public function UnduhBap1DosenView(Request $request)
    {
        if($request->query('id') !== null){
            $data = Seminar::where('id', $request->query('id'))->with(['Penggunas:id,nama,nim', 'Penilaians', 'Pembimbing1s:id,nama,nip', 'Pembimbing2s:id,nama,nip', 'Penguji1s:id,nama,nip', 'Penguji2s:id,nama,nip', 'PimpinanSidangs:id,nama,nip', 'BAP1s'])->first();

            if($data){
                $collection = $data->toArray();
                $collection['penilaian_pembimbing_1'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['penilaian_pembimbing_2'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_1'] = optional($data->penilaians->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_2'] = optional($data->penilaians->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];
            }
            return view('dosen.bap.bap-ketua-sidang', compact('collection'));
        }
        return redirect()->route('bap-dosen');
    }

    // (Admin) //

    public function BapAdminView(Request $request)
    {
        $data = Seminar::select(['id', 'jenis_seminar_id', 'pengguna_id'])->with([
            'JenisSeminars' => function ($query) {
                $query->select(['id', 'keterangan']);
            },
            'Penggunas' => function ($query) {
                $query->select(['id', 'nama']);
            }
        ])->withCount([
                    'Revisis as count_revisi',
                    'Revisis as count_revisi_selesai' => function ($query) {
                        $query->where('status_revisi_id', 2);
                    },
                    'Penilaians as count_penilaian',
                    'Penilaians as count_penilaian_selesai' => function ($query) {
                        $query->where('status_penilaian_id', 1);
                    },
                    'Penilaians as count_penilaian_terlambat' => function ($query) {
                        $query->where('status_penilaian_id', 2);
                    }
                ])->whereHas('Penggunas', function (Builder $query) use ($request) {
                    if (isset($request->search)) {
                        $query->where('nama', 'LIKE', "%{$request->search}%");
                    }
                })->paginate(5)->toArray();
        return view('admin.bap.bap', compact('data'));
    }

    public function RekapNilaiView(){
        $data = JenisSeminar::all();
        return view('admin.bap.bap-rekap-nilai', compact('data'));
    }

    public function RekapNilaiExport(ExportRekapNilai $request){

        $data = Seminar::query()->where('jenis_seminar_id', $request->safe()->jenis)->whereBetween('tanggal', [$request->safe()->tglAwal, $request->safe()->tglAkhir])->with('Penggunas', 'Penilaians')->get();

        if($data->isEmpty()){
            return back()->withInput()->with('error', 'Belum ada nilai yang dapat direkap');
        }

        foreach ($data as $index => $value) {

            $nilaiPembimbing1 = $value['penilaians']->where('pengguna_id', $value['pembimbing_1_id'])->first()->toArray();

            $nilaiPembimbing2 = $value['penilaians']->where('pengguna_id', $value['pembimbing_2_id'])->first()->toArray();

            $nilaiPenguji1 = $value['penilaians']->where('pengguna_id', $value['penguji_1_id'])->first()->toArray();

            $nilaiPenguji2 = $value['penilaians']->where('pengguna_id', $value['penguji_2_id'])->first()->toArray();

            $nilaiPembimbing1 = ($nilaiPembimbing1['penulisan_draft_tugas_akhir_dan_ppt'] + $nilaiPembimbing1['penyajian_atau_presentasi'] + $nilaiPembimbing1['penguasaan_materi'] + $nilaiPembimbing1['penguasaan_materi'] + $nilaiPembimbing1['nilai_bimbingan'] + $nilaiPembimbing1['etika_dan_sopan_santun'] ) / 6;

            $nilaiPembimbing2 = ($nilaiPembimbing2['penulisan_draft_tugas_akhir_dan_ppt'] + $nilaiPembimbing2['penyajian_atau_presentasi'] + $nilaiPembimbing2['penguasaan_materi'] + $nilaiPembimbing2['penguasaan_materi'] + $nilaiPembimbing2['nilai_bimbingan'] + $nilaiPembimbing2['etika_dan_sopan_santun'] ) / 6;

            $nilaiPenguji1 = ($nilaiPenguji1['penulisan_draft_tugas_akhir_dan_ppt'] + $nilaiPenguji1['penyajian_atau_presentasi'] + $nilaiPenguji1['penguasaan_materi'] + $nilaiPenguji1['penguasaan_materi'] + $nilaiPenguji1['etika_dan_sopan_santun'] ) / 5;
            
            $nilaiPenguji2 = ($nilaiPenguji2['penulisan_draft_tugas_akhir_dan_ppt'] + $nilaiPenguji2['penyajian_atau_presentasi'] + $nilaiPenguji2['penguasaan_materi'] + $nilaiPenguji2['penguasaan_materi'] + $nilaiPenguji2['etika_dan_sopan_santun'] ) / 5;

            $nilaiAkhir = (($nilaiPembimbing1 + $nilaiPembimbing2)*60/100 + ($nilaiPenguji1 + $nilaiPenguji2)*40/100)/2;

            if ($nilaiAkhir >= 80) {
                $nilaiHuruf = 'A';
            } elseif ($nilaiAkhir >= 75) {
                $nilaiHuruf = 'AB';
            } elseif ($nilaiAkhir >= 70) {
                $nilaiHuruf = 'B';
            } elseif ($nilaiAkhir >= 65) {
                $nilaiHuruf = 'BC';
            } elseif ($nilaiAkhir >= 60) {
                $nilaiHuruf = 'C';
            } elseif($nilaiAkhir >= 55) {
                $nilaiHuruf = 'D';
            }elseif($nilaiAkhir < 50) {
                $nilaiHuruf = 'E';
            }
        
            $mahasiswa[$index] = [
                'no' => $index + 1,
                'nama' => $value['Penggunas']['nama'],
                'nim' => $value['Penggunas']['nim'],
                'nilai_akhir' => $nilaiAkhir,
                'nilai_huruf' => $nilaiHuruf
            ];
        }

        if($request->safe()->jenis == 1) {
            $jenis = 'Seminar Proposal';
        }elseif($request->safe()->jenis == 2) {
            $jenis = 'Seminar Akhir';
        }

        return (new NilaiExport($mahasiswa))->download("Rekap Nilai {$jenis} {$request->safe()->tglAwal} - {$request->safe()->tglAkhir} .xlsx");
    }

    public function BapDetailAdminView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Seminar::where('id', $request->query('id'))->with([
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
                },
                'JenisSeminars' => function ($query) {
                    $query->select('id', 'keterangan');
                },
                'Penggunas' => function ($query) {
                    $query->select('id', 'nama');
                },
            ])->withCount([
                        'Revisis as count_revisi',
                        'Revisis as count_revisi_selesai' => function ($query) {
                            $query->where('status_revisi_id', 2);
                        },
                        'Penilaians as count_penilaian',
                        'Penilaians as count_penilaian_selesai' => function ($query) {
                            $query->where('status_penilaian_id', 1);
                        },
                        'Penilaians as count_penilaian_terlambat' => function ($query) {
                            $query->where('status_penilaian_id', 2);
                        },
                        'BAP1s as Bap1s_count' => function ($query) {
                            $query->where('status_tanda_tangan_id', 2);
                        }
                    ])->first()->toArray();
            return view('admin.bap.bap-detail', compact('data'));
        }
        return redirect()->route('bap-admin');
    }

    public function BAPDetailProsesView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Seminar::select(['id', 'pengguna_id', 'pembimbing_1_id', 'pembimbing_2_id', 'penguji_1_id', 'penguji_2_id', 'pimpinan_sidang_id', 'jenis_seminar_id'])->where('id', $request->query('id'))->with([
                'Penilaians',
                'Revisis',
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
                }
            ])->first();

            if ($data) {
                $collection = $data->toArray();

                $collection['penilaian_pembimbing_1'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['penilaian_pembimbing_2'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_1'] = optional($data->penilaians->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_2'] = optional($data->penilaians->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];

                $collection['revisi_pembimbing_1'] = optional($data->revisis->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['revisi_pembimbing_2'] = optional($data->revisis->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['revisi_penguji_1'] = optional($data->revisis->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['revisi_penguji_2'] = optional($data->revisis->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];

            }

            return view('admin.bap.bap-detail-proses', compact('collection'));
        }
        return redirect()->route('bap-admin');
    }

    public function Bap1View(Request $request){
        if ($request->query('id') !== null) {
            $data = Seminar::where('id', $request->query('id'))->with(['Penggunas:id,nama,nim', 'Penilaians', 'Pembimbing1s:id,nama,nip', 'Pembimbing2s:id,nama,nip', 'Penguji1s:id,nama,nip', 'Penguji2s:id,nama,nip', 'PimpinanSidangs:id,nama,nip', 'BAP1s'])->first();

            if($data){
                $collection = $data->toArray();
                $collection['penilaian_pembimbing_1'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['penilaian_pembimbing_2'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_1'] = optional($data->penilaians->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_2'] = optional($data->penilaians->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];
            }
            return view('admin.bap.bap-lihat-bap1', compact('collection'));
        }
        return redirect()->route('bap-admin');
    }

    public function UnduhBap1View(Request $request){
        if ($request->query('id') !== null) {
            $data = Seminar::where('id', $request->query('id'))->with(['Penggunas:id,nama,nim', 'Penilaians', 'Pembimbing1s:id,nama,nip', 'Pembimbing2s:id,nama,nip', 'Penguji1s:id,nama,nip', 'Penguji2s:id,nama,nip', 'PimpinanSidangs:id,nama,nip', 'BAP1s'])->first();

            if($data){
                $collection = $data->toArray();
                $collection['penilaian_pembimbing_1'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['penilaian_pembimbing_2'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_1'] = optional($data->penilaians->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_2'] = optional($data->penilaians->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];
            }
            return view('admin.bap.bap1', compact('collection'));
        }
        return redirect()->route('bap-admin');
    }

    public function Bap2View(Request $request){
        if ($request->query('id') !== null) {
            $data = Seminar::where('id', $request->query('id'))->with(['Penggunas:id,nama,nim', 'Penilaians', 'Pembimbing1s:id,nama,nip', 'Pembimbing2s:id,nama,nip', 'Penguji1s:id,nama,nip', 'Penguji2s:id,nama,nip', 'PimpinanSidangs:id,nama,nip', 'BAP1s', 'BAP2s' => function($query){
                $query->with('Koordinators:id,nama,nip');
            },])->first();

            if($data){
                $collection = $data->toArray();
                $collection['penilaian_pembimbing_1'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_1_id)->first())->toArray() ?? [];
                $collection['penilaian_pembimbing_2'] = optional($data->penilaians->where('pengguna_id', $data->pembimbing_2_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_1'] = optional($data->penilaians->where('pengguna_id', $data->penguji_1_id)->first())->toArray() ?? [];
                $collection['penilaian_penguji_2'] = optional($data->penilaians->where('pengguna_id', $data->penguji_2_id)->first())->toArray() ?? [];
            }

            return view('admin.bap.bap-lihat-bap2', compact('collection'));
        }
        return redirect()->route('bap-admin');
    }
}

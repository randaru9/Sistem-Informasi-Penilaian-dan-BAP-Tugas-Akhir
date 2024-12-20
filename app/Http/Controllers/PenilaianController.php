<?php

namespace App\Http\Controllers;

use App\Http\Requests\Penilaian\CreateRequest;
use App\Http\Requests\Penilaian\GetBySeminarIdAndPenggunaIdRequest;
use App\Http\Requests\Penilaian\UpdateRequest;
use App\Models\Penilaian;
use App\Models\Seminar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenilaianController extends Controller
{

    // (Dosen) //

    public function CreatePenilaianView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama', 'nim']);
                },
                'JenisSeminars' => function ($query) {
                    $query->select(['id', 'keterangan']);
                }
            ])->first()->toArray();
            return view('dosen.penilaian.penilaian-tambah', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    // Create Penilaian and Update Status Penilaian to "Selesai"
    public function CreatePenilaian(CreateRequest $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            // $ttd = $request->safe()->ttd->store("/ttd/penilaian/{$id}");
            if (auth()->user()->ttd == null) {
                return back()->with('ttd', 'Silahkan isi tanda tangan pada profil terlebih dahulu');
            }
            $ttd = auth()->user()->ttd;
            if ($request->bimbingan !== null) {
                $data = Penilaian::where('seminar_id', $request->query('id'))->where('pengguna_id', $id)->first();
                if ($data !== null) {
                    $data->update([
                        'status_penilaian_id' => 1,
                        'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan,
                        'penyajian_atau_presentasi' => $request->safe()->penyajian,
                        'penguasaan_materi' => $request->safe()->penguasaan,
                        'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
                        'etika_dan_sopan_santun' => $request->safe()->etika,
                        'nilai_bimbingan' => $request->safe()->bimbingan,
                        'ttd' => $ttd
                    ]);
                } else {
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
                }
            } else {
                $data = Penilaian::where('seminar_id', $request->query('id'))->where('pengguna_id', $id)->first();
                if ($data !== null) {
                    $data->update([
                        'status_penilaian_id' => 1,
                        'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan,
                        'penyajian_atau_presentasi' => $request->safe()->penyajian,
                        'penguasaan_materi' => $request->safe()->penguasaan,
                        'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
                        'etika_dan_sopan_santun' => $request->safe()->etika,
                        'ttd' => $ttd
                    ]);
                } else {
                    Penilaian::create([
                        'pengguna_id' => $id,
                        'seminar_id' => $request->query('id'),
                        'status_penilaian_id' => 1,
                        'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan,
                        'penyajian_atau_presentasi' => $request->safe()->penyajian,
                        'penguasaan_materi' => $request->safe()->penguasaan,
                        'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
                        'etika_dan_sopan_santun' => $request->safe()->etika,
                        'ttd' => $ttd
                    ]);
                }
            }
            return redirect()->route('penilaian-detail', ['id' => $request->query('id')]);
        }
        return redirect()->route('penilaian');
    }

    // Get One Penilaian by Seminar Id and Pengguna Id
    public function CekNilaiView(Request $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama', 'nim']);
                },
                'JenisSeminars' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'Penilaians' => function ($query) use ($request, $id) {
                    $query->where('pengguna_id', $id)
                        ->where('seminar_id', $request->query('id'));
                }
            ])->first()->toArray();
            return view('dosen.penilaian.cek-nilai', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    public function UnduhTtdPenilaian(Request $request)
    {
        if ($request->query('path') !== null) {
            return response()->download(Storage::path($request->query('path')));
        }
    }

    public function UpdateNilaiView(Request $request)
    {
        if ($request->query('id') !== null) {
            $id = auth()->user()->id;
            $data = Seminar::where('id', $request->query('id'))->with([
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama', 'nim']);
                },
                'JenisSeminars' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'Penilaians' => function ($query) use ($request, $id) {
                    $query->where('pengguna_id', $id)
                        ->where('seminar_id', $request->query('id'));
                }
            ])->first()->toArray();
            return view('dosen.penilaian.ubah-nilai', compact('data'));
        }
        return redirect()->route('penilaian');
    }

    // Update Penilaian by Penilaian Id
    public function UpdatePenilaian(UpdateRequest $request)
    {
        if ($request->query('id') !== null) {
            $id_seminar = $request->query('id');
            $id_dosen = auth()->user()->id;
            $data = Penilaian::where('seminar_id', $id_seminar)->where('pengguna_id', $id_dosen)->first();
            // if ($request->safe()->ttd != null) {
            //     Storage::delete($data->ttd);
            //     $ttd = $request->safe()->ttd->store("/ttd/penilaian/{$id_dosen}");
            //     $data->update([
            //         'ttd' => $ttd
            //     ]);
            // }
            if (request()->bimbingan != null) {
                $data->update([
                    'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan,
                    'penyajian_atau_presentasi' => $request->safe()->penyajian,
                    'penguasaan_materi' => $request->safe()->penguasaan,
                    'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
                    'etika_dan_sopan_santun' => $request->safe()->etika,
                    'nilai_bimbingan' => $request->safe()->bimbingan,
                ]);
            } else {
                $data->update([
                    'penulisan_draft_tugas_akhir_dan_ppt' => $request->safe()->penulisan,
                    'penyajian_atau_presentasi' => $request->safe()->penyajian,
                    'penguasaan_materi' => $request->safe()->penguasaan,
                    'kemampuan_menjawab' => $request->safe()->kemampuan_menjawab,
                    'etika_dan_sopan_santun' => $request->safe()->etika,
                ]);
            }
            return redirect()->route('penilaian-detail', ['id' => $request->query('id')]);
        }
        return redirect()->route('penilaian');
    }

    public function FormPenilaianView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Penilaian::where('id', $request->query('id'))->with([
                'Seminars' => function ($query) {
                    $query->with(['Penggunas:id,nama,nim']);
                },
                'Penggunas:id,nama,nip'
            ])->first()->toArray();
            return view('admin.bap.bap-form-penilaian', compact('data'));
        }
        return redirect()->route('bap-admin');
    }

    public function UnduhFormPenilaianView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Penilaian::where('id', $request->query('id'))->with([
                'Seminars' => function ($query) {
                    $query->with(['Penggunas:id,nama,nim']);
                },
                'Penggunas:id,nama,nip'
            ])->first()->toArray();
            return view('admin.bap.form-penilaian', compact('data'));
        }
        return redirect()->route('bap-admin');
    }

}

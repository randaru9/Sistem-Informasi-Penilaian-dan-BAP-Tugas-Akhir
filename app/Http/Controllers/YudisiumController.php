<?php

namespace App\Http\Controllers;

use App\Exports\YudisiumExport;
use App\Http\Requests\Yudisium\ExportYudisium;
use App\Http\Requests\Yudisium\UpdateStatusRequest;
use App\Http\Requests\Yudisium\CreateRequest;
use App\Http\Requests\Yudisium\UpdateRequest;
use App\Models\PeriodeWisuda;
use App\Models\Yudisium;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class YudisiumController extends Controller
{
    // (Mahasiswa) //

    public function CreateYudisiumView()
    {
        $periode = PeriodeWisuda::all();
        return view('mahasiswa.yudisium.yudisium-tambah', compact('periode'));
    }

    // Create Yudisium
    public function CreateYudisium(CreateRequest $request)
    {
        $id = auth()->user()->id;
        $berkas = $request->safe()->berkas->store("yudisium/{$id}");
        Yudisium::create([
            'pengguna_id' => $id,
            'status_yudisium_id' => 1,
            'periode_wisuda_id' => $request->safe()->periode_wisuda,
            'tempat_dan_bidang_kerja' => $request->tempat_bidang_kerja,
            'saran_dan_kritik' => $request->saran,
            'berkas' => $berkas
        ]);
        return redirect()->route('yudisium-mahasiswa');
    }

    // Get All Yudisium by Pengguna Id
    public function GetAllYudisiumByPenggunaId(Request $request)
    {
        $data = Yudisium::select(['id', 'periode_wisuda_id', 'status_yudisium_id'])->with([
            'PeriodeWisudas' => function ($query) {
                $query->select(['id', 'keterangan']);
            },
            'StatusYudisiums' => function ($query) {
                $query->select(['id', 'keterangan']);
            }
        ])->where('pengguna_id', auth()->user()->id)->paginate(5)->toArray();

        return view('mahasiswa.yudisium.yudisium', compact('data'));
    }

    // Get One Yudisium by Id
    public function GetOneYudisiumById(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Yudisium::where('id', $request->query('id'))->with([
                'StatusYudisiums' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'PeriodeWisudas' => function ($query) {
                    $query->select(['id', 'keterangan']);
                }
            ])->first()->toArray();
            return view('mahasiswa.yudisium.yudisium-detail', compact('data'));
        }
        return redirect()->route('yudisium-mahasiswa');
    }

    // Update Yudisium by Id

    public function UpdateYudisiumView(Request $request)
    {
        if ($request->query('id') !== null) {
            $periode = PeriodeWisuda::all();
            $data = Yudisium::where('id', $request->query('id'))->first();
            return view('mahasiswa.yudisium.yudisium-ubah', compact(['data', 'periode']));
        }
        return redirect()->route('yudisium-mahasiswa');
    }

    public function UpdateYudisium(UpdateRequest $request)
    {
        if ($request->query('id') !== null) {
            $data = Yudisium::where('id', $request->query('id'))->first();
            $id = auth()->user()->id;

            if ($request->berkas !== null) {
                Storage::delete($data->berkas);
                $berkas = $request->safe()->berkas->store("yudisium/{$id}");
                $data->update([
                    'berkas' => $berkas
                ]);
            }

            $data->update([
                'status_yudisium_id' => 1,
                'periode_wisuda_id' => $request->safe()->periode_wisuda,
                'tempat_dan_bidang_kerja' => $request->tempat_bidang_kerja,
                'saran_dan_kritik' => $request->saran,
            ]);
            return redirect()->route('yudisium-mahasiswa');

        }
        return redirect()->route('yudisium-mahasiswa');
    }

    public function UnduhBerkas(Request $request){
        if ($request->query('path') !== null) {
            $user = auth()->user()->nama;
            $periode = $request->query('periode');
            $name = "Berkas Yudisium Periode $periode $user";
            return response()->download(Storage::path($request->query('path')), $name);
        }
    }

    // (Admin) //

    // Get All Yudisium
    public function YudisiumView(Request $request)
    {
        $data = Yudisium::select(['id', 'periode_wisuda_id', 'status_yudisium_id', 'pengguna_id', 'created_at'])->with([
            'PeriodeWisudas' => function ($query) {
                $query->select(['id', 'keterangan']);
            },
            'StatusYudisiums' => function ($query) {
                $query->select(['id', 'keterangan']);
            },
            'Penggunas' => function ($query) {
                $query->select(['id', 'nama']);
            }
        ])->where(function (Builder $query) use ($request) {
            if (isset($request->search)) {
                if ($search = $request->search) {
                    $terms = explode(' ', $search);
    
                    foreach ($terms as $term) {
                        $query->orWhereHas('Penggunas', function ($query) use ($term) {
                            $query->where('nama', 'LIKE', "%{$term}%");
                        })
                        ->orWhereHas('PeriodeWisudas', function ($query) use ($term) {
                            $query->where('keterangan', 'LIKE', "%{$term}%");
                        })
                        ->orWhere('created_at', 'LIKE', "%{$term}%");
                    }
                }
            }
        })->paginate(5)->toArray();
        // dd($data);
        return view('admin.yudisium.yudisium', compact('data'));
    }

    public function DetailYudisiumAdminView(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Yudisium::where('id', $request->query('id'))->with([
                'StatusYudisiums' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'PeriodeWisudas' => function ($query) {
                    $query->select(['id', 'keterangan']);
                },
                'Penggunas' => function ($query) {
                    $query->select(['id', 'nama']);
                }
            ])->first()->toArray();
            return view('admin.yudisium.yudisium-detail', compact('data'));
        }
        return redirect()->route('yudisium');
    }

    // Update Status Yudisium
    public function RejectYudisium(UpdateStatusRequest $request)
    {
        if ($request->query('id') !== null) {
            $data = Yudisium::where('id', $request->query('id'))->first();
                $data->update([
                    'catatan' => $request->safe()->alasan_penolakan,
                    'status_yudisium_id' => 2
                ]);
            return redirect()->route('yudisium');
        }
        return redirect()->route('yudisium');
    }

    public function AcceptYudisium(Request $request)
    {
        if ($request->query('id') !== null) {
            $data = Yudisium::where('id', $request->query('id'))->first();
            $data->update([
                'status_yudisium_id' => 3,
                'catatan' => null
            ]);
            return redirect()->route('yudisium');
        }
        return redirect()->route('yudisium');
    }

    public function UnduhBerkasAdmin(Request $request){
        if ($request->query('path') !== null) {
            $user = $request->query('nama');
            $periode = $request->query('periode');
            $name = "Berkas Yudisium Periode $periode $user";
            return response()->download(Storage::path($request->query('path')), $name);
        }
    }

    public function RekapYudisiumView()
    {
        $periode = PeriodeWisuda::all();
        return view('admin.yudisium.yudisium-rekap', compact('periode'));
    }

    public function RekapYudisiumExport(ExportYudisium $request)
    {
        $yudisium = [];
        $data = Yudisium::where('status_yudisium_id', 3)->where('periode_wisuda_id', $request->safe()->periode)->whereYear('created_at', $request->safe()->tahun)->with(['Penggunas', 'PeriodeWisudas'])->get();

        if ($data->isEmpty()) {
            return back()->withInput()->with('error', 'Belum ada yudisium yang dapat direkap');
        }

        $data = $data->toArray();

        foreach ($data as $index => $value) {

            $yudisium[$index] = [
                'no' => $index + 1,
                'nama' => $value['penggunas']['nama'],
                'periode' => $value['periode_wisudas']['keterangan'],
                'tahun' => $request->safe()->tahun,
            ];

        }

        if ($yudisium==[]) {
            return back()->withInput()->with('error', 'Belum ada yudisium yang dapat direkap');
        }

        return (new YudisiumExport($yudisium))->download("Rekap Yudisium Periode {$request->safe()->periode} Tahun {$request->safe()->tahun}.xlsx");
    }


}

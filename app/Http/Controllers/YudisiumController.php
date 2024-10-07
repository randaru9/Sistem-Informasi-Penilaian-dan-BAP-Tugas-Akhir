<?php

namespace App\Http\Controllers;

use App\Exports\YudisiumExport;
use App\Http\Requests\Yudisium\ExportYudisium;
use App\Http\Requests\Yudisium\UpdateStatusRequest;
use App\Http\Requests\Yudisium\CreateRequest;
use App\Http\Requests\Yudisium\UpdateRequest;
use App\Models\Yudisium;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class YudisiumController extends Controller
{
    // (Mahasiswa) //

    public function CreateYudisiumView()
    {
        return view('mahasiswa.yudisium.yudisium-tambah');
    }

    // Create Yudisium
    public function CreateYudisium(CreateRequest $request)
    {
        $id = auth()->user()->id;
        $berkas = $request->safe()->berkas->store("yudisium/{$id}");
        $date = Carbon::parse($request->periode_wisuda)->format('Y-m-d');
        Yudisium::create([
            'pengguna_id' => $id,
            'status_yudisium_id' => 1,
            // 'periode_wisuda_id' => $request->safe()->periode_wisuda,
            'periode_wisuda' => $date,
            'tempat_dan_bidang_kerja' => $request->tempat_bidang_kerja,
            'saran_dan_kritik' => $request->saran,
            'berkas' => $berkas
        ]);
        return redirect()->route('yudisium-mahasiswa');
    }

    // Get All Yudisium by Pengguna Id
    public function GetAllYudisiumByPenggunaId(Request $request)
    {
        $data = Yudisium::select(['id', 'status_yudisium_id', 'periode_wisuda'])->with([
            // 'PeriodeWisudas' => function ($query) {
            //     $query->select(['id', 'keterangan']);
            // },
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
                // 'PeriodeWisudas' => function ($query) {
                //     $query->select(['id', 'keterangan']);
                // }
            ])->first()->toArray();
            return view('mahasiswa.yudisium.yudisium-detail', compact('data'));
        }
        return redirect()->route('yudisium-mahasiswa');
    }

    // Update Yudisium by Id

    public function UpdateYudisiumView(Request $request)
    {
        if ($request->query('id') !== null) {
            // $periode = PeriodeWisuda::all();
            $data = Yudisium::where('id', $request->query('id'))->first();
            return view('mahasiswa.yudisium.yudisium-ubah', compact(['data']));
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
            $date = Carbon::parse($request->periode_wisuda)->format('Y-m-d');
            $data->update([
                'status_yudisium_id' => 1,
                // 'periode_wisuda_id' => $request->safe()->periode_wisuda,
                'periode_wisuda' => $date,
                'tempat_dan_bidang_kerja' => $request->tempat_bidang_kerja,
                'saran_dan_kritik' => $request->saran,
            ]);
            return redirect()->route('yudisium-mahasiswa');

        }
        return redirect()->route('yudisium-mahasiswa');
    }

    public function UnduhBerkas(Request $request)
    {
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
        $data = Yudisium::select(['id', 'periode_wisuda', 'status_yudisium_id', 'pengguna_id', 'created_at'])->with([
            // 'PeriodeWisudas' => function ($query) {
            //     $query->select(['id', 'keterangan']);
            // },
            'StatusYudisiums' => function ($query) {
                $query->select(['id', 'keterangan']);
            },
            'Penggunas' => function ($query) {
                $query->select(['id', 'nama']);
            }
        ])->where(function (Builder $query) use ($request) {
            if (isset($request->search)) {
                if ($search = $request->search) {
                    $query->orWhereHas('Penggunas', function ($query) use ($search) {
                        $query->where('nama', 'LIKE', "%{$search}%");
                    });
                }
            } elseif (isset($request->month)) {
                if ($month = $request->month) {
                    $date = Carbon::parse($month)->format('Y-m-d');
                    $query->whereDate('periode_wisuda', '=' ,$date);
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
                // 'PeriodeWisudas' => function ($query) {
                //     $query->select(['id', 'keterangan']);
                // },
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

    public function UnduhBerkasAdmin(Request $request)
    {
        if ($request->query('path') !== null) {
            $user = $request->query('nama');
            $periode = $request->query('periode');
            $name = "Berkas Yudisium Periode $periode $user";
            return response()->download(Storage::path($request->query('path')), $name);
        }
    }

    public function RekapYudisiumView()
    {
        return view('admin.yudisium.yudisium-rekap');
    }

    public function RekapYudisiumExport(ExportYudisium $request)
    {
        $yudisium = [];
        $data = Yudisium::where('status_yudisium_id', 3)->whereDate('periode_wisuda', '=' , Carbon::parse($request->safe()->periode)->translatedFormat('Y-m-d'))->with(['Penggunas'])->get();

        if ($data->isEmpty()) {
            return back()->withInput()->with('error', 'Belum ada yudisium yang dapat direkap');
        }

        $data = $data->toArray();

        foreach ($data as $index => $value) {

            $yudisium[$index] = [
                'no' => $index + 1,
                'nama' => $value['penggunas']['nama'],
                'periode' => Carbon::parse($value['periode_wisuda'])->translatedFormat('F Y'),
                'tahun' => Carbon::parse($value['periode_wisuda'])->translatedFormat('Y'),
            ];

        }

        if ($yudisium == []) {
            return back()->withInput()->with('error', 'Belum ada yudisium yang dapat direkap');
        }
        $date = Carbon::parse($request->safe()->periode)->translatedFormat('F Y');
        return (new YudisiumExport($yudisium))->download("Rekap Yudisium Periode {$date}.xlsx");
    }


}

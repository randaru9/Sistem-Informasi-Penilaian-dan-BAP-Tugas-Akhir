<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStatusRequest;
use App\Http\Requests\Yudisium\CreateRequest;
use App\Http\Requests\Yudisium\GetByPenggunaIdRequest;
use App\Http\Requests\Yudisium\GetOneByIdRequest;
use App\Http\Requests\Yudisium\UpdateRequest;
use App\Models\PeriodeWisuda;
use App\Models\Yudisium;
use Carbon\Carbon;
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

    // (Admin) //

    // Get All Yudisium
    public function GetAllYudisium()
    {
        $data = Yudisium::with(['Penggunas', 'StatusYudisiums', 'PeriodeWisudas'])->paginate(5);
        return response()->json($data);
    }

    // Update Status Yudisium
    public function UpdateStatusYudisium(UpdateStatusRequest $request)
    {
        $data = Yudisium::where('id', $request->safe()->id)->update(['status_yudisium_id' => $request->safe()->status_yudisium_id]); // Must Change to Actual Id
        return response()->json($data);
    }



}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BAP\CreateBAP1Request;
use App\Http\Requests\BAP\UpdateBAP1Request;
use App\Models\BAP1;
use App\Models\Seminar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BAPController extends Controller
{
    // (Dosen) //

    // Create BAP1 (ttd and author)
    public function CreateBAP1(CreateBAP1Request $request){
        $time = Carbon::now();
        $bap = BAP1::create([
            'ttd' => $request->safe()->ttd->store('bap/'.$request->safe()->seminar_id.'/'.$time),
        ]);
        $data = Seminar::where('id', $request->safe()->seminar_id)->update(['bap_1_id' => $bap->id]);
        return response()->json($data);
    }

    // Update BAP1 (ttd and author)
    public function UpdateBAP1(UpdateBAP1Request $request){
        $time = Carbon::now();
        $bap = BAP1::where('id', $request->safe()->id)->update([
            'ttd' => $request->safe()->ttd->store('bap/'.$request->safe()->seminar_id.'/'.$time),
        ]);
        return response()->json($bap);
    }
    

}

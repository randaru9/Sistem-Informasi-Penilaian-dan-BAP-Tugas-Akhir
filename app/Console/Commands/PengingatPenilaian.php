<?php

namespace App\Console\Commands;

use App\Models\Pengguna;
use App\Models\Penilaian;
use App\Models\Seminar;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class PengingatPenilaian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pengingat-penilaian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pengingat dalam melakukan penilaian';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $daftarDosen = collect([]);

        Seminar::whereDate('tanggal', Carbon::now()->subDays(2))
            ->whereHas('Penilaians', null, '<', 4)
            ->get()
            ->each(function (Seminar $seminar) use ($daftarDosen) {
                $temp = collect([$seminar->pembimbing_1_id, $seminar->pembimbing_2_id, $seminar->penguji_1_id, $seminar->penguji_2_id]);
                foreach ($seminar->Penilaians as $penilaian) {
                    $key = $temp->search($penilaian->pengguna_id);
                    if ($key !== false) {
                        $temp->forget($key);
                    }
                }
                $daftarDosen->push(...$temp);

                $seminarId = $seminar->id;
                $temp->each(function ($dosenId) use ($seminarId) {
                    Penilaian::create([
                        'pengguna_id' => $dosenId,
                        'seminar_id' => $seminarId,
                        'status_penilaian_id' => 2,
                    ]);
                });
            });

        $daftarDosen = Pengguna::findMany($daftarDosen->unique()->toArray());
        $daftarDosen->each(function (Pengguna $dosen) {
            // MAIL
            // try{
                
            // }catch(\Exception $e){}
        });

        return;
    }
}

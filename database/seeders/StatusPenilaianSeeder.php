<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_status_penilaian = [
            ['id' => 1, 'keterangan' => 'Belum Dinilai', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'keterangan' => 'Sudah Dinilai', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'keterangan' => 'Terlambat', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('status_penilaian')->insert($data_status_penilaian);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPeriodeWisudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_periode_wisuda = [
            ['id' => 1, 'keterangan' => 'Maret', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'keterangan' => 'Mei', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'keterangan' => 'Juli', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'keterangan' => 'September', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'keterangan' => 'November', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('periode_wisuda')->insert($data_periode_wisuda);
    }
}

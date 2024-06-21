<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusRevisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_status_revisi = [
            ['id' => 1, 'keterangan' => 'Belum Diberikan', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'keterangan' => 'Belum Selesai', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'keterangan' => 'Selesai', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('status_revisi')->insert($data_status_revisi);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusYudisiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_status_yudisium = [
            ['id' => 1, 'keterangan' => 'Perlu Validasi'],
            ['id' => 2, 'keterangan' => 'Ditolak'],
            ['id' => 3, 'keterangan' => 'Diterima'],
        ];

        DB::table('status_yudisium')->insert($data_status_yudisium);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTandaTanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_status_tanda_tangan = [
            ['id' => 1, 'keterangan' => 'Belum Diberikan', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'keterangan' => 'Sudah Diberikan', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('status_tanda_tangan')->insert($data_status_tanda_tangan);
    }
}

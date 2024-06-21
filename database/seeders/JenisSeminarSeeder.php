<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_jenis_seminar = [
            ['id' => 1, 'keterangan' => 'Seminar Proposal', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'keterangan' => 'Seminar Akhir', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('jenis_seminar')->insert($data_jenis_seminar);
    }
}

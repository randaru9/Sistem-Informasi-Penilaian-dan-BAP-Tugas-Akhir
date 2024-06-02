<?php

namespace Database\Seeders;

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
            ['id' => \Ramsey\Uuid\Uuid::uuid4()->toString(), 'keterangan' => 'Belum Diberikan'],
            ['id' => \Ramsey\Uuid\Uuid::uuid4()->toString(), 'keterangan' => 'Sudah Diberikan'],
        ];

        DB::table('status_tanda_tangan')->insert($data_status_tanda_tangan);
    }
}

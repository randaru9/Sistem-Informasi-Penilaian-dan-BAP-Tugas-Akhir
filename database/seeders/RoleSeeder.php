<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_role = [
            ['id' => 1, 'keterangan' => 'Admin', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'keterangan' => 'Dosen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'keterangan' => 'Mahasiswa', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('role')->insert($data_role);
    }
}

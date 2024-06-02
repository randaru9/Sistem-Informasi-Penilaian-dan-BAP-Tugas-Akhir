<?php

namespace Database\Seeders;

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
            ['id' => \Ramsey\Uuid\Uuid::uuid4()->toString(), 'keterangan' => 'Admin'],
            ['id' => \Ramsey\Uuid\Uuid::uuid4()->toString(), 'keterangan' => 'Dosen'],
            ['id' => \Ramsey\Uuid\Uuid::uuid4()->toString(), 'keterangan' => 'Mahasiswa'],
        ];

        DB::table('role')->insert($data_role);
    }
}

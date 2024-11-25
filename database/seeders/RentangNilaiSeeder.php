<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentangNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_nilai = [
            ['id' => 1, 'predikat' => 'A', 'min' => 80, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'predikat' => 'AB', 'min' => 75, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'predikat' => 'B', 'min' => 70, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'predikat' => 'BC', 'min' => 65, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'predikat' => 'C', 'min' => 60, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('rentang_nilai')->insert($data_nilai);
    }
}

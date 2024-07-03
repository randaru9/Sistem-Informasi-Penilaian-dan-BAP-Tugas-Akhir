<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => \Ramsey\Uuid\Uuid::uuid4()->toString(), 'role_id' => 1, 'nama' => 'Admin', 'nip' => '123456789123456789', 'password' => Hash::make('123123123') , 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('pengguna')->insert($data);
    }
}

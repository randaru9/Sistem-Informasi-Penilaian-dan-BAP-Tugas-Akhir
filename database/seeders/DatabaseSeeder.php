<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            JenisSeminarSeeder::class,
            StatusPenilaianSeeder::class,
            StatusRevisiSeeder::class,
            StatusTandaTanganSeeder::class,
            StatusYudisiumSeeder::class,
            RentangNilaiSeeder::class
        ]);
    }
}

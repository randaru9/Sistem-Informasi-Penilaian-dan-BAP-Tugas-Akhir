<?php

namespace App\Imports;

use App\Models\Pengguna;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DosenImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            Pengguna::create([
                'nama' => $row[0],
                'nip' => $row[1],
                'email' => $row[2],
                'password' => $row[1],
                'role_id' => 2,
            ]);
        }
    }
}

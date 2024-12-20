<?php

namespace App\Imports;

use App\Models\Pengguna;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row->filter()->isNotEmpty()) {
                $mahasiswa = Pengguna::withTrashed()->where('nim', $row[1])->orWhere('nama', $row[0])->first();
                if (
                    Pengguna::where('nama', $row[0])
                        ->orWhere('nim', $row[1])
                        ->exists()
                ) {
                    continue;
                }
                if ($mahasiswa == null) {
                    Pengguna::create([
                        'nama' => $row[0],
                        'nim' => $row[1],
                        'password' => $row[1],
                        'role_id' => 3,
                    ]);
                } else {
                    $mahasiswa->restore();
                    $mahasiswa->update([
                        'nama' => $row[0],
                        'nim' => $row[1],
                        'password' => $row[1],
                        'role_id' => 3,
                    ]);
                }
            }
        }
    }
}

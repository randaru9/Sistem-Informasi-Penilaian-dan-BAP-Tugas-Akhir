<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromArray, WithHeadings, WithCustomValueBinder
{
    use Exportable;
    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Nim',
            'Nilai Akhir',
            'Nilai Huruf'
        ];
    }

    public function array() : array
    {
        return $this->array;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Yudisium extends Model
{
    use HasFactory, HasUuids;

    use HasFactory, HasUuids;

    protected $table = 'yudisium';

    protected $fillable = [
        'pengguna_id',
        'status_yudisium_id',
        // 'status_yudisium',
        'periode_wisuda',
        'tempat_dan_bidang_kerja',
        'saran_dan_kritik',
        'berkas',
        'catatan',
    ];

    public function Penggunas(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function StatusYudisiums(): BelongsTo
    {
        return $this->belongsTo(StatusYudisium::class, 'status_yudisium_id');
    }

    // public function PeriodeWisudas(): BelongsTo
    // {
    //     return $this->belongsTo(PeriodeWisuda::class, 'periode_wisuda_id');
    // }

}

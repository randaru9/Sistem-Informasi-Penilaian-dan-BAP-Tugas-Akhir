<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'penilaian';

    protected $fillable = [
        'pengguna_id',
        'seminar_id',
        'status_penilaian_id',
        'penulisan_draft_tugas_akhir_dan_ppt',
        'penyajian_atau_presentasi',
        'penguasaan_materi',
        'kemampuan_menjawab',
        'etika_dan_sopan_santun',
        'nilai_bimbingan',
        'ttd'
    ];

    public function Penggunas(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function Seminars(): BelongsTo
    {
        return $this->belongsTo(Seminar::class, 'seminar_id');
    }

    public function StatusPenilaians(): BelongsTo
    {
        return $this->belongsTo(StatusPenilaian::class, 'status_penilaian_id');
    }

}

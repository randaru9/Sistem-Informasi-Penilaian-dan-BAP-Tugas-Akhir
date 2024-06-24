<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seminar extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'seminar';

    protected $fillable = [
        'bap1_id',
        'bap2_id',
        'pengguna_id',
        'pembimbing_1_id',
        'pembimbing_2_id',
        'penguji_1_id',
        'penguji_2_id',
        'pimpinan_sidang_id',
        'jenis_seminar_id',
        'judul',
        'tanggal',
        'waktu',
        'draft',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function BAP1s(): BelongsTo
    {
        return $this->belongsTo(BAP1::class, 'bap1_id');
    }

    public function BAP2s(): BelongsTo
    {
        return $this->belongsTo(BAP2::class, 'bap2_id');
    }

    public function Penggunas(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function Pembimbing1s(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pembimbing_1_id');
    }

    public function Pembimbing2s(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pembimbing_2_id');
    }

    public function Penguji1s(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'penguji_1_id');
    }

    public function Penguji2s(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'penguji_2_id');
    }

    public function PimpinanSidangs(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pimpinan_sidang_id');
    }

    public function JenisSeminars(): BelongsTo
    {
        return $this->belongsTo(JenisSeminar::class, 'jenis_seminar_id');
    }

    public function Penilaians(): HasMany
    {
        return $this->hasMany(Penilaian::class, 'seminar_id');
    }

    public function Revisis(): HasMany
    {
        return $this->hasMany(Revisi::class, 'seminar_id');
    }
}

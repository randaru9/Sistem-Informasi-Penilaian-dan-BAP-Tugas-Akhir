<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Revisi extends Model
{
    use HasFactory;

    protected $table = 'revisi';

    protected $fillable = [
        'pengguna_id',
        'seminar_id',
        'status_revisi_id',
        'keterangan'
    ];

    public function Penggunas(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function Seminars(): BelongsTo
    {
        return $this->belongsTo(Seminar::class, 'seminar_id');
    }

    public function StatusRevisis(): BelongsTo
    {
        return $this->belongsTo(StatusRevisi::class, 'status_revisi_id');
    }
}

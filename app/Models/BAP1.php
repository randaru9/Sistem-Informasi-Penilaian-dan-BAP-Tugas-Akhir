<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BAP1 extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'bap_1';

    protected $fillable = [
        'status_tanda_tangan_id',
        'ttd'
    ];

    public function StatusTandaTangans(): BelongsTo
    {
        return $this->belongsTo(StatusTandaTangan::class, 'status_tanda_tangan_id');
    }
}

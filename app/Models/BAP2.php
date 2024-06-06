<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BAP2 extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'bap_2';

    protected $fillable = [
        'koordinator',
    ];

    public function Koordinators(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'koordinator');
    }
}

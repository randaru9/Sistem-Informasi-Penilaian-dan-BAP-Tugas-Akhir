<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRevisi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'status_revisi';

    protected $fillable = [
        'keterangan'
    ];
}

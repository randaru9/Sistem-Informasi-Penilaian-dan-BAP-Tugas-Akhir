<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentangNilai extends Model
{
    use HasFactory;
    protected $table = 'rentang_nilai';

    protected $fillable = [
        'predikat',
        'min'
    ];
}

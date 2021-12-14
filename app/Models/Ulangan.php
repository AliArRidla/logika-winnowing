<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulangan extends Model
{
    protected $fillable = [
        'idSoal', 'soal',  'jawabanGuru', 'similarity',
    ];

    use HasFactory;
}

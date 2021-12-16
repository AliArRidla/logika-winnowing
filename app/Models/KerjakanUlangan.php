<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjakanUlangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSoal','jawabanSiswa',
    // 'id_ulangan',
    ];

    // public function ulangan()
    // {
    //     return $this->belongsTo(Ulangan::class, 'idSoal');
    // }
}

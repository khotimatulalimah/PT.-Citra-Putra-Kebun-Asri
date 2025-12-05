<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDecanter01 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_decanter01';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'tanggal',
        'hm_hari_ini',
        'last_service',
        'next_service'
    ];
}

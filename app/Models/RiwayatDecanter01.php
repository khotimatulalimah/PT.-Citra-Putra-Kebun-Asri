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
        'paten_hm',           // otomatis 4000
        'hm_hari_ini',        // diisi manual
        'last_service',       // diisi manual
        'jam_operasional',    // diisi manual
        'sisa_waktu_service', // otomatis = 4000 - jam_operasional
        'next_service'        // otomatis = hm_hari_ini + sisa_waktu_service
    ];
}

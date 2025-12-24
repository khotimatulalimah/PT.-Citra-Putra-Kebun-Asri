<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatServiceDecanter01 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_service_decanter01';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'tanggal',
        'hm_hari_ini',
        'last_service',
        'next_service',
        /*'nama_barang',
        'jumlah_barang',
        'harga',*/
        'nama_petugas',
        'alat_kerja',
        'waktu_mulai',
        'waktu_selesai',
        'lama_penggantian'
    ];
}

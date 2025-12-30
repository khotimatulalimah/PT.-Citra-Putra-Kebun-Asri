<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMesin extends Model
{
    use HasFactory;

    protected $table = 'riwayat_mesin';

    protected $fillable = [
        'unit_mesin',
        'tanggal',
        'hm_last_service',
        'nama_barang',
        'jumlah_barang',
        'harga_satuan',
        'harga_total',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}

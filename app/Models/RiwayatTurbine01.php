<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTurbine01 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_turbine01';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPress05 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_press05';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


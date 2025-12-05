<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPress04 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_press04';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


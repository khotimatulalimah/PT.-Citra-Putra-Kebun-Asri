<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPressKap20_01 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_presskap20_01';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


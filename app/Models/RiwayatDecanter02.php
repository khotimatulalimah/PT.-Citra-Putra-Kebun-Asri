<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDecanter02 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_decanter02';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


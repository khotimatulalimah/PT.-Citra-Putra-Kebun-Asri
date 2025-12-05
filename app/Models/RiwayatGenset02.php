<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatGenset02 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_genset02';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


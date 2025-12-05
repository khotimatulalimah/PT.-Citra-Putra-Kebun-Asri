<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSeparator02 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_separator02';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


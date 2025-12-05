<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSeparator03 extends Model
{
    use HasFactory;

    protected $table = 'riwayat_separator03';

    protected $fillable = ['tanggal', 'hm', 'next_service'];
}


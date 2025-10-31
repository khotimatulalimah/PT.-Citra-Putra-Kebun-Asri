<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatHMController extends Controller
{
    public function index()
    {
        $riwayat = [
            ['tanggal' => 'Senin 27 Oktober 2025', 'hm' => 1500],
            ['tanggal' => 'Senin 20 Oktober 2025', 'hm' => 1500]
        ];

        return view('RiwayatHM', compact('riwayat'));
    }
}

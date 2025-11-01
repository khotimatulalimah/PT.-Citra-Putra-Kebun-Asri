<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatHMController extends Controller
{
    public function index()
    {
        $riwayat = session('riwayat', []);
        return view('RiwayatHM', compact('riwayat'));
    }
}

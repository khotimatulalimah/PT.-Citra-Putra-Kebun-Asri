<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDecanter01;

class Decanter01Controller extends Controller
{
    // Menampilkan form input
    public function index()
{
    $lastRecord = \App\Models\RiwayatDecanter01::orderBy('created_at', 'desc')->first();

    $data = [
        'paten_hm' => 4000, // ⬅️ Tambahkan baris ini
        'tanggal' => '',
        'hm_hari_ini' => '',
        'last_service' => $lastRecord ? $lastRecord->next_service : 4000,
        'next_service' => ''
    ];

    return view('Decanter01', compact('data'));
}


public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm_hari_ini' => 'required|numeric',
    ]);

    $lastRecord = \App\Models\RiwayatDecanter01::orderBy('created_at', 'desc')->first();
    $lastService = $lastRecord ? $lastRecord->next_service : 4000;

    $nextService = $lastService - $request->hm_hari_ini;

    RiwayatDecanter01::create([
        'tanggal' => $request->tanggal,
        'hm_hari_ini' => $request->hm_hari_ini,
        'last_service' => $lastService,
        'next_service' => $nextService
    ]);

    return redirect('/riwayatHMdecanter01');
}

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = RiwayatDecanter01::orderBy('tanggal', 'desc')->get();
        return view('riwayatHMdecanter01', compact('riwayat'));
    }
}

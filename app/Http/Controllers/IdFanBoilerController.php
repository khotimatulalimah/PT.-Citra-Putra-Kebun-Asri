<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdFanBoilerController extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'IdFanBoiler',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('IdFanBoiler', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_idfanboiler', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMidfanboiler');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_idfanboiler', []);
        return view('riwayatHMidfanboiler', compact('riwayat'));
    }
}


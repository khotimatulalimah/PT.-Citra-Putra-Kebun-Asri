<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RippleMill03Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'RippleMill 03',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('RippleMill03', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_ripplemill03', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMripplemill03');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_ripplemill03', []);
        return view('riwayatHMripplemill03', compact('riwayat'));
    }
}


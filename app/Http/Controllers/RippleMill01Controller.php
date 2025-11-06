<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RippleMill01Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'RippleMill 01',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('RippleMill01', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_ripplemill01', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMripplemill01');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_ripplemill01', []);
        return view('riwayatHMripplemill01', compact('riwayat'));
    }
}


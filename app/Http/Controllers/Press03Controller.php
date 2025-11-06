<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Press03Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 03',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press03', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_press03', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMpress03');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_press03', []);
        return view('riwayatHMpress03', compact('riwayat'));
    }
}


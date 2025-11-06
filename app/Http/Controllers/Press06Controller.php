<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Press06Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 06',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press06', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_press06', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMpress06');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_press06', []);
        return view('riwayatHMpress06', compact('riwayat'));
    }
}


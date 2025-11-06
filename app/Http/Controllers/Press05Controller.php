<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Press05Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 05',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press05', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_press05', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMpress05');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_press05', []);
        return view('riwayatHMpress05', compact('riwayat'));
    }
}


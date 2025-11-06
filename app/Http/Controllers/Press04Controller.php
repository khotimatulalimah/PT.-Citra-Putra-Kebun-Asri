<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Press04Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 04',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press04', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_press04', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMpress04');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_press04', []);
        return view('riwayatHMpress04', compact('riwayat'));
    }
}


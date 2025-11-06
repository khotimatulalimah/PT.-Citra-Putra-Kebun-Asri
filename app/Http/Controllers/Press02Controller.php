<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Press02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_press02', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMpress02');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_press02', []);
        return view('riwayatHMpress02', compact('riwayat'));
    }
}


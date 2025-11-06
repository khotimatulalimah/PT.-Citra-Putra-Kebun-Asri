<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Decanter02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Decanter 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Decanter02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_decanter02', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMdecanter02');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_decanter02', []);
        return view('riwayatHMdecanter02', compact('riwayat'));
    }
}


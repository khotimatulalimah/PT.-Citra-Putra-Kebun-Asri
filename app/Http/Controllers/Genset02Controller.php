<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Genset02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Genset 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Genset02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_genset02', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMgenset02');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_genset02', []);
        return view('riwayatHMgenset02', compact('riwayat'));
    }
}


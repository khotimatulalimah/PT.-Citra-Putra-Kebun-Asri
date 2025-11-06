<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Turbine02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Turbine 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Turbine02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_turbine02', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMturbine02');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_turbine02', []);
        return view('riwayatHMturbine02', compact('riwayat'));
    }
}


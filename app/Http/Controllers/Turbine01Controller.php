<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Turbine01Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Turbine 01',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Turbine01', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_turbine01', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMturbine01');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_turbine01', []);
        return view('riwayatHMturbine01', compact('riwayat'));
    }
}


<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hydrocyclone01Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Hydrocyclone 01',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Hydrocyclone01', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_hydrocyclone01', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMhydrocyclone01');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_hydrocyclone01', []);
        return view('riwayatHMhydrocyclone01', compact('riwayat'));
    }
}


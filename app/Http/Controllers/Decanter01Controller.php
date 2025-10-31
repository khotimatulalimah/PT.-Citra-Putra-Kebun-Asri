<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Decanter01Controller extends Controller
{
    public function index()
    {
        // Simulasi data HM Decanter 01
        $data = [
            'nama_unit' => 'Decanter 01',
            'tanggal' => '2025-10-27',
            'hm' => 1500,
            'next_service' => 1500
        ];

        return view('Decanter01', compact('data'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        // Simulasi penyimpanan data (bisa ke database nanti)
        $data = [
            'nama_unit' => 'Decanter 01',
            'tanggal' => $request->tanggal,
            'hm' => $request->hm,
            'next_service' => $request->next_service
        ];

        // Redirect kembali ke halaman dengan data baru
        return view('Decanter01', compact('data'))->with('success', 'Data berhasil disimpan!');
    }
}

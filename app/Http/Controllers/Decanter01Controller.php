<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Decanter01Controller extends Controller
{
    public function index()
{
    // Data kosong untuk form input manual
    $data = [
        'nama_unit' => 'Decanter 01',
        'tanggal' => '',
        'hm' => '',
        'next_service' => ''
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
       session()->push('riwayat', [
    'tanggal' => $request->tanggal,
    'hm' => $request->hm
]);

return redirect('/RiwayatHM');

    }
}

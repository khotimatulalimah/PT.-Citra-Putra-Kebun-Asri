<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HMController extends Controller
{
     public function storeDecanter01(Request $request)
{
    // Validasi data
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|string',
    ]);

    // Simpan ke database (contoh model: Decanter01)
    Decanter01::create($validated);

    // Redirect ke halaman riwayat
    return redirect('/riwayatHMdecanter01')->with('success', 'Data berhasil disimpan');
}

}

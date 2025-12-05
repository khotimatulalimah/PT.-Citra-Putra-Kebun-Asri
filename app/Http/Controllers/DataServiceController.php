<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    // Menampilkan form input service
    public function index()
    {
        $data = [
            'nama_unit' => '', 
            'tanggal' => '',
            'hm' => '',
            'next_service' => '',
            'nama_petugas' => '',
            'lama_penggantian' => '',
            'alat_kerja' => ''
        ];

        return view('tambahservice', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'nama_unit' => 'required|string',
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric',
            'nama_petugas' => 'required|string',
            'lama_penggantian' => 'required|string',
            'alat_kerja' => 'required|string'
        ]);

        session()->push('data_service', [
    'nama_unit' => $request->nama_unit,
    'tanggal' => $request->tanggal,
    'hm' => $request->hm,
    'next_service' => $request->next_service,
    'nama_petugas' => $request->nama_petugas,
    'lama_penggantian' => $request->lama_penggantian,
    'alat_kerja' => $request->alat_kerja
]);

        return redirect('/dataservice');
    }

    // Menampilkan riwayat service
    public function riwayat()
{
    $riwayat = session('data_service', []);

    $riwayat = collect($riwayat)->map(function ($item) {
        // jika sebelumnya kamu pakai unit_mesin, jadikan fallback
        $item['nama_unit'] = $item['nama_unit'] ?? ($item['unit_mesin'] ?? '');
        return $item;
    })->toArray();

    session(['data_service' => $riwayat]); // simpan balik agar konsisten
    return view('dataservice', compact('riwayat'));
}

}

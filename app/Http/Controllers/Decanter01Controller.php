<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDecanter01;

class Decanter01Controller extends Controller
{
    // Menampilkan form input baru
    public function index()
    {
        $lastRecord = RiwayatDecanter01::orderBy('created_at', 'desc')->first();

        $data = [
            'paten_hm' => 4000,
            'tanggal' => '',
            'hm_hari_ini' => '',
            'last_service' => $lastRecord ? $lastRecord->last_service : 0,
            'jam_operasional' => '',
            'sisa_waktu_service' => '',
            'next_service' => ''
        ];

        return view('Decanter01', compact('data'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm_hari_ini' => 'required|numeric|min:0',
            'last_service' => 'required|numeric|min:0',
            'jam_operasional' => 'required|numeric|min:0'
        ]);

        $patenHM = 4000;
        $hmHariIni = (int) $request->hm_hari_ini;
        $lastService = (int) $request->last_service;
        $jamOperasional = (int) $request->jam_operasional;

        $sisaWaktuService = max(0, $patenHM - $jamOperasional);
        $nextService = $hmHariIni + $sisaWaktuService;

        RiwayatDecanter01::create([
            'tanggal' => $request->tanggal,
            'paten_hm' => $patenHM,
            'hm_hari_ini' => $hmHariIni,
            'last_service' => $lastService,
            'jam_operasional' => $jamOperasional,
            'sisa_waktu_service' => $sisaWaktuService,
            'next_service' => $nextService
        ]);

        return redirect('/riwayatHMdecanter01')->with('success', 'Data berhasil disimpan');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = RiwayatDecanter01::orderBy('tanggal', 'desc')->get();
        return view('riwayatHMdecanter01', compact('riwayat'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = RiwayatDecanter01::findOrFail($id);
        return view('editDecanter01', compact('data'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm_hari_ini' => 'required|numeric|min:0',
            'last_service' => 'required|numeric|min:0',
            'jam_operasional' => 'required|numeric|min:0'
        ]);

        $patenHM = 4000;
        $hmHariIni = (int) $request->hm_hari_ini;
        $lastService = (int) $request->last_service;
        $jamOperasional = (int) $request->jam_operasional;

        $sisaWaktuService = max(0, $patenHM - $jamOperasional);
        $nextService = $hmHariIni + $sisaWaktuService;

        $record = RiwayatDecanter01::findOrFail($id);
        $record->update([
            'tanggal' => $request->tanggal,
            'paten_hm' => $patenHM,
            'hm_hari_ini' => $hmHariIni,
            'last_service' => $lastService,
            'jam_operasional' => $jamOperasional,
            'sisa_waktu_service' => $sisaWaktuService,
            'next_service' => $nextService
        ]);

        return redirect('/riwayatHMdecanter01')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data
    public function destroy($id)
    {
        $record = RiwayatDecanter01::findOrFail($id);
        $record->delete();

        return redirect('/riwayatHMdecanter01')->with('success', 'Data berhasil dihapus');
    }
}

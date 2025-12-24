<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatServiceDecanter01;
use Carbon\Carbon;

class ServiceDecanter01Controller extends Controller
{
    // Menampilkan form input service baru
    public function index()
    {
        $lastRecord = RiwayatServiceDecanter01::orderBy('created_at', 'desc')->first();

        $data = [
            'tanggal' => '',
            'hm_hari_ini' => '',
            'last_service' => $lastRecord ? $lastRecord->last_service : 0,
            'next_service' => '',
            'nama_petugas' => '',
            'alat_kerja' => '',
            'waktu_mulai' => '',
            'waktu_selesai' => '',
            'lama_penggantian' => ''
        ];

        return view('ServiceDecanter01', compact('data'));
    }

    // Simpan data service baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm_hari_ini' => 'required|numeric|min:0',
            'last_service' => 'required|numeric|min:0',
            'next_service' => 'required|numeric|min:0',
            'nama_petugas' => 'required|string',
            'alat_kerja' => 'required|string',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Hitung lama penggantian (selisih jam/menit)
        $mulai = Carbon::createFromFormat('H:i', $request->waktu_mulai);
        $selesai = Carbon::createFromFormat('H:i', $request->waktu_selesai);
        $lamaPenggantian = $mulai->diffInMinutes($selesai);

        RiwayatServiceDecanter01::create([
            'tanggal' => $request->tanggal,
            'hm_hari_ini' => $request->hm_hari_ini,
            'last_service' => $request->last_service,
            'next_service' => $request->next_service,
            'nama_petugas' => $request->nama_petugas,
            'alat_kerja' => $request->alat_kerja,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lama_penggantian' => $lamaPenggantian
        ]);

        return redirect()->route('servicedecanter01.riwayat')->with('success', 'Data berhasil disimpan');
    }

    // Menampilkan riwayat service
    public function riwayat()
    {
        $riwayat = RiwayatServiceDecanter01::orderBy('tanggal', 'desc')->get();
        return view('riwayatSERVICEdecanter01', compact('riwayat'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = RiwayatServiceDecanter01::findOrFail($id);
        return view('editServiceDecanter01', compact('data'));
    }

    // Update data service
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm_hari_ini' => 'required|numeric|min:0',
            'last_service' => 'required|numeric|min:0',
            'next_service' => 'required|numeric|min:0',
            'nama_petugas' => 'required|string',
            'alat_kerja' => 'required|string',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        $mulai = Carbon::createFromFormat('H:i', $request->waktu_mulai);
        $selesai = Carbon::createFromFormat('H:i', $request->waktu_selesai);
        $lamaPenggantian = $mulai->diffInMinutes($selesai);

        $record = RiwayatServiceDecanter01::findOrFail($id);
        $record->update([
            'tanggal' => $request->tanggal,
            'hm_hari_ini' => $request->hm_hari_ini,
            'last_service' => $request->last_service,
            'next_service' => $request->next_service,
            'nama_petugas' => $request->nama_petugas,
            'alat_kerja' => $request->alat_kerja,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lama_penggantian' => $lamaPenggantian
        ]);

        return redirect()->route('servicedecanter01.riwayat')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus data service
    public function destroy($id)
    {
        $service = RiwayatServiceDecanter01::findOrFail($id);
        $service->delete();

        return redirect()->route('servicedecanter01.riwayat')->with('success', 'Data berhasil dihapus');
    }
}

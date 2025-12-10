<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatServiceDecanter01;
use Carbon\Carbon;

class ServiceDecanter01Controller extends Controller
{
    // Menampilkan form input service
    public function index()
    {
        $lastRecord = RiwayatServiceDecanter01::orderBy('created_at', 'desc')->first();

        $data = [
            'tanggal' => '',
            'hm_hari_ini' => '',
            'last_service' => $lastRecord ? $lastRecord->next_service : 4000,
            'next_service' => '',
            'nama_barang' => '',
            'jumlah_barang' => '',
            'harga' => '',
            'nama_petugas' => '',
            'alat_kerja' => '',
            'waktu_mulai' => '',
            'waktu_selesai' => '',
            'lama_penggantian' => ''
        ];

        return view('ServiceDecanter01', compact('data'));
    }

    // Simpan data service
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm_hari_ini' => 'required|numeric',
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|numeric',
            'harga' => 'required|numeric',
            'nama_petugas' => 'required|string',
            'alat_kerja' => 'required|string',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        $lastRecord = RiwayatServiceDecanter01::orderBy('created_at', 'desc')->first();
        $lastService = $lastRecord ? $lastRecord->next_service : 4000;

        $nextService = $lastService - $request->hm_hari_ini;

        // Hitung lama penggantian (selisih jam/menit)
        $mulai = Carbon::createFromFormat('H:i', $request->waktu_mulai);
        $selesai = Carbon::createFromFormat('H:i', $request->waktu_selesai);
        $lamaPenggantian = $mulai->diffInMinutes($selesai); // hasil dalam menit

        RiwayatServiceDecanter01::create([
            'tanggal' => $request->tanggal,
            'hm_hari_ini' => $request->hm_hari_ini,
            'last_service' => $lastService,
            'next_service' => $nextService,
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga' => $request->harga,
            'nama_petugas' => $request->nama_petugas,
            'alat_kerja' => $request->alat_kerja,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'lama_penggantian' => $lamaPenggantian
        ]);

        return redirect('/riwayatSERVICEdecanter01');
    }


   public function destroy($id)
{
    $service = RiwayatServiceDecanter01::findOrFail($id);
    $service->delete();

    return redirect()->back()->with('success', 'Data berhasil dihapus');
}

    // Menampilkan riwayat service
    public function riwayat()
    {
        $riwayat = RiwayatServiceDecanter01::orderBy('tanggal', 'desc')->get();
        return view('riwayatSERVICEdecanter01', compact('riwayat'));
    }
}

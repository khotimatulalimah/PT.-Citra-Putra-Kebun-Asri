<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatMesin;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatMesinController extends Controller
{
    private array $unitMesin = [
        'DEC01' => 'DECANTER 01',
        'DEC02' => 'DECANTER 02',
        'SEP01' => 'SEPARATOR 01',
        'SEP02' => 'SEPARATOR 02',
        'SEP03' => 'SEPARATOR 03',
        'GEN02' => 'GENSET 02',
        'TUR01' => 'TURBINE 01',
        'TUR02' => 'TURBINE 02',
        'PK2001' => 'PRESS KAP 20 (01)',
        'PRS02' => 'PRESS 02',
        'PRS03' => 'PRESS 03',
        'PRS04' => 'PRESS 04',
        'PRS05' => 'PRESS 05',
        'PRS06' => 'PRESS 06',
        'HYD01' => 'HYDROCYCLONE 01',
        'RPM01' => 'RIPPLE MILL 01',
        'RPM03' => 'RIPPLE MILL 03',
        'EBP01' => 'EMPTY BUNCH PRESS',
        'IDF01' => 'ID FAN BOILER',
    ];

    // Daftar Unit Mesin
    public function daftarUnit()
    {
        return view('riwayat.daftar_unit', [
            'unitMesin' => $this->unitMesin
        ]);
    }

    // Riwayat per Unit Mesin
    public function index($unit_mesin)
    {
        abort_unless(isset($this->unitMesin[$unit_mesin]), 404);

        $riwayat = RiwayatMesin::where('unit_mesin', $unit_mesin)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('riwayat.index', [
            'unit_mesin' => $unit_mesin,
            'nama_unit' => $this->unitMesin[$unit_mesin],
            'riwayat' => $riwayat
        ]);
    }

    // Simpan Data
    public function store(Request $request, $unit_mesin)
    {
        abort_unless(isset($this->unitMesin[$unit_mesin]), 404);

        $data = $request->validate([
            'tanggal' => 'required|date',
            'hm_last_service' => 'required|numeric',
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
        ]);

        RiwayatMesin::create([
            'unit_mesin' => $unit_mesin,
            'tanggal' => $data['tanggal'],
            'hm_last_service' => $data['hm_last_service'],
            'nama_barang' => $data['nama_barang'],
            'jumlah_barang' => $data['jumlah_barang'],
            'harga_satuan' => $data['harga_satuan'],
            'harga_total' => $data['jumlah_barang'] * $data['harga_satuan'],
        ]);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    // Hapus
    public function destroy($id)
    {
        RiwayatMesin::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    // Export PDF
    public function pdf($unit_mesin)
    {
        abort_unless(isset($this->unitMesin[$unit_mesin]), 404);

        $riwayat = RiwayatMesin::where('unit_mesin', $unit_mesin)->get();

    }
}

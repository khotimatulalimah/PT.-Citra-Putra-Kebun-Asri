<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatTurbine02;

class Turbine02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Turbine 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Turbine02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatTurbine02::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMturbine02');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatTurbine02::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMturbine02', compact('riwayat'));
}

}


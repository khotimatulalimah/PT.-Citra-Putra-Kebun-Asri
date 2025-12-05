<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatTurbine01;

class Turbine01Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Turbine 01',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Turbine01', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatTurbine01::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMturbine01');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatTurbine01::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMturbine01', compact('riwayat'));
}

}


<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatGenset02;

class Genset02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Genset 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Genset02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatGenset02::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMgenset02');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatGenset02::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMgenset02', compact('riwayat'));
}

}


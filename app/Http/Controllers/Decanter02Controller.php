<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDecanter02;

class Decanter02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Decanter 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Decanter02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatDecanter02::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMdecanter02');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatDecanter02::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMdecanter02', compact('riwayat'));
}

}


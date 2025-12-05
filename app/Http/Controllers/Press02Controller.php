<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPress02;

class Press02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatPress02::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMpress02');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatPress02::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMpress02', compact('riwayat'));
}

}


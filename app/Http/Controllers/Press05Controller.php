<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPress05;

class Press05Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 05',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press05', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatPress05::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMpress05');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatPress05::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMpress05', compact('riwayat'));
}

}


<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPress06;

class Press06Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 06',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press06', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatPress06::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMpress06');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatPress06::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMpress06', compact('riwayat'));
}

}


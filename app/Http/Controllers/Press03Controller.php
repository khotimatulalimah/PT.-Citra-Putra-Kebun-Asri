<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPress03;

class Press03Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 03',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press03', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatPress03::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMpress03');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatPress03::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMpress03', compact('riwayat'));
}

}


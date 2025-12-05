<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPress04;

class Press04Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Press 04',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Press04', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatPress04::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMpress04');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatPress04::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMpress04', compact('riwayat'));
}

}


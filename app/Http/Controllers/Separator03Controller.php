<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatSeparator03;

class Separator03Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Separator 03',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Separator03', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatSeparator03::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMseparator03');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatSeparator03::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMseparator03', compact('riwayat'));
}

}


<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatSeparator01;

class Separator01Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Separator 01',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Separator01', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatSeparator01::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMseparator01');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatSeparator01::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMseparator01', compact('riwayat'));
}

}


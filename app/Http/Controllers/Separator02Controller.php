<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatSeparator02;

class Separator02Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'Separator 02',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('Separator02', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatSeparator02::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMseparator02');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatSeparator02::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMseparator02', compact('riwayat'));
}

}


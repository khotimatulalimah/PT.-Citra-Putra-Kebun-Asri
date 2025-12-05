<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPressKap20_01;

class PressKap20_01Controller extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'PressKap20_01',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('PressKap20_01', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'hm' => 'required|numeric',
        'next_service' => 'required|numeric'
    ]);

    RiwayatPressKap20_01::create([
        'tanggal' => $request->tanggal,
        'hm' => $request->hm,
        'next_service' => $request->next_service
    ]);

    return redirect('/riwayatHMpresskap20_01');
}


    // Menampilkan riwayat
    public function riwayat()
{
    $riwayat = RiwayatPressKap20_01::orderBy('tanggal', 'desc')->get();
    return view('riwayatHMpresskap20_01', compact('riwayat'));
}

}


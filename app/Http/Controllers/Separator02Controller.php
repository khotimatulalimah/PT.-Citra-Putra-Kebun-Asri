<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        session()->push('riwayat_separator02', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMseparator02');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_separator02', []);
        return view('riwayatHMseparator02', compact('riwayat'));
    }
}


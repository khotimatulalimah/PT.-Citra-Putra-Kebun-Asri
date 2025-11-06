<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmptyBunchPressController extends Controller
{
    // Menampilkan form input
    public function index()
    {
        $data = [
            'nama_unit' => 'EmptyBunchPress',
            'tanggal' => '',
            'hm' => '',
            'next_service' => ''
        ];

        return view('EmptyBunchPress', compact('data'));
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hm' => 'required|numeric',
            'next_service' => 'required|numeric'
        ]);

        session()->push('riwayat_emptybunchpress', [
            'tanggal' => $request->tanggal,
            'hm' => $request->hm
        ]);

        return redirect('/riwayatHMemptybunchpress');
    }

    // Menampilkan riwayat
    public function riwayat()
    {
        $riwayat = session('riwayat_emptybunchpress', []);
        return view('riwayatHMemptybunchpress', compact('riwayat'));
    }
}


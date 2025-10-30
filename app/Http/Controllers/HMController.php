<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HMController extends Controller
{
     public function index()
    {
        // Simulasi daftar unit
        $units = [
            "Decanter 01",
            "Decanter 02"
        ];

        // Tambahkan unit kosong dari 3 sampai 20
        for ($i = 3; $i <= 20; $i++) {
            $units[] = ""; // Kosongkan label
        }

        return view('hm.index', compact('units'));
    }
}

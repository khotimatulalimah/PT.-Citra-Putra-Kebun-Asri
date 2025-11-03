<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Halaman login
    public function login()
    {
        return view('login');
    }

    // Proses login
    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // Dashboard + kirim data status
    public function dashboard()
    {
        $status = [
            'critical' => 3,
            'warning' => 1,
            'normal' => 2
        ];

        return view('dashboard', compact('status'));
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $validatedData = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            $req->session()->regenerate();

            if (Auth::user()->role == 'sekretaris') {
                return redirect()->route('sekretaris.data-infaq');
            } else {
                return redirect()->route('admin.overview');
            }
        } else {
            return redirect()->route('login')->with('error', 'username atau password salah')->withInput();
        }
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout berhasil');
    }
}

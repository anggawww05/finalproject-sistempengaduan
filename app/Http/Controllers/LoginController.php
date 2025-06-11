<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email tidak boleh kosong.',
                'email.email' => 'Email tidak valid.',
                'password.required' => 'Password tidak boleh kosong.',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/beranda');
            }
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error', 'Data yang dimasukkan tidak sesuai/tidak terdaftar.');
    }
}

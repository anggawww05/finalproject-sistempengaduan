<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login', [
            'title' => 'Halaman Login'
        ]);
    }

    public function store(LoginStoreRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            if (auth()->user()->student_id) {
                return redirect(route('main.index'));
            }
            return redirect(route('dashboard.index'));
        }
        return redirect(route('login.index'))->with('failed', 'Email atau Password tidak ditemukan!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index')->with('success', 'Berhasil logout akun!');
    }
}

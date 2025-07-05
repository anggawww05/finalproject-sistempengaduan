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
        try {
            if (Auth::attempt($request->validated())) {
                $request->session()->regenerate();
                if (auth()->user()->student_id) {
                    return redirect(route('main.index'));
                }
                return redirect(route('dashboard.index'));
            }
            return redirect(route('login.index'))->with('failed', 'Email atau Password tidak ditemukan!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('login.index'))->with('failed', 'Gagal melakukan login!');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login.index')->with('success', 'Berhasil melakukan logout!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect()->route('login.index')->with('success', 'Gagal melakukan logout!');
        }
    }
}

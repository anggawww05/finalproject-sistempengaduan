<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // // Validate the request data
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // // Attempt to log the user in
        // if (auth()->attempt($request->only('email', 'password'))) {
        //     // Redirect to the intended page or home
        //     return redirect()->intended('/home');
        // }

        // // If login fails, redirect back with an error message
        // return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}

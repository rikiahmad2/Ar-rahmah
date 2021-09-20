<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(auth()->attempt($credentials)) {
            return redirect('/');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function doLogout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}

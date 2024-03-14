<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)/* untuk mendapatkan datanya kita perlu request */
    {
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) { /* mengirimkan credential ke auth(jetstream) */
            return redirect('posts');
        }else{
            return redirect('login')->with('error_message','salaah');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

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

    public function register_form()
    {
        return view('auth.register');

    }

    public function register (Request $request)
    {
        $request->validate([ /* validate() bawaan laravel untuk validasi form, */
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6|confirmed', /* name di html, password === pasword_confirmation */
        ]);
        
        User::create([ /* jangan lupa import use */
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->input('password')), /* bungkus ke Hash::make untuk generate pasworr hash */
                        /* jangan lupa import use */
        ]);

        return redirect('login');

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }else{
            return redirect('/')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
       $request->session()->invalidate();
 
       $request->session()->regenerateToken();
 
       return redirect('/');
    }
}

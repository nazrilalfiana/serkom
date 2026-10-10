<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function tampilanlogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $creditials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($creditials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        return back()->withErors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda Telah Berhasil Keluar');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class AuthController extends Controller
{
    function showRegister()
    {
        return view('auth.registrasi');
    }

    function submitRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->namaLengkap;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // dd($user);
        return redirect()->route('login');
    }

    function showLogin()
    {
        return view('auth.login');
    }

    function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('galat', 'Email atau Password Anda Salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

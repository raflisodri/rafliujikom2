<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('home.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('dashboard');
        } else {
            return redirect('login')->with('error', 'kenapa tidak muncul');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

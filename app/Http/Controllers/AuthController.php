<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate user login...
        $username = $request->input('username');
        
        // Store in session
        session(['username' => $username]);

        // Store in cookie for 60 minutes
        Cookie::queue('username', $username, 60);

        return redirect('/dashboard');
    }

    public function dashboard()
    {
        $username = session('username');
        return view('dashboard', compact('username'));
    }

    public function logout()
    {
        session()->flush();
        Cookie::queue(Cookie::forget('username'));
        return redirect('/login');
    }
}

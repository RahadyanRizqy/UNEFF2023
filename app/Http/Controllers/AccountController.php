<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin-login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
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

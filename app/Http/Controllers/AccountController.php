<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return to_route('dashboard.index');
        }
        else {
            if (!(Account::where('username', $credentials['username'])->exists())) {
                return redirect()->back()->withErrors(['username' => 'Username tidak ditemukan']);
            }
            else {
                $user = Account::where('username', $credentials['username'])->first();
                if (!($user && Hash::check($credentials['password'], $user->password))) {
                    return redirect()->back()->withErrors(['password' => 'Password tidak sesuai']);
                }
            }
        }
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
} 

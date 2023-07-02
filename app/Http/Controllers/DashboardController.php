<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.layout', ['child' => 'main']);
    }

    public function child($child)
    {
        return view('dashboard.layout', ['child' => $child]);
    }
}

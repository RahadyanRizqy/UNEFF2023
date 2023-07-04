<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('template.layout', ['child' => 'main']);
        // return view('dashboard.layout', ['child' => 'main']);
    }

    public function child($child)
    {
        if ($child == 'posts') {
            $str = new Str;
            $carbon = new Carbon;
            return view('template.layout', [
                'child' => $child, 
                'posts' => Post::with('author')->get(), 
                'str' => $str,
                'carbon' => $carbon,
            ]);
        }
        return view('template.layout', ['child' => $child]);
    }
}

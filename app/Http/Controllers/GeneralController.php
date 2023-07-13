<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Rule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function news()
    {
        // Latest 4
        $latest = Post::orderBy('posted_at', 'desc')->take(4)->get();
        // $carbon = new Carbon;
        $carbon = new Carbon;
        return view('general.layout', ['child' => 'news', 'post' => Post::orderBy('posted_at', 'desc')->get(), 'latest' => $latest, 'carbon' => $carbon]);
    }

    public function profile_detail()
    {
        return view('general.layout', ['child' => 'event']);
    }

    public function submit_work()
    {
        $rules = new Rule('json/rules.json');
        return view('general.layout', ['child' => 'submit_work', 'rules' => $rules]);
    }

    public function news_specific(Post $post)
    {
        $carbon = new Carbon;
        $latest = Post::orderBy('posted_at', 'desc')->take(4)->get();
        return view('general.layout', ['child' => 'news_specific', 'news_post' => $post, 'carbon' => $carbon, 'latest' => $latest]);
    }

    public function jury()
    {
        return view('general.layout', ['child' => 'juries']);
    }
}

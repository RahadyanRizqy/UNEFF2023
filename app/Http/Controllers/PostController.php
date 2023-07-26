<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\throwException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.layout', ['child' => 'posts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layout', ['child' => 'forms/add-post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required',
            ]);
            
            $input = $request->all();

            $input['slug'] = 'Customized' . $input['title'];
            $input['author_id'] = Auth::id();
            $input['posted_at'] = Carbon::now()->format('Y-m-d H:i:s');
    
            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = "IMG" . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }

            Post::create($input);
            return to_route('posts.index');
        }
        catch (Exception $e)
        {
            throwException($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.layout', ['child' => 'forms/show-post', 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.layout', ['child' => 'forms/edit-post', 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required',
            ]);
            
            $input = $request->all();
            $input['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');
    
            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = "IMG" . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            } else if ($link = $request->input('image')) {
                $input['image'] = $link;
            } else {
                unset($input['image']);
            }
            $post->update($input);
            return to_route('posts.index');
        }
        catch (Exception $e) {
            throwException($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // if ($deleted) {
        //     if (File::exists(public_path($filepath))) {
        //         File::delete(public_path($filepath));
        //         // $post->delete();
        //         sleep(1.5);
        //         return redirect()->route('posts.index');
        //     } else {
        //         dd("File doesn't exist");
        //     }
        // }
        // $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];

        // $explodeImage = explode('.', 'p');
        // $extension = end($explodeImage);

        // if(in_array($extension, $imageExtensions))
        // {
        //     echo "Image";
        // }else
        // {
        //     $post->delete();
        // }

        // return redirect()->route('posts.index');
        $post->update([
            'show' => false
        ]);
    }
}

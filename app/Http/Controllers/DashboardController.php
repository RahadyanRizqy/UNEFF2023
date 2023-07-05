<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        if ($child == 'rules') {
            $jsonData = file_get_contents('json/programs.json');
            $rules = json_decode($jsonData, true);
            return view('template.layout', [
                'child' => $child,
                'rules' => $rules['ProgramDetail'],
            ]);
        }
        return view('template.layout', ['child' => $child]);
    }

    // Rules
    public function updateJson(Request $request)
    {
        $newData = $request->input('ProgramDetail');

        // Read the JSON file
        $jsonFile = public_path('json/programs.json');
        $jsonData = File::get($jsonFile);
        $jsonArray = json_decode($jsonData, true);
    
        // Update the fields in the JSON data
        foreach ($newData as $key => $value) {
            $jsonArray['ProgramDetail'][$key] = $value;
        }
    
        // Convert the updated JSON data back to a string
        $updatedJsonData = json_encode($jsonArray, JSON_PRETTY_PRINT);
    
        // Write the updated JSON data back to the file
        File::put($jsonFile, $updatedJsonData);
    }
    
    

    public function getJson()
    {
        $jsonFile = File::get('json/programs.json');
        $jsonData = json_decode($jsonFile, true);
        return response()->json($jsonData);
    }
}

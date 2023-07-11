<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Rule;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    // public $rules = new Rule('json/rules.json');
    private $rules;
    private $profile; 
    public function __construct()
    {
        $this->rules = new Rule('json/rules.json');
        $this->profile = new Profile('json/profile.json');
    }

    public function index()
    {
        return view('dashboard.layout', ['child' => 'main']);
        // return view('dashboard.layout', ['child' => 'main']);
    }

    public function child($child)
    {
        if ($child == 'posts') {
            $str = new Str;
            $carbon = new Carbon;
            return view('dashboard.layout', [
                'child' => $child, 
                'posts' => Post::with('author')->get(), 
                'str' => $str,
                'carbon' => $carbon,
            ]);
        }

        if ($child == 'rules') {
            $rules = new Rule('json/rules.json');
            return view('dashboard.layout', [
                'child' => $child,
                'rules' => $rules,
            ]);
        }

        if ($child == 'profile') {
            $profile = $this->profile;
            return view('dashboard.layout', [
                'child' => $child,
                'profile' => $profile,
            ]);
        }
        return view('dashboard.layout', ['child' => $child]);
    }

    public function updateRules(Request $request)
    {
        $this->rules->update($request);
    }

    public function updateProfile(Request $request)
    {
        $this->profile->update($request);
    }

    public function getProfile()
    {
        return response()->json($this->profile);
    }

    public function getRules()
    {
        return response()->json($this->rules);
    }
    // Rules
    // public function updateRules(Request $request)
    // {
    //     $newData = $request->input('Rules');

    //     $jsonFile = public_path('json/rules.json');
    //     $jsonData = File::get($jsonFile);
    //     $jsonArray = json_decode($jsonData, true);
    
    //     foreach ($newData as $key => $value) {
    //         $jsonArray['Rules'][$key] = $value;
    //     }
    
    //     $updatedJsonData = json_encode($jsonArray, JSON_PRETTY_PRINT);

    //     File::put($jsonFile, $updatedJsonData);
    // }
    
    // public function getRules()
    // {
    //     $jsonFile = File::get('json/rules.json');
    //     $jsonData = json_decode($jsonFile, true);

    //     $rules = new Rule();
    //     $rules->ExternalFormLink = $jsonData['Rules']['ExternalFormLink'];
    //     $rules->Title = $jsonData['Rules']['Title'];

    //     $sections = [];
    //     foreach ($jsonData['Rules']['Section'] as $sectionData) {
    //         $section = new Section();
    //         $section->Title = $sectionData['Title'];
    //         $section->List = $sectionData['List'];
    //         $sections[] = $section;
    //     }
    //     $rules->Section = $sections;
    //     return $rules;
    // }
}

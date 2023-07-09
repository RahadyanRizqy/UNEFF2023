<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Profile {
    public $title;
    public $banner;
    public $detail;
    private $filename;
    private $mainkey;

    public function __construct($FileName) {
        $this->filename = $FileName;
        $this->mainkey = 'Profile';

        $jsonData = json_decode(file_get_contents(public_path($this->filename)), true);
        $this->title = $jsonData[$this->mainkey]['Title'];
        $this->banner = $jsonData[$this->mainkey]['Banner'];
        $this->detail = $jsonData[$this->mainkey]['Detail'];
        return $this;
    }

    public function update(Request $request)
    {
        $newData = $request->input($this->mainkey);
        $jsonData = json_decode(file_get_contents(public_path($this->filename)), true);
    
        foreach ($newData as $key => $value) {
            $jsonData[$this->mainkey][$key] = $value;
        }
        $updatedJsonData = json_encode($jsonData, JSON_PRETTY_PRINT);
        file_put_contents(public_path($this->filename), $updatedJsonData);
    }
}

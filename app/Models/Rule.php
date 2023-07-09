<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Section {
    public $title;
    public $list;
}

class Rule {
    public $externalFormLink;
    public $title;
    public $section;
    private $filename;
    private $mainkey;

    public function __construct($FileName)
    {
        $this->filename = $FileName;
        $this->mainkey = 'Rules';

        $jsonData = json_decode(file_get_contents(public_path($this->filename)), true);
        $this->externalFormLink = $jsonData[$this->mainkey]['ExternalFormLink'];
        $this->title = $jsonData[$this->mainkey]['Title'];

        $sections = [];
        foreach ($jsonData[$this->mainkey]['Section'] as $sectionData) {
            $section = new Section();
            $section->title = $sectionData['Title'];
            $section->list = $sectionData['List'];
            $sections[] = $section;
        }
        $this->section = $sections;
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
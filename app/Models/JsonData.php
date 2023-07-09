<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    use HasFactory;

    protected $table = 'json_data';

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;
}

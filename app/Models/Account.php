<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'accounts';

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function post() {
        return $this->hasMany(Post::class, 'author_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'size',
        'devices',
        'rating',
        'locker_url',
        'final_url',
        'locker_key',
        'locker_it',
        'locker_script_url',
    ];
    // app/Models/Game.php
public function screenshots()
{
    return $this->hasMany(Screenshot::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
}

}

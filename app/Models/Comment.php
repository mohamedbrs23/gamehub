<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['game_id', 'name', 'email', 'content'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}


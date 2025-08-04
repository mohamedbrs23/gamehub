<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    // app/Models/Game.php
public function game()
{
    return $this->belongsTo(Game::class);
}
}

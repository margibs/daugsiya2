<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_Experience extends Model
{
    //

    protected $table = "game_experiences";
    protected $fillable = ['post_id', 'user_id', 'type', 'rating'];
}

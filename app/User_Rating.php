<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Rating extends Model
{
    //

    protected $table = 'user_ratings';
    protected $fillable = ['post_id', 'user_id'];
}

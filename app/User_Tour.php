<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Tour extends Model
{
    //

    protected $table = 'user_tours';
    protected $fillable = ['user_id', 'completed','pagename'];
}

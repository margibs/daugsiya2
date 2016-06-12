<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autopost extends Model
{
    //

    public function post(){

    	return $this->belongsTo('App\Model\Post');
    }
}

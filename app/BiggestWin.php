<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiggestWin extends Model
{
    //


    protected $table ='biggest_wins';


    public function post(){
    	return $this->belongsTo('App\Model\Post');
    }
}

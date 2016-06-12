<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_Message extends Model
{
    //

    protected $table = 'room_messages';


    public function user(){
    	return $this->belongsTo('App\User')->with('user_detail');
    }
}

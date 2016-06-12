<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Notification extends Model
{
    //

    protected $table = 'user_notifications';


    public function user(){

    	return $this->belongsTo('App\User', 'user_id')->with('user_detail');
    }

    public function game(){

    	return $this->belongsTo('App\Model\Post', 'post_id');
    }

    public function comment(){
    	return $this->belongsTo('App\Model\Comment', 'post_id')->where('user_notification.type', '=', 3);
    }
}

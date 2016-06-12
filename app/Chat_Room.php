<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Chat_Room extends Model
{
    //

    protected $table = 'chat_rooms';

    public function room_messages(){

    	return $this->hasMany('App\Room_Message', 'chat_room_id')->with('user');
    }

    public function new_room_notification(){

    	return $this->hasMany('App\Global_Notification', 'parent_id');

    }

    public function new_moderator_notification(){
    	return $this->hasMany('App\Global_Notification', 'parent_id');
    }

}

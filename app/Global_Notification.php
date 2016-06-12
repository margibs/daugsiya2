<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Global_Notification extends Model
{
    //

    protected $table = 'global_notifications';


    public function game(){

    	return $this->belongsTo('App\Model\Post', 'parent_id');
    }
    public function room(){

    	return $this->belongsTo('App\Chat_Room', 'parent_id');
    }

    public function moderator(){

    	return $this->belongsTo('App\User', 'user_id')->with('user_detail');
    }

    public function custom_notification(){

    	return $this->hasOne('App\Custom_Notification', 'global_notification_id');
    }

    public function globalnotification_read(){

    	return $this->hasOne('App\Globalnotification_Read', 'global_notification_id');
    }
}

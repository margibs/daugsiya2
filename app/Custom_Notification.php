<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom_Notification extends Model
{
    //

    protected $table = 'custom_notifications';

    public function global_notification(){

    	return $this->belongsTo('App\Global_Notification');
    }

}

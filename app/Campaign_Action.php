<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign_Action extends Model
{
    //

    protected $table = 'campaign_actions';


    public function campaign(){
    	return $this->belongsTo('App\Campaign');
    }
}

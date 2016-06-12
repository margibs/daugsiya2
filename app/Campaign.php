<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //

    protected $fillable = ['utm_source', 'utm_campaign'];

    public function campaign_counters(){
    	return $this->hasMany('App\Campaign_Counter');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign_Counter extends Model
{
    //

    protected $table = 'campaign_counters';

    public function campaign(){
    	return $this->belongsTo('App\Campaign');
    }
}

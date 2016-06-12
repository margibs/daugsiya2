<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CasinoPreferenceList extends Model
{
    protected $table = 'casino_preference_lists';


    public function casino(){

    	return $this->belongsTo('App\Model\Casino');
    }
}

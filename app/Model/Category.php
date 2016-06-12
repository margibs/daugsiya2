<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';


    public function category_comments(){
        return $this->hasMany('App\Model\Comment', 'content_id')->where('parent', '=', 0)->where('type', 2);
    }
    
    public function total_comments(){
        return $this->hasMany('App\Model\Comment', 'content_id')->where('type', 2);
    }


    public function casino_preferences_list(){
        return $this->hasManyThrough('App\Model\CasinoPreferenceList', 'App\Model\CasinoPreference')->with('casino');
    }

    public function casino_preference(){
    	return $this->hasOne('App\Model\CasinoPreference');
    }
}

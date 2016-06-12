<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    protected $table = 'posts';

    public function post_comments(){
        return $this->hasMany('App\Model\Comment', 'content_id')->where('parent', '=', 0)->where('type', 3);
    }

    public function total_comments(){
    	return $this->hasMany('App\Model\Comment', 'content_id')->where('type', 3);
    }

    public function user_rating(){

    	return $this->hasOne('App\User_Rating');
    }

    public function categories_with_casino(){

        return $this->belongsToMany('App\Model\Category', 'post_categories')->whereExists(function($query){

             $query->select(DB::raw(1))
                      ->from('casino_categories')
                      ->whereRaw('casino_categories.category_id = categories.id');

        });

    }


    public function new_game_notification(){


    	return $this->hasMany('App\Global_Notification', 'parent_id');

    }
}

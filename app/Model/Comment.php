<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function user(){
    	return $this->belongsTo('App\User')->with('user_detail');
    }

    public function post_replies(){
    	return $this->hasMany('App\Model\Comment', 'parent')->where('type', 3)->with('user');
    }
    public function category_replies(){
    	return $this->hasMany('App\Model\Comment', 'parent')->where('type', 2)->with('user');
    }
    public function allgames_replies(){
    	return $this->hasMany('App\Model\Comment', 'parent')->where('type', 1)->with('user');
    }
}

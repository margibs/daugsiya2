<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth as Auth;
use DB;

class Friend extends Model
{
    //

    protected $fillable = ['friend_id', 'user_id'];

	public function friend(){
		return $this->belongsTo('App\User', 'friend_id')->with('user_detail');
	}

	public function user(){
		return $this->belongsTo('App\User', 'user_id')->with('user_detail');
	}


	static function myFriends(){

		$friends = [];
		if(Auth::check()){
			
			$user_id =Auth::user()->id;

			$friends = Friend::where('friends.user_id', $user_id)->join('user_details', function($join) use($user_id){

          		$join->on('friends.user_id', '=', 'user_details.user_id')->where('friends.friend_id','=', $user_id)
            	->orOn('friends.friend_id', '=', 'user_details.user_id')->where('friends.user_id','=', $user_id);

        		})->select(DB::raw('user_details.user_id as id'))->orWhere('friends.friend_id', $user_id)->get();
		}

		return array_pluck($friends, 'id');
	}

}

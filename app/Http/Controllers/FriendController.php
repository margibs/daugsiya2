<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Friend;
use App\User_Notification;
use Auth;
use DB;

class FriendController extends Controller
{
    

    public function addFriend(Request $request){

        $friend = Friend::firstOrCreate([ 'user_id'=> $request->user_id, 'friend_id' => $request->friend_id ]);

        echo json_encode($friend);
    }

    public function cancelFriendRequest(Request $request){
        $friend = Friend::findOrFail($request->id);

        echo json_encode($friend->forceDelete());
    }

        public function searchHashFriend(Request $request){

      if(Auth::check()){

        $user_id = Auth::user()->id;

        $wildcard = $request->wildcard;

        $friends = Friend::where('friends.user_id', $user_id)->join('user_details', function($join) use($user_id){

          $join->on('friends.user_id', '=', 'user_details.user_id')->where('friends.friend_id','=', $user_id)
            ->orOn('friends.friend_id', '=', 'user_details.user_id')->where('friends.user_id','=', $user_id);

        })->select(DB::raw('CONCAT(user_details.firstname," ", user_details.lastname) as fullname, user_details.user_id as id'))->whereRaw("CONCAT(user_details.firstname,' ', user_details.lastname) LIKE "."'%".$request->wildcard."%'")->orWhere('friends.friend_id', $user_id)->whereRaw("CONCAT(user_details.firstname,' ', user_details.lastname) LIKE "."'%".$request->wildcard."%'")->take(5)->get();

       /*return json_encode($lastQuery);*/

        return json_encode($friends);
      }

    }


    public function acceptFriendRequest(Request $request){

        $friend = Friend::find($request->id);

        $accepted = false;

        if($friend->confirmed != 1){
           $friend->confirmed = 1; 
           $friend->save();
           $accepted = true;

           $un = new User_Notification();
           $un->user_id = $friend->friend_id;
           $un->friend_id = $friend->user_id;
           $un->type = 1;

           $un->save();

        }
        

        echo json_encode( $accepted );
    }


    public function unFriend(Request $request){

        $friend = Friend::findOrFail($request->id);

        echo json_encode($friend->forceDelete());
    }

}

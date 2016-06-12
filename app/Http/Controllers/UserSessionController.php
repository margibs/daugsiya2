<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
use DateInterval;
use App\User_Session;
use App\User;
use DB;

class UserSessionController extends Controller
{
    
    public function getUserSession(Request $request){

        $user_session = User_Session::firstOrCreate([ 'user_id' => $request->user_id ]);

       /* $user_session->last_activity_time = new DateTime();

        $user_session->save();

        $user = User::find($request->user_id);

        $now = new DateTime();

        $minuteLater = $now->sub(new DateInterval('PT1M'));

        $nowStamp = $minuteLater->format('Y-m-d H:i:s');

        $friends = $user->friends()->with('user')->where('confirmed', 1)->whereExists(function($query) use ($nowStamp){

            $query->select(DB::raw('user_id'))
                ->from('user_sessions')
                ->whereRaw('friends.friend_id = user_sessions.user_id')
                ->where('user_sessions.last_activity_time', '>=', $nowStamp);

        });

        

        $myFriends = $user->accepted_friends()->where('confirmed', 1)->with('friend')->union($friends)->whereExists(function($query) use ($nowStamp){

            $query->select(DB::raw('user_id'))
                ->from('user_sessions')
                ->whereRaw('friends.user_id = user_sessions.user_id')
                ->where('user_sessions.last_activity_time', '>=', $nowStamp);

        })->get();


        $onlineFriends = [];

        foreach($myFriends as $fr){
            $friend = $fr->friend;

            if($fr->friend_id == $request->user_id){
                $friend = $fr->user;
               
            }
                array_push($onlineFriends, $friend);    
        }*/
        

        echo json_encode(false);
    }

}

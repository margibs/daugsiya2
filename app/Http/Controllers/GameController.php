<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Game_Experience as Game_Experience;
use App\User as User;
use App\User_Rating as User_Rating;
use App\User_Detail as User_Detail;
use File;
use App\Model\Post;
use App\UserActivity;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Stevebauman\Location\Facades\Location;

use Session;
use DB;
use Cache;

class GameController extends Controller
{
   

    public function addFavorite(Request $request){

        $gameExp = Game_Experience::firstOrCreate([ 

            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'type' => 2

         ]);
         /*
        *   ADDING USER ACTIVITIES
        *   AUTHOR: IAN U ROSALES
        *   DATE: 4-26-2016
        *   TYPE 3 STATIC
        *   CONTENT ID FOR PRIZE ID 
        */
         $data = [
                'user_id' => $request->user_id,
                'post_id' => $request->post_id
            ];

        $activities = UserActivity::addActivity($data, 1);

        return json_encode($gameExp);

    }


public function searchHashGame(Request $request){

        $games = array();
        if($request->wildcard != ''){
            $games = Post::where('name', 'like', '%'.$request->wildcard.'%')->take(5)->get();    
        }

        return json_encode($games);
        
    }


    public function getMyFriends(Request $request){

        $friends = [];

        $user = Auth::user();

        $confirmed_friends = $user->friends()->where('confirmed', 1)->get();
        $confirmed_accepted_friends = $user->accepted_friends()->where('confirmed', 1)->get();

        foreach($confirmed_friends as $friend){
            array_push($friends, $friend);
        }

        foreach($confirmed_accepted_friends as $k=> $friend){

            $friend->friend = $friend->user;
            $friend->user = '';

            array_push($friends, $friend);

        }


        return json_encode($friends);

    }


    protected function getGameRating($post_id){
        
        $gamePlayers = User_Rating::where('post_id', $post_id)->get();

        $totalRating = 0;

        $data['totalRating'] = 0;
        $data['voters'] = 0;
        if(count($gamePlayers) > 0){

        foreach($gamePlayers as $player){
                $totalRating+= $player->rating;
        }

            $totalRating = $totalRating / count($gamePlayers);

            $data['totalRating'] = $totalRating;
            $data['voters'] = count($gamePlayers);  
        }


        return $data;
    }


    public function playedGame(Request $request){

        $gameExp = Game_Experience::firstOrCreate([ 

            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'type' => 1

         ]);

        $data = [
                'user_id' => $request->user_id,
                'post_id' => $request->post_id
            ];

        $activities = UserActivity::addActivity($data, 2);

        $gameExp->gameRating = $this->getGameRating($request->post_id);

        return json_encode($gameExp);

    }

    public function removeFavorite(Request $request){

        Game_Experience::destroy($request->id);

        return json_encode(['success' => true]);

    }


    public function uploadProfilePic(Request $request){

        /*
        *   FUNCNTION IMAGE CROPPING
        *   AUTHOR: IAN U ROSALES
        *   DATE:   5-3-2016
        */
        $directory = 'user_uploads/user_'.$request->user_id;
        $user_detail = User_Detail::find($request->user_id);
        if($user_detail && $user_detail->profile_picture != "" && $user_detail->profile_picture != null) {
            $path = 'user_uploads/'.'user_'.$request->user_id.'/';
            $success = File::cleanDirectory($path);
        }

        $createDirectory = true;
        if(!file_exists(public_path().$directory)){
            $createDirectory = File::makeDirectory(public_path($directory, 0777, false, true));
        }
        if(!file_exists($directory.'/5050/')) {
            $createDirectory = File::makeDirectory(public_path($directory.'/5050/', 0777, false, true));
        }
        if(!file_exists($directory.'/4545/')) {
            $createDirectory = File::makeDirectory(public_path($directory.'/4545/', 0777, false, true));
        }
        if(!file_exists($directory.'/2020/')) {
            $createDirectory = File::makeDirectory(public_path($directory.'/2020/', 0777, false, true));
        }

        
        $filename = 'profile_picture-'.date('Y-m-d-H-i-s').'.'.$request->file('profile_picture')->getClientOriginalExtension();



        $path50 = public_path($directory.'/5050/' . $filename);
        $path45 = public_path($directory.'/4545/' . $filename);
        $path20 = public_path($directory.'/2020/' . $filename);

        
        if($request->hasFile('profile_picture')){
            $request->file('profile_picture')->move($directory, $filename);

            $thumb = Image::make($directory.'/'.$filename)->resize(50,50)->save($path50, 50);
            $thumb = Image::make($directory.'/'.$filename)->resize(45,45)->save($path45, 50);
            $thumb = Image::make($directory.'/'.$filename)->resize(20,20)->save($path20, 50);


            $user_detail = User_Detail::firstOrCreate([ 'user_id' => $request->user_id ]);
            $user_detail->profile_picture = $filename;
            $user_detail->save();
            
        }
        return json_encode($createDirectory);
    }


    public function rateGame(Request $request){

        $user_rating = User_Rating::firstOrCreate([

            'post_id' => $request->post_id,
            'user_id' => $request->user_id

            ]);

        
        $user_rating->rating = $request->rating;
        $user_rating->save();

        return json_encode($this->getGameRating($request->post_id));

    }

    public function playNow(Request $request)
    {

        $post = Post::find($request->post_id);

        $country_code = $this->getCountryCode();
        $preferencesList = false;

        $category = $post->categories_with_casino()->first();

        $preferencesList = 
            DB::table('casino_preferences')
            ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
            ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
            ->select('casinos.id','casinos.name','casinos.image_url','casinos.link_desktop','casinos.link_mobile','casinos.bonus_offer','casinos.reels_image','casinos.claim_image')
            ->where('casino_preferences.category_id',$category->id)
            ->where('casinos.country_code',$country_code)
            ->orderBy('casino_preference_lists.position','ASC')
            // ->take(4)
            ->get();
        
        if($preferencesList == null)
        {
            $country_code = 'GB';
            $preferencesList = 
                DB::table('casino_preferences')
                ->join('casino_preference_lists','casino_preference_lists.casino_preference_id','=','casino_preferences.id')
                ->join('casinos','casinos.id','=','casino_preference_lists.casino_id')
                ->select('casinos.id','casinos.name','casinos.image_url','casinos.link_desktop','casinos.link_mobile','casinos.bonus_offer','casinos.reels_image','casinos.claim_image')
                ->where('casino_preferences.category_id',$category->id)
                ->where('casinos.country_code',$country_code)
                ->orderBy('casino_preference_lists.position','ASC')
                // ->take(4)
                ->get(); 
        }

        // if($category)
        // {
        //    $preferencesList = $category->casino_preferences_list()->orderBy('position')->take($category->casino_preference->number_to_show)->get(); 
        // }

        return json_encode($preferencesList);
    }

    public function getCountryCode()
    {
        if(session('country_code') == null)
        {
            $location = Location::get();
            $country_code = 'GB';

            // $susan_country_included = ['AT','AU','CA','CH','CZ','DE','ES','FI','GB','IE','IT','NL','NO','NZ','PT','SE','PL','DK'];
            $susan_country_included = ['AT','AU','CA','CH','CZ','DE','ES','FI','GB','IE','IT','NL','NO','NZ','PT','SE'];

            if( in_array($location->isoCode, $susan_country_included) )
            {
                $country_code = $location->isoCode;
            }
            session(['country_code' => $country_code]);

            return $country_code;
        }

        return session('country_code');
    }


    protected function userRelationship($you, $other_person){

        $friendData = [
            'friend_id' => 0,
            'relation' => 1
        ];

        if($you == $other_person){

             $friendData['relation'] = 2;
        
        }else{

            $user = User::find($you);

             $pending = $user->friends()->where('friend_id', $other_person)->first();
             $request = $user->accepted_friends()->where('user_id', $other_person)->first();

             if($pending && $pending->confirmed == 0){
                $friendData['friend_id'] = $pending->id;
                $friendData['relation'] = 3;
             }else if($request && $request->confirmed == 0){
                $friendData['friend_id'] = $request->id;
                $friendData['relation'] = 4;
             }else if( ($pending && $pending->confirmed == 1) || ($request && $request->confirmed == 1) ){
                $friendData['friend_id'] = $pending ? $pending->id : $request->id;
                $friendData['relation'] = 5;
             }
        }

        

        return $friendData;


    }


    public function viewFriendProfile(Request $request){

        $user = User::findOrFail($request->other_person);

        $friends = $user->friends()->where('friend_id', $request->user_id)->first();
        $accepted_friends = $user->accepted_friends()->where('user_id', $request->user_id)->first();

        $data['user_detail'] = $user->user_detail;
        $data['favorites'] = $user->favorites;
        $data['played_games'] = $user->played_games;
        $data['friend'] = $this->userRelationship($request->user_id, $request->other_person);

        return json_encode($data);
    }

        public function viewUserProfile(Request $request){

        $user = User::with('user_detail')->find($request->user_id);

        $data['user_detail'] = $user->user_detail;
        $data['friend'] = false;
        if(Auth::check()){
            $auth_user_id = Auth::user()->id;
           $data['friend'] = $this->userRelationship($auth_user_id, $user->id); 
        }

        return json_encode($data);

    }

    public function readFriendRequests(Request $request){

        $user = User::findOrFail($request->user_id);
         $unread_friend_requests = $user->accepted_friends()->where('confirmed', 0)->where('read', 0)->selectRaw('friends.id,friends.read, friends.confirmed')->update(array('read'=> 1));

         $unread_user_notifications = $user->user_notifications()->selectRaw('user_notifications.id,user_notifications.read, 0')->where('read', 0)->update(array('read'=> 1));
         return json_encode(true);
    }

    public function getFriendRequests(Request $request){

        $user = User::findOrFail($request->user_id);

        $friend_requests = $user->accepted_friends()->where('confirmed', 0)->selectRaw('friends.id,friends.user_id,friends.friend_id,friends.read, 0, friends.confirmed, friends.created_at, null, null,null');

        $user_notifications = $user->user_notifications()->with('game')->selectRaw('user_notifications.id,user_notifications.user_id,user_notifications.friend_id,user_notifications.read, user_notifications.type, 0, user_notifications.created_at, user_notifications.post_id, posts.slug as postslug, categories.slug as categoryslug')
        ->leftJoin('posts', function($join){
            $join->on('posts.id','=', 'user_notifications.post_id')->whereIn('user_notifications.type', [2,5]);
        })
        ->leftJoin('categories', function($join){
            $join->on('categories.id','=', 'user_notifications.post_id')->where('user_notifications.type','=', 4);
        })
        ->where('user_notifications.read', 0)->union($friend_requests)->orderBy('read', 'asc')->orderBy('created_at', 'desc')->get();

        return json_encode($user_notifications);
    }

}

<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function user_detail(){

        return $this->hasOne('App\User_Detail');
    }


    public function user_rating(){

        return $this->hasOne('App\User_Rating');
    }


    public function game_experiences(){

        return $this->hasMany('App\Game_Experience');
    }

    public function favorites(){

        return $this->belongsToMany('App\Model\Post', 'game_experiences', 'user_id', 'post_id')->where('status', 1)->where('game_experiences.type' , 2)->with('user_rating');
    }
    
    public function played_games(){

        return $this->belongsToMany('App\Model\Post', 'game_experiences', 'user_id', 'post_id')->where('status', 1)->where('game_experiences.type' , 1)->with('user_rating');
    }

     public function private_messages(){
        return $this->hasMany('App\Private_Message', 'from');
    }

    public function unread_messages(){
        return $this->hasMany('App\Private_Message', 'to')->where('read', 0);
    }
    public function read_messages(){
        return $this->hasMany('App\Private_Message', 'to')->where('read', 1);
    }

    public function recieved_private_messages(){
        return $this->hasMany('App\Private_Message', 'to');
    }


    public function friends(){
        return $this->hasMany('App\Friend')->with('friend');
    }

    public function accepted_friends(){
        return $this->hasMany('App\Friend', 'friend_id')->with('user');
    }


    public function user_notifications(){

        return $this->hasMany('App\User_Notification', 'friend_id')->with('user');
    }


    public function tours(){

        return $this->hasMany('App\User_Tour');
    }

    public function completed_profile_tour(){
        
        return $this->hasOne('App\User_Tour')->where('pagename', 'profile')->where('complete', 1);
    }
    public function completed_chatroom_tour(){
        
        return $this->hasOne('App\User_Tour')->where('pagename', 'chatroom')->where('complete', 1);
    }
    public function completed_prizeroom_tour(){
        
        return $this->hasOne('App\User_Tour')->where('pagename', 'prizeroom')->where('complete', 1);
    }
    public function completed_slotsroom_tour(){
        
        return $this->hasOne('App\User_Tour')->where('pagename', 'slotsroom')->where('complete', 1);
    }
    public function completed_home_tour(){
        
        return $this->hasOne('App\User_Tour')->where('pagename', 'home')->where('complete', 1);
    }
    public static function findEmail($email) {
          return  DB::table('users')
                        ->select(['id'])
                        ->where('email', '=', $email)
                        /*->get();*/
                        ->pluck('id');
    }



}

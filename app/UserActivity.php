<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Post;
use App\Model\Prize;
class UserActivity extends Model
{
    protected $fillable = [
    		'user_id',
    		'type',
    		'content_id'
    	];

    static function addActivity($data, $type) {
    	 $activities = UserActivity::firstOrCreate([
                'user_id' => $data['user_id'],
                'content_id' => $data['post_id'],
                'type' => $type
            ]);

        if($activities->notify_status == 0){

            $url = url('').':8891/push_userActivity';

            $emitData = array();
            $emitData['type'] = $type;
            $emitData['user'] = User::with('user_detail')->find($data['user_id']);

            if($type == 1 || $type == 2){
                $emitData['content'] = Post::find($data['post_id']); 
            }else if($type == 3){
                $emitData['content'] = Prize::find($data['post_id']); 
            }
            $data_string = json_encode($emitData);

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string))                                                                       
            );                                                                                                                   
                                                                                                                                 
            $result = curl_exec($ch);

            $activities->notify_status = 1;
            $activities->save();
        }


    	 return $activities;
    }

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function favorite() {
    	return $this->belongsTo('App\Model\Post', 'content_id')->where('type', 1);
    }

    public function prize() {
    	return $this->belongsTo('App\Model\Prize', 'content_id')->where('type', 3);
    }
}

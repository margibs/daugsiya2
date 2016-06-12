<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Global_Notification;
use App\User as User;
use App\Model\Post;
use App\Chat_Room;
use App\Custom_Notification;
use App\User_Notification;
use App\Globalnotification_Read;
use Illuminate\Support\Facades\Auth;
use Validator;
use DateTime;

class NotificationController extends Controller
{


    public $user;

    public function __construct(){

        date_default_timezone_set("Europe/London");

        if(Auth::check()){

            $this->user = User::with('user_detail')->find(Auth::user()->id);


        }
    }


    public function addNewGameNotification(Request $request){

        $post = Post::findOrFail($request->post_id);

        $gn = new Global_Notification();


        $gn->user_id = $this->user->id;
        $gn->type = 1;

        $post->new_game_notification()->save($gn);

        $gn->game = $gn->game()->first();

        $url = url('').':8891/push_global_notification';

        $data_string = json_encode($gn);

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

        echo json_encode($result);
    }

    public function postEditCustomNotification(Request $request, $id){

        $custom_notification = Custom_Notification::find($id);

        if($custom_notification->executed == 1){
            return redirect('admin/notification');
        }

        $redirect = 'admin/notification/'.$custom_notification->id.'/edit';

        $validator = Validator::make($request->all(), [
                'description' => 'required',
                'link' => 'required',
                'date_posting' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return redirect($redirect)
                            ->withErrors($validator)
                            ->withInput();
            }


        $custom_notification->link = $request->link;
        $custom_notification->description = $request->description;
        $custom_notification->date_posting = $request->date_posting;
        $custom_notification->image = $request->image;
        $custom_notification->save();

        return redirect('admin/notification');
    }

    public function deleteCustomNotification($id){

        $custom_notification = Custom_Notification::find($id);
        if($custom_notification->executed == 0){
            $custom_notification->forceDelete(); 
        }
        
        return redirect('admin/notification');

    }

    public function addNewRoomNotification(Request $request){

        $room = Chat_Room::findOrFail($request->room_id);

        $gn = new Global_Notification();


        $gn->user_id = $this->user->id;
        $gn->type = 2;

        $room->new_room_notification()->save($gn);

        $gn->room = $gn->room()->first();

        $url = url('').':8891/push_global_notification';

        $data_string = json_encode($gn);

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

          echo json_encode($result);
    }

    public function moderatorJoinedChatroom(Request $request){


            $room = Chat_Room::findOrFail($request->room_id);

            $gn = new Global_Notification();


            $gn->user_id = $this->user->id;
            $gn->type = 3;

            $room->new_moderator_notification()->save($gn);

            $gn->room = $gn->room()->first();

            $gn->moderator = $gn->moderator()->first();

            $url = url('').':8891/push_global_notification';

            $data_string = json_encode($gn);

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

            echo json_encode($result);
    }

    public function addNewCustomNotification(Request $request){

        $redirect = 'admin/notification';

        $validator = Validator::make($request->all(), [
                'description' => 'required',
                'link' => 'required',
                'date_posting' => 'required',
            ]);

            if ($validator->fails()) 
            {
                return redirect($redirect)
                            ->withErrors($validator)
                            ->withInput();
            }

         $gn = new Global_Notification();


            $gn->user_id = $this->user->id;
            $gn->type = 4;
            $gn->parent_id = 0;

            $gn->save();

            $custom_notification = new Custom_Notification();

            $custom_notification->description = $request->description;
            $custom_notification->link = $request->link;
            $custom_notification->date_posting = $request->date_posting;
            $custom_notification->image = $request->image;
            
            $gn->custom_notification()->save($custom_notification);

          return redirect($redirect);  

    }

    public function postCustomNotification(Request $request){


        $custom_notifications = Global_Notification::where('type', 4)

        ->whereExists(function($query){

            $query->select('global_notification_id')
                    ->from('custom_notifications')
                    ->whereRaw('custom_notifications.global_notification_id = global_notifications.id AND executed = 0')
                    ->where('custom_notifications.date_posting', '<=', new DateTime());

    
        })->with('custom_notification')->get();

        if(count($custom_notifications) > 0){


                $url = url('').':8891/push_custom_notification';

                $data_string = json_encode($custom_notifications);

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

                if($result){

                    foreach($custom_notifications as $custom_notif){

                        $custom_notif->custom_notification()->update([ 'executed' => 1 ]);
                    }
                }
        }


       


    }


        public function recommendGame(Request $request){

            if($request->friends && count($request->friends) > 0 ){

                $user = User::with('user_detail')->find($this->user->id);
                $post = Post::find($request->post_id);

                $uns = [];

                foreach($request->friends as $f){

                $un = new User_Notification();

                $un->user_id = $user->id;
                $un->friend_id = $f;
                $un->post_id = $request->post_id;
                $un->type = 2;
                $un->save();

                $un->user = $user;
                $un->game = $post;

                    array_push($uns, $un);

                }


                 $url = url('').':8891/push_recommendGame_notification';

                    $data_string = json_encode($uns);

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

                   return json_encode($uns);
            }

            return json_encode(false);

           

        }


    public function readGlobalNotifications(Request $request){

        $user_id = $this->user->id;

        $not_custom_notifications = Global_Notification::whereNotExists(function($query) use ($user_id){

            $query->select('global_notification_id')
                ->from('globalnotification_reads')
                ->whereRaw('globalnotification_reads.global_notification_id = global_notifications.id')
                ->where('globalnotification_reads.user_id', $user_id);
        })->where('type', '!=', 4)->get();

        $custom_notifications = Global_Notification::where('type', 4)

        ->whereExists(function($query){

            $query->select('global_notification_id')
                    ->from('custom_notifications')
                    ->whereRaw('custom_notifications.global_notification_id = global_notifications.id AND executed = 1');

    
        })->whereNotExists(function($query) use ($user_id){

            $query->select('global_notification_id')
                ->from('globalnotification_reads')
                ->whereRaw('globalnotification_reads.global_notification_id = global_notifications.id')
                ->where('globalnotification_reads.user_id', $user_id);
        })->get();


        

        if(count($not_custom_notifications) > 0){

            foreach($not_custom_notifications as $gn){
                $read = new Globalnotification_Read();
                $read->user_id = $user_id;
                $gn->globalnotification_read()->save($read);
            }

        }
        

        if(count($custom_notifications) > 0){
            foreach($custom_notifications as $gnn){
                $read = new Globalnotification_Read();
                $read->user_id = $user_id;
                $gnn->globalnotification_read()->save($read);
            }
        }

        echo json_encode(true);

    }


    public function getGlobalNotifications(Request $request){

        $user_id = $this->user->id;

        $get_global_notifications = Global_Notification::with(['globalnotification_read' => 

                function($query) use ($user_id){
                    $query->where('user_id', $user_id);
                }

            ])->orderBy('created_at', 'desc')->get();

        $global_notifications = array();

        foreach($get_global_notifications as $k=>$gn){

            if($gn->type == 1){
                $gn->game = $gn->game()->first();
                array_push($global_notifications, $gn);
            }else if($gn->type == 2){
                $gn->room = $gn->room()->first();
                array_push($global_notifications, $gn);
            }else if($gn->type == 3){
                $gn->room = $gn->room()->first();
                $gn->moderator = $gn->moderator()->first();
                array_push($global_notifications, $gn);
            }else if($gn->type == 4){

                $gn->custom_notification = $gn->custom_notification()->first();
                if(isset($gn->custom_notification) && $gn->custom_notification->executed == 1){
                    array_push($global_notifications, $gn);
                }
            }

        }

        return json_encode($global_notifications);

    }
    
}

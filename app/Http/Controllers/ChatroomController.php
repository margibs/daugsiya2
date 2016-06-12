<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Room_Message;
use App\Chat_Room;
use App\Userchat_Read;
use Auth;
use DateTime;

class ChatroomController extends Controller
{
    
    public function postMessage(Request $request){

        $room_message = new Room_Message();
        $room_message->user_id = $request->user_id;
        $room_message->message = $request->message;
        $room_message->chat_room_id = $request->room_id;
        /*dd($room_message->user->user_detail->profile_picture);*/
      /*  if($room_message->user->user_detail->profile_picture == '') {
            $room_message->user->user_detail->profile_picture = 'user_uploads/default_image/default_01.png';
        }
        /*dd($room_message);*/

        return json_encode($room_message->save());
    }

    public function getChatroom(Request $request){
        $user_id = Auth::user()->id;

        $chat_room = Chat_Room::with('room_messages')->findOrFail($request->room_id);

        $chat_room->room_messages = $chat_room->room_messages()->take(10)->orderBy('created_at','DESC')->get()->reverse();
         $user_read = Userchat_Read::firstOrCreate([ 'user_id' => $user_id, 'chat_room_id' => $chat_room->id ]);
         $user_read->last_read = new DateTime();
        //$user_read->save();

        return json_encode($chat_room);
    }

    public function getRoomMessages(Request $request){

        $chatroom = Chat_Room::with('room_messages')->find($request->room_id);

        /*dd('Hello');*/
        return json_encode(array_reverse($chatroom->room_messages()->take(10)->orderBy('created_at','DESC')->get()->toArray()));
    }

    public function userChatRead(Request $request){

        $user_read = Userchat_Read::firstOrCreate([ 'user_id' => $request->user_id, 'chat_room_id' => $request->room_id ]);
        $user_read->last_read = new DateTime();

        return json_encode($user_read->save());

    }

    public function getUnreadCount(Request $request){

        $chatroom = Chat_Room::findOrFail($request->room_id);

         $user_read = Userchat_Read::firstOrCreate([ 'user_id' => $request->user_id, 'chat_room_id' => $request->room_id ]);

        $unread_roomchat = $chatroom->room_messages()->where('room_messages.user_id' , '!=', $request->user_id)->where('room_messages.created_at', '>', $user_read->last_read)->count();
     /*   $unread_roomchat = $chatroom->room_messages()->where('room_messages.user_id' , '!=', $request->user_id)->whereNotExists(function($query){
                $query->select('read_roomchats.room_message_id')
                        ->from('read_roomchats')
                        ->whereRaw('room_messages.id = read_roomchats.room_message_id');
                       
        })->count();*/

        echo json_encode($unread_roomchat);

    }

}

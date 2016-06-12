<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\Channel;
use App\User;
use App\Channel_Message;
use App\Private_Message;
use Input;
use Auth;
use DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $paginate_value = 20;
    public function index()
    {
        //
    }


    public function add_channel_message(Request $request){

        $message = new Message();
        $message->user_id = $request->user_id;
        $message->message = $request->message;
        $message->save();

        $channel_message = new Channel_Message();
        $channel_message->channel_id = $request->channel_id;
        $message->channel_message()->save($channel_message);

        echo json_encode($request->all());
    }

    public function add_private_message(Request $request){

        $message = new Message();
        $message->user_id = $request->user_id;
        $message->message = $request->message;
        $message->save();

        $private_message = new Private_Message();
        $private_message->to_user_id = $request->to_user_id;
        $message->private_message()->save($private_message);

        echo json_encode($request->all());
    }

    public function getMessages($id){

        $user = User::findOrFail($id);
        $private_messages = User::findOrFail($id)->private_messages()->with('to_user')->get();
        $channel_messages = User::findOrFail($id)->channel_messages()->with('channel')->get();
        $recieved_messages = User::findOrFail($id)->recieved_messages()->get();
        $channels = Channel::all();
        return view('chat.message_history', compact('user', 'private_messages','channel_messages','recieved_messages', 'channels'));

    }

    public function getPrivateMessages(Request $request){

        $user = User::find($request->user_id);
        $other_person = User::with('user_detail')->find($request->other_person);

       // $other_person->user_detail->profile_picture = 'user_uploads/user_'.$request->user_id.'/'.$other_person->user_detail->profile_picture;

        $private_messages = $user->private_messages()->where('to', $request->other_person);
        $conversation = $user->recieved_private_messages()->where('from', $request->other_person)->union($private_messages)->orderBy('created_at')->get();

        $user->recieved_private_messages()->where('from', $request->other_person)->update(['read' => 1]);

        $data['other_person'] = $other_person;
        $data['conversation'] = $conversation;
        $data['unread'] = $user->unread_messages()->count();
        $data['read'] = $user->read_messages()->count();

        //dd($other_person->user_detail->profile_picture);

        echo json_encode($data);
    }

    function getPrivateMessageReadCount(Request $request){

        $user = Auth::user();
        $count = $user->unread_messages()->where('from', $request->other_person)->count();
        echo json_encode($count);
    }

    public function sendPrivateMessage(Request $request){

        $private_message = new Private_Message();
        $private_message->from = $request->from;
        $private_message->to = $request->to;
        $private_message->message = $request->message;


       echo json_encode( $private_message->save() );

    }


    public function getInbox(Request $request){

        $user = User::findOrFail($request->user_id);

      /*  $friendMessages = $user->recieved_private_messages()->groupBy('from')->get();
                $messages = []; 

        $path = 'user_uploads/'.'user_';
        foreach($friendMessages as $msg){
                    $lastMessage = Private_Message::with('from_user')->where('from', $msg->from)->where('to', $msg->to)->orderBy('created_at', 'desc')->first();
                    $path = 'user_uploads/'.'user_'.$lastMessage->from_user->id.'/'.$lastMessage->from_user->user_detail->profile_picture;
                    if($lastMessage->from_user->user_detail->profile_picture == '') {
                        $lastMessage->from_user->user_detail->profile_picture =  'user_uploads/default_image/default_01.png';
                    }
                    else {
                        $lastMessage->from_user->user_detail->profile_picture = 'user_uploads/'.'user_'.$lastMessage->from_user->id.'/'.$lastMessage->from_user->user_detail->profile_picture;   
                    }
                    // $lastMessage->from_user->user_detail->profile_picture = 'user_uploads/'.'user_'.$lastMessage->from_user->id.'/'.$lastMessage->from_user->user_detail->profile_picture;   
                    array_push($messages, $lastMessage);
                }
        return json_encode($messages);*/
                  $lastMessages = Private_Message::select(DB::raw('*, max(private_messages.id) as max_id '))
        ->where('to', $user->id)
        ->groupBy('private_messages.from')->get()->pluck('max_id');
            
        $messages = Private_Message::with('from_user')->whereIn('id',$lastMessages)->orderBy('created_at', 'desc')->orderBy('read')->get();

        return json_encode($messages);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPaginatePrivateMessage(Request $request) {
         $user = User::find($request->user_id);
        $other_person = User::with('user_detail')->find($request->other_person);

       // $other_person->user_detail->profile_picture = 'user_uploads/user_'.$request->user_id.'/'.$other_person->user_detail->profile_picture;

        $private_messages = $user->private_messages()->where('to', $request->other_person);
        $conversation = $user->recieved_private_messages()->where('from', $request->other_person)->union($private_messages)->orderBy('created_at', 'DESC')->take($this->paginate_value)->get();

        $user->recieved_private_messages()->where('from', $request->other_person)->update(['read' => 1]);

        $data['other_person'] = $other_person;
        $data['conversation'] = $conversation;
        $data['unread'] = $user->unread_messages()->count();
        $data['read'] = $user->read_messages()->count();

        //dd($other_person->user_detail->profile_picture);

        echo json_encode($data);
    }

    public function postPaginatePrivateMessage(Request $request) {
         $user = User::find($request->user_id);
        $other_person = User::with('user_detail')->find($request->other_person);

       // $other_person->user_detail->profile_picture = 'user_uploads/user_'.$request->user_id.'/'.$other_person->user_detail->profile_picture;

        $private_messages = $user->private_messages()->where('to', $request->other_person);
        $conversation = $user->recieved_private_messages()->where('from', $request->other_person)->union($private_messages)->orderBy('created_at', 'DESC')->skip($request->end)->take(10)->get();

        $user->recieved_private_messages()->where('from', $request->other_person)->update(['read' => 1]);

        $data['other_person'] = $other_person;
        $data['conversation'] = $conversation;
        $data['unread'] = $user->unread_messages()->count();
        $data['read'] = $user->read_messages()->count();

        //dd($other_person->user_detail->profile_picture);

        if(count($data) == 0)
        {
            return json_encode(['done' => 1]);
        }

        echo json_encode($data);
    }

    /* $user = $this->user;
        $chatroom = Chat_Room::with('room_messages')->where('id',Input::get('room_id'))->first();

      /*  $chatroom->room_messages = $chatroom->room_messages()->take(10)->offset(Input::get('page')*10)->orderBy('created_at','DESC')->get();*/
      /*
       $data  = $chatroom->room_messages()->skip(Input::get('end'))->take(10)->orderBy('created_at','DESC')->get();

        if(count($data) == 0) {
            //$data['length'] = 0;
            return json_encode(['done' => 1]);
        } 

        return json_encode($data);*/
}

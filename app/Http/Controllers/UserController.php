<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;
use App\User_Detail as User_Detail;
use App\Game_Experience as Game_Experience;
use App\User_Rating as User_Rating;
use Illuminate\Support\Facades\Auth as Auth;

use DB;

use App\Model\Post as Post;
use App\Chat_Room;
use App\Model\Question;
use App\Global_Notification;
use App\Private_Message;
use App\Userchat_Read;
use App\User_Tour;
use App\Friend;
use DateTime;
use Validator;
use Hash;
use Session;

use Jenssegers\Agent\Agent as MediumAgent;

use Yajra\Datatables\Datatables;

use Input;
use Mail;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $user;
    public $paginate_value = 20;
    public $_email;


    public function __construct(){


        if(Auth::check()){

            $this->user = User::with('user_detail')->find(Auth::user()->id);


        }
    }


    public function index()
    {
       

        return view('user.register');
    }

    /*
    *   ADDING DATATABLE FOR USER INDEX
    *   AUTHOR: IAN ROSALES 
    *   4-29-2016
    *
    */

    public function getIndex() 
    {
        return view('admin.user');
    }

    public function anyData() 
    {
        $users = User::select('users')
                    ->leftjoin('user_details', 'users.id', '=', 'user_details.user_id')
                    ->select(
                        'users.id', 
                        DB::raw('CONCAT(user_details.firstname, " ", user_details.lastname) AS full_name'),
                        'users.email',
                        'users.is_admin',
                        'users.created_at', 
                        'users.updated_at'
                        )->get();
        return Datatables::of($users)
                ->editColumn('is_admin', function($users){
                    return (($users->is_admin == 1) ? 'Admin'  : 
                            (($users->is_admin == 2) ? 'Chat Host' :
                            'User'));
                })
                ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('updated_at', '{!! $created_at->diffForHumans() !!}')
                ->editColumn('action', function($users){
                    return '<a href="/admin/users/'.$users->id.'"><i class="fa fa-pencil"></i></a>';
                })
                ->make(true);

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

        $user = new User();

        $request->password = bcrypt($request->password);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){

          $credentials = array(
                    'email' => $request->email,
                    'password' => $request->password
                );

                if (Auth::attempt($credentials)) {
                    return redirect()->back();
                }
                           
        }

    }

    public function endTour(Request $request){


        $user = $this->user;

        $user_tour = new User_Tour();
        $user_tour->pagename = $request->pagename;
        $user_tour->complete = 1;

        $user->tours()->save($user_tour);

        return json_encode($user_tour);
    }

    public function session(Request $request){

/*        ignore_user_abort(true);
        set_time_limit(0);

        echo connection_aborted();
        while(1)
        {
        echo "Whatever you echo here wont be printed anywhere but it is required in order to work.";
        flush();
        if(connection_aborted())
        {
        break;
        // Breaks only when browser is closed
        }
        }

        $user_session = User_Session::where('user_id', $request->user_id)->where('session_id', $request->session_id)->first();

        if( $user_session){
            $user_session->forceDelete();
        }*/

 /*       ignore_user_abort(1);
        set_time_limit(0);
        $interval = 10;

        $user_session = User_Session::where('user_id', $request->user_id)->where('session_id', $request->session_id)->first();
        do{
            if(!Auth::check() && $user_session)
                {
                    $user_session->forceDelete();
                    break;
                }

            sleep($interval);

        }while(true);

        return json_encode($user_session);*/
    }


    protected function changePasswordValidator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ]);
    }
    protected function userDetailsValidator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|min:2|max:80',
            'lastname' => 'required|min:2|max:80',
            'address' => 'max:100',
            'phone_no' => 'integer'
        ]);
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

    protected function getChatrooms(){

        $this->data['miniChatrooms'] = Chat_Room::all();

        if(Auth::check()){

            $user = Auth::user();

            foreach($this->data['miniChatrooms'] as $k => $ch){

                $user_read = Userchat_Read::where('user_id', $user->id)->where('chat_room_id', $ch->id)->first();

                if(!$user_read){
                    $user_read = new Userchat_Read();
                    $user_read->user_id = $user->id;
                    $user_read->chat_room_id = $ch->id;
                    $user_read->last_read = new DateTime();
                    $user_read->save();
                }

                $this->data['miniChatrooms'][$k]['unread_count'] = $ch->room_messages()->where('room_messages.user_id' , '!=', $user->id)->where('room_messages.created_at', '>', $user_read->last_read)->count();
            }
        }



        return $this->data['miniChatrooms'];
    }



    public function profile(){

        $user = $this->user;
        foreach($user->favorites as $k => $favorite){
            $user->favorites[$k]->gameRating = $this->getGameRating($favorite->id);
        }
        foreach($user->played_games as $k => $played_game){
            $user->played_games[$k]->gameRating = $this->getGameRating($played_game->id);
        }

        $friends = [];

        $confirmed_friends = $this->user->friends()->where('confirmed', 1)->get();
        $confirmed_accepted_friends = $this->user->accepted_friends()->where('confirmed', 1)->get();

        foreach($confirmed_friends as $friend){
            array_push($friends, $friend);
        }

        foreach($confirmed_accepted_friends as $k=> $friend){

            $friend->friend = $friend->user;
            $friend->user = '';

            array_push($friends, $friend);

        }

        /*$online_friends = [];
        foreach($friends as $k=> $fr){

            if(isset($fr->friend->user_session) && $fr->friend->user_session->session_id){

                $temp = $friends[$k];
                array_slice($friends, $k);

                array_unshift($friends, $temp );
            }
        }*/


        $this->user->myFriends = $friends;
        $this->user->myMessages = $this->getInbox();

        $unread_messages_count = count($user->unread_messages()->groupBy('from')->get());

        

        $user->unplayed_games = Post::where('status', 1)->whereNotExists(function($query){

            $query->select(DB::raw('post_id'))
                ->from('game_experiences')
                ->whereRaw('posts.id = game_experiences.post_id and game_experiences.user_id = '.$this->user->id);

        })->get();

        //dd(DB::getQueryLog());

        foreach($user->unplayed_games as $k => $unplayed_game){
            $user->unplayed_games[$k]->gameRating = $this->getGameRating($unplayed_game->id);
        }

        if(!$user->user_detail){
            $user->user_detail = new User_Detail();
            $user->user_detail->user_id = $this->user->id;
            $user->user_detail->save();
        }

        $chatroom_notification_count = $this->getChatroomNotificationCount();

        $global_notification_count = $this->getGlobalNotificationCount();

        $questions = Question::where('follow_up', 0)->get();

        $imageLeft = true;

        $questionaire = '';

        $images = array(
            '<div class="womentalking"></div>',
            '<div class="womentraveling"></div>',
            '<div class="womentv"></div>',
            '<div class="womenshopping"></div>'

            );

        $page = 0;

        foreach($questions as $k=>$q){

            if($imageLeft){
                $page += 3;
            }else{
                $page++;
            }

            $questionpage = '<div class="questionpage questionContainer" data-id="'.$q->id.'"><div class="questionBody" data-page="'.$page.'">';
               $questionpage .= '<p>'.$q->question.'</p><ul>';

               $answer = $q->answer()->where('user_id', $user->id)->first();
                
               if($answer){

                $questionpage.= '<li> <a href="javascript:;">You answered '.$answer->choice->choice.'</a></li>';

                if($answer->choice->response){
                                        $questionpage.= '<li class="response"><p>'.$answer->choice->response.'</p></li>';
                                  }

                 $questionpage.='</ul></div>';

                 $follow_up_answered = $q->choices()->where('follow_id', '!=', 0)->whereExists(function($query) use($user){

                        $query->select('id')
                        ->from('question_user_answers')
                        ->whereRaw('question_user_answers.question_id = question_choices.follow_id')
                        ->where('question_user_answers.user_id', $user->id);
                        

                 })->first();


                 if($follow_up_answered){

                    $follow_up_answer = $follow_up_answered->follow_up->answer()->where('user_id', $user->id)->first();

                    if($follow_up_answer){

                         $questionpage.= '<div class="response">';
                                $questionpage .= '<p>'.$follow_up_answered->follow_up->question.'</p><ul>';
                                $questionpage.= '<ul class="questionContainer">';
                                  $questionpage.= '<li> <a href="javascript:;">You answered '.$follow_up_answer->choice->choice.'</a></li>';

                                  if($follow_up_answer->choice->response){
                                        $questionpage.= '<li class="response"><p>'.$follow_up_answer->choice->response.'</p></li>';
                                  }
                                  

                                $questionpage.= '</ul>';

                            $questionpage.='</div>';
                    }
                    
                 }else{
                    $follow_up = $answer->choice->follow_up;

                    if($follow_up){
                            $questionpage.= '<div class="response follow_up_'.$follow_up->id.'">';
                                    $questionpage .= '<p>'.$follow_up->question.'</p><ul>';
                                    $questionpage.= '<ul class="questionContainer" data-id="'.$follow_up->id.'">';
                                        foreach($follow_up->choices as $chos){

                                            $questionpage .= '<li class="choice_'.$chos->id.'"> <a href="javascript:;" data-response="'.$chos->response.'" data-id="'.$chos->id.'" class="chooseAnswer">'.$chos->choice.'</a></li>';
                                        }
                                    $questionpage.= '</ul>';

                                $questionpage.='</div>';
                     }
                 }

               }else{

                    foreach($q->choices as $c){
                        $questionpage .= '<li class="choice_'.$c->id.'"> <a href="javascript:;" data-id="'.$c->id.'" data-follow-id="'.$c->follow_id.'" class="chooseAnswer another_class'.$c->id.'" data-response="'.$c->response.'">'.$c->choice.'</a></li>';

                        
                   }

                   $questionpage.='</ul></div>';

                   foreach($q->choices as $ch){

                        if($ch->follow_up){
                            $questionpage.= '<div class="response follow_up_question follow_up_'.$ch->follow_up->id.'">';
                                $questionpage .= '<p>'.$ch->follow_up->question.'</p><ul>';
                                $questionpage.= '<ul class="questionContainer" data-id="'.$ch->follow_up->id.'">';
                                    foreach($ch->follow_up->choices as $cho){

                                        $questionpage .= '<li class="choice_'.$cho->id.'"> <a href="javascript:;" data-id="'.$cho->id.'" data-response="'.$cho->response.'" class="chooseAnswer">'.$cho->choice.'</a></li>';
                                    }
                                $questionpage.= '</ul>';

                            $questionpage.='</div>';
                        }
                   }

               }

               

               $questionpage.='</div>';

               if($imageLeft){

                $questionaire .= $images[$k].$questionpage;
                $imageLeft = false;

               }else{
                $questionaire .= $questionpage.$images[$k];
                $imageLeft = true;
               } 


        }

        $session_id = Session::getId();

        $myFriends = Friend::myFriends();

        $miniChatrooms = $this->getChatrooms();

        return view('clubhouse.profile', compact('user', 'unread_messages_count', 'chatroom_notification_count', 'global_notification_count', 'questions', 'questionaire', 'session_id', 'myFriends', 'miniChatrooms'));
    }


    public function changePassword(Request $request){


        $validator = $this->changePasswordValidator($request->all());

        
        $validator->after(function($validator) use ($request){

           $check = auth()->validate([
                'email'    => Auth::user()->email,
                'password' => $request->current_password
            ]);

            if(!$check){
                     $validator->errors()->add('current_password', 
                            'The current password is incorrect.');
                }

        });

        if($validator->fails()){

            $errors = $validator->errors();
            return redirect('clubhouse/profile#changePassword')->with('changePasswordErrors', $validator->errors()->all());
        }

        $this->user->password = bcrypt($request->password);
        $this->user->save();

            return redirect('clubhouse/profile#changePassword')->with('successMessage','Password Changed.');

    }

    public function userDetails(Request $request){


        $validator = $this->userDetailsValidator($request->all());


        if($validator->fails()){

            $errors = $validator->errors();

            return redirect('clubhouse/profile#userDetails')->with('userDetailsErrors', $validator->errors()->all());
        }

        if(!$this->user->user_detail){
            $user_detail = new User_Detail();
            $user_detail->firstname = $request->firstname;
            $user_detail->lastname = $request->lastname;
            $user_detail->address = $request->address;
            $user_detail->phone_no = $request->phone_no;


            $this->user->user_detail()->save($user_detail);
        }else{
            $this->user->user_detail->firstname = $request->firstname;
            $this->user->user_detail->lastname = $request->lastname;
            $this->user->user_detail->address = $request->address;
            $this->user->user_detail->phone_no = $request->phone_no;
            $this->user->user_detail->save();
        }

         return redirect('clubhouse/profile#userDetails')->with('userDetailsSuccessMessage','Details Changed.');
    }

    public function findPeople(Request $request){

        $users = User_Detail::whereRaw('UPPER(CONCAT_WS(" ", firstname, lastname)) LIKE UPPER("%'.$request->search.'%")')->get();
        
        return view('clubhouse/findPeople', compact('users'));

    }

    protected function getInbox(){

        $user = $this->user;

      /*  $friendMessages = $user->recieved_private_messages()->groupBy('from')->get();
                $messages = [];

                foreach($friendMessages as $msg){

                    $lastMessage = Private_Message::with('from_user')->where('from', $msg->from)->where('to', $msg->to)->orderBy('created_at', 'desc')->first();
                    
                    array_push($messages, $lastMessage);
                }
         return $messages;*/
                  $user = $this->user;

        $lastMessages = Private_Message::select(DB::raw('*, max(private_messages.id) as max_id '))
        ->where('to', $user->id)
        ->groupBy('private_messages.from')->get()->pluck('max_id');
            
        $messages = Private_Message::with('from_user')->whereIn('id',$lastMessages)->orderBy('created_at', 'desc')->orderBy('read')->get();

        return $messages;
    }


    protected function getChatroomNotificationCount(){

        $chatrooms = Chat_Room::all();

        $totalChatroomCount = 0;

        if(Auth::check()){

            $user = Auth::user();

            foreach($chatrooms as $k => $ch){

            $user_read = Userchat_Read::where('user_id', $user->id)->where('chat_room_id', $ch->id)->first();
                if(!$user_read){
                    $user_read = new Userchat_Read();
                    $user_read->user_id = $user->id;
                    $user_read->chat_room_id = $ch->id;
                    $user_read->last_read = new DateTime();
                    $user_read->save();
                }
                
                $totalChatroomCount += $ch->room_messages()->where('room_messages.user_id' , '!=', $user->id)->where('room_messages.created_at', '>', $user_read->last_read)->count();
            }
        }

        return $totalChatroomCount;
    }

        protected function getGlobalNotificationCount(){

        $user_id = $this->user->id;

        $not_custom_notifications = Global_Notification::whereNotExists(function($query){

            $query->select('global_notification_id')
                ->from('globalnotification_reads')
                ->whereRaw('globalnotification_reads.global_notification_id = global_notifications.id');
        })->where('type', '!=', 4)->count();

        $custom_notifications = Global_Notification::where('type', 4)

        ->whereExists(function($query){

            $query->select('global_notification_id')
                    ->from('custom_notifications')
                    ->whereRaw('custom_notifications.global_notification_id = global_notifications.id AND executed = 1');

    
        })->whereNotExists(function($query){

            $query->select('global_notification_id')
                ->from('globalnotification_reads')
                ->whereRaw('globalnotification_reads.global_notification_id = global_notifications.id');
        })->count();

        return $not_custom_notifications+$custom_notifications;

    }


    protected function getUserNotificationCount(){

        $user = $this->user;

        $unread_friend_requests = $user->accepted_friends()->where('confirmed', 0)->where('read', 0)->count();
       $unread_user_notifications = $user->user_notifications()->where('read', 0)->count();

        return $unread_user_notifications+$unread_friend_requests;
    }

    public function chatroom($chatname = null){

        $user = $this->user;

        $chatrooms = Chat_Room::with('room_messages')->get();

        $user->myMessages = $this->getInbox();


        $unread_messages_count = count($user->unread_messages()->groupBy('from')->get());

        $global_notification_count = $this->getGlobalNotificationCount();

        $chatroom_notification_count = $this->getChatroomNotificationCount();


        $selectedRoom = false;

        if($chatrooms && count($chatrooms) > 0){
            $selectedRoom = $chatrooms[0];

                if($chatname){

                    foreach($chatrooms as $chatroom){

                        if($chatroom->name == $chatname){
                            $selectedRoom = $chatroom;
                            
                            break;
                        }
                    }

                }

            $user_read = Userchat_Read::firstOrCreate([ 'user_id' => $user->id, 'chat_room_id' => $selectedRoom->id ]);
            $user_read->last_read = new DateTime();
            $user_read->save();
            }

        $selectedRoom->room_messages = $selectedRoom->room_messages()->take(10)->orderBy('created_at','DESC')->get()->reverse();
        $session_id = Session::getId();

        // dd($selectedRoom->room_messages);

        $miniChatrooms = $this->getChatrooms();

        return view('clubhouse/chatroom', compact('user', 'chatrooms', 'unread_messages_count', 'chatroom_notification_count', 'selectedRoom', 'global_notification_count', 'session_id', 'miniChatrooms'));
    }

    public function getChatRoomPaginate(Request $request)
    {
        
        $chatroom = Chat_Room::with('room_messages')->where('id',$request->input('room_id'))->first();

        $chatroom->room_messages = $chatroom->room_messages()->take(10)->offset($request->input('page')*10)->orderBy('created_at','DESC')->get();


        //dd($chatroom->room_messages->user_detail);
        
        // foreach($chatroom->room_messages as $message)
        // {
        //     /*dd($message->user->user_detail->profile_picture);*/
        //     if($message->user->user_detail->profile_picture == '') {
        //         $message->user->user_detail->profile_picture = 'user_uploads/default_image/default_01.png';
        //     }
          
        // }

       //dd($data);
        // $new_message = '';

        // foreach ($chatroom->room_messages as $chatroom_message) 
        // {
        //     $user_image_men = $chatroom_message->user->user_detail->profile_picture ? url('').'/'.$chatroom_message->user->user_detail->profile_picture : url('/images/default_profile_picture.png');
        //     // $new_message[] = '<li data-user="'.$chatroom_message->user->user_detail->user_id.'"><a href="javascript:;" data-target="#friendProfile" class="subModalToggle viewFriendProfile"><div class="msgImgcont"><img src="'.$chatroom_message->user->user_detail->profile_picture ? url('').'/'.$chatroom_message->user->user_detail->profile_picture : url('/images/default_profile_picture.png').'" /></div></a><p>' .$chatroom_message->message.'</p></li>';
        //     $new_message.= '<li data-user="'.$chatroom_message->user->user_detail->user_id.'"><a href="javascript:;" data-target="#friendProfile" class="subModalToggle viewFriendProfile"><div class="msgImgcont"><img src="'.$user_image_men.'" /></div></a><p>'.htmlspecialchars($chatroom_message->message).'</p></li>';
        // }

        return json_encode($chatroom->room_messages);
    }

    public function mobileMagazine() {


        $Agent = new MediumAgent();

        if($Agent->isMobile()){
                   $user = $this->user;
            $questions = Question::where('follow_up', 0)->get();

            $choices = [];

            $questionpage = '';


            foreach($questions as $k=>$q){

            $questionpage.= '<div class="app-page" data-page="question_'.$q->id.'">';
                $questionpage.= '<div class="app-topbar"></div>';
                    $questionpage.= '<div class="app-content">';
                        $questionpage.= '<div class="row">';
                            $questionpage.= '<div class="col s12">';
                                $questionpage.= '<ul class="messageList">';
                                    $questionpage.= '<li>';
                                        $questionpage.= '<img src="'.asset('images/default_profile_picture.png').'" alt="">';
                                                $questionpage.= '<div class="msgContent">';
                                                    $questionpage.= '<div class="info"><p>'.$q->question.'</p></div>';
                                                $questionpage.= '</div>';
                                    $questionpage.= '</li>  ';
                                $questionpage.= '</ul>';
                            $questionpage.= '</div> ';
                        $questionpage.= '</div> ';
                        $questionpage.= '<div class="choiceContainer" data-id="'.$q->id.'">';
                        //CHECK IF ANSWER ALREADDY
                        $answer = $q->answer()->where('user_id', $user->id)->first();
                        if($answer){
                            $questionpage.='<div class="row">';
                                $questionpage.='<div class="col s12">';
                                    $questionpage.='<div class="btnBox">';
                                        $questionpage.='<div class="btnBody">';
                                        $questionpage.='You answered '.$answer->choice->choice;
                                        $questionpage.='</div>';
                                    $questionpage.='</div>';
                                $questionpage.='</div>';
                            $questionpage.='</div>';
                        $questionpage.= '</div> ';

                        //check if the follow up answer already
                        $follow_up_answered = $q->choices()->where('follow_id', '!=', 0)->whereExists(function($query) use($user){
                            $query->select('id')
                            ->from('question_user_answers')
                            ->whereRaw('question_user_answers.question_id = question_choices.follow_id')
                            ->where('question_user_answers.user_id', $user->id);
                        })->first();

                    if($follow_up_answered){
                        //CHECK IF 
                        $follow_up_answer = $follow_up_answered->follow_up->answer()->where('user_id', $user->id)->first();
                        if($follow_up_answer){
                             $questionpage.= '<div>';
                                $questionpage .= '<h4>'.$follow_up_answered->follow_up->question.'</h4>';
                                    $questionpage.= '<div class="choiceContainer">';
                                        $questionpage.='You answered '.$follow_up_answer->choice->choice;
                                $questionpage.='</div>';
                            $questionpage.='</div>';
                        }
                        
                     }else{

                        $follow_up = $answer->choice->follow_up;

                        if($follow_up){
                                $questionpage.= '<div class="follow_up_'.$follow_up->id.'">';
                                $questionpage .= '<h4>'.$follow_up->question.'</h4>';
                                    $questionpage.= '<div class="choiceContainer" data-id="'.$follow_up->id.'">';
                                    $questionpage.= '<ul class="questionContainer" data-id="'.$follow_up->id.'">';
                                        foreach($follow_up->choices as $chos) {
                                            $questionpage.='<div class="row">';
                                            $questionpage.='<div class="col s12">';
                                                $questionpage.='<div class="btnBox">';
                                                    $questionpage.='<div class="btnBody">';
                                                    $questionpage.='<a class="waves-effect waves-light btn col s12 chooseAnswer" data-id="'.$chos->id.'" data-response="'.$chos->response.'" >'.$chos->choice.'</a>';
                                                    $questionpage.='</div>';
                                                $questionpage.='</div>';
                                            $questionpage.='</div>';
                                        $questionpage.='</div>';

                                        }
                                    $questionpage.= '</ul>';
                                $questionpage.='</div>';
                            $questionpage.='</div>';


                         }
                     }
                            

                
                        }
                        else 
                        {
                            foreach($q->choices as $c) {

                                $questionpage.='<div class="row">';
                                    $questionpage.='<div class="col s12">';
                                        $questionpage.='<div class="btnBox">';
                                            $questionpage.='<div class="btnBody">';
                                                $questionpage.='<a class="waves-effect waves-light btn col s12 chooseAnswer" data-follow-id="'.$c->follow_id.'" data-id="'.$c->id.'" data-response="'.$c->response.'" >'.$c->choice.'</a>';
                                            $questionpage.='</div>';
                                        $questionpage.='</div>';
                                    $questionpage.='</div>';
                                $questionpage.='</div>';
                            }

                             $questionpage.='</div>';

                            /***************** check the follow-up question *************************/


                            foreach($q->choices as $ch) {

                                if($ch->follow_up){
                                    $questionpage.= '<div class="follow_up follow_up_'.$ch->follow_up->id.'">';
                                    $questionpage .= '<h4>'.$ch->follow_up->question.'</h4>';
                                        $questionpage.= '<div class="choiceContainer" data-id="'.$ch->follow_up->id.'">';
                                        $questionpage.= '<ul class="questionContainer" data-id="'.$ch->follow_up->id.'">';
                                            foreach($ch->follow_up->choices as $cho) {
                                                $questionpage.='<div class="row">';
                                                $questionpage.='<div class="col s12">';
                                                    $questionpage.='<div class="btnBox">';
                                                        $questionpage.='<div class="btnBody">';
                                                        $questionpage.='<a class="waves-effect waves-light btn col s12 chooseAnswer" data-id="'.$cho->id.'" data-response="'.$cho->response.'" >'.$cho->choice.'</a>';
                                                        $questionpage.='</div>';
                                                    $questionpage.='</div>';
                                                $questionpage.='</div>';
                                            $questionpage.='</div>';

                                            }
                                        $questionpage.= '</ul>';
                                    $questionpage.='</div>';
                                $questionpage.='</div>';
                                }
                            }
                        }
                       

                    if(isset($questions[$k+1])){
                        $questionpage.='<button class="waves-effect waves-light btn col s12 app-button" data-target="question_'.$questions[$k+1]->id.'">Next</button>';
                    }

                    
                $questionpage.= '</div>';

            $questionpage.= '</div>';
       
       
            }

            return view('clubhouse.magazine', compact('questions', 'questionpage'));
        }else{

            Abort(404);
        }

     
    }

      public function getChatroomMobile($id = null) {
          $user = $this->user;

        $chatroom = Chat_Room::with('room_messages')->find($id);

        $data = $chatroom->room_messages()->orderBy('created_at','DESC')->take(10)->get();
        


        return json_encode($data);

        // dd($selectedRoom->room_messages);

        //return view('clubhouse/chatroom', compact('user', 'chatrooms', 'unread_messages_count', 'user_notification_count', 'selectedRoom', 'global_notification_count', 'session_id'));
    }

    
    public function paginateChatroom()
    {

        $user = $this->user;
        $chatroom = Chat_Room::with('room_messages')->where('id',Input::get('room_id'))->first();

      /*  $chatroom->room_messages = $chatroom->room_messages()->take(10)->offset(Input::get('page')*10)->orderBy('created_at','DESC')->get();*/

       $data  = $chatroom->room_messages()->skip(Input::get('end'))->take($this->paginate_value)->orderBy('created_at','DESC')->get();

        if(count($data) == 0) {
            //$data['length'] = 0;
            return json_encode(['done' => 1]);
        } 

        return json_encode($data);
 

    }

    public function emailSend() {
    

        $this->_email = Input::get('email');
        if($this->_email == '') {
            return view('clubhouse.login');
        }

        $id = User::findEmail($this->_email);
        if($id) {
                $result = Auth::loginUsingId($id);
                if($result) {
                    //update email_confirm and welcome_package_sent users table
                    $user = User::findOrFail($id);
                    $user->email_confirm = 1;
                    $user->save();
                    //sending email
                    $data = array('name' => "This is Susan Message");
                    Mail::send('emails.welcome', $data, function ($message) {
                        $message->from('susan@susanwins.com', 'Welcome to Susan');
                        //$message->to('galaimaldita@yahoo.com')->subject('Test 101');
                       /* $message->to('marco@nexusbond.com')->subject('Test 101');*/
                        //$message->to('guy@nexusbond.com')->subject('Test 101');
                       //$message->to('kapitbahaykosisuperman@gmail.com')->subject('Test 101');
                        //$message->to('gso8412@gmail.com')->subject('Test 101');
                       //$message->to('roy@nexusbond.com')->subject('Test 101');
                        //$message->to($this->_email)->subject('Test 101');
                    });
                    return redirect('clubhouse/home');

                }
                else {
                     return view('clubhouse.login');
                }      
        }
        //return to login
        else 
        {
            return view('clubhouse.login');
        }

      
    }

    public function sendEmailAweber() {
         
       $email = Auth::user()->email;
        $firstname = Auth::user()->user_detail->firstname;
        $lastname = Auth::user()->user_detail->lastname;
        $full_name = $firstname .' '. $lastname;
        $confirme_value = Auth::user()->email_confirm;

        if($confirme_value == 1) {
            $data = [
                    'confirme_value' => $confirme_value
                ];
            return json_encode($data);

        }
        else {

                $ch = curl_init('http://www.aweber.com/scripts/addlead.pl');
               $fields_string = '';
               $fields = array( 
                               'name' => urlencode($full_name), 
                               'email' => urlencode($email), 
                               'meta_web_form_id' => '2089372002', 
                               'meta_split_id' => '', 
                               'listname' => 'awlist4254968', 
                               'redirect' => '"http://susanwins.com/', 
                               'meta_redirect_onlist' => 'http://susanwins.com/', 
                               'meta_adtracking' => 'Susan_Signup', 
                               'meta_message' => '1'
                               ); 
               foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; } 
               rtrim($fields_string,'&'); 

                curl_setopt($ch,CURLOPT_POST,count($fields)); 
               curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string); 
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
               $returned = curl_exec($ch); 

               $data = [
                    'email' => $email,
                    'full_name' => $full_name,
                    'data' => $returned 
                ];    
            return json_encode($data);

        }
    } 

    public function enterAddress() {


         $user_detail_id = Auth::user()->user_detail->id;

        $user = User::find(Auth::user()->id);
        $user->welcome_package_address = Input::get('address');
        $user->welcome_package_sent = 1;
        $user->save();

        $user_detail = User_Detail::find($user_detail_id);
        $user_detail->address = Input::get('address');
        $user_detail->save();

                
        $data = [
                'test' => 'Hello World',
                'address' => Input::get('address'),
                'user' => $user->id,
                'user_detail_id' => $user_detail_id
            ];

        return json_encode($data);
    }

    public function ignore() {

        $user = User::find(Auth::user()->id);
        $user->ignore_welcome_package = 1;
        $user->save();
        
        $data = ['message' => 'success', 'user' => $user];
        
        return json_encode($data);
    }
   

    

}

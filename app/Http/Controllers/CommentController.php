<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Comment as Comment;
use App\User;
use Illuminate\Support\Facades\Auth as Auth;
use App\User_Notification;
use App\Model\Post;
use App\Model\Category;
use DateTime;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    protected function notifyFriends($comment){

            $friendTags = $comment->friendTags;
            $insertData = array();
            if($friendTags && count($friendTags) > 0){

                
                $datetime = new DateTime();
            $notification_type = 3;
            if($comment->type == 3){
                $notification_type = 5;
            }else if($comment->type == 2){
                $notification_type = 4;
            }

                foreach($friendTags as $friend_id){
                    array_push($insertData, array('user_id' => $comment->user_id, 'friend_id' => $friend_id, 'post_id' => $comment->content_id, 'type' => $notification_type, 'created_at' => $datetime,  'updated_at' => $datetime));
                }

            }

            if(User_Notification::insert($insertData) && count($insertData) > 0){

            $url = url('').':8891/friend_tag_notification';

            $emitData = array();

            if($comment->type == 3){
                $emitData['content'] = Post::find($comment->content_id);
            }else if($comment->type == 2){
                $emitData['content'] = Category::find($comment->content_id);
            }else if($comment->type == 1){
                $emitData['content'] = 'all_games';
            }
            
            $emitData['user'] = User::with('user_detail')->find($comment->user_id);
            $emitData['type'] = $comment->type;
            $emitData['friendTags'] = $friendTags;
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
                    
            }

    }

    public function addComment(Request $request)
    {
        //

        $comment = new Comment();
        $comment->content_id = $request->content_id;
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;
        $comment->type = $request->type;
    
        if($comment->save()){

            $request['id'] = $comment->id;
            $data = User::with('user_detail')->find($request->user_id);
            $request['user'] = User::with('user_detail')->find($request->user_id);
            //dd($data->user_detail->user_id);
            //$request['user']->user_detail->profile_picture = 'user_uploads/user_'.$data->user_detail->user_id.'/'.$data->user_detail->profile_picture;
            //dd($request['user']);
            $comment->friendTags = $request->friendTags;
            $this->notifyFriends($comment);


            return json_encode($request->all());
        }

    }

    public function addReply(Request $request)
    {

        $comment = new Comment();
        $comment->content_id = $request->content_id;
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;
        $comment->parent = $request->parent;
        $comment->type = $request->type;
        if($comment->save()){

              $request['id'] = $comment->id;
              $data = User::with('user_detail')->find($request->user_id);
              $request['user'] = User::with('user_detail')->find($request->user_id);
             // $request['user']->user_detail->profile_picture = 'user_uploads/user_'.$data->user_detail->user_id.'/'.$data->user_detail->profile_picture;
            //dd($request['user']);

            $comment->friendTags = $request->friendTags;
            $this->notifyFriends($comment);
            
            return json_encode($request->all());
        }

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

        echo 'hey';
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
}

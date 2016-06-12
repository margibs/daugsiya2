@extends('clubhouse.layout')


@section('page-title', 'Chat Room')

@section('scripts_here')
<style type="text/css">

.cd-tour-nav,  .fa-smile-o{
  display: none;
}
.friendprofilebox{
left: 33%;
    top: 18%;
}

.bigChatBox{    
    background: rgba(255, 255, 255, 0.92);
    width: 480px;
    height: 660px;
 /*   position: absolute;
    right: -130px;
    top: 60px;*/
    position: absolute;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    padding: 20px 25px;
    top: 17%;
    left: 10%;
}
.bigChatBox .head ul{
  text-align: right;
  padding: 4px 0;
}
.bigChatBox .head ul li{
    display: inline-block;
}
.bigChatBox .head ul li img{
    width: 20px;
    border-radius: 50%;
    margin: 0 -1px;
}
.bigChatBox .head button{
    background: #d12324;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2QxMjMyNCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNiNDBhMGEiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top,  #d12324 0%, #b40a0a 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d12324), color-stop(100%,#b40a0a));
    background: -webkit-linear-gradient(top,  #d12324 0%,#b40a0a 100%);
    background: -o-linear-gradient(top,  #d12324 0%,#b40a0a 100%);
    background: -ms-linear-gradient(top,  #d12324 0%,#b40a0a 100%);
    background: linear-gradient(to bottom,  #d12324 0%,#b40a0a 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d12324', endColorstr='#b40a0a',GradientType=0 );

    float: left;
    border: none;

    border-radius: 50px;
    padding: 8px 17px;
    color: #fff;
    font-family: 'Work Sans';
    font-weight: 500;    
    margin-top: 5px;
    cursor: pointer;

    -moz-box-shadow: 0 0 10px -3px #000;
    -webkit-box-shadow: 0 0 10px -3px #000;
    box-shadow: 0 0 10px -3px #000;

}
.bigChatBox .head button i{
   font-size: 11px;
  margin-left: 5px;
  margin-top: 3px;
  float: right;
}
.bigChatBox .head p{
    font-size: 11px;
    font-family: Roboto;
    color: #c9aea7;
}
.bigChatBox .head p{
  text-align: right;
  margin-top: -8px;
}
.bigChatBox .body{
 padding-top: 12px;
  height: 518px;
  overflow: hidden;
      width: 100%;
}
.bigChatBox .body ul{
    -moz-transition: all 0.5s ease-out;
    -webkit-transition: all 0.5s ease-out;
    transition: all 0.5s ease-out;
}
.bigChatBox .body ul li img{
    width: 100%;
}
.bigChatBox .body  ul li{
  margin-bottom: 7px;
  overflow: hidden;
  display: block;
  padding-bottom: 4px;
  position: relative;
}
.bigChatBox .body  ul li em{
    color: #e8cacb !important;
    font-weight: 400 !important;
    font-size: 11px !important;
    font-style: normal;
    margin-left: 5px !important;
    position: absolute;
    left: 64px;
    top: 10px;
    font-family: Roboto,Helvetica,Arial,sans-serif;
}
.bigChatBox .body  ul li p{
    font-family: Roboto,Helvetica,Arial,sans-serif;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    background: #fff;
    padding: 25px 25px 20px 17px;
    margin-left: 50px;
    border-radius: 50px;
    border: 1px solid #EFECEC;
    word-wrap: break-word;
}
.bigChatBox .footer textarea{
    border: none;
    padding: 8px 50px 8px 10px;
    width: 91%;
    height: 60px;
    border-radius: 5px;
    position: absolute;
    bottom: 18px;
    left: 20px;
    font-family: 'Work Sans';
    font-size: 14px;
    font-weight: 500;
    min-height: 60px;
    -moz-box-shadow: 0 0 7px -3px #D8D8D8;
    -webkit-box-shadow: 0 0 7px -3px #D8D8D8;
    box-shadow: 0 0 7px -3px #D8D8D8;
    border: 1px solid #d8d8d8;
/*    padding-right: 80px;*/

}
.bigChatBox .footer .triggers{
    position: absolute;
    bottom: 30px;
    right: 34px;
    z-index: 2;
    background: #ECB91C;
    border-radius: 50%;
    padding: 8px;
    -moz-box-shadow: 0 0 10px -4px #000;
    -webkit-box-shadow: 0 0 10px -4px #000;
    box-shadow: 0 0 10px -4px #000;
}
.bigChatBox .footer .triggers i{
      font-size: 20px;
    margin-left: 0px;
    color: #FFF8F8;
    cursor: pointer;
    position: relative;
    left: -1px;
}
.bigChatBox .footer .arrow_box{
    right: -155px;
    z-index: 101;
}

.bigChatBox .footer #tooltip{
    z-index: 100;
    right: -145px;
    position: relative;
}

.bigChatBox .footer textarea::-webkit-input-placeholder {
   font-weight: 400
}

.bigChatBox .footer textarea:-moz-placeholder { /* Firefox 18- */
   font-weight: 400
}

.bigChatBox .footer textarea::-moz-placeholder {  /* Firefox 19+ */
   font-weight: 400  
}

.bigChatBox .footer textarea:-ms-input-placeholder {  
   font-weight: 400
}
.friendlist{
/*  position: absolute;
  left: -120px;
  width: 65px;*/
    margin-top: 70px;
    position: relative;
    left: -130px;
}
.friendlist ul li {
  position: relative;
  margin-bottom: 10px;
  cursor: pointer;
}
.friendlist ul li span{
    background: red;
    border-radius: 50%;
    padding: 2px 3px;
    color: #fff;
    font-weight: 600;
    font-family: 'Work Sans';
    top: -5px;
    position: absolute;
    left: 35px;
    width: 17px;
    text-align: center;
}
.friendlist ul li img{
    width: 50px;
    border-radius: 50%;
}
#roombg{position: relative;}

@media(max-width: 1680px){
  .bigChatBox {
      left: 159px;
          top: 150px;
  }
  .bigChatBox .footer textarea{
    padding: 10px 50px 8px 15px;
    width: 91%;
    height: 70px;
        font-size: 18px;
  }
}
@media(max-width: 1440px){
  #roombg{
     top: 0;
     left: 0;
  }
  .bigChatBox{
    left: 189px;
    top: 134px;
    height: 600px;
  }
  .bigChatBox .footer #tooltip {
    top: -195px;
  }
  .bigChatBox .footer .arrow_box{
    top: 26px;
  }
  .friendprofilebox {
    top: 20%;
  }
}

@media(max-width: 1366px){
  
  #roombg{
     top: -70px;
     left: -30px;
    width: 115%;
  }
  .bigChatBox{
    width: 420px;
    height: 470px;
    position: absolute;
left: 70px;
    top: 150px;
  }
  .friendprofilebox{
    top: 21%;
    left: 463px;
    z-index: 2;
   }
   #pmBox{
    top: 12%!important;
   }
} 

@media(max-width: 1280px){
  #roombg {
    top: -70px;
    left: -30px;
    width: 129%;
  }
  .bigChatBox{
    top: 150px;
    height: 460px
  }
}

@media(max-width: 1024px){
#roombg {
    top: -70px;
    left: -120px;
    width: 155%;
}
}


.roomListContainer{
    position: relative;
    width: 167px;
    float: left;
}

.roomListContainer .roomList{
    position: absolute;
    top: 33px;
    margin-left: 9px;
    background: #d12324;
    z-index: 2;
    width: 164px;
    border-radius: 4px;
    display: none;
}

.roomListContainer .roomList li{
        float: left;
}

.roomListContainer .roomList li a{  
    color: #fff;
    padding: 5px 10px;
    display: block;
    font-family: Roboto;
    text-decoration: none;
    font-size: 14px;
    text-align: center;
    width: 100%;
}

.roomListContainer .roomList li a:visited,
.roomListContainer .roomList li a:hover,
.roomListContainer .roomList li a:active
{
  color:#fff;
}
#profileBtn{
    position: absolute;
    bottom: -13px;
    left: 20px;

}
#profileBtn button{
    border-radius: 50px;
    background: #FF8315;
    border: none;
    padding: 8px 22px;
    color: #fff;
    font-family: Roboto;
    font-weight: 600;
    cursor: pointer;
}
#privateMessageTextarea{
    min-height: 65px!important;
    height: 65px!important;
}
.msgImgcont{
  width: 40px;
  height: 40px;
  float: left;
  border-radius: 50%;
}
</style>

@endsection


@section('user-options')

          <!-- <div class="profileBox">
           <div class="arrow_box"></div>
            <ul>
              <li> <a href=""> <i class="fa fa-user"></i> Profile </a> </li>
              <li> <a href=""> <i class="fa fa-comment"></i> Chat </a> </li>
              <li> <a href=""> <i class="fa fa-gift"></i> Prize </a> </li>
              <li> <a href=""> <i class="fa fa-ticket"></i> Slots </a> </li>
              <li> <a href=""> <i class="fa fa-sign-out"></i> Logout </a> </li>
            </ul>
          </div>

          <div class="messageBox">
           <div class="arrow_box"></div>
            <ul id="myMessages">
            </ul>
            <a href="#" class="viewAll"> View All </a>
          </div>

          <div class="messageBox notificationBox">
           <div class="arrow_box"></div>
            <ul id="myNotifications">
            </ul>
            <a href="#" class="viewAll"> View All </a>
          </div>


          <ul class="topicons">
            <li> <a href="#"> <img src="img/assets/susan-club-icon.png" alt="Susan's Club" /> </a> </li>
            <li> <a href="#" id="userMenu"> <img src="img/assets/user-icon.png" alt="User" /> </a> </li>
            <li> <a href="#" id="messagesMenu"> 
            
            <span id="unreadMessageNotification">
              @if($unread_messages_count > 0)
                <span class="notifcount">{{ $unread_messages_count }}</span>
              @endif
            </span>
            
            

             <img src="img/assets/message-icon.png" alt="Messages" /> </a> </li>
            <li> <a href="#" id="notificationMenu"> 
              

              <img src="img/assets/notif-icon.png" alt="Notifications" /> </a> </li>
            <li style="margin-right: 6px;"> <a href="#"> <img src="img/assets/key-icon.png" alt="Login/Signup" /> </a> </li>
          </ul> -->
@endsection


@section('background-content')

<!-- 
<input type="hidden" value="{{ $user->id }}" id="userId" data-image="{{ $user->user_detail->profile_picture }}" data-name="{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}">
<div class="container background-container" style="width: 1280px !important; margin-top: 40px; padding:0">
  <img src="{{ asset('clubhouse/img/assets/livingroom.png') }}" class="background-image interactiveBackground" alt="">
  
  <div class="bigChatBox interactiveObj" top="4%" left="4%">
          <div class="head">
              <div class="roomListContainer">
                <button id="roomListBtn"> <span id="roomDetails" 
                
                @if($chatrooms && count($chatrooms) > 0)
                      data-id="{{ $chatrooms[0]->id }}" data-name="{{ $chatrooms[0]->name }}" data-description="{{ $chatrooms[0]->description }}"
                @endif
                >
                  
                  @if($chatrooms && count($chatrooms) > 0)
            {{ $chatrooms[0]->name }}
                  @endif
                </span> <i class="fa fa-chevron-down"></i> </button>
                <ul class="roomList">

                  @foreach($chatrooms as $room)
              <li><a href="javascript:;" data-name="{{ $room->name }}" data-description="{{ $room->description }}" data-id="{{ $room->id }}">{{ $room->name }}</a></li>
                  @endforeach
                  
                </ul>
              </div>
              <p>
                <span id="chatPopulation"></span>
                <ul id="peopleList">
                 
                </ul>
              </p>
          </div>
          <div class="chatContainer">
              <div class="divContainer">
                <div class="body">
                  <ul class="child" id="messageContent">
              
            @if($chatrooms && count($chatrooms) > 0)
              
              @foreach($chatrooms[0]->room_messages as $msg)
                <li data-user="{{ $msg->user->user_detail->user_id }}"> 
                      <a href="javascript:;" data-target="#friendProfile" class="subModalToggle viewFriendProfile">
                          
                          <img src="{{ $msg->user->user_detail->profile_picture ? asset('').'/'.$msg->user->user_detail->profile_picture : asset('/images/default_profile_picture.png') }}" />
                           </a>
                          <p> {{ $msg->message }} </p>

                     
                      </li>

              @endforeach
            @endif
                  </ul>
                </div>
                <div class="theFooter">
                    <div class="arrow_box" style="display:none;"></div>  
                    <div id="tooltip" style="display:none;">

                      <ul>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                      </ul>

                      </div>

                    <div class="triggers">
                      
                      <i class="fa fa-smile-o emojiTrigger"></i>
                      <i class="fa fa-paper-plane"></i>
                    </div>
                    <form id="chatMessageForm" action="{{ url('chatroom/postMessage') }}">
                      <textarea id="chatRoomTextarea" class="chatCommon" placeholder="Type Message" disabled="disabled"></textarea>
                    </form>
                    
                </div>
              </div>
          </div>
      </div>

  <div class="interactiveObj parentModal" style="position:absolute; width:795px" top="4%" left="41%">
        


    <div class="friendProfile modal-popup" id="friendProfile">
      <div class="divContainer">
          
          <div class="imgContainer">
              <span> <a href="#" class="add"> <i class="fa fa-plus"></i> </a> </span>
              <span> <a href="#" class="block"> <i class="fa fa-ban"></i> </a> </span>
              <span id="pm-user"> <a href="#" class="message"> <i class="fa fa-comment" style="font-size: 16px;  position: relative;  top: -1px;"></i> </a> </span>
              <img src="https://s3.amazonaws.com/uifaces/faces/twitter/whale/128.jpg" id="viewFriendProfilePic">
              <h6 id="viewFriendProfileName"> Samantha Wilson </h6>
              
              <div id="profileBtn">
              </div>

              </div>
              <p> Favorite Games  </p>
              <div class="favegames">
                <span class="ellipsis"> <i class="fa fa-ellipsis-h"></i><a href=" "></a></span>
                <ul id="profileFavorites">
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
                </ul>
              </div>
              <p> Games Played with their rating  </p>
              <div class="favegames">
                <ul id="profilePlayedGames">
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
                  <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
                </ul>
              </div>
              <p> Interview  </p>
              <div class="interviewBox">
                <div>
                  <p class="question"> We've heard you're great company to be around – but when you're socialising what's your drink of choice? </p>
                  <p class="answer"> Spirit & Mixer </p>
                </div>
              </div>

      </div>



        </div>

        <div class="pmBox modal-popup" id="pmBox" style="margin-left: 6px;">        
          <div class="divContainer">
            <div class="header"></div>
              <div class="body">
                <h2> <span class="online"></span> <b id="pmName">Syndey Winchester </b> </h2>
                <ul class="messagesContent" id="pmMessageContent">
                </ul>
              </div>
              <div class="pmFooter">
                    <div class="arrow_box" style="display:none;"></div>  
                    <div id="tooltip" style="display:none;">

                      <ul>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                      </ul>

                      </div>

                    <div class="triggers">
                      
                      <i class="fa fa-smile-o emojiTrigger"></i>
                      <i class="fa fa-paper-plane"></i>
                    </div>
                    <form id="sendPrivateMessage">
                        <textarea id="privateMessageTextarea" class="chatCommon txtstuff" placeholder="Type Message" style="height:58px"></textarea>
                    </form>
                </div>
            </div>
      </div>
      
        </div> -->


<div class="roomNavIcons">
  <ul>
    <li> <a href="{{ url('/clubhouse/profile')}}"> <img src="http://susanwins.com/images/clubhouse/profileroom-thumb.gif" alt="" title="Profile Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/slotsroom')}}"> <img src="http://susanwins.com/images/clubhouse/slotsroom-thumb.gif" alt="" title="Slots Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/chatroom')}}"> <img src="http://susanwins.com/images/clubhouse/chatroom-thumb.gif" alt="" title="Chatroom Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/prizeroom')}}"> <img src="http://susanwins.com/images/clubhouse/prizeround.png" alt="" title="Prize Room">  </a> </li>
  </ul>
</div>
  @if(!$user->completed_chatroom_tour)

  @section('guide-susan')
    <div class="guideSusanContainer">
    <img src="{{url('images')}}/guide-susan.png" class="guide-susan">
</div>
  @endsection

  <ul class="cd-tour-wrapper chatroomPage">
    <li class="cd-single-step no-pulse">

      <div class="cd-more-info">
        <h2> World Famous Susan's Chatroom  </h2>
        <p> This is THE place to hang out online, meet likeminded people, have a laugh and let your hair down. <br /> <br />All chats are fully hosted and moderated by my team, only nice people allowed! </p>
        <img src="img/step-1.png" alt="step 1">
      </div>
    </li> <!-- .cd-single-step -->


  </ul> <!-- .cd-tour-wrapper -->

  @endif

        <div class="bgwrapper">
      <img id="roombg" src="{{url('images/clubhouse')}}/chatroom.jpg" alt="">  

      <div class="container background-container" style="width: 1280px !important; margin-top: 40px; padding:0">

  
       <div class="bigChatBox interactiveObj" top="4%" left="4%">
          <div class="head">
              <div class="roomListContainer">
                <button id="roomListBtn"> <span id="roomDetails" 

                @if($selectedRoom)
                      data-id="{{ $selectedRoom->id }}" data-name="{{ $selectedRoom->name }}" data-description="{{ $selectedRoom->description }}"
                @endif
                >
                  
                  @if($selectedRoom)
            {{ $selectedRoom->name }}
                  @endif
                </span> <i class="fa fa-chevron-down"></i> </button>
                <ul class="roomList">

                  @foreach($chatrooms as $room)
              <li><a href="javascript:;" data-href="{{ url('clubhouse/chatroom') }}/{{$room->name}}" data-name="{{ $room->name }}" data-description="{{ $room->description }}" data-id="{{ $room->id }}">{{ $room->name }}</a></li>
                  @endforeach
                  
                </ul>
              </div>
              
                <p> <span id="chatPopulation"></span> users are talking right now  </p>
                <ul id="peopleList" style="height:30px;"> </ul>
             
          </div>
          <div class="chatContainer">
              <div class="divContainer">
                <div class="body">
                 <ul class="child" id="messageContent">
            @if($selectedRoom)
              
              @foreach($selectedRoom->room_messages as $msg)
                <li data-user="{{ $msg->user->user_detail->user_id }}"> 
                      <a href="javascript:;" data-target="#friendProfile" class="subModalToggle viewFriendProfile">
                          
                          <div class="msgImgcont">
                               
                                  <!-- <img src="{{ $msg->user->user_detail->profile_picture ? asset('').'/'.$msg->user->user_detail->profile_picture : asset('/images/default_profile_picture.png') }}" /> -->
                                 <!--  @if($msg->user->user_detail->profile_picture == '')
                                     <img src ="{{asset('user_uploads')}}/default_image/default_01.png" > 
                                 @else
                                     <img src ="{{asset('user_uploads')}}/user_{{$msg->user->id}}/{{$msg->user->user_detail->profile_picture }}" > 
                                  @endif -->

                                     <img src ="{{ $msg->user->user_detail->userPicture5050() }}" >


                              </div>
                           </a>
                         <!--  <p> {{ $msg->message }} </p> -->
                         <!--   <p>{!! str_contains($msg->message, '.com') ? "<a href=' $msg->message '>$msg->message</a>"  : $msg->message !!} </p> -->
                          <em>{{ $msg->user->user_detail->fullName() }}</em>
                            <!--  <span class="timestamp" data-datetime="{{ $msg->created_at }}"><span class="livetime"></span></span> -->
                         <!--  <p>{!! str_contains($msg->message, '.com') ? "<a target='_blank' href=' $msg->message ' style='text-decoration: none;'>$msg->message</a>"  : $msg->message !!} 
                         </p> -->

                           <p>{!! str_contains($msg->message, '.com') ? "<a target='_blank' href=' $msg->message ' style='text-decoration: none;'>$msg->message</a>"  : $msg->message !!} 
                           <dev class="timestamp" data-datetime="{{ $msg->created_at }}"><dev class="livetime"></dev></dev>
                          </p>




                     
                      </li>

              @endforeach
            @endif
                  </ul>
                </div>
                <div class="theFooter footer">
                    <div class="arrow_box" style="display:none;"></div>  
                    <div id="tooltip" style="display:none;">

                      <ul>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                          <li> <img src="http://hassankhan.me/emojify.js/images/emoji/grin.png"> </li>
                      </ul>

                      </div>

                    <div class="triggers">
                      
                      <i class="fa fa-smile-o emojiTrigger"></i>
                      <i class="fa fa-paper-plane" id="submitChatMessageButton"></i>
                    </div>
                    <form id="chatMessageForm" action="{{ url('chatroom/postMessage') }}">
                      <textarea id="chatRoomTextarea" class="chatCommon" placeholder="Type Message" disabled="disabled"></textarea>
                    </form>
                    
                </div>
              </div>
          </div>
       </div>

       <div class="friendprofilebox">
        <div class="friendProfile" id="friendProfile">
            <div class="divContainer">
                
                <div class="imgContainer">
                    <i class="fa fa-times"></i> 
            <!--         <span> <a class="add"> <i class="fa fa-ban"></i> </a> </span> -->
                    <!-- <span> <a class="block"> <i class="fa fa-ban"></i> </a> </span> -->
                    <span id="pm-user"> <a class="message"> <i class="fa fa-comment" style="position: relative;   top:9px;"></i> </a> </span>
                    <div class="msgImgcont">
                      <img src="https://s3.amazonaws.com/uifaces/faces/twitter/whale/128.jpg" id="viewFriendProfilePic">
                    </div>
                    <h6 id="viewFriendProfileName"> Samantha Wilson </h6>
                    
                    <div id="profileBtn">
                    </div>

                </div>
                  <div class="moredetailsbox">
                      <p> Favorite Games  </p>
                      <div class="favegames">
                        <span class="ellipsis"> <i class="fa fa-ellipsis-h"></i><a href=" "></a></span>
                        <ul id="profileFavorites">
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
                        </ul>
                      </div>
                      <p> Games Played with their rating  </p>
                      <div class="favegames">
                        <ul id="profilePlayedGames">
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
                          <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
                        </ul>
                      </div>
                    <!--   <p> Interview  </p>
                      <div class="interviewBox">
                        <div>
                          <p class="question"> We've heard you're great company to be around – but when you're socialising what's your drink of choice? </p>
                          <p class="answer"> Spirit & Mixer </p>
                        </div>
                      </div> -->
                  </div>
            </div>
        </div>
      </div>


</div>

   
@endsection

@section('custom_scripts')
<script src="{{ asset('js/sockets.io.js') }}"></script>
<script type="text/javascript">

  
  $('.imgContainer .fa-times').click(function() {        
     $(".friendProfile ").fadeToggle('fast');
  });
 /* $('.msgImgcont img').click(function() {        
     $(".friendProfile ").fadeToggle('fast');
  });*/


   $(document).ready(function(){

      var userId = $('#userId').val();
   var userImage = $('#userId').data('image');
   var userName = $('#userId').data('name');
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var chatroomUrl = '{{ url("chatroom") }}';
   var publicUrl = '{{ asset("") }}';
   var profileUrl = '{{ url("profile") }}';
   var friendUrl = '{{ url("friends") }}';
   var imageUrl = '{{ asset("uploads") }}';
   var messageUrl = '{{ url("message") }}';
   var sessionUrl = '{{ url("session") }}';
   var defaultProfilePic = publicUrl+'/user_uploads/default_image/default_01.png';
    


   FULL_NAME = "{{ Auth::user()->user_detail->fullName() ? Auth::user()->user_detail->fullName() : ''  }}";
   
  timeZone = 'Europe/London';
  $('.timestamp').each(function(){
      timestamp = this;
      datetime = $(timestamp).data('datetime');
      $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
      $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
  });
    

    last_room_id = $('#roomDetails').data('id');
    last_room_name = $('#roomDetails').data('name');
    last_room_description = $('#roomDetails').data('description');

   socket.on('display_people', function(data){

    console.log('display_people');
    console.log(data);

    $('#chatPopulation').text(data.length);
    $('#peopleList').html('');
    $.each(data, function(){
      console.log(this.profile_picture);
      $('#peopleList')
        .append(
          $('<li>') 
            .append(
              //$('<img>').attr('src', this.profile_picture ? publicUrl+'/'+this.profile_picture : defaultProfilePic )
               $('<img>').attr('src', getImage(this.profile_picture, this.user_id, 2020) )

              )
          )
    });

   });

   socket.on('room_connected', function(banned){

      if(banned && userId == banned.user_id && $('#roomDetails').attr('data-id') == banned.room_id){
        $('#chatRoomTextarea').initBan(banned.time);

      }else{
        $('#chatRoomTextarea').removeAttr('disabled').attr('placeholder', 'Type Message');
      }

   });

  socket.on('disconnect', function(){
    $('#chatRoomTextarea').attr('placeholder', 'Disconnected from Server. Reconnecting...').attr('disabled', 'disabled');
  });


   $('#roomListBtn').on('click', function(){
    $('.roomList').slideToggle();
   });





   socket.on('user_banned', function(data, room_id){
      if(data.user_id == userId && $('#roomDetails').attr('data-id') == room_id ){
        $('#chatRoomTextarea').initBan(data.time);

      }

   });


   socket.on('lift_ban', function(user_id, room_id){
      console.log('lift_ban');
      console.log(user_id);
      console.log(room_id);
      if(user_id == userId && $('#roomDetails').attr('data-id') == room_id ){
        
        clearInterval($('#chatRoomTextarea').data('time_interval'));
        $('#chatRoomTextarea').attr('placeholder', 'Type Message').removeAttr('disabled');

      }

   });


   $.fn.initBan = function(time){

        function millisToMinutesAndSeconds(millis) {
          var minutes = Math.floor(millis / 60000);
          var seconds = ((millis % 60000) / 1000).toFixed(0);
          return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
        }

        function countRemaining(input){

          remaining_time = $(input).data('remaining_time');

          remaining_time = remaining_time - 1000;

          if(remaining_time > 0){

            $(input).data('remaining_time', remaining_time);
            $(input).removeData('remaining_time').data('remaining_time', remaining_time);
             $(input).attr('placeholder' ,'Banned for '+millisToMinutesAndSeconds(remaining_time)).attr('disabled', 'disabled');

          }else{
            clearInterval($(input).data('time_interval'));
            $(input).attr('placeholder', 'Type Message').removeAttr('disabled');
          }

          

        }

        return this.each(function(){

          input = this;

          $(input).attr('disabled', 'disabled');

          $(input).removeData('remaining_time').data('remaining_time', time);

          $(input).attr('placeholder' ,'Banned for '+millisToMinutesAndSeconds(time));

          if($(input).data('time_interval')){

            clearInterval($(input).data('time_interval'));

          }

          $(input).data('time_interval', 

            setInterval(countRemaining, 1000, input)

            )



        });

      }

   

   $('#profileBtn').on('click', 'button', function(){

    other_person = $(this).data('other_person');
    action = $(this).data('action');
    friend_id = $(this).data('friend_id');

    $(this).attr('disabled', 'disabled');

    //alert('i want to '+action+' person '+other_person+'using friend_id '+friend_id);

    if(action){

        if(other_person && action == 1){

          addFriend(other_person);
        }else if(action == 2 && friend_id && other_person){
          cancelFriendRequest(friend_id, other_person);
        }else if(action == 3 && friend_id && other_person){
          acceptFriendRequest(friend_id, other_person);
        }else if(action == 4 && friend_id && other_person){
          unFriend(friend_id, other_person);
        }


    }


   });

    function initializeDate() {

          timeZone = 'Europe/London';
      
      $('.timestamp').each(function(){
          timestamp = this;
          datetime = $(timestamp).data('datetime');
          $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
          $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
      });

   }

   function unFriend(friend_id, other_person){
      $.ajax({

            url : friendUrl+'/unFriend',
            data : { id : friend_id , _token : CSRF_TOKEN },
            type : 'POST',
            dataType : 'json',
            success : function(data){

              new_button = $('<button>').data('action', 1).data('other_person', other_person).text('Add Friend');

              $('#profileBtn').find('button').replaceWith(new_button);

            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });
   }

   function acceptFriendRequest(friend_id, other_person){
          
          $.ajax({

            url : friendUrl+'/acceptFriendRequest',
            data : { id : friend_id , _token : CSRF_TOKEN },
            type : 'POST',
            dataType : 'json',
            success : function(data){

              if(data){
                socket.emit('friend_request_accepted', { other_person : other_person });
              }

              new_button = $('<button>').data('action', 4).data('other_person', other_person).data('friend_id', friend_id).text('Unfriend');

              $('#profileBtn').find('button').replaceWith(new_button);

            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });

   }

   function cancelFriendRequest(friend_id, other_person){

      $.ajax({

          url : friendUrl+'/cancelFriendRequest',
          data : { id : friend_id, _token : CSRF_TOKEN },
          type : 'POST',
          dataType : 'json',
          success : function(deleted){
              
             new_button = $('<button>').data('action', 1).data('other_person', other_person).text('Add Friend');

            $('#profileBtn').find('button').replaceWith(new_button);

          },error : function(xhr){
            console.log(xhr.responseText);
          }

      });

   }


   function addFriend(other_person){
      console.log(' add this friend '+other_person);

      $.ajax({

          url : friendUrl+'/addFriend',
          data : { user_id : userId, friend_id : other_person, _token : CSRF_TOKEN },
          type : 'POST',
          dataType : 'json',
          success : function(data){
            console.log(data);

            new_button = $('<button>').data('action', 2).data('other_person', other_person).data('friend_id', data.id).text('Cancel Friend Request');
             socket.emit('send_addFriend_request', { from : userId, to : other_person, id : data.id });
            $('#profileBtn').find('button').replaceWith(new_button);

          },error : function(xhr){
            console.log(xhr.responseText);
          }

      });
   }


   $(document).on('click','.viewFriendProfile', function(){

          modal = $('#friendProfile');

          if(!modal.hasClass('loading')){

            $(modal).addClass('loading');
            theUser = $(this).parent().data('user');
              $(modal).fadeIn('fast');
            $(modal).find('.divContainer').hide();
            loading = $('<div>').addClass('loadContainer').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>');
            $(modal).append(loading);
            $('#profileFavorites').html('');
            $('#profilePlayedGames').html('');
            $('#profileBtn').html('');

            $.ajax({
              url : profileUrl+'/viewFriendProfile',
              data : { user_id : userId, other_person : theUser, _token : CSRF_TOKEN },
              dataType : 'json',
              type : 'POST',
              success : function(data){
                console.log(data);
                  $(modal).find('.divContainer').show();
                  $(loading).remove();
                  modal.removeClass('loading');
                  //$('#viewFriendProfilePic').attr('src', data.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+data.user_detail.user_id+'/'+data.user_detail.profile_picture : defaultProfilePic  )
                  $("#viewFriendProfilePic").attr('src', getImage(data.user_detail.profile_picture, data.user_detail.user_id, null))
                  $('#viewFriendProfileName').text(data.user_detail.firstname+' '+data.user_detail.lastname);

                  $('#pm-user').data('user', data.user_detail.user_id).find('.message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox').attr('data-user', theUser);

                  relation = data.friend.relation;
                  friend_id = data.friend.friend_id;

                  if(relation != 2){

                    actionBtn = $('<button type="button">').data('other_person', theUser);

                    if(relation != 1){
                        $(actionBtn).data('friend_id', friend_id);
                    }

                    if(relation == 1){
                      $(actionBtn).text('Add Friend').data('action', 1);
                    }else if(relation == 3){
                      $(actionBtn).text('Cancel Friend Request').data('action', 2);
                    }else if(relation == 4){
                      $(actionBtn).text('Accept Friend Request').data('action', 3);
                    }else if(relation == 5){
                      $(actionBtn).text('Unfriend').data('action', 4);
                    }

                    $('#profileBtn').append(actionBtn);

                  };

                  $.each(data.favorites, function(){
                     $('#profileFavorites')
                        .append(
                          $('<li>')
                            .append(
                              $('<a href="#">')
                                .append(
                                    $('<img>').attr('src', imageUrl+'/'+this['icon_feature_image'])
                                  )
                              )
                                
                          )
                  });
                  
                  $.each(data.played_games, function(){
                     $('#profilePlayedGames')
                        .append(
                          $('<li>')
                            .append(
                              $('<a href="#">')
                                .append(
                                    $('<img>').attr('src', imageUrl+'/'+this['icon_feature_image'])
                                  )
                              )
                                
                          )
                  });


              },error : function(xhr){
                console.log(xhr.responseText);
              }
            });
          }     

      });

  /*  function getImage(data, size) {

      if(size === null) {
          return data.user.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+data.user.user_detail.user_id+'/'+data.user.user_detail.profile_picture : defaultProfilePic;  
      }
      return  data.user.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+data.user.user_detail.user_id+'/'+size+'/'+data.user.user_detail.profile_picture : defaultProfilePic;
    }*/


      /********************** START GET IMAGE ******************************************************************************/
    function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
    }

  /********************** END GET IMAGE ******************************************************************************/




  function changeChatroom(data){

    console.log('changeChatroom');
    console.log(data);

    loading = $('<div>').addClass('loading').text('loading');

    $('.chatContainer').find('.divContainer').hide();
    $('.chatContainer').find('.loading').remove();
    $('.chatContainer').prepend(loading);
    $('#chatRoomTextarea').attr('disabled', 'disabled');

    $.ajax({
      url : chatroomUrl+'/getChatroom',
      data : { room_id : data.room_id , _token : CSRF_TOKEN },
      type : 'POST',
      dataType : 'json',
      success : function(response){
      
        $('#messageContent').html('');
        $('.chatContainer').find('.divContainer').show();
        $('.chatContainer').find('.loading').remove();
        socket.emit('change_room', data );

       /* $('<a href="javascript:;>"').attr('data-target', '#friendProfile').addClass('subModalToggle viewFriendProfile')*/

        $.each(response.room_messages, function(){
          $('#messageContent').append(
            $('<li>').attr('data-user', this.user.user_detail.user_id)
              .append(
                $('<a href="javascript:;">').attr('data-target', '#friendProfile').addClass('subModalToggle viewFriendProfile')
                  .append(
                      $('<div>').addClass('msgImgcont')
                          .append(
                           /* $('<img>').attr('src', this.user.user_detail.profile_picture ? publicUrl+'/'+this.user.user_detail.profile_picture : defaultProfilePic )*/
                          //$('<img>').attr('src', getImageAppend(this , 2020) )
                          //first modefied
                        /*   $('<img>').attr('src', this.user.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+this.user.user_detail.user_id+'/5050/'+this.user.user_detail.profile_picture : defaultProfilePic )*/
                         //$('<img>').attr('src', getImage(this , 5050) )
                           $('<img>').attr('src', getImage(this.user.user_detail.profile_picture, this.user.user_detail.user_id, 5050) )
                           
                           
                           
                          )
                    )
                  
                )
            
              .append(
                $('<em>').text(this.user.user_detail.firstname+' '+this.user.user_detail.lastname)
                )
              .append(
                //$('<p>').text(this.message)
               // messageChecker(this.message)
                messageChecker(this.message, this.updated_at)
              )
            )

        });

        $('#chatRoomTextarea').removeAttr('disabled');
          initializeDate();


      },error : function(xhr){
        console.log(xhr.responseText);
      } 
    });

   }

   $('.roomList').on('click', 'a', function(e){

    newUrl = $(this).data('href');

    window.history.pushState({}, null, newUrl);

    /*window.history.pushState(newUrl);*/

    room_id = $(this).data('id');
    room_name = $(this).data('name');
    room_description = $(this).data('description');
    console.log('change to '+room_id);

    if(last_room_id != room_id){
      last_room_id = room_id;

      changeChatroom({ room_id : room_id, name : room_name, description : room_description });
      name = $(this).text();
      $('#roomDetails').attr('data-id', room_id).attr('data-name', room_name).attr('data-description', room_description).text(name);
      $('.roomList').slideToggle();
    }
    
   });

   $('#submitChatMessageButton').on('click', function(){
        $('#chatMessageForm').submit();
   });

     function messageChecker(message, updated_at) {
      result = message.indexOf(".com");
      image = message.indexOf(".jpg");

      if(result != -1) {
         // console.log(true);
          return "<p><a target='_blank' href='"+message+"' style='text-decoration: none;'>"+message+"</a><dev class='timestamp' data-datetime='"+updated_at+"'><dev class='livetime'></dev></dev></p>";
      }
      else {
          //console.log(false);
          return "<p>"+message+"<dev class='timestamp' data-datetime='"+updated_at+"'><dev class='livetime'></dev></dev></p>";
      }
     
    }


    $('#chatMessageForm').on('submit', function(e){

    e.preventDefault();

    message = $('#chatRoomTextarea').val();

    $('#chatRoomTextarea').val('');

    room_id = $('#roomDetails').attr('data-id');

    url = $(this).attr('action');

    if(userId && message && url){

      $('#messageContent')
        .append(
          $('<li>').attr('data-user', userId)

            .append(
              $('<a href="javascript:;">').attr('data-target', '#friendProfile').addClass('subModalToggle viewFriendProfile')
                  .append(
                    $('<div>').addClass('msgImgcont')

                      .append(
                        //$('<img>').attr('src', userImage ? publicUrl+'/'+userImage : defaultProfilePic )
                        $('<img>').attr('src', getImage(userImage, userId, 5050) )
                      )
                    )
              )
           /* .append($('<span></span>').addClass('timestamp').livestamp(moment.tz(this.created_at, timeZone).format() ))*/
            .append(
              $('<em>').text(FULL_NAME)
            )               
            .append(
              //$('<p>').text(message)
               messageChecker(message, Date.now())
              )
          )

        $('#messageContent').animate({
              scrollTop: $('#messageContent')[0].scrollHeight
          }, 500);

      $.ajax({
        url : url,
        type : 'POST',
        data : { user_id : userId , message : message, room_id : room_id , _token : CSRF_TOKEN },
        dataType : 'json',
        success : function(data){
          socket.emit('send_chatroom_message', room_id, message );


        },error : function(xhr){
          console.log(xhr.responseText);
        }
      });
        initializeDate();


    }

   });

    socket.on('post_chatroom_message', function(data){

      current_room_id = $('#roomDetails').attr('data-id');
      if(current_room_id == data.room_id){

        $('#messageContent')
        .append(
          $('<li>').attr('data-user', data.user.user_id)

            .append(
              $('<a href="javascript:;">').attr('data-target', '#friendProfile').addClass('subModalToggle viewFriendProfile')

                .append(

                  $('<div>').addClass('msgImgcont')
                    .append(
                      //$('<img>').attr('src', data.user.profile_picture ? publicUrl+'/'+data.user.profile_picture : defaultProfilePic )
                      $('<img>').attr('src', getImage(data.user.profile_picture, data.user.user_id, 5050) )
                    )
                  )
                
              )
            .append(
              $('<em>').text(data.user.name)
            )
            .append(
              //$('<p>').text(data.message)
               messageChecker(data.message, Date.now())
              )
          )

        $('#messageContent').animate({
              scrollTop: $('#messageContent')[0].scrollHeight
          }, 500);
      }

        initializeDate();


 
    });

      var w = window.innerWidth;
    
       
       if(w == 1440) {
         $('.bigChatBox .body ul').slimScroll({
             height: '450px',
             start: 'bottom'
         });
       }
       else if(w == 1366) {
           $('.bigChatBox .body ul').slimScroll({
             height: '318px',
             start: 'bottom'
         });
       }
       else if(w == 1280) {
         $('.bigChatBox .body ul').slimScroll({
             height: '303px',
             start: 'bottom'
         });
       }
       else if(w == 1024) {
         $('.bigChatBox .body ul').slimScroll({
             height: '303px',
             start: 'bottom'
         });
       }
       else {
            $('.bigChatBox .body ul').slimScroll({
             height: '523px',
             start: 'bottom'
         });
       }
          
      


        // $('.bigChatBox .body ul').slimScroll({
        //     height: '518px',
        //     start: 'bottom'
        // });

           $('#messageContent').animate({
            scrollTop: $('#messageContent')[0].scrollHeight
           }, 500);

           var get_message_page = 1;
                no_more_message = 1;

          function toTitleCase(str)
          {
              return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
          }
           $('#messageContent').on('scroll', function() {
                var scrollTop = $(this).scrollTop(),
                    room_id = $('#roomDetails').attr('data-id');

                if(scrollTop == 0 && no_more_message == 1)
                {
                  $('#messageContent .messageContentLoader').css("display","block");
                  $.ajax({
                    url : '{{url()}}/test/getChatRoomPaginate',
                    data : { room_id : room_id , _token : CSRF_TOKEN,page : get_message_page },
                    type : 'POST',
                    success : function(response)
                    {
                      
                      var parsed = JSON.parse(response);

                      // console.log(parsed);

                      if(!$.isEmptyObject(parsed))
                      {
                        $.each(parsed, function(key, item) {
                            $('#messageContent').prepend(
                              $('<li>').attr('data-user', item.user.user_detail.user_id)
                                .append(
                                  $('<a href="javascript:;">').attr('data-target', '#friendProfile').addClass('subModalToggle viewFriendProfile')
                                    .append(
                                        $('<div>').addClass('msgImgcont')
                                          .append(
                                            //$('<img>').attr('src', item.user.user_detail.profile_picture ? publicUrl+'user_uploads/user_'+item.user.id+'/'+item.user.user_detail.profile_picture : defaultProfilePic )
                                             //$('<img>').attr('src',  getImage(item, 5050) )
                                               $('<img>').attr('src',  getImage(item.user.user_detail.profile_picture, item.user.user_detail.user_id, 5050) )
                                          )
                                      )
                                  )
                               
                                .append(
                                  $('<em>').text(toTitleCase(item.user.user_detail.firstname) + " " + toTitleCase(item.user.user_detail.lastname))
                                )
                                .append(
                                  //$('<p>').text(this.message)
                                   messageChecker(this.message, item.updated_at)
                                )
                              );

                        });
                        $('#messageContent').scrollTop( 300 );
                        get_message_page++;
                      }
                      else
                      {
                        no_more_message = 0;
                      }



                      // $.each(response, function(){
                      //   $('#messageContent').preppend(
                      //     $('<li>').attr('data-user', this.user.user_detail.user_id)
                      //       .append(
                      //         $('<a href="javascript:;">').attr('data-target', '#friendProfile').addClass('subModalToggle viewFriendProfile')
                      //           .append(
                      //               $('<div>').addClass('msgImgcont')
                      //                   .append(
                      //                     $('<img>').attr('src', this.user.user_detail.profile_picture ? publicUrl+'/'+this.user.user_detail.profile_picture : defaultProfilePic )
                      //                   )
                      //             )
                                
                      //         )
                            
                      //       .append(
                      //         $('<p>').text(this.message)
                      //       )
                      //     )
                      // });
                      // if(response != '')
                      // {
                      //   $('#messageContent').prepend(response);
                      //   // console.log(get_message_page);
                      //   $('#messageContent').scrollTop( 300 )
                      //   get_message_page++;
                      // }
                      // else
                      // {
                      //   no_more_message = 0;
                      // }

                        initializeDate();


                    },error : function(xhr){
                      // console.log(xhr.responseText);
                    }
                  });
                  $('#messageContent .messageContentLoader').css("display","none");
                }

            });

        function escapeHtml(text) {

          var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
          };

          return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }

        $('.emojiTrigger').click(function(){
          $('#tooltip').toggle();
          $('.footer .arrow_box').toggle();
        });

        $('.pmTrigger').click(function(){
          $('#pmTooltip').toggle();
          $('.pmArrowbox').toggle();
        });

        $('#tooltip ul').slimScroll({
          height: '200px'
        });

        $('.moredetailsbox').slimscroll({
          height: '180px'
        })


        var height = 0;
        $('.child li').each(function(i, value){
            height += parseInt($(this).height());
        });

        height += '';

        $('.child').animate({scrollTop: height});

   });

   

</script>

@endsection
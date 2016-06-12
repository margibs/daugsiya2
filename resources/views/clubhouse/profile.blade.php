@extends('clubhouse.layout')


@section('page-title', 'Profile Room')


@section('scripts_here')

<link rel="stylesheet" href="{{ asset('css/rateit.css') }}">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

@endsection

 @section('switch-button')
    <button class="categ-button"> <a href="{{ url('logout') }}">Logout</a></button>
@endsection

@section('user-options')

          <!-- div class="profileBox">
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
            <li> <a href="#"> <span class="notifcount"> 3 </span>  <img src="img/assets/notif-icon.png" alt="Notifications" /> </a> </li>
            <li style="margin-right: 6px;"> <a href="#"> <img src="img/assets/key-icon.png" alt="Login/Signup" /> </a> </li>
          </ul> -->
@endsection




@section('background-content')

<style type="text/css">
.guideSusanContainer{
  left: 0;
}
@media (max-width: 1680px){
  #roombg {
    top: -40px;
 }
}
@media (max-width: 1440px){
  #roombg {
        width: 124%;
 }
}
@media (max-width: 1280px){
  #roombg {
      top: -15px;
  }
}

@media(max-width: 1199px){
  #roombg {
      top: 20px;
      width: 145%;
      left: -230px;
  }
}

@media(max-width: 1024px){
#roombg {
    top: 20px;
    width: 144%;
    left: -215px;
}
}

.friendsbox{
   top: 15%;
}
.withNotif .friendProfile {
    top: 186px;
    left: 22%;
    z-index: 2;
}
.cropperContainer{
    top: 21%;
    left: 43%;
    position: absolute;
    background: rgba(255, 255, 255, 0.98);
    width: 300px;
    height: auto;
    overflow: hidden;
    z-index: 1;
    moz-box-shadow: 0 0 30px -10px #000;
    -webkit-box-shadow: 0 0 30px -10px #000;
    box-shadow: 0 0 30px -10px #000;
    display: none;
    border-radius: 8px;
}

.cropperContainer .ion-close-round{
/*     top: 0px;*/
    color: rgb(158, 0, 0);
/*    position: absolute;*/
    z-index: 2;
/*    right: 0;*/
    margin: 7px;
    cursor: pointer;
}

.cropperContainer button{
    background: transparent;
    border: none;
    display: block;
    width: 50%;
    margin: 0;
    float: left;
    padding: 7px;
    border-radius: 2px;
    font-family: 'Work Sans';
    font-size: 35px;
    font-weight: 500;
    margin-bottom: 13px;
    cursor: pointer;
}
.cropperContainer  #doneCropping{
      color: #229C20;
}
.cropperContainer  #cancelCropping{
     color: #C70D0D;
}
#cropperH{
padding: 0;
}

#cropperH input[type="range"]{
      background: #000;
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


.progressBar{
      margin: 0 1em;
    background: #ccc;
    border-radius: 4px;
}

.progressBarPercent{
    width: 80%;
    background: repeating-linear-gradient( 45deg, #5d9634, #5d9634 10px, #538c2b 10px, #538c2b 20px );
    text-align: center;
    color: #fff;
    font-family: "Roboto";
}


.tvbox .tabs {
    width: 650px;
    float: none;
    list-style: none;
    padding: 0;
    margin: 62px auto;
}
 


.labels:after {
  content: '';
  display: table;
  clear: both;
}

.tvbox .tabs label {
    display: inline-block;
    padding: 7px 20px;
    color: #FFF1EF;
    font-size: 14px;
    font-weight: 500;
    font-family: Roboto;
    cursor: pointer;
    background: rgb(248,80,50);
    background: -moz-linear-gradient(top, rgba(248,80,50,1) 0%, rgba(241,111,92,1) 50%, rgba(246,41,12,1) 51%, rgba(240,47,23,1) 71%, rgba(231,56,39,1) 100%);
    background: -webkit-linear-gradient(top, rgba(248,80,50,1) 0%,rgba(241,111,92,1) 50%,rgba(246,41,12,1) 51%,rgba(240,47,23,1) 71%,rgba(231,56,39,1) 100%);
    background: linear-gradient(to bottom, rgba(248,80,50,1) 0%,rgba(241,111,92,1) 50%,rgba(246,41,12,1) 51%,rgba(240,47,23,1) 71%,rgba(231,56,39,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f85032', endColorstr='#e73827',GradientType=0 );
    border-radius: 50px;
}

 
 .tabs .gameList{
    background: #000;
    padding: 10px;
    height: 380px;
    overflow-y: auto;
   margin-right: -8px;
}
 .tabs .gameList::-webkit-scrollbar{width: 8px;}

 .tabs .gameList::-webkit-scrollbar-thumb{background-color:rgb(240, 240, 240); border-radius: 4;}
 .tabs .gameList::-webkit-scrollbar-thumb:hover{background-color:rgb(255, 255, 255);}

 .tabs .gameList::-webkit-scrollbar-track{background-color:rgb(163, 163, 163);}

  .tabs .gameList li, .tabs .gameList li a{
    display: inline-block;
  }
  .tabs .labels{
    text-align: center;
/*        background: #161617;*/
    width: 80%;
    margin: 0 auto 3px auto;
    border-radius: 2px;
  }

.tvbox .tab-content {
    display: none;
    width: 100%;
    padding: 15px;

    border: 1px solid #251F1F;
    border-radius: 3px;
    background: #cdd1d4;
    background: -moz-linear-gradient(-45deg,  #cdd1d4 0%, #1c1c1e 30%);
    background: -webkit-linear-gradient(-45deg,  #cdd1d4 0%,#1c1c1e 30%);
    background: linear-gradient(135deg,  #cdd1d4 0%,#1c1c1e 30%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cdd1d4', endColorstr='#1c1c1e',GradientType=1 );



}




.tvbox  .tab-content * {
    -webkit-animation: scale 0.4s ease-in-out;
    -moz-animation: scale 0.4s ease-in-out;
    animation: scale 0.4s ease-in-out;
}
@keyframes scale {
  0% {
    transform: scale(0.9);
    opacity: 0;
    }
  50% {
    transform: scale(1.01);
    opacity: 0.5;
    }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.tvbox .tabs input[type=radio] {
    display:none;
}

.tvbox  [id^="tab"]:checked + label {
    color: #fff!important;
}

.tvbox  [id^=tab]:checked ~ div[id^=tab-content] {
    display: block;
    color: #fff!important;
}

.tvbox  [id^=tab]:checked ~ [id^=label]  {
    background: #08C;
    color: white;
}


#tab1:checked ~ #tab-content1,
#tab2:checked ~ #tab-content2,
#tab3:checked ~ #tab-content3 {
    display: block;
}


</style>

   <!--  <div class="container background-container" style="width: 1280px !important; margin-top: 40px; padding:0">
      <img src="{{ asset('clubhouse/img/assets/livingroom.png') }}" class="background-image interactiveBackground" alt="">

        <div class="flipbook-viewport interactiveObj modal-popup" data-toggle="#magazine" id="interview" left="8%">
          <div class="container">
            <div class="flipbook">
              <div style="background-image:url(http://www.welovecelebz.com/wp-content/gallery/ileana-dcruz-photos/ileana-dcruz-hot-pictures-12.jpg)"></div>
              <div> 
                  <h2> This is the hottest interview of the year! Today, we're interviewing {account name}! </h2>
                  <p> Wow, such an honour to have you here (account name)! I'd love to ask you some questions!  </p>
              </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
              <div> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
              <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
              <div style="background-color:#da7f88;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
          </div>
        </div>
          
        <div class="friendBox interactiveObj modal-popup" data-toggle="#yearbook" id="manageFriends" top="8%" left="6%">
            <div class="tabs">
               <div class="tab">
                   <input type="radio" id="tab-1" name="tab-group-1" checked="">
                   <label for="tab-1"> <i class="fa fa-user"></i> Friends ({{ count($user->myFriends) }}) </label>

                    <div class="contenttab" id="myFriends">
                    
                        <div class="friendBoxStatus">
                           <a href="#"> <i class="fa fa-circle indiOffline"></i> Offline <span id="offlineFriendCount"></span></a>
                                  <a href="#"> <i class="fa fa-circle indiOnline"></i> Online <span id="onlineFriendCount"></span></a>
                        </div>

                          <ul class="online" id="friendList">


                                @foreach($user->myFriends as $fr)
                                <li>
                                  <span class="offline" id="friend-online-status-{{ $fr->friend->user_detail->user_id }}"></span>
                                  <div class="options" data-user="{{ $fr->friend->user_detail->user_id }}">
                                    <a href="#" data-target="#pmBox" class="subModalToggle pmFriend"> <i class="fa fa-comment"></i>  </a>
                                    <a href="#" data-target="#friendProfile" class="subModalToggle viewFriendProfile">  <i class="fa fa-user"></i> </a>
                                  </div>
                                  <img src="{{ $fr->friend->user_detail->profile_picture ? asset('').'/'.$fr->friend->user_detail->profile_picture : asset('images/default_profile_picture.png') }}" alt="">
                                  <h6> {{ ucwords( $fr->friend->user_detail->firstname.' '.$fr->friend->user_detail->lastname ) }} </h6>
                                  <p> Is currently reading playing on the prize room... </p>
                                  <div class="optionBox">                              
                                  </div>
                                </li>

                                @endforeach
                              </ul>
                   </div>               
               </div>

               <div class="tab">
                   <input type="radio" id="tab-2" name="tab-group-1">
                   <label for="tab-2">   <i class="fa fa-comment"></i> Messages ( {{ count($user->myMessages) }} ) </label>

                    <div class="contenttab">


                    <div class="messageBoxStatus">
                      <a href="#"> <i class="fa fa-circle-thin indiOffline"></i> Unread <span id="unreadMessage">({{ $user->unread_messages()->count() }})</span></a>
                              <a href="#"> <i class="fa fa-circle-thin indiOnline"></i> Read <span id="readMessage">({{ $user->read_messages()->count() }})</span></a>
                    </div>

                        <ul class="messagingBox">                   
                          @foreach($user->myMessages as $msg)
                            <li data-user="{{ $msg->from_user->user_detail->user_id }}">
                              <a href="javascript:;" class="subModalToggle pmFriend" data-target="#pmBox"><span class="offline" id="friend-message-online-status-{{ $msg->from_user->user_detail->user_id }}"></span>
                            <img src="{{ $msg->from_user->user_detail->profile_picture ? asset('').'/'.$msg->from_user->user_detail->profile_picture : asset('images/default_profile_picture.png') }}" alt="">
                            <h6> {{ ucwords($msg->from_user->user_detail->firstname.' '.$msg->from_user->user_detail->lastname ) }} <em> 3:36pm </em></h6>
                            <p> {{ $msg->message }} </p></a>
                                               
                          </li>

                          @endforeach
                          </ul>                   
                   </div>
               </div>  
            </div>
        </div>

          
        <div class="interactiveObj parentModal" style="position:absolute; width:795px" top="8%" left="40%">      
            <div class="friendProfile modal-popup" id="friendProfile">
              <div class="divContainer">          
                      <div class="imgContainer">
                      <span> <a href="#" class="add"> <i class="fa fa-plus"></i> </a> </span>
                      <span> <a href="#" class="block"> <i class="fa fa-ban"></i> </a> </span>
                      <span> <a href="#" class="message"> <i class="fa fa-comment" style="    font-size: 16px;  position: relative;  top: -1px;"></i> </a> </span>
                      <img src="https://s3.amazonaws.com/uifaces/faces/twitter/whale/128.jpg" id="viewFriendProfilePic">
                      <h6 id="viewFriendProfileName"> Samantha Wilson </h6>
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
                        <ul class="messagesContent" id="messageContent">
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
                                <textarea id="chatEntry" class="chatCommon txtstuff" placeholder="Type Message" style="height:58px"></textarea>
                            </form>
                        </div>
                    </div>
            </div>
          
        </div>

              <div class="modalDiv modal-popup interactiveObj" data-toggle="#diary" id="userDetails" top="10%" right="14%">
                <div class="c-body">
                <div class="c-title">User Details</div>
                  <form action="{{ url('clubhouse/profile/userDetails') }}" method="POST">
                    
                      
                    
                    @if(session('userDetailsErrors'))
                      <ul class="formMessage errorlist">
                      @foreach(session('userDetailsErrors') as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                    @endif

                    @if(session('userDetailsSuccessMessage'))
                      <div class="formMessage successMessage">{{ session('userDetailsSuccessMessage')}}</div>
                    @endif
                  {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="">Firstname</label>
                      <input type="text" name="firstname" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->firstname : '' }}">
                    </div>
                    <div class="form-group">
                      <label for="">Lastname</label>
                      <input type="text" name="lastname" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->lastname : '' }}">
                    </div>
                    <div class="form-group">
                      <label for="">Address</label>
                      <textarea name="address" cols="30" rows="5">{{ isset($user->user_detail) ? $user->user_detail->address : '' }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Phone Number</label>
                      <input type="text" name="phone_no" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->phone_no || '' : '' }}">
                    </div>
                    <div class="form-group">
                      <button type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="modalDiv modal-popup interactiveObj" data-toggle="#doorKey" id="changePassword" top="18%" left="20%">
                  <div class="c-body">
                    <div class="c-title">Change Password</div>
                    <form action="{{ url('clubhouse/profile/changePassword') }}" method="POST">
                      
                        
                      
                      @if(session('changePasswordErrors'))
                        <ul class="formMessage errorlist">
                        @foreach(session('changePasswordErrors') as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                      @endif

                      @if(session('successMessage'))
                        <div class="formMessage successMessage">{{ session('successMessage')}}</div>
                      @endif
                    {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="">Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                      </div>
                      <div class="form-group">
                        <button type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
              </div>
        
              <div class="modalDiv modal-popup interactiveObj" data-toggle="#pinboard" id="gameCollection" top="1%" left="17%">
                <div class="c-body">

                   <ul class="nav-tabs" role="tablist">
                        <li class="active col-sm-8"><a href="javascript:;" aria-controls="favorites" role="tab" data-toggle="tab">Favorites</a></li>
                        <li class="col-sm-8"><a href="javascript:;" aria-controls="gamePlayed" role="tab" data-toggle="tab">Games I've Played</a></li>
                        <li class="col-sm-8"><a href="javascript:;" aria-controls="gameUnplayed" role="tab" data-toggle="tab">Games I Haven't Played</a></li>
                      </ul>

                  <div class="tab-content col-sm-24">
                    <div class="tab-pane active" id="favorites">

                      <ul class="gameList">
                        @foreach($user->favorites as $favorite)

                          <li class="col-sm-8">

                              <div class="rateDiv">
                                  <div class="rateStatus">My Rating
                                    @if(!$favorite->user_rating)
                                    <span data-target="favorite_{{ $favorite->id }}">
                                      - <b>NOT RATED</b>
                                    </span>
                                    @endif
                                    
                                  </div>
                                  <div class="ratingArea">
                                    <input type="hidden" value="{{ $favorite->gameRating['totalRating'] }}" step="0.5" id="favorite_{{ $favorite->id }}" data-post="{{$favorite->id }}" class="rating">
                                                          <div class="rateit" data-rateit-backingfld="#favorite_{{ $favorite->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                                  
                                  </div>
                                  <img src="{{ asset('uploads') }}/{{ $favorite->thumb_feature_image }}" alt="">
                              </div>

                            <div class="col-sm-12"><button type="button">Play Now</button></div>
                            <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $favorite->slug }}">Review</a></button></div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="tab-pane" id="gamePlayed">
                      <ul class="gameList">
                        @foreach($user->played_games as $played_game)
                          
                          <li class="col-sm-8">

                              <div class="rateDiv">
                                  <div class="rateStatus">My Rating
                                    @if(!$played_game->user_rating)
                                    <span data-target="played_game_{{ $played_game->id }}">
                                      - <b>NOT RATED</b>
                                    </span>
                                    @endif
                                    
                                  </div>
                                  <div class="ratingArea">
                                    <input type="hidden" value="{{ $played_game->gameRating['totalRating'] }}" step="0.5" id="played_game_{{ $played_game->id }}" data-post="{{$played_game->id }}" class="rating">
                                                          <div class="rateit" data-rateit-backingfld="#played_game_{{ $played_game->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                                  
                                  </div>
                                  <img src="{{ asset('uploads') }}/{{ $played_game->thumb_feature_image }}" alt="">
                              </div>

                            <div class="col-sm-12"><button type="button">Play Now</button></div>
                            <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $played_game->slug }}">Review</a></button></div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="tab-pane" id="gameUnplayed">
                      <ul class="gameList">
                        @foreach($user->unplayed_games as $unplayed_game)

                            <li class="col-sm-8">

                                <div class="rateDiv">
                                  <div class="rateStatus">My Rating
                                      @if(!$unplayed_game->user_rating)
                                      <span data-target="unplayed_game_{{ $unplayed_game->id }}">
                                        - <b>NOT RATED</b>
                                      </span>
                                      @endif
                                      
                                    </div>
                                    <div class="ratingArea">s
                                      <input type="hidden" value="{{ $unplayed_game->gameRating['totalRating'] }}" step="0.5" id="unplayed_game_{{ $unplayed_game->id }}" data-post="{{$unplayed_game->id }}" class="rating">
                                                            <div class="rateit" data-rateit-backingfld="#unplayed_game_{{ $unplayed_game->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                                    
                                    </div>
                                    <img src="{{ asset('uploads') }}/{{ $unplayed_game->thumb_feature_image }}" alt="">
                                </div>

                              <div class="col-sm-12"><button type="button">Play Now</button></div>
                              <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $unplayed_game->slug }}">Review</a></button></div>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                  </div>
                </div>
              </div>

              <a href="#userDetails" class="interactiveObj interactive" right="40%" top="40%" id="diary">
                <img src="{{ asset('images/diary.png') }}" alt="" class="diary">  
              </a>
      
              <a href="#changePassword" class="interactiveObj interactive" left="45%" bottom="32%" id="doorKey">
                <img src="{{ asset('images/door_key.png') }}" alt="" class="door_key">
              </a>


              <a href="#gameCollection" class="interactiveObj interactive" right="10%" top="10%" id="pinboard">
                <img src="{{ asset('images/pinboard.png') }}" alt="" class="pinboard">
              </a>

              <a href="#manageFriends" class="interactiveObj interactive" left="30%" bottom="25%" id="yearbook">
                <img src="{{ asset('images/yearbook.png') }}" alt="" class="yearbook">
              </a>

              <div class="interactiveObj interactive" left="5%" top="2%" id="mirror">
                <img src="{{ asset('images/mirror.png') }}" alt="" class="mirror">
                <div class="profile_pictureParent">
                  <img src="{{  $user->user_detail->profile_picture ? asset('').'/'.$user->user_detail->profile_picture : asset('images/default_profile_picture.png')   }}" alt="" class="profile_pic" id="picPreview">
                </div>
                <input type="file" name="profilePic" accept="image/*" id="profilePic">
              </div>

              <a href="#interview" class="interactiveObj interactive" bottom="49%" left="45%" id="magazine">
                <span>{{ ucfirst($user->user_detail->firstname) }}'s Magazine</span>
                <img src="{{ asset('images/magazine.png') }}" alt="" class="magazine">
              </a>        
    </div> -->
    
<div class="roomNavIcons">
  <ul>
    <li> <a href="{{ url('/clubhouse/profile')}}"> <img src="http://susanwins.com/images/clubhouse/profileroom-thumb.gif" alt="" title="Profile Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/slotsroom')}}"> <img src="http://susanwins.com/images/clubhouse/slotsroom-thumb.gif" alt="" title="Slots Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/chatroom')}}"> <img src="http://susanwins.com/images/clubhouse/chatroom-thumb.gif" alt="" title="Chatroom Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/prizeroom')}}"> <img src="http://susanwins.com/images/clubhouse/prizeround.png" alt="" title="Prize Room">  </a> </li>
  </ul>
</div>

@if(!$user->completed_profile_tour)

  @section('guide-susan')
    <div class="guideSusanContainer">
    <img src="{{url('images')}}/guide-susan-left.png" class="guide-susan">
</div>
  @endsection

  <ul class="cd-tour-wrapper profilePage">
    <li class="cd-single-step no-pulse">

      <div class="cd-more-info">
        <h2> Welcome to Your Private Quarters! </h2>
        <p> There's loads to do here, click start tour and I'll show you how it all works! </p>
        <img src="img/step-1.png" alt="step 1">
      </div>
    </li> <!-- .cd-single-step -->
    <li class="cd-single-step">
      <span> Your Details </span>

      <div class="cd-more-info top">
        <h2> Your Details </h2>
        <p> I'd love to send you my welcome pack for new members, it includes your membership card and some awesome free gifts. Just fill in your information and I'll post it over first thing! </p>
        <img src="img/step-1.png" alt="step 1">
      </div>
    </li> <!-- .cd-single-step -->

   <!--  <li class="cd-single-step">
      <span>Step 2</span>

      <div class="cd-more-info top">
        <h2>Step Number 2</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia quasi in quisquam.</p>
        <img src="img/step-2.png" alt="step 2">
      </div>
    </li>  --><!-- .cd-single-step -->

  

    <li class="cd-single-step" id="beforeTvStep">
      <span> My Slots Collections </span>

      <div class="cd-more-info left">
        <h2> My Slots Collections </h2>
        <p> The TV in your room shows your 'favourite slots', 'slots you've played', and 'slots you haven't played'. Click 'Next' to see how it works... </p>
        <img src="img/step-3.png" alt="step 3">
      </div>
    </li> <!-- .cd-single-step -->

    <li class="cd-single-step afterTvStep" id="afterTvFirstStep" data-next="tab2">
      <span> Your Favourite Games </span>

      <div class="cd-more-info right">
        <h2> Your Favourite Games </h2>
        <p> When you're browsing slots games on my website, you'll have the option to add them to your favourites - you'll then be able to find them here on your TV! You haven't got any favourite games yet - add some today! </p>
        <img src="img/step-3.png" alt="step 3">
      </div>
    </li> <!-- .cd-single-step -->
    <li class="cd-single-step afterTvStep" data-next="tab3"  data-prev="tab1">
      <span> Games you've played </span>

      <div class="cd-more-info right">
        <h2> Games you've played </h2>
        <p> You'll also have the option to mark the games that you've played - all those games will then appear here so you can keep track of what you've played! </p>
        <img src="img/step-3.png" alt="step 3">
      </div>
    </li> <!-- .cd-single-step -->
    <li class="cd-single-step afterTvStep" data-prev="tab2">
      <span> Games you haven't tplayed </span>

      <div class="cd-more-info right" id="afterTvLastStep">
        <h2> Games you haven't played </h2>
        <p>Finally, you can check all the games you haven't played yet here - This is a great way to explore new games you haven't seen before! </p>
        <img src="img/step-3.png" alt="step 3">
      </div>
    </li> <!-- .cd-single-step -->


    <li class="cd-single-step">
      <span> Your Profile Pic </span>
      <div class="cd-more-info right">
        <h2> Your Profile Pic  </h2>
        <p> You're looking great today! Here's where you can upload a profile picture to your account! </p>
        <img src="img/step-3.png" alt="step 3">
      </div>
    </li> <!-- .cd-single-step -->

    <li class="cd-single-step">
      <span>Your Friends </span>
      <div class="cd-more-info right">
        <h2>Your Friends</h2>
        <p>Susan's Club is all about making friends and having a good time - Friends that you make in the chat lounge will appear here. You can also directly message them from this screen. </p>
        <img src="img/step-3.png" alt="step 3">
      </div>
    </li> <!-- .cd-single-step -->

   <!--    <li class="cd-single-step">
      <span> We Want To Interview You! </span>
         <div class="cd-more-info top">
        <h2> We Want To Interview You!  </h2>
        <p> We're dying to know more about you! Let us know what you like - that way we can customize prizes and gifts specifically to your taste! Other users will be able to see your answers in your public profile and you can see what they put too! </p>
        <img src="img/step-2.png" alt="step 2">
      </div> 
    </li>  --><!-- .cd-single-step -->


  </ul> <!-- .cd-tour-wrapper -->

  @endif

    <div id="pages" style="width:1px;height:1px;overflow:hidden;">
      <div style="text-align:center;background-color:rgb(121, 142, 143)">
         <div class="firstpage">
            <h2 style="font-family: Lobster,Helvetica,arial,sans-serif;"> {{ $user->user_detail->firstname }}'s' <span> Magazine </span> </h2>
            <h3> This is the hottest interview of the year! Today, we're interviewing {{ $user->user_detail->firstname }}  </h3>
            <h4> Wow, such an honour to have you here Misis Burito! I'd love to ask you some questions!  </h4>
         </div>
      </div>
    
      <div name="Home" style="background: url('../images/paparazis.jpg');"> </div>

     {!! $questionaire !!}
<!-- 
    


    <div style="background: url('../images/womentalking.jpg');"></div>

    <div class="questionpage">
      <p> We've heard you're great company to be around – but when you're socialising what's your drink of choice? </p>
      <ul>
        <li> <a href=""> Soft Drink </a> </li>
        <li> <a href=""> Wine </a> </li>
        <li> <a href=""> Beer </a> </li>
        <li> <a href=""> Spirit & Mixer  </a> </li>
        <li> <a href=""> Cocktail </a> </li>
        <li> <a href=""> Champagne </a> </li>
      </ul>
    </div>
    
   <div class="questionpage">
      <p> It's been rumoured you're a bit of a jet setter! Where's your ideal holiday destination? </p>
      <ul>
        <li> <a href=""> USA </a> </li>
        <li> <a href=""> Spain </a> </li>
        <li> <a href=""> France </a> </li>
        <li> <a href=""> Caribbean  </a> </li>
        <li> <a href=""> South East Asia </a> </li>
        <li> <a href=""> Dubai </a> </li>
        <li> <a href=""> Italy </a> </li>
        <li> <a href=""> Greece </a> </li>
        <li> <a href=""> Actually, I don't travel a lot!  </a> </li>
      </ul>
    </div>


    <div style="background: url('../images/womentraveling.jpg');"></div>


    <div style="background: url('../images/womentv.jpg');"></div>

    <div class="questionpage">
      <p> So when you're not out and about – what are your favourite shows to relax with in the evening?  </p>
      <ul>
        <li> <a href=""> Reality TV   </a> </li>
        <li> <a href=""> Celebrity Shows  </a> </li>
        <li> <a href=""> Soap Operas  </a> </li>
        <li> <a href=""> Stand up comedy   </a> </li>
        <li> <a href=""> Documentaries  </a> </li>
        <li> <a href=""> Nature Shows  </a> </li>
      </ul>
    </div>

    <div class="questionpage">
      <p>  Where do you go shopping?  </p>
      <ul>
        <li> <a href=""> Aldi </a> </li>
        <li> <a href=""> Morrisons   </a> </li>
        <li> <a href=""> Iceland   </a> </li>
        <li> <a href=""> Sainsubrys   </a> </li>
        <li> <a href=""> Marks & Spencers   </a> </li>
        <li> <a href=""> Waitrose  </a> </li>
        <li> <a href=""> Tesco </a> </li>
        <li> <a href=""> Asda </a> </li>
        <li> <a href=""> Coop  </a> </li>
      </ul>
    </div>

     <div style="background: url('../images/womenshopping.jpg');"></div>

 -->
  </div>

    <div class="bgwrapper">
      <img id="roombg" src="{{url('images/clubhouse')}}/profileroom3.jpg" alt="">

      <div  class="box good tvbox">
    <i class="ion-close-round"></i> 
    
        <div class="casinoBox">
          <i class="ion-close-round"></i>
          <p> Select from these casinos: </p>
          <ul id="selectCasino">
            <li> <a href="#"> <img src="http://susanwins.com/uploads/13553_hardrock2.jpg" alt=""> </a> </li>
           <li> <a href="#"> <img src="http://susanwins.com/uploads/13553_hardrock2.jpg" alt=""> </a> </li>
           <li> <a href="#"> <img src="http://susanwins.com/uploads/13553_hardrock2.jpg" alt=""> </a> </li>
           <li> <a href="#"> <img src="http://susanwins.com/uploads/13553_hardrock2.jpg" alt=""> </a> </li>
          </ul>
        </div>
        <!--

        <ul class="tabs" data-toggle="#pinboard" id="gameCollection">
            <li>
                <input type="radio" name="tabs" id="tab1" checked />
                <label for="tab1"> <i class="fa fa-heart"></i>  </label>
                <div id="tab-content1" class="tab-content">
                  <p> Favourite Games </p>
              <div class="scrollme">
                    <ul class="gameList">
                    @foreach($user->favorites as $favorite)

                      <li class="col-sm-8">

                          <div class="rateDiv">


                              <div class="view third-effect">  
                                <img src="{{ asset('uploads') }}/{{ $favorite->thumb_feature_image }}" alt="">
                              <div class="mask"> 

                                  <div class="rateStatus">My Rating
                                    @if(!$favorite->user_rating)
                                    <span data-target="favorite_{{ $favorite->id }}">
                                      - <b>NOT RATED</b>
                                    </span>
                                    @endif
                                    
                                  </div>

                                  <div class="ratingArea">
                                    <input type="hidden" value="{{ $favorite->gameRating['totalRating'] }}" step="0.5" id="favorite_{{ $favorite->id }}" data-post="{{$favorite->id }}" class="rating">
                                                          <div class="rateit" data-rateit-backingfld="#favorite_{{ $favorite->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>                             
                                  </div>

                                  <div class="col-sm-12"><button type="button" class="buttonone" data-post="{{ $favorite->id }}"> <i class="fa fa-play"></i> </button>
                                <button type="button"><a href="{{ url('') }}/{{ $favorite->slug }}"> <i class="fa fa-book"></i> </a></button></div>
                            
                              </div>  
                            </div> 


                              
                              
                            


                          </div>

                        
                      </li>
                    @endforeach
                </ul>
              </div>                  
                </div>
            </li>
          
            <li>
                <input type="radio" name="tabs" id="tab2" />
                <label for="tab2"> <i class="fa fa-smile-o" style="display:block;"></i> </label>
                <div id="tab-content2" class="tab-content">
                  <p> Games you've played </p>
                    <div class="scrollme">
                    <ul class="gameList">
                    @foreach($user->played_games as $played_game)
                      
                      <li class="col-sm-8">

                          <div class="rateDiv">

                              <div class="view third-effect">  
                              <img src="{{ asset('uploads') }}/{{ $played_game->thumb_feature_image }}" alt="">
                              <div class="mask"> 

                                 <div class="rateStatus">My Rating
                                        @if(!$played_game->user_rating)
                                        <span data-target="played_game_{{ $played_game->id }}">
                                          - <b>NOT RATED</b>
                                        </span>
                                        @endif
                                        
                                      </div>
                                      <div class="ratingArea">
                                        <input type="hidden" value="{{ $played_game->gameRating['totalRating'] }}" step="0.5" id="played_game_{{ $played_game->id }}" data-post="{{$played_game->id }}" class="rating">
                                                              <div class="rateit" data-rateit-backingfld="#played_game_{{ $played_game->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                                      
                                      </div>

                                    <div class="col-sm-12"><button type="button" class="buttonone" data-post="{{ $played_game->id }}">   <i class="fa fa-play"></i>  </button></div>
                                  <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $played_game->slug }}"> <i class="fa fa-book"></i> </a></button></div>

                              </div>  
                            </div> 



                          </div>

                      
                      </li>
                    @endforeach
                </ul>
              </div>
                </div>
            </li>

            <li>
                <input type="radio" name="tabs" id="tab3" />
                <label for="tab3"> <i class="fa fa-frown-o"></i> </label>
                <div id="tab-content3" class="tab-content">
                  <p> Games you haven't played yet </p>
                    <div class="scrollme">
                    <ul class="gameList">
              @foreach($user->unplayed_games as $unplayed_game)

                  <li class="col-sm-8">

                      <div class="rateDiv">


                          <div class="view third-effect">  
                          <img src="{{ asset('uploads') }}/{{ $unplayed_game->thumb_feature_image }}" alt="">
                          <div class="mask"> 

                             <div class="rateStatus">My Rating - 
                                @if(!$unplayed_game->user_rating)
                                <span data-target="unplayed_game_{{ $unplayed_game->id }}">
                                  <b>NOT RATED</b>
                                </span>
                                @endif
                                
                              </div>
                              <div class="ratingArea">
                                <input type="hidden" value="{{ $unplayed_game->gameRating['totalRating'] }}" step="0.5" id="unplayed_game_{{ $unplayed_game->id }}" data-post="{{$unplayed_game->id }}" class="rating">
                                                      <div class="rateit" data-rateit-backingfld="#unplayed_game_{{ $unplayed_game->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                              
                              </div>


                              <div class="col-sm-12"><button type="button" class="buttonone" data-post="{{ $unplayed_game->id }}">   <i class="fa fa-play"></i>  </button></div>
                              <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $unplayed_game->slug }}"> <i class="fa fa-book"></i>  </a></button></div>

                          </div>  
                        </div> 

                      </div>
                    
                  </li>
                @endforeach
              </ul>
              </div>
                </div>
            </li>
        </ul> -->

       <ul class="tabs">
        
        <li class="labels">
            <label for="tab3" id="label3"> <i class="ion-sad-outline"></i> Not played </label>
            <label for="tab1" id="label1"> <i class="ion-ios-heart"></i> Favourites Games </label>
            <label for="tab2" id="label2"> <i class="ion-happy-outline"></i> You've Played </label>            
        </li>


        <li>  
            <input type="radio" checked name="tabs" id="tab1">
            <div id="tab-content1" class="tab-content">
                  <ul class="gameList">
                    @foreach($user->favorites as $favorite)

                      <li>

                          <div class="rateDiv">


                              <div class="view third-effect">  
                                <img src="{{ asset('uploads') }}/{{ $favorite->thumb_feature_image }}" alt="">
                              <div class="mask"> 

                                  <div class="rateStatus">My Rating
                                    @if(!$favorite->user_rating)
                                    <span data-target="favorite_{{ $favorite->id }}">
                                      - <b>NOT RATED</b>
                                    </span>
                                    @endif
                                    
                                  </div>

                                  <div class="ratingArea">
                                    <input type="hidden" value="{{ $favorite->gameRating['totalRating'] }}" step="0.5" id="favorite_{{ $favorite->id }}" data-post="{{$favorite->id }}" class="rating">
                                                          <div class="rateit" data-rateit-backingfld="#favorite_{{ $favorite->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>                             
                                  </div>

                                 <div class="col-sm-12"><button type="button" class="buttonone" data-post="{{ $favorite->id }}"> Play </button></div>
                                 <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $favorite->slug }}"> View </a></button></div>
                            
                              </div>  
                            </div> 


                              
                              
                            


                          </div>

                        
                      </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li>
            <input type="radio" name="tabs" id="tab2">
            <div id="tab-content2" class="tab-content">
                 <ul class="gameList">
                    @foreach($user->played_games as $played_game)
                      
                      <li>

                          <div class="rateDiv">

                              <div class="view third-effect">  
                              <img src="{{ asset('uploads') }}/{{ $played_game->thumb_feature_image }}" alt="">
                              <div class="mask"> 

                                 <div class="rateStatus">My Rating
                                        @if(!$played_game->user_rating)
                                        <span data-target="played_game_{{ $played_game->id }}">
                                          - <b>NOT RATED</b>
                                        </span>
                                        @endif
                                        
                                      </div>
                                      <div class="ratingArea">
                                        <input type="hidden" value="{{ $played_game->gameRating['totalRating'] }}" step="0.5" id="played_game_{{ $played_game->id }}" data-post="{{$played_game->id }}" class="rating">
                                                              <div class="rateit" data-rateit-backingfld="#played_game_{{ $played_game->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                                      
                                      </div>

                                  <div class="col-sm-12"><button type="button" class="buttonone" data-post="{{ $played_game->id }}">  Play  </button></div>
                                  <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $played_game->slug }}"> View </a></button></div>

                              </div>  
                            </div> 



                          </div>

                      
                      </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li>
            <input type="radio" name="tabs" id="tab3">  
            <div id="tab-content3" class="tab-content">
                 <ul class="gameList">
              @foreach($user->unplayed_games as $unplayed_game)

                  <li>

                      <div class="rateDiv">


                          <div class="view third-effect">  
                          <img src="{{ asset('uploads') }}/{{ $unplayed_game->thumb_feature_image }}" alt="">
                          <div class="mask"> 

                             <div class="rateStatus">My Rating - 
                                @if(!$unplayed_game->user_rating)
                                <span data-target="unplayed_game_{{ $unplayed_game->id }}">
                                  <b>NOT RATED</b>
                                </span>
                                @endif
                                
                              </div>
                              <div class="ratingArea">
                                <input type="hidden" value="{{ $unplayed_game->gameRating['totalRating'] }}" step="0.5" id="unplayed_game_{{ $unplayed_game->id }}" data-post="{{$unplayed_game->id }}" class="rating">
                                                      <div class="rateit" data-rateit-backingfld="#unplayed_game_{{ $unplayed_game->id }}" data-rateit-resetable="false" data-rateit-ispreset="true"></div>

                              
                              </div>


                              <div class="col-sm-12"><button type="button" class="buttonone" data-post="{{ $unplayed_game->id }}"> Play  </button></div>
                              <div class="col-sm-12"><button type="button"><a href="{{ url('') }}/{{ $unplayed_game->slug }}"> View  </a></button></div>

                          </div>  
                        </div> 

                      </div>
                    
                  </li>
                @endforeach
              </ul>
              </div>
         
            </li>

   

    </ul>  

      </div>    

      <div class="box2 good keybox">
        <i class="ion-close-round"></i> 
        <form action="{{ url('clubhouse/profile/changePassword') }}" method="POST">           
            @if(session('changePasswordErrors'))
              <ul class="formMessage errorlist">
              @foreach(session('changePasswordErrors') as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            @endif

            @if(session('successMessage'))
              <div class="formMessage successMessage">{{ session('successMessage')}}</div>
            @endif
          {!! csrf_field() !!}
            <div class="form-group">
              <label for="">Current Password</label>
              <input type="password" name="current_password" class="form-control" placeholder="Current Password">
            </div>
            <div class="form-group">
              <label for="">New Password</label>
              <input type="password" name="password" class="form-control" placeholder="New Password">
            </div>
            <div class="form-group">
              <label for="">Confirm New Password</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
            </div>
            <div class="form-group">
              <button type="submit"> <i class="ion-checkmark-round"></i> </button>
            </div>
          </form>
      </div>
      
      <div class="box3 good profilebox">  
        <i class="ion-close-round"></i> 
        <form action="{{ url('clubhouse/profile/userDetails') }}" method="POST">
          @if(session('userDetailsErrors'))
            <ul class="formMessage errorlist">
            @foreach(session('userDetailsErrors') as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          @endif

          @if(session('userDetailsSuccessMessage'))
            <div class="formMessage successMessage">{{ session('userDetailsSuccessMessage')}}</div>
          @endif
        {!! csrf_field() !!}
          <div class="form-group">
            <label for="">Firstname</label>
            <input type="text" name="firstname" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->firstname : '' }}" placeholder="Firstname">
          </div>
          <div class="form-group">
            <label for="">Lastname</label>
            <input type="text" name="lastname" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->lastname : '' }}" placeholder="Lastname">
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <textarea name="address" cols="30" rows="5"  placeholder="Address">{{ isset($user->user_detail) ? $user->user_detail->address : '' }}</textarea>
          </div>
          <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" name="phone_no" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->phone_no  : '' }}"  placeholder="Phone Number">
          </div>
          <div class="form-group">
            <button type="submit"> <i class="ion-checkmark-round"></i> </button>
          </div>
        </form>
      </div>

      <div class="box4 good magbox">
        <i class="ion-close-round"></i>         
<!--         <span class="arrow left" onclick="clipmeR();"> <i class="fa fa-chevron-left"></i> </span>
        <span class="arrow right" onclick="clipmeL();"> <i class="fa fa-chevron-right"></i> </span>
 -->
        <div id="bookflip"></div>
      </div>

      <div class="box5 good friendsbox" >
        <div class="friendBox">
           <i class="ion-close-round"></i> 
           <div class="tabs">
                 <div class="tab">
                     <input type="radio" id="tab-1" name="tab-group-1" checked="">
                     <label for="tab-1"> <i class="ion-person-stalker"></i> Friends ({{ count($user->myFriends) }}) </label>

                      <div class="contenttab" id="myFriends">
                      
                          <div class="friendBoxStatus">
                             <a href="#"> <i class="fa fa-circle indiOffline"></i> Offline <span id="offf.friendBox ul li alineFriendCount"></span></a>
                             <a href="#"> <i class="fa fa-circle indiOnline"></i> Online <span id="onlineFriendCount"></span></a>
                          </div>

                            <ul class="online" id="friendList">


                                  @foreach($user->myFriends as $fr)
                                  <li data-friend="{{$fr->friend->id }}">
                                    <span class="offline" id="friend-online-status-{{ $fr->friend->user_detail->user_id }}"></span>
                                    <div class="options" data-user="{{ $fr->friend->user_detail->user_id }}">
                                      <a  data-target="#pmBox" class="subModalToggle pmFriend"> <i class="ion-ios-chatbubble"></i>  </a>
                                      <!-- <a  data-target="#friendProfile" id="friendprofopen" class="subModalToggle viewFriendProfile toggle-good">  <i class="fa fa-user"></i> </a> -->
                                    </div>
                                    <div class="msgImgcont">
                                     <img src="{{ $fr->friend->user_detail->userPicture5050() }}" class="viewProfile" alt="">
                                    </div>
                                   <!--  <h6> {{ ucwords( $fr->friend->user_detail->firstname.' '.$fr->friend->user_detail->lastname ) }} </h6> -->
                                    <h6> {{ ucwords( $fr->friend->user_detail->firstname ) }} </h6>
                                   <!--  <p> Is currently reading playing on the prize room... </p> -->
                                    <div class="optionBox">                              
                                    </div>
                                  </li>

                                  @endforeach
                            </ul>
                     </div>               
                 </div>

                 <div class="tab">
                     <input type="radio" id="tab-2" name="tab-group-1">
                     <label for="tab-2">   <i class="ion-chatbubbles"></i> Messages ( {{ count($user->myMessages) }} ) </label>

                      <div class="contenttab">


                      <div class="messageBoxStatus">
                        <a href="#"> <i class="fa fa-envelope"></i> Unread <span id="unreadMessage">({{ $user->unread_messages()->count() }})</span></a>
                        <a href="#"> <i class="fa fa-envelope-o"></i> Read <span id="readMessage">({{ $user->read_messages()->count() }})</span></a>
                      </div>

                          <ul class="messagingBox">                   
                            @foreach($user->myMessages as $msg)
                              <li data-user="{{ $msg->from_user->user_detail->user_id }}" style="text-align:left;padding:8px 0;display: block;">
                                <a href="javascript:;" class="subModalToggle pmFriend toggle-good" data-target="#pmBox"><span class="offline" id="friend-message-online-status-{{ $msg->from_user->user_detail->user_id }}" style="left: 45px;top: 5px;"></span>
                                <div class="msgImgcont" style="float: left;">
                                    <img src="{{ $msg->from_user->user_detail->userPicture5050() }}" alt=""> 
                                </div>
                              <h6> {{ ucwords($msg->from_user->user_detail->firstname.' '.$msg->from_user->user_detail->lastname ) }} <em class="timestamp" data-datetime="{{ $msg->created_at }}"> </em></h6>
                              <p> {{ $msg->message }} </p></a>
                                                 
                            </li>

                            @endforeach
                            </ul>                   
                     </div>
                 </div>  
           </div>
        </div>
      </div>

      
          <div class="friendProfile" id="friendProfile">
              <div class="divContainer">          
                      <div class="imgContainer">
                      <i class="ion-close-round"></i>                       
                  <!--     <span> <a href="#" class="block"> <i class="fa fa-ban"></i> </a> </span> -->
                      <span id="pm-user"> <a class="message"> <i class="ion-chatbubbles" style="position: relative; top:9px;"></i> </a> </span>
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
                       <!--  <p> Interview  </p>
                        <div class="interviewBox">
                          <div>
                            <p class="question"> We've heard you're great company to be around – but when you're socialising what's your drink of choice? </p>
                            <p class="answer"> Spirit & Mixer </p>
                          </div>
                        </div> -->
                      </div>
                </div>
          </div>
      
      <div class="cropperContainer">      
          <div id="cropperH"></div>
          <div class="progressBar" style="display:none" id="cropProgressBar">
              <div class="progressBarPercent" style="width:0">0%</div>
          </div>

          <button type="button" id="doneCropping"> <i class="ion-checkmark-round"></i> </button>
          <button type="button" id="cancelCropping"> <i class="ion-close-round"></i> </button>
      </div>
     <!--  <div class="pmessagebox">
          <div class="pmBox" id="pmBox" style="margin-left: 6px;">        
                 <div class="divContainer">
                   <div class="header"></div>
                     <div class="body">
                       <h2>  <i class="ion-close-round"></i>  <span class="online"></span> <b id="pmName">Syndey Winchester </b> </h2>
                       <ul class="messagesContent" id="messageContent">
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
                               <textarea id="chatEntry" class="chatCommon txtstuff" placeholder="Type Message" style="height:58px"></textarea>
                           </form>
                       </div>
                   </div>
           </div>
     </div> -->

      <div class="tvwrapper wrapper toggle-good">
            <div class="itemLabels"> My Slots Games </div>
            <div class="tv"> <span></span> </div>
          </div> 

       <div class="diarywrapper 
        wrapper toggle-good">
            <div class="itemLabels"> My Details </div>
            <div class="diary"> <span></span> </div>
          </div>
          
     <!--      <div class="maginterview">
            <div class="maginterviewmain">
              <ul>
                <li>            
                  <p> Hi {{ $user->user_detail->firstname }}! We've got some questions  </p>  
                </li>             
                <li>            
                  <p> Please take time to answer...  </p>  
                </li>             
              </ul>
            </div>
          </div> -->

     <!--      <div class="magwrapper wrapper toggle-good">
            <div class="itemLabels"> About You </div>
            <div class="magazine"> <span></span> </div>
          </div> -->

 
          <div class="keywrapper  wrapper  toggle-good">
            <div class="itemLabels"> Change Password </div>
            <div class="key"> <span></span> </div>
          </div>

        <!--   <div class="friendsnotif">
           <h4> What's in your inbox today? </h4> 
           <div class="friendsnotification">
            <ul>

               @foreach($user->myMessages as $msg)                
                <li data-user="{{ $msg->from_user->user_detail->user_id }}">
                  <a href="javascript:;" class="subModalToggle pmFriend toggle-good" data-target="#pmBox"><span class="offline" id="friend-message-online-status-{{ $msg->from_user->user_detail->user_id }}">
                    <div class="msgImgcont"  style="width: 28px;height: 28px;margin-top: -2px;">
                      <img src="{{ $msg->from_user->user_detail->profile_picture ? asset('').'/'.$msg->from_user->user_detail->profile_picture : asset('images/default_profile_picture.png') }}" alt="">
                    </div>                    
                    <p> <b> {{ ucwords($msg->from_user->user_detail->firstname.' '.$msg->from_user->user_detail->lastname ) }}  </b> {{ $msg->message }} </p>
                  </a>                     
                </li>


                @endforeach

          
            </ul>
            </div>
          </div>
 -->
          <div class="friendswrapper wrapper toggle-good">
          <div class="itemLabels"> My Friends </div>
            <div class="friends"> <span></span> </div>
          </div>


          <div class="picwrapper wrapper">
            <div class="itemLabels"> My Profile Picture </div>        
            <div class="pic">                 
           <!--  <img src="{{  $user->user_detail->profile_picture ? asset('').'/'.$user->user_detail->profile_picture : asset('images/default_profile_picture.png')   }}" alt="" class="profile_pic" id="picPreview"> -->
            <!-- <img src ="{{asset('user_uploads')}}/user_{{$user->id}}/{{$user->user_detail->profile_picture }}" alt="" class="profile_pic" id="picPreview"> 
             -->
               <img src ="{{ $user->user_detail->profile_picture ? asset('user_uploads').'/user_'.$user->id.'/'.$user->user_detail->profile_picture : asset('images/default_profile_picture.png') }}" alt="" class="profile_pic" id="picPreview">
            </div>

            <label class="myLabel">
            <input type="file" class="upload file-input" name="profilePic" accept="image/*" id="profilePic" />
            <span>    </span>
        </label>

</div>
@endsection

@section('custom_scripts')
<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
<!-- <script src="{{ asset('js/jquery.vticker.min.js') }}"></script> -->
<script src="{{ asset('js/bookflip.js') }}"></script>

<script type="text/javascript">
      
$(document).ready(function(){

  // $('.tvwrapper').on('click', function(e){  e.preventDefault();  $(this).siblings('.box').toggleClass('active');});
  // $('.keywrapper').on('click', function(e){  e.preventDefault();  $(this).siblings('.box2').toggleClass('active');});
  // $('.diarywrapper').on('click', function(e){  e.preventDefault();  $(this).siblings('.box3').toggleClass('active');});
  // $('.magwrapper').on('click', function(e){  e.preventDefault();  $(this).siblings('.box4').toggleClass('active');});
  // $('.friendswrapper').on('click', function(e){  e.preventDefault();  $(this).siblings('.box5').toggleClass('active');});


  $(document).on('click','.pmFriend', function(){
    $('.pmBox').css('display','block');
  });

  $('.keybox .ion-close-round').click(function() {        
     $(".keybox ").fadeToggle('fast');
  });
  $('.keywrapper').click(function() {        
     $(".keybox ").fadeToggle('fast');
  });

  $('.profilebox .ion-close-round').click(function() {        
     $(".profilebox ").fadeToggle('fast');
  });
  $('.diarywrapper').click(function() {        
     $(".profilebox ").fadeToggle('fast');
  });

  $('.tvbox > .ion-close-round').click(function() {        
     $(".tvbox ").fadeToggle('fast');
  });
  $('.tvwrapper').click(function() {        
     $(".tvbox ").fadeToggle('fast');
  });

   $('#beforeTvStep').on('click','.cd-next', function(){
      $(".tvbox ").fadeIn('fast');
  });

$('#lastTvStep').on('click', '.cd-prev', function(){
     $(".tvbox ").fadeIn('fast');
});

  $('.afterTvStep').on('click', '.cd-prev', function(){
      prev = $(this).parents('.afterTvStep').attr('data-prev');

      if(prev){
          $("label[for='"+prev+"']").trigger('click');
      }else{
         $(".tvbox ").fadeOut('fast');
      }
  });
  $('.afterTvStep').on('click', '.cd-next', function(){
      next = $(this).parents('.afterTvStep').attr('data-next');
      if(next){
          $("label[for='"+next+"']").trigger('click');
      }else{
         $(".tvbox ").fadeOut('fast');
      }
  });

  $('#friendprofopen').click(function() {        
     $(".friendProfile ").fadeToggle('fast');
  });

   $('.imgContainer .ion-close-round').click(function() {        
     $(".friendProfile ").fadeToggle('fast');
  });

  // $('.msgImgcont img').click(function() {        
  //    $(".friendProfile ").fadeToggle('fast');
  // });

  $('.magbox .ion-close-round').click(function() {        
     $(".magbox ").fadeToggle('fast');
  });

  $('.magwrapper').click(function() {        
     $(".magbox ").fadeToggle('fast');
  });

  $('.casinoBox .ion-close-round').click(function() {        
     $(".casinoBox ").hide();
  });

   $('#profilePic').click(function(e){
    e.stopPropagation();
  });

  $('#mirror').click(function(e){
    $('#profilePic').click();   
  });

  // $('.maginterviewmain').vTicker('init', {
  //     speed: 600, 
  //     padding:10
  // });
  // $('.friendsnotification').vTicker('init', {
  //     speed: 400,
  //     height: 40,
  //     padding:8
  // });

  $('.nav-tabs li a').on('click', function(){
    $(this).parent().addClass('active');
    $(this).parents('ul').find('li').not($(this).parent()).removeClass('active');
    theContent = $('#'+$(this).attr('aria-controls')).addClass('active');
    $('.tab-content').find('.tab-pane').not(theContent).removeClass('active');
    $(theContent).trigger('tab-open');
  });

  $('.gameList .rating').rateit({ max: 5, step: 0.1, min : 0.5 });

  var gameExpUrl = '{{ url("gameExp") }}';
  var userId = $('#userId').val();
  var baseUrl = '{{ url() }}';
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


    function observeFriendSession(){

      friend_ids = [];
      $('#friendList').find('li').each(function(){
          friend_ids.push($(this).data('friend'));
      });

      socket.emit('observe_friend_session', friend_ids);

    }

    observeFriendSession();


/*    friend_login
friend_logout*/

    /*socket.on('friend_login', function(friend_id){
        console.log('friend_login');
        console.log(friend_id);
        $('#friend-online-status-'+friend_id).removeClass('offline').parent('li').prependTo('#friendList');
    });
    socket.on('friend_logout', function(friend_id){
        console.log('friend_logout');
        console.log(friend_id);
        $('#friend-online-status-'+friend_id).addClass('offline');
    });*/


    playNowAJAX = false;
    $('.buttonone').click(function() {

      $(".casinoBox ").show();

      if(!playNowAJAX){
          playNowAJAX = true;

        $('#selectCasino').html('').append($('<li>').text('Loading...'));

      post_id = $(this).data('post');

      $.ajax({
        type : 'POST',
        url : gameExpUrl+'/playNow',
        data : { _token : CSRF_TOKEN, post_id : post_id },
        dataType : 'json',
        success : function(data){
          console.log(data);

          $('#selectCasino').html('');
          playNowAJAX = false;

          if(data && data.length){
            
            $.each(data, function(){
              $('#selectCasino').append(
                  $('<li>')
                      .append(
                        $('<a href="'+this.link_desktop+'" target="_blank">')
                            .append(
                              $('<img alt="">').attr('src', '{{url("uploads")}}/'+this.image_url)
                              )
                        )
                )
            });
          }else{
            $('#selectCasino').append($('<li>').text('No Casino Available'));
          }
          
        },error : function(xhr){
          console.log(xhr.responseText);
        }
      });

     
      }


  });


  $('#searchPeopleForm').on('submit', function(e){
    search = $('#searchPeople').val();
    e.preventDefault();
    action = $(this).attr('action');
    if(search){
      window.location.href=action+'?search='+search;
    }
  });


  questionAjax =false;
  $(document).on('click','.chooseAnswer', function(e){
      e.preventDefault();
      _this = this;
      question_id = $(_this).parents('.questionContainer').data('id');
      follow_id = $(_this).data('follow-id');
      choice_id = $(_this).data('id');
      response = $(_this).data('response');

      if(!questionAjax && question_id && choice_id){

        questionAjax = true;

        $.ajax({

            url : '{{ url("question/answer") }}',
            data : { _token : CSRF_TOKEN, question_id : question_id, choice_id : choice_id },
            type : 'POST',
            dataType : 'json',
            success : function(answered){
              
              if(answered){

                 

                ul = $(_this).parents('ul').html('');

                new_button = $('<li>').append($('<a href="javascript:;">').text('You answered: '+$(_this).text()));
                $(ul).append(new_button);

                if(response){

                  responseText = $('<li>').addClass('response').append($('<p>').text(response));

                  $(ul).append( responseText );
                }

                if(follow_id){

                      $('.follow_up_'+follow_id).css('display', 'block');
                  }

                  pageIndex = $(ul).parents('.questionpage').find('.questionBody').data('page');
                  pages[pageIndex] = $(ul).parents('.questionpage').parent()[0].innerHTML;
              }

                questionAjax = false;

            },error : function(xhr){
              console.log(xhr.responseText);
            }
          });
      }
      

      

  });
/*doneCropping
cancelCropping*/

function dataURItoBlob(dataURI, callback) {
// convert base64 to raw binary data held in a string
// doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
var byteString = atob(dataURI.split(',')[1]);

// separate out the mime component
var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

// write the bytes of the string to an ArrayBuffer
var ab = new ArrayBuffer(byteString.length);
var ia = new Uint8Array(ab);
for (var i = 0; i < byteString.length; i++) {
ia[i] = byteString.charCodeAt(i);
}

// write the ArrayBuffer to a blob, and you're done
var bb = new Blob([ab], {type: mimeString});
return bb;
}

/*  cropperInstance = $('#cropperH').croppie({
          enableExif: true,
               viewport: {
                  width: 150,
                  height: 150,
                  type: 'square'
               },
               boundary: {
                  width: 300,
                  height: 300
               }
            });*/
  
  $('.cropperContainer').on('click', '> .fa-ion-close-round, #cancelCropping',function(){
      $('.cropperContainer').hide();
  });

/*  $('#doneCropping').on('click', function(){

      cropperPromise = cropperInstance.croppie('result', {
        type : 'canvas',
        size : 'viewport'
      }).then(function(cropCanvas){
        if(cropCanvas){
            $('#picPreview').attr('src',cropCanvas );

            profile_pictureData = dataURItoBlob(cropCanvas);
            console.log(profile_pictureData);
          }
      });
      
  });*/

var $uploadCrop;

    function readFile(input) {
      if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                 $('.cropperContainer').show();
                $uploadCrop.croppie('bind', {
                  url: e.target.result,
                });
              }
              
              reader.readAsDataURL(input.files[0]);
          }
          
    }

    uploadCropAjax = false;
    $uploadCrop = $('#cropperH').croppie({
         
               viewport: {
                  width: 150,
                  height: 150,
                  type: 'square'
               },
               boundary: {
                  width: 300,
                  height: 300
               },
                enableOrientation: true,
                enableExif: true,
            });

    $('#profilePic').on('change', function () { readFile(this); });
    $('#doneCropping').on('click', function (ev) {
      $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport',
      }).then(function (resp) {

         
        if(!uploadCropAjax){
          uploadCropAjax = true;
            profile_pictureData = dataURItoBlob(resp);
            formData = new FormData();
            formData.append('profile_picture', profile_pictureData, 'profile_picture.png');
            formData.append('user_id', userId);
            formData.append('_token', CSRF_TOKEN);
            $('#cropProgressBar').show();
              $.ajax({
                url: gameExpUrl+'/uploadProfilePic',
                type : 'POST',
                 xhr: function() {
                    var xhr = $.ajaxSettings.xhr();
                    xhr.upload.onprogress = function(e) {
                        percentage = Math.floor(e.loaded / e.total *100) + '%';
                        $('#cropProgressBar').find('.progressBarPercent').animate({ 'width' : percentage }, 500).text(percentage);
                    };
                    return xhr;
                },
                data : formData,
                dataType : 'json',
                processData: false,
                contentType: false,
                success : function(data){
                  uploadCropAjax = false;
                  $('.cropperContainer').hide();
                  $('#cropProgressBar').hide().find('.progressBarPercent').css('width', '0').text('0%');
                  $('#picPreview').attr('src',resp );
                },error : function(xhr){
                  console.log(xhr.responseText);
                }
              });
        }

      });
    });

  $('.gameList').bind('rated','.rating', function(e, value){
      

      input = $(e.target).parent().find('input');

      data_id = $(input).data('id');
      post_id = $(input).data('post');

      if(post_id && userId ){

        $.ajax({
          type : 'POST',
          url: gameExpUrl+'/rateGame',
          data : { rating : value, user_id : userId , post_id : post_id , _token : CSRF_TOKEN },
          dataType : 'json',
          success : function(data){
            console.log(data);
            if(data){
              $('span[data-target="'+$(input).attr('id')+'"]').text('RATED!');
            }
          },error : function(xhr){
            console.log(xhr.responseText);
          }

        });
      }
      //alert(data_id);
  });

});



      var gameExpUrl = '{{ url("gameExp") }}';
      var profileUrl = '{{ url("profile") }}';
      var messageUrl = '{{ url("message") }}';
      var sessionUrl = '{{ url("session") }}';
      var userId = $('#userId').val();
      var userImage = $('#userId').data('image');
      var userName = $('#userId').data('name');
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var imageUrl = '{{ asset("uploads") }}';
      var publicUrl = '{{ asset("") }}';
      var defaultProfilePic = publicUrl+'/images/default_profile_picture.png';
      var friendUrl = '{{ url("friends") }}';

      /*

      $('#sendPrivateMessage').on('submit', function(e){
        e.preventDefault();
          theUser = $(this).data('user');
          message = $('#chatEntry').val();

          $('#chatEntry').val('');

          if(theUser && message){

             $('#messageContent').append(
                      $('<li>').addClass('alt').append(
                          $('<span>').addClass('alt').text(message)
                        )
                      );

            $.ajax({
              url : messageUrl+'/sendPrivateMessage',
              data : { from : userId, to : theUser, message : message, _token : CSRF_TOKEN },
              type : 'POST',
              dataType : 'json',
              success : function(data){
                socket.emit('send_private_message', { to : theUser, message : message });

                 $('#messageContent').animate({
                        scrollTop: $('#messageContent')[0].scrollHeight
                  }, 2000);

              },error : function(xhr){
                console.log(xhr.responseText);
              }
            });

          }

      });

      $('#messagesMenu').one('click', function(){


    $('#myMessages').html('').append($('<li>').addClass('loading').text('Loading'));
        
        $.ajax({
            url : messageUrl+'/getInbox',
            data : { user_id : userId, _token : CSRF_TOKEN },
            dataType : 'json',
            type : 'POST',
            success : function(data){

              sortDates = data.sort(function(a, b){

                  return new Date(a.created_at) < new Date(b.created_at);
              });


              unread_messages = [];
              read_messages = [];

              $.each(sortDates, function(){

                  if(this.read == 0){
                    unread_messages.push(this);
                  }else{
                    read_messages.push(this);
                  }
              });

              inbox = unread_messages.concat(read_messages);



             $('#myMessages').html('');
             $('#unreadMessageNotification').html('');

             $.each(inbox, function(){

              msg = this;

                button = $('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
                              .append(
                                $('<img>').attr('src', msg.from_user.user_detail.profile_picture ? publicUrl+'/'+ msg.from_user.user_detail.profile_picture : defaultProfilePic )


                                )

                              .append(
                                $('<p>')
                                    .append(
                                      $('<span>').addClass('name').text(msg.from_user.user_detail.firstname+' '+msg.from_user.user_detail.lastname)
                                          .append($('<span>').addClass('timestamp').text('3:36pm'))
                                      )
                                    .append(
                                        $('<span>').addClass('message').text(msg.message)
                                      )
                                );

                  if(msg.read == 0){
                    $(button).addClass('unread');
                  }

                  $('#myMessages').append(

                      $('<li>').attr('id', 'inbox-user-'+msg.from_user.user_detail.user_id).attr('data-user', msg.from_user.user_detail.user_id)
                        .append(
                            button
                          )

                    );

                  
  
             });


            },error : function(xhr){
              console.log(xhr.responseText);
            }
        });
        
    });


      $(document).on('click', '.pmFriend', function(){

         modal = $('#pmBox');

        if(!modal.hasClass('loading')){

            $(modal).addClass('loading');
            theUser = $(this).parent().data('user');
            $('#pmBox').attr('data-current', theUser);
            $('#sendPrivateMessage').data('user', theUser);
            $(modal).find('.divContainer').hide();
            loading = $('<div>').addClass('loadContainer').text('Loading');
            $(modal).append(loading);
            $('#messageContent').html('');
            $.ajax({
              url : messageUrl+'/getPrivateMessages',
              data : { user_id : userId , other_person : theUser , _token : CSRF_TOKEN },
              dataType : 'json',
              type : 'POST',
              success : function(data){
                console.log(data);

                $('#unreadMessage').text('('+data['unread']+')');
                $('#readMessage').text('('+data['read']+')');

                $(modal).find('.divContainer').show();
                $(loading).remove();
                modal.removeClass('loading');

                $('#pmName').text( data.other_person.user_detail.firstname +' '+ data.other_person.user_detail.lastname);
                console.log(data.conversation);
                if(data.conversation && data.conversation.length > 0){

                  $.each(data.conversation, function(){

                    console.log(this);

                    li = $('<li>');

                    span = $('<span>').text(this.message);

                    if(this.from != userId){

                      $(li).append(
                        $('<img>').attr('src', data.other_person.user_detail.profile_picture ? publicUrl+'/'+data.other_person.user_detail.profile_picture : defaultProfilePic )
                      );

                    }else{


                       $(li).addClass('alt');
                     
                      $(span).addClass('alt');

                   
                    }

                    $('#messageContent').append(
                      li.append(span)
                      );



                  });
                }

              },error : function(xhr){
                console.log(xhr.responseText);
              }
            });
          } 

      });

      socket.on('post_private_message', function(message){
          console.log('you got a private message!');
          console.log(message);

          if($('#pmBox').data('current') == message.from.user_id && $('#pmBox').is(':visible')){
              console.log('real time add');

              $('#pmMessageContent').append(
                      $('<li>').append(
                        $('<img>').attr('src', message.from.profile_picture ? publicUrl+'/'+message.from.profile_picture : defaultProfilePic )
                      )
                      .append(
                          $('<p>').text(message.message)
                        )
                );
          }else{
            
            if($('#inbox-user-'+message.from.user_id).length){

              $('#inbox-user-'+message.from.user_id).find('a').addClass('unread').find('.message').text(message.message);

              $('#myMessages').prepend($('#inbox-user-'+message.from.user_id));

              ;

            }else{
                $('#myMessages').prepend(

                      $('<li>').attr('data-user', message.from.user_id).attr('id', 'inbox-user-'+message.from.user_id)
                        .append(
                            $('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox').addClass('unread')
                              .append(
                                $('<img>').attr('src', message.from.profile_picture ? publicUrl+'/'+ message.from.profile_picture : defaultProfilePic )
                                )

                              .append(
                                $('<p>')
                                    .append(
                                      $('<span>').addClass('name').text(message.from.name)
                                          .append($('<span>').addClass('timestamp').text('3:36pm'))
                                      )
                                    .append(
                                        $('<span>').addClass('message').text(message.message)
                                      )
                                )
                          )

                    );
            }

            $('#unreadMessageNotification').html('').append(
                  $('<span>').addClass('notifcount').text($('#myMessages li a.unread').length)
              )

             
          }
      });*/

       /***************** START BUTTON FOR ADD CANCEL AND SEND REQUEST ***********************/
      $('#profileBtn').on('click', 'button', function(){

    other_person = $(this).data('other_person');
    action = $(this).data('action');
    friend_id = $(this).data('friend_id');

    $(this).attr('disabled', 'disabled');

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

      /***************** END BUTTON FOR ADD CANCEL AND SEND REQUEST ***********************/

        $('#friendList .msgImgcont img').click(function() {        
            $(".friendProfile ").fadeIn('fast');
        });

 $('#myFriends').on('click','.viewProfile', function(){

          modal = $('#friendProfile');

          if(!modal.hasClass('loading')){

            $(modal).addClass('loading');
            theUser = $(this).parents('li').find('.options').data('user');
            $(modal).find('.divContainer').hide();
            loading = $('<div>').addClass('loadContainer').text('Loading');
            $(modal).append(loading);
            $('#profileFavorites').html('');
            $('#profilePlayedGames').html('');
            $('#profileBtn').html('');
      
            $.ajax({
              url : profileUrl+'/viewFriendProfile',
              data : { user_id : userId, other_person : theUser , _token : CSRF_TOKEN },
              //data : formData,
              dataType : 'json',
              type : 'POST',
              success : function(data){

                console.log('viewFriendProfile');
                console.log(data);

                  $(modal).find('.divContainer').show();
                  $(loading).remove();
                  modal.removeClass('loading');
                  //$('#viewFriendProfilePic').attr('src', data.user_detail.profile_picture ? publicUrl+'/'+data.user_detail.profile_picture : defaultProfilePic  )
                  $('#viewFriendProfilePic').attr('src', getImage(data, null)  )
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

       function getImage(data, size) {

      if(size === null) {
          return data.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+data.user_detail.user_id+'/'+data.user_detail.profile_picture : defaultProfilePic;  
      }
      return data.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+data.user_detail.user_id+'/'+size+'/'+data.user_detail.profile_picture : defaultProfilePic;
       //data.user_detail.profile_picture ? publicUrl+'/user_uploads/user_'+data.user_detail.user_id+'/'+data.user_detail.profile_picture : defaultProfilePic
    }



      $('.emojiTrigger').click(function(){
        $('#tooltip').toggle();
        $('.arrow_box').toggle();
      });

     $('.contenttab ul').slimScroll({
        height: '380px'
    });

    $('.friendBox .ion-close-round').click(function() {
      $('.friendsbox').css("left","-425px");
    });

    $('.friendswrapper').click(function() {
       $('.friendsbox').css("left","0");
    });

    $('.moredetailsbox').slimscroll({
      height: '180px'
    })



init_bookflip(0);

function init_bookflip(startpage){
   startingPage = startpage;
   var pages=new Array;

    pWidth=380; //width of each page
    pHeight=482; //height of each page

    numPixels=20;  //size of block in pixels to move each pass
    pSpeed=15; //speed of animation, more is slower

   /* startingPage=0;//select page to start from, for last page use "e", eg. startingPage="e"*/
    allowAutoflipFromUrl = true; //true allows querystring in url eg bookflip.html?autoflip=5

    pageBackgroundColor="#CCCCCC";
    pageFontColor="#ffffff";

    pageBorderWidth="0";
    pageBorderColor="transparent";
    pageBorderStyle="solid";  //dotted, dashed, solid, double, groove, ridge, inset, outset, dotted solid double dashed, dotted solid

    pageShadowLeftImgUrl ="../images/black_gradient.png";
    pageShadowWidth = 80;
    pageShadowOpacity = 60;
    pageShadow=1 //0=shadow off, 1= shadow on left page

    allowPageClick=true; //allow page turn by clicking the page directly
    allowNavigation=true; //this builds a drop down list of pages for auto navigation.
    pageNumberPrefix="page "; //displays in the drop down list of pages if enabled

    ini();
}


</script>

@endsection


</body>
</html>

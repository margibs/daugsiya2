<!DOCTYPE html>
<html>
  <head>
    <title>@yield('page-title')</title>
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1.0,
                                   maximum-scale=1.0,
                                   user-scalable=no,
                                   minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="baseURL" content="{{ url('') }}" />

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mobileLayout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mobileFront.css') }}">   
  <link rel="stylesheet" href="{{ asset('css/tagging.css') }}">  
  <link rel="stylesheet" href="{{ asset('css/jrate.css') }}"> 

  <!-- <link rel="stylesheet" href="{{ elixir('css/mobile.all.css') }}"> -->

    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:800,900' rel='stylesheet' type='text/css'>
    @yield('custom-styles')

    <style>

     footer ul{
         padding: 25px 0 0 0;
          height: 60px;
      }
      footer ul li, footer ul li a, footer ul li div{
        font-size: 32px;
        margin: 2px 9px 0 8px;
        width: 58px;
        position: relative;
      }
      footer ul li i {
        position: relative;
        left: 2px;
      }
      footer ul li a{
            margin-left: 0;
      }
      footer ul li{
        font-size: 13px;
        position: relative;
        top: -31px;
            color: #8C8C8C;
      }
      .pastelblue{
        color: #5fa0ee!important;
      }
      .lightbrown{
        color: #CA7C51!important;
      }
      .darkorange{
        color: #e3ab32!important;
      }
      .lightorange{
        color: #ffd451!important;
      }
      nav i{
        display: initial;
        position: relative;
        margin-right: 5px;
        top: 5px;
      }
          .side-nav a{
        font-size: 16px;
        font-weight: 600;
        color: #000;
      }

    .modal.bottom-sheet {
    top: auto;
    bottom: -100%;
    margin: 0;
    width: 100%;
    height: 100%;
    max-height: 45%;
    border-radius: 0;
    will-change: bottom, opacity;
    overflow:hidden;
    }

  
.modal.bottom-sheet{
  max-height: 50%;
}
.chatBox {
    padding-bottom: 10px;
    position: absolute;
    height: 100%;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.78);
}
.chatBox p{
font-weight: 600;
    font-size: 17px;
    margin-bottom: 3px;
    margin-top: 0;
    color: #B91018;
    padding: 4px;
    background: #ECECEC;
}
.chatBox .body {
    background: transparent;
    position: relative;
    height: 90%;
    width: 100%;
    padding-top: 0;
    padding-bottom: 40px;
    margin: auto auto auto auto;
    padding: 10px 0 -2px 0;
    overflow-y: scroll;
}
#chat_room_modal{
    border: none;
    background: rgba(255, 255, 255, 0.65);
}
.chatFooterModal{
    background: rgba(255, 255, 255, 0.4);
}
.chatFooterModal a{
color: #fff;
    font-size: 23px;
    font-family: 'Work Sans';
    font-weight: 700;
    margin: 0 auto;
    width: 50%;
    margin-top: -60px;
    position: relative;
    z-index: 2;
}



      
      </style>
  </head>
    @if(isset($user) && ($user->welcome_package_sent == 0 || $user->email_confirm == 0))
     <body class="withnotif">
  @else
  <body>
@endif
       @if(isset($user))

          @if($user->user_detail->profile_picture == "")
                 <input type="hidden" value="{{ $user->id }}" id="userId" data-profile="{{$user->user_detail->profile_picture}}" data-image="{{ 'user_uploads/default_image/default_01.png' }}" data-name="{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}" data-isAdmin="{{ $user->is_admin }}">
            @else
                <input type="hidden" value="{{ $user->id }}" id="userId" data-profile="{{$user->user_detail->profile_picture}}" data-image="{{$user->user_detail->profile_picture}}" data-name="{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}" data-isAdmin="{{ $user->is_admin }}">
            @endif

    @endif
    
    @if(isset($miniChatrooms))
        <input type="hidden" value="{{ json_encode($miniChatrooms) }}" id="miniChatrooms">
    @endif

    @if(isset($session_id))
       <input type="hidden" value="{{ $session_id }}" id="sessionId">
      @endif


     <header>
      <div class="row no-gutters" style="position: relative;">
        <div class="col-xs-24">
           <!-- <a href="javascript:;" class="waves-effect back_button" id="backButton"><i class="ion-navicon"></i> </a> -->
           @if(!isset($user))
             <a href="{{ url('/login') }}" class="logout_button logoutlink"> <i class="ion-person"></i> Login | Register  </a>             
             <a href="{{ url('/') }}" class="logo_button" style="left: 31px;"> <img src="http://susanwins.com/uploads/52424_logo.png" alt=""> </a>
          @endif

          @if(isset($user))
           <a href="#" class="back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a>          
           <a href="{{ url('/') }}" class="logo_button"> <img src="http://susanwins.com/uploads/52424_logo.png" alt=""> </a>           
        
          @endif
        

        </div>
      </div>
        @if(Auth::check())
          @if(isset($user) && $user->email_confirm == 0)
                <div class="confirmNotification">
                    Please check your email and confirm your membership!
              </div>
              @elseif(isset($user) && $user->welcome_package_sent == 0)
              <div class="confirmNotification">
                    Do you wish to receive the amazing Free Welcome Pack?
                    <button type="button" id="yesWelcomePackage" href="#welcomePackageAddress">Yes</button>
              </div>
        @endif
      @endif
    </header>

    
    @if(Auth::check())
       <nav class="transparent slide_menu">
  <ul class="right hide-on-med-and-down">
    <!-- <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li> -->

  </ul>
      <ul id="slide-out" class="side-nav">
          <!-- <div class="card">
            <div class="card-image"> -->
              <!-- <img src="http://lorempixel.com/580/250/nature/1"> -->
           <!--    <img src="{{ asset('images/background.jpg') }}">
           <span class="card-title">{{  $user->user_detail->firstname.' '.$user->user_detail->lastname }}</span> -->
             <!--    <img src="{{ $user->user_detail->profile_picture ? 'user_uploads/user_'.$user->user_detail->user_id.'/'.$user->user_detail->profile_picture :  'user_uploads/default_image/default_01.png' }}"> 
              <span class="card-title" style="color:blue;">{{  $user->user_detail->firstname.' '.$user->user_detail->lastname }}</span> -->
            <!-- </div>
        </div> -->
          <a href="{{ url('/') }}"> <i class="ion-ios-home-outline"></i> Home </a>            
          <a href="#" id="menuMessage"> <i class="ion-ios-chatbubble-outline"></i> Messages </a>            
          <a href="{{ url('clubhouse/profile') }}"> <i class="ion-ios-person-outline"></i> Profile </a>
          <a href="{{ url('clubhouse/chatroom') }}"> <i class="ion-ios-people-outline"></i> Chatroom </a>
          <a href="{{ url('prizes') }}"> <i class="ion-ios-star-outline"></i> Prize Room </a>
          <a href="{{ url('clubhouse/slotsroom') }}"> <i class="ion-ios-game-controller-a"></i> Slots Room </a>
          <a href="{{ url('/logout') }}"> <i class="ion-ios-circle-outline"></i> Logout </a> 
      </ul>
    </nav>
      @endif

  @if(Auth::check()) 
    <footer>
      <ul>
        <li> <a href="{{ url('/clubhouse/home') }}" class="lightbrown"> <i class="ion-home"></i> <span class="tinylabel"> Clubhouse </span> </a> </li>
        <li> <div id="messagesMenu">  <i class="ion-chatbubbles pastelblue"></i> <span class="tinylabel"> Messages </span>
               <span id="unreadMessageNotification" class="notifCounter">
  
                           @if(isset($unread_messages_count) && $unread_messages_count > 0)
                               <span class="notifcount">{{ $unread_messages_count }}</span>
                             @endif
                </span>
  
        </div> </li>
        <li> <div id="globalNotifMenu"> <i class="ion-ios-bell darkorange"></i> <span class="tinylabel"> Notification </span>
                  
                  <span id="unreadGlobalNotification" class="notifCounter">
  
                            @if(isset($global_notification_count) && $global_notification_count > 0)
                               <span class="notifcount">{{ $global_notification_count }}</span>
                             @endif
                  </span>

        </div> </li>
        <li>  <a href="{{ url('clubhouse/chatroom') }}"> <div> <i class="ion-android-happy lightorange"></i> <span class="tinylabel"> Request </span>
            
                    <span id="unreadChatroomNotification" class="notifCounter">
      
                                @if(isset($chatroom_notification_count) && $chatroom_notification_count > 0)
                                     <span class="notifcount   animated bounce bounceInUp"> 
                                           {{ $chatroom_notification_count }}
                                         </span>
                                   @endif
                    </span>
            </div></a> </li>
    <!--     <li> 
           <div class="fixed-action-btn vertical click-to-toggle  class="moreOptions"">
              <a class="">
              <i class="ion-more"></i>
                </a>
                <ul>
                  <li><a class="btn-floating red" href="{{ url('logout') }}"><i class="material-icons">insert_chart</i></a></li>
                  <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                  <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                  <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                </ul> 
        </div>
         </li> -->
      
      </ul>
    </footer>
    @else
    <footer class="offlinechat">
      <a class="directlink" href="{{ url('/signup') }}">
        <em> Join The <span> Fun! </span> </em>
      </a>
       <!--  <a class="waves-effect waves-light modal-trigger modalpopup " href="#modal1">
           <a class="waves-effect waves-light modal-trigger" href="#modal2">
          SusansLounge
         <span  id="popMessage" > </span>
       </a>  -->

        <a class="waves-effect waves-light modal-trigger modalpopup " href="#chat_room_modal">
    <!--   <a class="waves-effect waves-light modal-trigger" href="#modal2">  -->
           SusansLounge
          <span  id="popMessage" > </span>
        </a> 
           <!-- Modal Trigger -->
 
        <div id="chatMessageCount"><span id="unreadChat"></span></div>
    </footer>
     @endif
      
        <!-- Modal Message -->
     <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4> Signup today to use this feature and receive an AMAZING Welcome Pack! <a href="{{ url('/signup') }}"> Signup </a> or <a href="{{ url('/login') }}"> Login </a></h4>      
    </div>
  </div>

 

  <!-- Modal Structure -->
<div id="chat_room_modal" class="modal bottom-sheet">
   <div class="modal-content">  

       <div class="chatBox">
        <p> Welcome to SusansLounge! </p>
               <div class="body">
               <ul>
                 <li>
                   <img src="#" class="chatProfPic" data-id="">
                   <span></span>
                 </li>
               </ul>
               </div>
               <div class="chatFooterModal">
                 <a href="http://susanwins.com/signup" class="join">Join Chat</a>
                     <!--  <a href="#" class="join">Join Chat</a> -->
               </div>
           </div>
     </div>
   </div>
 </div>
          

  

  <div class="pageLoading" id="mainLoading">
            <div class="preloaderContainer">
                  <div class="preloader-wrapper big active">
                  <div class="spinner-layer spinner-red-only">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>
            </div>
         </div>

  <div class="container topMargin" >

        <!-- <div class="slotreel">
            <div class="reelgames">
              <div class="inner">

                    <div class="reel">

                          <div class="row no-gutters">
                            <div class="col-xs-8">
                              <div id="planeMachine1">
                                <img src="http://susanwins.com/uploads/39984_supersm.jpg" alt="">
                               
                                         
                              </div>
                            </div> 
                            <div class="col-xs-8"> 
                              <div id="planeMachine2">
                                 <img src="http://susanwins.com/uploads/39984_supersm.jpg" alt="">
                                
                               
                              </div>
                            </div> 
                            <div class="col-xs-8"> 
                              <div id="planeMachine3">
                                 <img src="http://susanwins.com/uploads/39984_supersm.jpg" alt="">
                                
                              </div> 
                            </div> 
                          </div>    

                    </div>                    

              </div>

            </div>                 
            <div class="d"></div>              
        </div> -->


        @yield('homecontentResposnive')
        @yield('singlecontentResposnive')
         

  </div>

  <div id="welcomePackageAddress" class="modal">
   <div class="inner">
       <h2>  Do you wish to receive the amazing Free Welcome Pack?</h2>
          <p class="two">Enter your address below - We've got an incredible FREE welcome pack to send you!</p>
        <div class="form-group">
            <textarea name="address" placeholder="Enter Address" class="welcomeAddress"></textarea>

        </div>
        <div class="form-group">
          <button type="button" class="submitWelcomePackage">Submit</button>
        </div>
      </div>
  </div>
<div class="app-page" data-page="myMessages">
      <div class="app-topbar"></div>
    <div class="app-content defaultBg">

      <div class="pageLoading">
                <div class="preloaderContainer">
                      <div class="preloader-wrapper big active">
                      <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                </div>
             </div>

              <div id="yourMessages" class="col s12">
            <ul class="messageList">             
                     </ul>
              </div>
      </div>     
</div>
       <div class="app-page" data-page="myGlobalNotifs">
      <div class="app-topbar"></div>
    <div class="app-content defaultBg">

     <div class="pageLoading">
               <div class="preloaderContainer">
                     <div class="preloader-wrapper big active">
                     <div class="spinner-layer spinner-red-only">
                       <div class="circle-clipper left">
                         <div class="circle"></div>
                       </div><div class="gap-patch">
                         <div class="circle"></div>
                       </div><div class="circle-clipper right">
                         <div class="circle"></div>
                       </div>
                     </div>
                   </div>
               </div>
            </div>
            
            <div id="mainGlobalNotifs">
                <div id="yourUserNotifs" class="col s12">
                    <ul class="messageList">             
                    </ul>
                </div>
                <div id="yourGlobalNotifs" class="col s12">

              <ul class="messageList">             
                       </ul>
                </div>
            </div>
      </div>     
</div>
      <div class="app-page" data-page="myUserNotifs">
      <div class="app-topbar"></div>

    <div class="app-content defaultBg">
       <div class="pageLoading">
                <div class="preloaderContainer">
                      <div class="preloader-wrapper big active">
                      <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                </div>
             </div>

              <div id="yourUserNotifs" class="col s12">
            <ul class="messageList">             
                     </ul>
              </div>
      </div>     
</div>
      <div class="app-page" data-page="privateMessage">
      <div class="app-topbar"></div>
  <div class="app-content defaultBg">
                     <div class="pageLoading">
                <div class="preloaderContainer">
                      <div class="preloader-wrapper big active">
                      <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                </div>
             </div>
        <div class="chatBox">
            <div class="body">
            
                <ul>
            </ul>
            </div>
      
            <div class="chatFooter">
                   <div class="triggers">
                      <span class="sendMessage"><i class="fa fa-paper-plane"></i></span>
                    </div>
                    <textarea name="" placeholder="Type Message" id="sendPrivateMessageTextarea"></textarea>
            </div>
        </div>
        
      </div>
</div>
  

</body>

  <script> 
            var myFriends = '<?php echo isset($myFriends) && count($myFriends) > 0 ? json_encode($myFriends) : "" ?>';
            var myFriendsCount = '<?php echo isset($myFriends) ? count($myFriends) : 0 ?>';
            var onlineFriendsList = [];
    </script>
 
    <!-- <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.sharrre.min.js') }}"></script>  

    <script src="{{ asset('js/moment.min.js') }}"></script> 
    <script src="{{ asset('js/moment-timezone.min.js') }}"></script> 
    <script src="{{ asset('js/livestamp.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/jonasRate.js') }}"></script>
    <script src="{{ asset('js/sockets.io.js') }}"></script> -->

    <script src="{{ elixir('js/custom/main.mobile.js') }}"></script> 

    <script>


    CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    BASE_URL = "{{ url('/')}}";
    USER_ID = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
    USER_IMAGE = "{{ isset(Auth::user()->user_detail->profile_picture) ? Auth::user()->user_detail->profile_picture : '' }} ";
    USER_NAME = "{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}";
    USER_FULLNAME = "{{ isset(Auth::user()->user_detail) ? Auth::user()->user_detail->firstname.' '.Auth::user()->user_detail->lastname : '' }}";
    userImage = $('#userId').data('profile');
    DEFAULT_IMAGE = BASE_URL+'/user_uploads/default_image/default_01.png';
    ROOM_ID = "{{ isset($selectedRoom->id ) ? $selectedRoom->id  : '' }}";
    ROOM_NAME = "{{ isset($selectedRoom->name) ? $selectedRoom->name : '' }}";
    ROOM_DESCRIPTION = "{{ isset($selectedRoom->description) ? $selectedRoom->description : '' }}";
    MESSAGE = "";
    var comment_type = "{{ isset($comment_type) ? $comment_type : '' }}";
    var content_id = "{{ isset($content_id) ? $content_id : '' }}";
  
    var socket = io.connect('{{ url('') }}:8891');
  </script>

    <script src="{{ asset('js/jquery.caret.js') }}"></script>
    <script src="{{ asset('js/tagging.js') }}"></script>
    <script src="{{ asset('js/mobileLayout.js') }}"></script>
    <script src="{{ asset('js/mobileHome.js') }}"></script>
    <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
    <script src="{{ asset('js/singlePage.mobile.js') }}"></script>```

    
  <script >

    console.log(socket);
       $('#menuMessage').on('click', function(){
        //console.log("Hello World");

       
         $('.slide_menu').sideNav('hide');
           App.load('myMessages');


      });

        $('#popMessage').on('click', function(){
              //console.log("Hello World");
               //$('#modal1').openModal();
               console.log("you click Me");
               $('#chat_room_modal').openModal();
            });

        $(document).on('ready', function(){
              // $('.body ul li span').profanityFilter({
              //     customSwears: ['shit']
              // });
         
                        // $('p').profanityFilter({
                        //     customSwears: ['shit']
                        // })

                $.ajax({
                      url : BASE_URL+'/public/mobile/getChatroom/'+1,
                        type : 'GET',
                        dataType : 'json',
                        success : function(data){
                          console.log(data);
                            $('.chatBox .body ul').html('');
                            $.each(data, function() {
                               $('.chatBox .body ul').prepend(
                                  $('<li>')
                                      .append(
                                       // $('<img>').attr('src', this.profile_picture ? BASE_URL+'/user_uploads/user_'+this.user_id+'/'+this.profile_picture : DEFAULT_IMAGE ).attr('data-id', this.user_id).addClass('chatProfPic')
                                         $('<img>').attr('src', getImage(this.user.user_detail.profile_picture, this.user.user_detail.user_id, 5050) ).attr('data-id', this.user_id).addClass('chatProfPic')
                                        )
                                      .append(
                                          $('<span>').text(this.message)
                                        )
                                );
                            });
                            $('.chatBox .body').scrollTop( $('.chatBox .body ul')[0].scrollHeight);
                        },
                        error: function(error)
                        {
                          console.log(error.responseText);
                        }
                  });

                                    /********************** START GET IMAGE ******************************************************************************/
                  function getImage(profile_picture ,user_id, size) {

                      if(size === null) {
                          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : DEFAULT_IMAGE;
                      }
                       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : DEFAULT_IMAGE;
                    }

                  /********************** END GET IMAGE ******************************************************************************/


                    var CurrentScroll = 0;
                     var messageIndex = 20;
                     var scrollAjax = false;
                    $(".chatBox .body").scroll(function(e){

                      body = $(this);
                      var NextScroll = body.scrollTop();

                      //console.log(NextScroll);
                  
                      if (NextScroll > CurrentScroll){
                         //down-ward scrolling 
                         console.log("down");
                      }
                      else if(NextScroll == 0 && !scrollAjax){
                         // upward-scrolling 
                      //console.log("up");
                      scrollAjax = true;
                      $.ajax({
                          url: BASE_URL+'/public/mobile/paginate/getchatroom',
                          type: 'POST',
                          data: {start: 10, end: messageIndex, room_id: 1, _token : CSRF_TOKEN },
                          dataType: 'json',
                          success: function(data) {
                            if(data.done != 1)
                            {
                              messageIndex = messageIndex + 20;
                              //console.log(data);
                              scrollAjax = false;
                              
                            $.each(data, function() {
                               $('.chatBox .body ul').prepend(
                                  $('<li>')
                                      .append(
                                       // $('<img>').attr('src', this.profile_picture ? BASE_URL+'/user_uploads/user_'+this.user_id+'/'+this.profile_picture : DEFAULT_IMAGE ).attr('data-id', this.user_id).addClass('chatProfPic')
                                         $('<img>').attr('src', getImage(this.user.user_detail.profile_picture, this.user.user_detail.user_id, 5050)).attr('data-id', this.user_id).addClass('chatProfPic')
                                        )
                                      .append(
                                          $('<span>').text(this.message)
                                        )
                                );
                            });
                            body.scrollTop(1);
                            }
                          },
                          error: function(error) {
                            console.log(error.responseText);
                          }
                        });
                      }
                      CurrentScroll = NextScroll; 
                   });

          });




     /*$(document).on('ready', function(){
         socket.on('open_current_room', function(data){
        console.log(data);
       });
     });*/

$("textarea").focus( function(){
   $("footer").css(
    "display","none"
  );
  $(".chatFooter ").css(
    "bottom","0"
  )
});
  </script>
    @yield('app-js')
</html>
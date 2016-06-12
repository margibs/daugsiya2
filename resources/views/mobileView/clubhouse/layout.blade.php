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
   
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:800,900' rel='stylesheet' type='text/css'>
    @yield('custom-styles')


    <style type="text/css">
  
/*       .chatBox{
         padding-top: 22px;
} */
      .rateContainer{
        text-align: center;
      }
      .chip{
          display: inline-block;
          height: 50px;
          font-size: 17px;
          font-weight: 500;
          color: rgba(0,0,0,0.6);
          line-height: 32px;
          padding: 10px 12px;
          border-radius: 50px;
          background-color: transparent;
          display: block;
          margin-left: 20px;
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
      .livetime {
        font-size: xx-small;
      }
     footer ul li, footer ul li a, footer ul li div{
          font-size: 32px;
     }
    </style>

  </head>

    @if(isset($user) && ($user->welcome_package_sent == 0 || $user->email_confirm == 0))
     <body class="withnotif">
  @else
  <body>
@endif

 
       @if(isset($user))
      <input type="hidden" value="{{ $user->id }}" id="userId" data-image="{{ $user->user_detail->profile_picture ? $user->user_detail->profile_picture :  '/user_uploads/default_image/default_01.png'  }}" data-name="{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}" data-isAdmin="{{ $user->is_admin }}">
    @endif

        @if(isset($miniChatrooms))
        <input type="hidden" value="{{ json_encode($miniChatrooms) }}" id="miniChatrooms">
    @endif

    @if(isset($session_id))
       <input type="hidden" value="{{ $session_id }}" id="sessionId">
      @endif

     <header>

      <div class="row no-gutters" style="position:relative;">
        <div class="col-xs-24">
          <!--  <a href="javascript:;" class="waves-effect back_button" id="backButton"><i class="ion-navicon"></i> </a> -->
         <!--  <a href="#" class="waves-effect back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a> -->
          <!-- NEDD TO MODIFED -->
            {{--  @yield('content-menu') --}}
           <!-- <a href="{{ url('/logout') }}" class="logout_button logoutlink"> <i class="ion-locked"></i>  </a> -->

           <!-- <a href="{{ url('/') }}" class="logo_button"> <img src="http://susanwins.com/uploads/52424_logo.png" alt=""> </a> -->

             @if(!isset($user))
             <a href="{{ url('/login') }}" class="logout_button logoutlink"> <i class="ion-person"></i> Login | Register  </a>             
             <a href="{{ url('/') }}" class="logo_button" style="left: 31px;"> <img src="http://susanwins.com/uploads/52424_logo.png" alt=""> </a>
          @endif

          @if(isset($user))
           <!-- <a href="#" class="waves-effect back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a>   -->  
           @yield('content-menu')      
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



     <!-- start from menu slide bar-->
    @if(isset($user))
    <nav class="transparent slide_menu">
    <ul class="right hide-on-med-and-down">
      <!-- <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li> -->
    
    </ul>
        <ul id="slide-out" class="side-nav">
           <!--  <div class="card">
              <div class="card-image"> -->
                <!-- <img src="http://lorempixel.com/580/250/nature/1"> -->
                <!-- <img src="{{ asset('images/background.jpg') }}"> -->
                <!-- <img src="{{ $user->user_detail->profile_picture ? url('/').'/user_uploads/user_'.$user->user_detail->user_id.'/'.$user->user_detail->profile_picture :  'user_uploads/default_image/default_01.png' }}"> 
                <span class="card-title" style="color:blue;">{{  $user->user_detail->firstname.' '.$user->user_detail->lastname }}</span>
              </div>
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
    <!-- end from menu slide bar-->
    @endif

    @if(Auth::check()) 
    <footer>
      <ul>
        <li> <a href="{{ url('/clubhouse/home') }}"> <i class="ion-home lightbrown"></i> <span class="tinylabel"> Clubhouse </span> </a> </li>
        <li> <div id="messagesMenu">  <i class="ion-chatbubbles pastelblue"></i> <span class="tinylabel"> Messages </span>
               <span id="unreadMessageNotification" class="notifCounter">
  
                           @if(isset($unread_messages_count) && $unread_messages_count > 0)
                               <span class="notifcount animated bounce bounceInUp">{{ $unread_messages_count }}</span>
                             @endif
                </span>
  
        </div> </li>
        <li> <div id="globalNotifMenu"> <i class="ion-ios-bell darkorange"></i> <span class="tinylabel"> Notification </span>
                  
                  <span id="unreadGlobalNotification" class="notifCounter">
  
                            @if(isset($global_notification_count) && $global_notification_count > 0)
                               <span class="notifcount animated bounce bounceInUp">{{ $global_notification_count }}</span>
                             @endif
                  </span>

        </div> </li>
        <li> <a href="{{ url('clubhouse/chatroom') }}"> <div> <i class="ion-android-happy lightorange"></i> <span class="tinylabel"> Request </span>
            
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
     @endif

  <!--  <nav>
  
  <div class="nav-wrapper">
  
    <a href="javascript:;" class="brand-logo"> <img class="logo" src="http://susanwins.com/uploads/52424_logo.png" alt="Logo"> </a>
     @if(isset($user))
       <a href="javascript:;" data-activates="mobileSideNav" class="button-collapse" id="mobileSideNavButton"><i class="material-icons">menu</i></a>
      <ul class="side-nav" id="mobileSideNav">
        <li><a href="{{ url('clubhouse/home') }}"><img src="http://susanwins.com/uploads/38368_clubhouseicon.png"> Home</a></li>
        <li><a href="javascript:;"><img src="http://susanwins.com/uploads/64163_chaticon.png"> Messages</a></li>
        <li><a href="javascript:;"><img src="http://susanwins.com/uploads/83444_notificationicon.png"> All Notifications</a></li>
        <li><a href="javascript:;"><img src="http://susanwins.com/uploads/43069_friendicon.png"> Friend Requests</a></li>
        <li><a href="{{ url('logout') }}"><img src="http://susanwins.com/uploads/34338_logouticon.png"> Logout</a></li>
      </ul>
     @endif
     
  </div>
  
  <div class="nav-lower-wrapper">
         <a href="javascript:;" class="waves-effect back_button" id="backButton"><i class="material-icons">chevron_left</i> <span>Back</span></a>
        <h5 id="navbarTitle">All messages <span>(123)</span></h5>
         <h5 id="navbarTitle"></h5>
     </div>
      </nav>
       <ul class="bottomNotification z-depth-1">
                             
                       <li> <a href="http://susanwins.com/clubhouse/home" id="userMenu"> <img src="http://susanwins.com/uploads/38368_clubhouseicon.png"> </a> </li>
                       <li> 
                         <a href="javascript:;" id="messagesMenu"> 
                           <span id="unreadMessageNotification" class="notifCounter">
  
                           @if(isset($unread_messages_count) && $unread_messages_count > 0)
                               <span class="notifcount animated bounce bounceInUp">{{ $unread_messages_count }}</span>
                             @endif
                                                         </span>
                           <img src="http://susanwins.com/uploads/64163_chaticon.png">
                         </a> 
                       </li>
  
                       <li> 
  
                         <a href="javascript:;" id="globalNotifMenu">                       
                           <span id="unreadGlobalNotification" class="notifCounter">
  
                            @if(isset($global_notification_count) && $global_notification_count > 0)
                               <span class="notifcount   animated bounce bounceInUp">{{ $global_notification_count }}</span>
                             @endif
                                                           </span>
                       
                           <img src="http://susanwins.com/uploads/83444_notificationicon.png">
                         </a> 
                        </li>
                       
                       <li> 
                         <a href="javascript:;" id="notificationMenu"> 
                          <span id="unreadUserNotification" class="notifCounter">
  
                            @if(isset($user_notification_count) && $user_notification_count > 0)
                                 <span class="notifcount   animated bounce bounceInUp"> 
                                       {{ $user_notification_count }}
                                     </span>
                               @endif
                                                           </span>
                          <img src="http://susanwins.com/uploads/43069_friendicon.png">
                          </a> 
                       </li>
  
                       <li style="margin-right: 6px;"> 
                         <a href="http://susanwins.com/logout"> 
                          <img src="http://susanwins.com/uploads/34338_logouticon.png">
                         </a> 
                       </li>
  
                     </ul> -->
<!--    <div class="nav-wrapper">
 <a href="javascript:;" class="waves-effect waves-light btn back_button" style="display:none" id="backButton"><i class="material-icons">chevron_left</i></a>
<a href="javascript:;" class="brand-logo"> @yield('navbar-title') </a>
 @if(isset($user))
   <a href="#" data-activates="mobile-demo2" class="button-collapse"><i class="material-icons">menu</i></a>
     <ul class="side-nav" id="mobile-demo2">
      <li><a href="{{ url('clubhouse/home') }}"><img src="http://susanwins.com/uploads/38368_clubhouseicon.png"> Home</a></li>
      <li><a href="javascript:;"><img src="http://susanwins.com/uploads/64163_chaticon.png"> Messages</a></li>
      <li><a href="javascript:;"><img src="http://susanwins.com/uploads/83444_notificationicon.png"> All Notifications</a></li>
      <li><a href="javascript:;"><img src="http://susanwins.com/uploads/43069_friendicon.png"> Friend Requests</a></li>
      <li><a href="{{ url('logout') }}"><img src="http://susanwins.com/uploads/34338_logouticon.png"> Logout</a></li>
    </ul>
 @endif
 </div>  -->
     @if(isset($user))
        <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
    <!-- <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a> -->
    <ul class="homeButtonNav">
      <li><a class="btn-floating btn-large" href="{{ url('clubhouse/profile') }}"><img src="http://susanwins.com/images/clubhouse/profileroom-thumb.gif" alt=""></a></li>
      <li><a class="btn-floating btn-large" href="{{ url('clubhouse/slotsroom') }}"><img src="http://susanwins.com/images/clubhouse/slotsroom-thumb.gif" alt=""></a></li>
      <li><a class="btn-floating btn-large" href="{{ url('clubhouse/chatroom') }}"><img src="http://susanwins.com/images/clubhouse/chatroom-thumb.gif" alt=""></a></li>
      <li><a class="btn-floating btn-large" href="{{ url('clubhouse/prizeroom') }}"><img src="http://susanwins.com/images/clubhouse/prizeround.png" alt=""></a></li>
    </ul>
  </div>
     @endif

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
  

  <div id="welcomePackageAddress" class="modal">
   <div class="inner">
       <h2>  Want to receive the amazing Free Welcome Pack?</h2>
          <p class="two">Enter your address below - We've got an incredible FREE welcome pack to send you!</p>
        <div class="form-group">
            <textarea name="address" placeholder="Enter Address" class="welcomeAddress"></textarea>

        </div>
        <div class="form-group">
          <button type="button" class="submitWelcomePackage">Submit</button>
        </div>
      </div>
  </div>
  
    @yield('content')

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
  
     @yield('content-list')
  </body>
  
  <script> 
            var myFriends = '<?php echo isset($myFriends) && count($myFriends) > 0 ? json_encode($myFriends) : "" ?>';
            var myFriendsCount = '<?php echo isset($myFriends) ? count($myFriends) : 0 ?>';
            var onlineFriendsList = [];
    </script>
 
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script> 
    <script src="{{ asset('js/moment-timezone.min.js') }}"></script> 
    <script src="{{ asset('js/livestamp.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>

     <script src="{{ asset('js/sockets.io.js') }}"></script>
    <script>


    CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    BASE_URL = "{{ url('/')}}";
    USER_ID = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
    USER_IMAGE = "{{ isset(Auth::user()->user_detail->profile_picture) ? Auth::user()->user_detail->profile_picture : '' }} ";
    USER_NAME = "{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}";
    DEFAULT_IMAGE = BASE_URL+'/user_uploads/default_image/default_01.png';
    ROOM_ID = "{{ isset($selectedRoom->id ) ? $selectedRoom->id  : '' }}";
    ROOM_NAME = "{{ isset($selectedRoom->name) ? $selectedRoom->name : '' }}";
    ROOM_DESCRIPTION = "{{ isset($selectedRoom->description) ? $selectedRoom->description : '' }}";
    MESSAGE = "";

    

      /********************** START GET IMAGE ******************************************************************************/
  function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : DEFAULT_IMAGE;
      }
       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : DEFAULT_IMAGE;
    }

  /********************** END GET IMAGE ******************************************************************************/
  </script>
    <script>

      var socket = io.connect('{{ url('') }}:8891');

    $(function(){

      timeZone = 'Europe/London';

      london = moment.tz(timeZone);

      $('.timestamp').each(function(){
      timestamp = this;
      datetime = $(timestamp).data('datetime');
      $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
      $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
  });

      $('#backButton').on('click', function(){

        if(App.back() === false){
           window.history.back();
        }
        
      });

        /*  resendConfirmationAjax = false;
          $(document).on('click', '#resendConfirmation', function(){
            _this = $(this);

            if(!resendConfirmationAjax){

              _this.text('Loading...');
              resendConfirmationAjax = true;

                $.ajax({
                       url :BASE_URL+'/admin/sendEmailAweber',
                       data : { _token : CSRF_TOKEN },
                       dataType : 'json',
                       type : 'POST',
                       success : function(data){
                        console.log(data);
                       _this.parent('.confirmNotification').addClass('done').text('Resend Confirmation Sent! Please Check Your Email.');
                       },error : function(xhr){
                         console.log(xhr.responseText);
                       }
                   });
            }
             
        });*/


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                  var userId = $('#userId').val();
                 var userImage = $('#userId').data('image');
                 var userName = $('#userId').data('name');
                 var isAdmin = $('#userId').data('isAdmin') == 1 ? true : false;

                 var sessionUrl = '{{ url("session") }}';
           var profileUrl = '{{ url("profile") }}';
          var friendUrl = '{{ url("friends") }}';
           var messageUrl = '{{ url("message") }}';
           var publicUrl = '{{ asset("") }}';
           var baseUrl = '{{ url() }}';
           var notifUrl = '{{ url("notification") }}';
           var clubhouseUrl = '{{ url("clubhouse") }}';
           var sessionId = $('#sessionId').val();
          var defaultProfilePic = publicUrl+'/images/default_profile_picture.png';



        /* ---------------- WELCOME PACKAGE ------------------*/

                                   if($('#initialWelcomePackage').length > 0){
          initialWelcomePackageOpened = true;

          $('.modal-trigger').leanModal({ complete : ignoreWelcomePack });
          $('#initialWelcomePackageTrigger').click();
          function ignoreWelcomePack(){

            if(initialWelcomePackageOpened){
              initialWelcomePackageOpened = false;
                 $.ajax({
                 url :baseUrl+'/admin/ignore',
                 data : { _token : CSRF_TOKEN},
                 dataType : 'json',
                 type : 'POST',
                 success : function(data){
                 console.log(data);
                 },error : function(xhr){
                   console.log(xhr.responseText);
                 }
                });
            }
           
          }
        }else{
          $('#yesWelcomePackage').leanModal();
        }


    submitWelcomePackageAJAX = false;
    $(document).on('click','.submitWelcomePackage', function(){
        thisModal = $(this).parents('.modal');
          address = thisModal.find('.welcomeAddress').val();
          if(!address){
            alert('Please enter a valid address');
            return;
          }
          if( !submitWelcomePackageAJAX ){
            submitWelcomePackageAJAX = true;
             $.ajax({
                 url :BASE_URL+'/admin/enterAddress',
                 data : { _token : CSRF_TOKEN, address: address },
                 dataType : 'json',
                 type : 'POST',
                 success : function(data){
                      thisModal.closeModal();
                    $('.confirmNotification').addClass('done').text('Welcome Package Request Sent!');

                 },error : function(xhr){
                   console.log(xhr.responseText);
                 }
             });

          }
      });
        /* ---------------- WELCOME PACKAGE ------------------*/


        socket.on('connect', function(){

          socket.emit('login', { user_id : userId , profile_picture : userImage, name : userName, session_id : sessionId }, true, isAdmin, myFriends);

              last_room_id = $('#roomDetails').data('id');
              last_room_name = $('#roomDetails').data('name');
              last_room_description = $('#roomDetails').data('description');

             if(ROOM_ID){
              socket.emit('connect_room', { room_id : ROOM_ID, name : ROOM_NAME, description : ROOM_DESCRIPTION });

             }

      });


      socket.on('myOnlineFriends', function(onlineFriends){

    onlineFriendsList = onlineFriends;
      for(i=0;i<onlineFriendsList.length;i++){
          friend_id = onlineFriendsList[i];
          $('#friend-online-status-'+friend_id).removeClass('offline');
      }

  });


        socket.on('friendOffline', function(friend_id){
              index = onlineFriendsList.indexOf(parseInt(friend_id));
              if(index != -1){

                onlineFriendsList.splice(index, 1);
              }
          });
        socket.on('friendOnline', function(friend_id){
              
              index = onlineFriendsList.indexOf(parseInt(friend_id));
              friendIndex = myFriends.indexOf(parseInt(friend_id));
              if(index == -1 && friendIndex >=0 ){
                onlineFriendsList.push(friend_id);
              }

          });


      function readUserNotifs(){
                    $.ajax({
                      url : profileUrl+'/readFriendRequests',
                      data : { user_id : userId, _token : CSRF_TOKEN },
                      dataType : 'json',
                      type : 'POST',
                      success : function(data){

                      },error : function(xhr){
                            console.log(xhr.responseText);
                          }
                      });
      }

            function readGlobalNotifs(){
        $.ajax({
            url : notifUrl+'/readGlobalNotifications',
            data : { _token : CSRF_TOKEN },
            dataType : 'json',
            type : 'POST',
            success : function(data){
             
             console.log('readGlobalNotification');
             console.log(data);

            },error : function(xhr){
              console.log(xhr.responseText);
            }
        });
    }

    socket.on('post_recommendGame_notification', function(friend){
            

            if(App.current() == 'myGlobalNotifs'){

              readUserNotifs();

              thePage = App.getPage();
                   $(thePage).find('#yourUserNotifs .messageList').prepend(
                      $('<li>').append(
                $('<a href="'+baseUrl+'/'+friend.game.slug+'">')
                    .append(
                          //$('<img>').attr('src', friend.user.user_detail.profile_picture ? baseUrl+'/'+friend.user.user_detail.profile_picture : defaultProfilePic )
                          $('<img>').attr('src', getImage(friend.user.user_detail.profile_picture, friend.user.user_detail.user_id, 5050) )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(friend.user.user_detail.firstname+' '+friend.user.user_detail.lastname+' recommended you to play. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(london.format())
                                              )
                                          )
                                .append(
                                    $('<p>').text('Click to Play')
                                  )
                                    )
                              )
                    );
            }else{
                  span = $('<span>').addClass('notifcount animated bounce bounceInUp');
                notifcount = 1;
                if($('#unreadGlobalNotification').find('.notifcount').length){
                  notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
                }

                $('#unreadGlobalNotification').html('').append($(span).text(notifcount));
            }

      });

       socket.on('post_accepted_friend_notification', function(friend){

        if(App.current() == 'myGlobalNotifs'){
               readUserNotifs();
            thePage = App.getPage();


            $(thePage).find('#yourUserNotifs .messageList').prepend(
                  $('<li>')
            .append(
              //$('<img>').attr('src', friend.user.profile_picture ? baseUrl+'/'+friend.user.profile_picture : defaultProfilePic )
              $('<img>').attr('src', getImage(friend.user.profile_picture, friend.user.user_id, 5050) )
            )
            .append(
              $('<div>').addClass('msgContent')
                  .append(
                      $('<div>').addClass('info')
                      .append(
                        $('<h6>').text('You and '+friend.user.user_detail.firstname+' '+friend.user.user_detail.lastname+' are now friends!')
                          )

                        .append(
                          $('<span>').addClass('timestamp').livestamp(moment.tz(london.format() ))
                          )
                        )
                      .append(
                          $('<div>').addClass('actionList').data('user', friend.user.user_detail.user_id)
                      .append(
                        $('<button>').text('Message').addClass('pmFriend').data('user', friend.user.user_detail.user_id).data('name', friend.user.user_detail.firstname)
                      )
                    )
                  )
            );


          }else{

               span = $('<span>').addClass('notifcount animated bounce bounceInUp');
              notifcount = 1;
              if($('#unreadGlobalNotification').find('.notifcount').length){
                notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
              }

              $('#unreadGlobalNotification').html('').append($(span).text(notifcount));   
          }

         

       });

             socket.on('post_global_notification', function(notification){

          if(notification && App.current() == 'myGlobalNotifs'){

              thePage = App.getPage();

              readGlobalNotifs();

               li = $('<li>');

                container = $(thePage).find('#yourGlobalNotifs .messageList');


                      if(notification.type == 1){

                        container.prepend(
                          $(li)
                              .append(
                                $('<a href="'+baseUrl+'/'+notification.game.slug+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text('New Game has Added!')
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )
                                )
                          );

                      }else if(notification.type == 2 && notification.room){
                        
                         container.prepend(
                          $(li)
                              .append(
                                $('<a href="'+baseUrl+'/clubhouse/chatroom/'+notification.room.name+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text('New Chatroom Created!')
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )
                                )
                          );

                      }else if(notification.type == 3 && notification.room){

                      container.prepend(
                          $(li)
                              .append(
                                $('<a href="'+baseUrl+'/clubhouse/chatroom/'+notification.room.name+'">')
                                .append($('<img>').attr('src', 'http://susanwins.com/uploads/78103_alert.jpg' ).addClass('hodor') )
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(notification.moderator.user_detail.firstname+' '+notification.moderator.user_detail.lastname+' is now in '+notification.room.name)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )
                                )
                          );

                      }else if(notification.type == 4){


                              var a = $('<a href="'+baseUrl+'/'+notification.custom_notification.link+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(notification.custom_notification.description)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )

                  if(notification.custom_notification.image){


                                a = $('<a href="'+baseUrl+'/'+notification.custom_notification.link+'">')

                                      .append($('<img>').attr('src', baseUrl+'/uploads/'+notification.custom_notification.image))
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(notification.custom_notification.description)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )
                  }
     

                         container.prepend(
                          $(li)
                              .append(
                                a
                                )
                              );

                      }


          }else{
                        span = $('<span>').addClass('notifcount animated bounce bounceInUp');
              notifcount = 1;
              if($('#unreadGlobalNotification').find('.notifcount').length){
                notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
              }

              $('#unreadGlobalNotification').html('').append($(span).text(notifcount));
          }


       });


      socket.on('post_custom_notification', function(notification){

         if(App.current() == 'myGlobalNotifs' && notification){
               thePage = App.getPage();

               readGlobalNotifs();

               li = $('<li>');

                container = $(thePage).find('#yourGlobalNotifs .messageList');

                $.each(notification, function(){

                    data = this;
                      var a = $('<a href="'+baseUrl+'/'+data.custom_notification.link+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(data.custom_notification.description)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )

                  if(data.custom_notification.image){


                                a = $('<a href="'+baseUrl+'/'+data.custom_notification.link+'">')

                                      .append($('<img>').attr('src', baseUrl+'/uploads/'+data.custom_notification.image))
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(data.custom_notification.description)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(london.format())
                                                  )
                                            )
                                        )
                  }
     

                         container.prepend(
                          $(li)
                              .append(
                                a
                                )
                              );
                  });

         }else{

            $.each(notification, function(){

                data = this;


                span = $('<span>').addClass('notifcount animated bounce bounceInUp');
                notifcount = 1;
                if($('#unreadGlobalNotification').find('.notifcount').length){
                  notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
                }

                $('#unreadGlobalNotification').html('').append($(span).text(notifcount));

              });
         }


              




      });
   socket.on('post_friendTag_notification', function(data){


              if(App.current() == 'myGlobalNotifs'){

              readUserNotifs();

              thePage = App.getPage();

                 data_url = data.content;

                      if(data.type == 3 || data.type == 2){
                        data_url = data.content.slug;
                      }

                      data_url = baseUrl+'/'+data_url;

                       $(thePage).find('#yourUserNotifs .messageList').prepend(
                        $('<li>').append(
                            $('<a href="'+data_url+'">')
                                .append(
                                      //$('<img>').attr('src', data.user.user_detail.profile_picture ? baseUrl+'/'+data.user.user_detail.profile_picture : defaultProfilePic )
                                      $('<img>').attr('src', getImage(data.user.user_detail.profile_picture, data.user.user_detail.user_id, 5050) )
                                )
                                    .append(
                                        $('<div>').addClass('msgContent')
                                            .append(
                                                $('<div>').addClass('info')
                                                    .append(
                                                      $('<h6>').text(data.user.user_detail.firstname+' '+data.user.user_detail.lastname+' tagged you in a comment. ')
                                                        )
                                                        .append(
                                                          $('<span>').addClass('timestamp').livestamp(london.format() )
                                                          )
                                                      )
                                                )
                          )
                      );


            }else{

              span = $('<span>').addClass('notifcount animated bounce bounceInUp');
                notifcount = 1;

                if($('#unreadGlobalNotification').find('.notifcount').length)
                {
                  notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
                }

                $('#unreadGlobalNotification').html('').append($(span).text(notifcount));
            }


      });


      $('#menuMessage').on('click', function(){
      	//console.log("Hello World");
         $('.slide_menu').sideNav('hide');
           App.load('myMessages');
      });


socket.on('post_addFriend_request', function(request_id, request){


          if(App.current() == 'myGlobalNotifs'){

              readUserNotifs();

              thePage = App.getPage();


              requestHtml = $('<li>').attr('id', 'friend-request-'+request.user_id)
            .append(
              //$('<img>').attr('src', request.profile_picture ? baseUrl+'/'+request.profile_picture : defaultProfilePic )
              $('<img>').attr('src', getImage(request.profile_picture, request.user_id, 5050))
            )
            .append(
              $('<div>').addClass('msgContent')
                  .append(
                      $('<div>').addClass('info')
                      .append(
                        $('<h6>').text(request.name)
                          )

                        .append(
                          $('<span>').addClass('timestamp').livestamp(london.format() )
                          )
                        )
                    .append(
                          $('<div>').addClass('actionList')
                      .append(
                        $('<button>').text('Accept').addClass('acceptFriend').data('id', request_id).data('user', request.user_id).data('name', request.name)
                      )
                      .append(
                        $('<button>').text('Decline').addClass('declineFriend').data('id', request_id)
                      )
                    )
                  );


              if($(thePage).find('#friend-request-'+request.user_id).length){
                     $(thePage).find('#friend-request-'+request.user_id).replaceWith(requestHtml);
              }else{
                 $(thePage).find('#yourUserNotifs .messageList').prepend(requestHtml);
              }

              


            }else{

                      span = $('<span>').addClass('notifcount animated bounce bounceInUp');
                    notifcount = 1;

                  if($('#unreadGlobalNotification').find('.notifcount').length)
                  {
                    notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
                  }

                  $('#unreadGlobalNotification').html('').append($(span).text(notifcount));
            }



  });


  socket.on('post_chatroom_message', function(){

      thePage = App.getPage();

      if(thePage != 'chatroom'){
        span = $('<span>').addClass('notifcount');
        notifcount = 1;

        if($('#unreadChatroomNotification').find('.notifcount').length)
        {
          notifcount = parseInt($('#unreadChatroomNotification').find('.notifcount').text())+1;
        }

        $('#unreadChatroomNotification').html('').append($(span).text(notifcount));
      }

  });


    socket.on('post_private_message', function(message){
          thePage = App.getPage();

          if(message.to == userId){

            if(App.current() == 'privateMessage'){

                $(thePage).find('.chatBox .body ul').append(
                    $('<li>')
                        .append(
                          //$('<img>').attr('src', message.from.profile_picture ? publicUrl+'/'+message.from.profile_picture : defaultProfilePic)
                          $('<img>').attr('src', getImage(message.from.profile_picture, message.from.user_id, 5050))
                          )
                        .append(
                            $('<span>').text(message.message)
                          )
                  );

                 $(thePage).find('.chatBox .body').scrollTop( $(thePage).find('.chatBox .body ul')[0].scrollHeight);
            }else{


                 span = $('<span>').addClass('notifcount animated bounce bounceInUp');
        notifcount = 1;
                    if($('#unreadMessageNotification').find('.notifcount').length)
                    {
                      notifcount = parseInt($('#unreadMessageNotification').find('.notifcount').text())+1;
                    }

                    $('#unreadMessageNotification').html('').append($(span).text(notifcount));
                          }
          }


      });

              App.controller('myGlobalNotifs', function(page, request){
                  this.transition = 'slide-left';
                  this.restorable = false;
                     $(page).on('appShow', function(){
                        $('#navbarTitle').text('All Notifications');

                    });

                    $(page).find('.pageLoading').show();
                    $(page).find('#yourGlobalNotifs').hide();


                                            $(page).on('click', '.acceptFriend', function(){

      data_id = $(this).data('id');
      user = $(this).data('user');
      name = $(this).data('name');
      $(this).parents('li').find('.actionList').html('')

        .append(
            $('<span>').text('Request accepted! ').css('font-size', '12px')

              .append(
                $('<button>').text('Message').data('user', user).data('name', name).addClass('pmFriend')
                )
          );

      $.ajax({
        url : friendUrl+'/acceptFriendRequest',
        data : { _token : CSRF_TOKEN, id : data_id },
        type : 'POST',
        dataType : 'json',
        success : function(data){
          if(data){
                  socket.emit('friend_request_accepted', { other_person : user });
                }
        },error : function (xhr){
          console.log(xhr.responseText);
        }

      });

    });

  $(page).on('click', '.pmFriend', function(){

    user = $(this).data('user');
      name = $(this).data('name');

          App.load('privateMessage', { user_id : user, name : name});
  });
    
    $(page).on('click', '.declineFriend', function(){

        data_id = $(this).data('id');

        $(this).parents('li').remove();

         $.ajax({
            url : friendUrl+'/cancelFriendRequest',
            data : { _token : CSRF_TOKEN, id : data_id },
            type : 'POST',
            dataType : 'json',
            success : function(data){
              console.log(data);
            },error : function (xhr){
              console.log(xhr.responseText);
            }

          });

    });

                    setTimeout(function(){
                        $.ajax({
                              url : notifUrl+'/getGlobalNotifications',
                              data : { _token : CSRF_TOKEN },
                              dataType : 'json',
                              type : 'POST',
                              success : function(data){


              if($('#unreadGlobalNotification').find('.notifcount').text()){

                  $('#unreadGlobalNotification').find('.notifcount').remove();
                  
                $.ajax({
                    url : notifUrl+'/readGlobalNotifications',
                    data : { _token : CSRF_TOKEN },
                    dataType : 'json',
                    type : 'POST',
                    success : function(data){
             
                        console.log('readGlobalNotification');
                        console.log(data);

                    },error : function(xhr){
                          console.log(xhr.responseText);
                        }
                    });

                    $.ajax({
                      url : profileUrl+'/readFriendRequests',
                      data : { user_id : userId, _token : CSRF_TOKEN },
                      dataType : 'json',
                      type : 'POST',
                      success : function(data){

                      },error : function(xhr){
                            console.log(xhr.responseText);
                          }
                      });
                 }

                    container = $(page).find('.messageList');

                    $.each(data, function(){

                      notification = this;


                      li = $('<li>');


                      if(notification.type == 1){

                        container.append(
                          $(li)
                              .append(
                                $('<a href="'+baseUrl+'/'+notification.game.slug+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text('New Game has Added!')
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(moment.tz(notification.created_at, timeZone).format() )
                                                  )
                                            )
                                        )
                                )
                          );

                      }else if(notification.type == 2 && notification.room){
                        
                         container.append(
                          $(li)
                              .append(
                                $('<a href="'+baseUrl+'/clubhouse/chatroom/'+notification.room.name+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text('New Chatroom Created!')
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(moment.tz(notification.created_at, timeZone).format() )
                                                  )
                                            )
                                        )
                                )
                          );

                      }else if(notification.type == 3 && notification.room){

                      container.append(
                          $(li)
                              .append(
                                $('<a href="'+baseUrl+'/clubhouse/chatroom/'+notification.room.name+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(notification.moderator.user_detail.firstname+' '+notification.moderator.user_detail.lastname+' is now in '+notification.room.name)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(moment.tz(notification.created_at, timeZone).format() )
                                                  )
                                            )
                                        )
                                )
                          );

                      }else if(notification.type == 4){


                              var a = $('<a href="'+baseUrl+'/'+notification.custom_notification.link+'">')
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(notification.custom_notification.description)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(moment.tz(notification.created_at, timeZone).format() )
                                                  )
                                            )
                                        )

                  if(notification.custom_notification.image){


                                a = $('<a href="'+baseUrl+'/'+notification.custom_notification.link+'">')

                                      .append($('<img>').attr('src', baseUrl+'/uploads/'+notification.custom_notification.image))
                                      .append(
                                        $('<div>').addClass('msgContent')
                                          .append(
                                            $('<div>').addClass('info')
                                                .append(
                                                    $('<h6>').text(notification.custom_notification.description)
                                                  )
                                                .append(
                                                    $('<span>').addClass('timestamp').livestamp(moment.tz(notification.created_at, timeZone).format() )
                                                  )
                                            )
                                        )
                  }
     

                         container.append(
                          $(li)
                              .append(
                                a
                                )
                              );

                      }



                    });
                              showTheAppPage(); 

                              },error : function(xhr){
                                console.log(xhr.responseText);
                              }
                          });
                        // Global notification ajax

                        $.ajax({
                              url : profileUrl+'/getFriendRequests',
                              data : { user_id : userId, _token : CSRF_TOKEN },
                              dataType : 'json',
                              type : 'POST',
                              success : function(data){

          container = $(page).find('.messageList');

        $.each(data, function(){

          li = $('<li>');

          request = this;
          if(request.type == 0)
          {

            $(li).attr('id', 'friend-request-'+request.user_id)
            .append(
              $('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
            )
            .append(
              $('<div>').addClass('msgContent')
                  .append(
                      $('<div>').addClass('info')
                      .append(
                        $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname)
                          )

                        .append(
                          $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                          )
                        )
                    .append(
                          $('<div>').addClass('actionList')
                      .append(
                        $('<button>').text('Accept').addClass('acceptFriend').data('id', request.id).data('user', request.user_id).data('name', request.user.user_detail.firstname)
                      )
                      .append(
                        $('<button>').text('Decline').addClass('declineFriend').data('id', request.id)
                      )
                    )
                  );

          }
          else if(request.type == 1)
          {
             $(li)
            .append(
              $('<img>').attr('src', request.user.profile_picture ? baseUrl+'/'+request.user.profile_picture : defaultProfilePic )
            )
            .append(
              $('<div>').addClass('msgContent')
                  .append(
                      $('<div>').addClass('info')
                      .append(
                        $('<h6>').text('You and '+request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' are now friends!')
                          )

                        .append(
                          $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                          )
                        )
                      .append(
                          $('<div>').addClass('actionList').data('user', request.user.user_detail.user_id)
                      .append(
                         $('<button>').text('Message').addClass('pmFriend').data('user', request.user.user_detail.user_id).data('name', request.user.user_detail.firstname)
                      )
                    )
                  );

          }
          else if(request.type == 2)
          {

            $(li).append(
                $('<a href="'+baseUrl+'/'+request.game.slug+'">')
                    .append(
                          $('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' recommended you to play. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                .append(
                                    $('<p>').text('Click to Play')
                                  )
                                    )
              );
          }
          else if(request.type == 3)
          {

            $(li).append(
                $('<a href="'+baseUrl+'/all_games">')
                    .append(
                          $('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                    )
              );
          }
          else if(request.type == 5)
          {

            $(li).append(
                $('<a href="'+baseUrl+'/'+request.postslug+'">')
                    .append(
                          $('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                    )
              );
          }
          else if(request.type == 4)
          {

          $(li).append(
                $('<a href="'+baseUrl+'/'+request.categoryslug+'">')
                    .append(
                          $('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                    )
              );
          }

          container.append(li);

        });

        showTheAppPage();
                                    
                              

                              },error : function(xhr){
                                console.log(xhr.responseText);
                              }
                          });

                        // user notification ajax
                        var appAjaxCounter = 0;
                        function showTheAppPage(){
                          appAjaxCounter++;
                          if(appAjaxCounter == 2){
                            // show it
                            $(page).find('.pageLoading').hide();
                            $(page).find('#mainGlobalNotifs').show();
                          }
                        }

                      }, 2000);

            });
            App.controller('myUserNotifs', function(page, request){
                  this.transition = 'slide-left';
                  this.restorable = false;

                  $(page).on('appShow', function(){
                        $('#navbarTitle').text('Friend Requests');
                        });

                   $(page).find('.pageLoading').show();
                    $(page).find('#youUserNotifs').hide();

                        $(page).on('click', '.acceptFriend', function(){

      data_id = $(this).data('id');
      user = $(this).data('user');
      name = $(this).data('name');
      $(this).parents('li').find('.actionList').html('')

        .append(
            $('<span>').text('Request accepted! ').css('font-size', '12px')

              .append(
                $('<button>').text('Message').data('user', user).data('name', name).addClass('pmFriend')
                )
          );

      $.ajax({
        url : friendUrl+'/acceptFriendRequest',
        data : { _token : CSRF_TOKEN, id : data_id },
        type : 'POST',
        dataType : 'json',
        success : function(data){
          if(data){
                  socket.emit('friend_request_accepted', { other_person : user });
                }
        },error : function (xhr){
          console.log(xhr.responseText);
        }

      });

    });

  $(page).on('click', '.pmFriend', function(){

    user = $(this).data('user');
      name = $(this).data('name');

          App.load('privateMessage', { user_id : user, name : name});
  });
    
    $(page).on('click', '.declineFriend', function(){

        data_id = $(this).data('id');

        $(this).parents('li').remove();

         $.ajax({
            url : friendUrl+'/cancelFriendRequest',
            data : { _token : CSRF_TOKEN, id : data_id },
            type : 'POST',
            dataType : 'json',
            success : function(data){
              console.log(data);
            },error : function (xhr){
              console.log(xhr.responseText);
            }

          });

    });

                 setTimeout(function(){
                        $.ajax({
                              url : profileUrl+'/getFriendRequests',
                              data : { user_id : userId, _token : CSRF_TOKEN },
                              dataType : 'json',
                              type : 'POST',
                              success : function(data){


                 if($('#unreadGlobalNotification').find('.notifcount').text()){

                  $('#unreadGlobalNotification').find('.notifcount').remove();
                      $.ajax({
                      url : profileUrl+'/readFriendRequests',
                      data : { user_id : userId, _token : CSRF_TOKEN },
                      dataType : 'json',
                      type : 'POST',
                      success : function(data){

                      },error : function(xhr){
                            console.log(xhr.responseText);
                          }
                      });
                 }

          container = $(page).find('.messageList');

        $.each(data, function(){

          li = $('<li>');

          request = this;
          if(request.type == 0)
          {

            $(li).attr('id', 'friend-request-'+request.user_id)
            .append(
              //$('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
              $('<img>').attr('src', getImage(request.user.user_detail.profile_picture, request.user.user_detail.user_id, 5050) )
            )
            .append(
              $('<div>').addClass('msgContent')
                  .append(
                      $('<div>').addClass('info')
                      .append(
                        $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname)
                          )

                        .append(
                          $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                          )
                        )
                    .append(
                          $('<div>').addClass('actionList')
                      .append(
                        $('<button>').text('Accept').addClass('acceptFriend').data('id', request.id).data('user', request.user_id).data('name', request.user.user_detail.firstname)
                      )
                      .append(
                        $('<button>').text('Decline').addClass('declineFriend').data('id', request.id)
                      )
                    )
                  );

          }
          else if(request.type == 1)
          {
             $(li)
            .append(
              //$('<img>').attr('src', request.user.profile_picture ? baseUrl+'/'+request.user.profile_picture : defaultProfilePic )
              $('<img>').attr('src', getImage(request.user.profile_picture, request.user.user_id, 5050))
            )
            .append(
              $('<div>').addClass('msgContent')
                  .append(
                      $('<div>').addClass('info')
                      .append(
                        $('<h6>').text('You and '+request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' are now friends!')
                          )

                        .append(
                          $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                          )
                        )
                      .append(
                          $('<div>').addClass('actionList').data('user', request.user.user_detail.user_id)
                      .append(
                         $('<button>').text('Message').addClass('pmFriend').data('user', request.user.user_detail.user_id).data('name', request.user.user_detail.firstname)
                      )
                    )
                  );

          }
          else if(request.type == 2)
          {

            $(li).append(
                $('<a href="'+baseUrl+'/'+request.game.slug+'">')
                    .append(
                         // $('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                          $('<img>').attr('src', getImage(request.user.user_detail.profile_picture, request.user.user_detail.user_id, 5050) )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' recommended you to play. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                .append(
                                    $('<p>').text('Click to Play')
                                  )
                                    )
              );
          }
          else if(request.type == 3)
          {

            $(li).append(
                $('<a href="'+baseUrl+'/all_games">')
                    .append(
                          //$('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                          $('<img>').attr('src', getImage(request.user.user_detail.profile_picture, request.user.user_detail.user_id, 5050) )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                    )
              );
          }
          else if(request.type == 5)
          {

            $(li).append(
                $('<a href="'+baseUrl+'/'+request.postslug+'">')
                    .append(
                          //$('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                          $('<img>').attr('src', getImage(request.user.user_detail.profile_picture, request.user.user_detail.user_id, 5050) )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                    )
              );
          }
          else if(request.type == 4)
          {

          $(li).append(
                $('<a href="'+baseUrl+'/'+request.categoryslug+'">')
                    .append(
                          //$('<img>').attr('src', request.user.user_detail.profile_picture ? baseUrl+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
                          $('<img>').attr('src', getImage(request.user.user_detail.profile_picture, request.user.user_detail.user_id, 5050) )
                    )
                        .append(
                            $('<div>').addClass('msgContent')
                                .append(
                                    $('<div>').addClass('info')
                                        .append(
                                          $('<h6>').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
                                            )
                                            .append(
                                              $('<span>').addClass('timestamp').livestamp(moment.tz(request.created_at, timeZone).format() )
                                              )
                                          )
                                    )
              );
          }

          container.append(li);

        });
                                    
                               $(page).find('.pageLoading').hide();
                                 $(page).find('#youUserNotifs').show();

                              },error : function(xhr){
                                console.log(xhr.responseText);
                              }
                          });
                      }, 2000);

            });

              App.controller('myMessages', function(page, request){
                this.transition = 'slide-left';
                  this.restorable = false;
                $(page).on('appShow', function(){
                        $('#navbarTitle').text('Messages');

                        });
                  
                $(page).find('.pageLoading').show();
                $(page).find('#yourMessages').hide();
                      setTimeout(function(){
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



                              container = $(page).find('#yourMessages .messageList');
                               container.html('');
                               

                               $.each(inbox, function(){

                                msg = this;

                                    li = $('<li>').addClass('app-button').attr('data-target', 'myMessages').attr('data-args', '{ "user_id" : "'+msg.from_user.user_detail.user_id+'", "name" : "'+msg.from_user.user_detail.firstname+'" }')
                                          .append(
                                              //$('<img>').attr('src', msg.from_user.user_detail.profile_picture ? publicUrl+'/'+ msg.from_user.user_detail.profile_picture : defaultProfilePic )
                                              $('<img>').attr('src', getImage(msg.from_user.user_detail.profile_picture, msg.from_user.user_detail.user_id, 5050) )
                                            )
                                          .append(
                                            $('<div>').addClass('msgContent')
                                              .append(
                                                $('<div>').addClass('info')
                                                    .append(
                                                      $('<h6>').text(msg.from_user.user_detail.firstname)
                                                      )
                                                    .append(
                                                      $('<span>').addClass('timestamp').livestamp(moment.tz(msg.created_at, timeZone).format() )
                                                      )
                                                )
                                              .append($('<p>').text(msg.message))
                                            )

                                    if(msg.read == 0){
                                      $(li).addClass('unread');
                                    }

                                    $(li).bind('click', function(){
                                        App.load('privateMessage', JSON.parse($(this).attr('data-args')));
                                    });

                                    container.append(li);

                                    
                    
                               })
                            
                               $(page).find('.pageLoading').hide();
                                 $(page).find('#yourMessages').show();

                              },error : function(xhr){
                                console.log(xhr.responseText);
                              }
                          });
                      }, 2000);
                    
              });

          /*  function messageChecker(message) {
                result = message.indexOf(".com");
                image = message.indexOf(".jpg");
                if(result != -1) {
                    console.log(true);
                    console.log(message);
                    console.log(result);
                    return "<p><a target='_blank' href='"+message+"' style='text-decoration: none;'>"+message+"</a></p>";
                }
                else {
                    console.log(false);
                    console.log(message);
                    console.log(result);
                    return "<p>"+message+"</p>";
                }
               
              }
*/
              function messageChecker(message, updated_at) {
              result = message.indexOf(".com");
              image = message.indexOf(".jpg");

              if(result != -1) {
                  console.log(true);
                  return "<p><a target='_blank' href='"+message+"' style='text-decoration: none;'>"+message+"</a><dev class='timestamp' data-datetime='"+updated_at+"'><dev class='livetime'></dev></dev></p>";
              }
              else {
                  console.log(false);
                  
                  return "<p>"+message+"<dev class='timestamp' data-datetime='"+updated_at+"'><dev class='livetime'></dev></dev></p>";
              }
             
            }



              function initializeDate() {

                  timeZone = 'Europe/London';
              
              $('.timestamp').each(function(){
                  timestamp = this;
                  datetime = $(timestamp).data('datetime');
                  $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
                  $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
              });

           }



              App.controller('privateMessage', function (page, request) {

    
              
                console.log("Test Private");
           		 this.transition = 'slide-left';

              $(page).on('appDestroy', function(){
                $('.bottomNotification').show();
              });

               $(page).on('appLayout', function(){
                  chatBox = $(page).find('.chatBox');

                  chatBody = chatBox.find('.body');
                          chatBoxOffsetTop = chatBody.offset().top;
                          chatBoxFooterOffsetTop = $(page).find('.chatFooter').offset().top;
                            
                      chatBody.css('height', (chatBoxFooterOffsetTop- chatBoxOffsetTop)+'px');
                      chatBody.scrollTop(chatBody[0].scrollHeight);
              });


              $(page).on('appShow', function(){
                $('.bottomNotification').hide();


                chatBox = $(page).find('.chatBox');

                chatBody = chatBox.find('.body');
                chatBoxOffsetTop = chatBody.offset().top;
                chatBoxFooterOffsetTop = $(page).find('.chatFooter').offset().top;
                      
                chatBody.css('height', (chatBoxFooterOffsetTop- chatBoxOffsetTop)+'px');
                chatBody.scrollTop(chatBody[0].scrollHeight);



                  
                  if(request.user_id && !$(chatBox).hasClass('dataLoaded')){

                      $('#navbarTitle').text(request.name);
                     $(page).find('.pageLoading').show();


                     $(page).on('click','.sendMessage', function(){

                          message = $(page).find('#sendPrivateMessageTextarea').val();

                          if(message && request.user_id){

                            $(page).find('#sendPrivateMessageTextarea').val('');
                            $(page).find('.chatBox .body ul').append(
                                    $('<li>')
                                      .append(
                                        $('<span>').text(message).addClass('alt').text(message)
                                        )
                                );

                            $(page).find('.chatBox .body').animate({
                                    scrollTop:  $(page).find('.chatBox .body ul')[0].scrollHeight
                                   }, 200);

                                        $.ajax({
                                              url : messageUrl+'/sendPrivateMessage',
                                              data : { from : userId, to : request.user_id, message : message, _token : CSRF_TOKEN },
                                              type : 'POST',
                                              dataType : 'json',
                                              success : function(data){
                                                socket.emit('send_private_message', { to : request.user_id, message : message });
                                              },error : function(xhr){
                                                console.log(xhr.responseText);
                                              }
                                            });

                          }
                     });

                      setTimeout(function(){


                              $.ajax({
                                url : messageUrl+'/getPaginatePrivateMessage',
                                data : { user_id : userId , other_person : request.user_id , _token : CSRF_TOKEN },
                                dataType : 'json',
                                type : 'POST',
                                success : function(data){

                                   $(page).find('.pageLoading').hide();
                                  $(page).find('.chatBox').addClass('dataLoaded');
                                  $(page).find('.chatBox .body ul').html('');
                                  console.log(data);
                                  if(data.conversation && data.conversation.length > 0){

                                    $.each(data.conversation, function(){

                                      li = $('<li>');

                                      //span = $('<span>').text(this.message);
                                      span = $('<span>').append(messageChecker(this.message, this.created_at));


                                      if(this.from != userId){

                                        $(li)
                                        .append(                        
                                          //$('<img>').attr('src', data.other_person.user_detail.profile_picture ? publicUrl+data.other_person.user_detail.profile_picture : defaultProfilePic )
                                          $('<img>').attr('src', getImage(data.other_person.user_detail.profile_picture, data.other_person.user_detail.user_id, 5050))                     
                                        );

                                      }else{

                                       
                                        $(span).addClass('alt');

                                     
                                      }

                                     $(page).find('.chatBox .body ul').prepend(
                                        li.append(span)
                                        );



                                    });

                                      $(page).find('.chatBox .body').scrollTop( $(page).find('.chatBox .body ul')[0].scrollHeight);
                                  }

                          
                                  initializeDate();

                                },error : function(xhr){
                                  console.log(xhr.responseText);
                                }
                              });
                        }, 2000);


                      /************* start pagination ********************/
                      	var CurrentScroll = 0;
   				 		var messageIndex = 10;
   				 		var scrollAjax = false;
			    		$(page).find('.chatBox .body').scroll(function(e){
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
						      	url: messageUrl+'/postPaginatePrivateMessage',
						      	type: 'POST',
						      	data: { end: messageIndex, user_id : userId , other_person : request.user_id , _token : CSRF_TOKEN },
						      	dataType: 'json',
						      	success: function(data) {
						      		//console.log(data);
						      		   $.each(data.conversation, function(){

                                      li = $('<li>');

                                      //span = $('<span>').text(this.message);
                                      span = $('<span>').append(messageChecker(this.message, this.created_at));

                                      if(this.from != userId){

                                        $(li).append(                        
                                          //$('<img>').attr('src', data.other_person.user_detail.profile_picture ? publicUrl+data.other_person.user_detail.profile_picture : defaultProfilePic )
                                          $('<img>').attr('src', getImage(data.other_person.user_detail.profile_picture, data.other_person.user_detail.user_id, 5050) )                        
                                        );

                                      }else{

                                       
                                        $(span).addClass('alt');

                                     
                                      }

                                     $(page).find('.chatBox .body ul').prepend(
                                        li.append(span)
                                        );



                                    });
                         initializeDate();
						      	},
						      	error: function(error) {
						      		console.log(error.responseText);
						      	}
						      });
					      }
					      CurrentScroll = NextScroll; 
					   });

                      /************* end pagination ********************/


                  };
              });

 
      });
        

        $('#messagesMenu').on('click', function(){


              if(App.current() != 'myMessages'){
                    try{
                        App.back('myMessages');

                    }catch(e){
                      App.load('myMessages');
                    }
              }


        });        
        $('#globalNotifMenu').on('click', function(){

            if(App.current() != 'myGlobalNotifs'){
                    try{
                        App.back('myGlobalNotifs');

                    }catch(e){
                      App.load('myGlobalNotifs');
                    }
              }
        });
        $('#notificationMenu').on('click', function(){

            if(App.current() != 'myUserNotifs'){
                    try{
                        App.back('myUserNotifs');

                    }catch(e){
                      App.load('myUserNotifs');
                    }
              }
        });


        $(".button-collapse").sideNav();

      /*       App.populator('main', function (page) {
            this.transition = 'slide-right';

            $('#backButton').hide().removeAttr('data-load');
      });

              App.load('main');*/
        $('.button-collapse2').sideNav({
        menuWidth: 250, // Default is 240
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
      }
    );

    }); 

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
    @yield('script')
</html>
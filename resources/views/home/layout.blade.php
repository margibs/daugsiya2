<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="author" content="Susanwins" />
    <meta name="propeller" content="18cbecba5946cbcf8014a1a9c091968e" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible">    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="baseURL" content="{{ url('') }}" />
    <meta name="google-site-verification" content="ZsovtY5ezCxnStSn3xVYrsyYw7Jdt3pUHDhlV-qwKTY" />
    <meta name="user_json" content='{!! isset($user) ? json_encode($user->with(array("user_detail"=>function($query){
        $query->select("id","firstname", "lastname", "user_id", "profile_picture");
    }))->first(), JSON_HEX_APOS ) : null !!}' />
    <meta name="comment_type" content="{{ isset($comment_type) ? $comment_type : '' }}" />
    <meta name="content_id" content="{{ isset($content_id) ? $content_id : '' }}" />
    <link rel="shortcut icon" href="{{ asset('images/susanfav.png') }}">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> -->

    @yield('for_og')
    
    <!-- Document Title
    ============================================= -->
    <title> SusanWins @yield('page-title')</title>

    <!-- Stylesheets
    ============================================= -->

    
  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="stylesheet" href="{{ asset('css/grid24.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/responsiveHomepage.css') }}">        
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">        
    <link rel="stylesheet" href="{{ asset('css/hint.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tagging.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.slotmachine.css') }}"> 

    <!-- <link rel="stylesheet" href="{{ elixir('css/all.css') }}"> --> 
    <!--<link rel="stylesheet" href="{{ elixir('css/home/layout.master.min.css') }}">-->
    <link rel="stylesheet" href="{{asset('css/home/layout.master.css')}}">

    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:500,800,900' rel='stylesheet' type='text/css'>

    <style type="text/css">
 /*     @media(max-width: 1440px){
        .withNotif .verytopHeader {
            height: 120px;
        }   
      }*/
      @media(max-width: 1366px){
        .logobox{
          text-align: right;
        }
        header #search{
              width: 91%;
        }
        .smaller .logobox{
          text-align: left;
        }
      }
      @media(max-width: 768px){
          .withNotif {
            margin-top: 96px;
          }
          .withNotif .verytopHeader {
              height: 85px;
          }
          .confirmNotification{
            padding: 6px;
            font-size: 14px;
          }
          .smaller .topicons {
            margin-top: 10px;            
          }
          header .logo {
            margin-top: 11px;
          }
      }


      /** FOR SPLIT NOTIFICATION LEFT TO RIGHT **/

.messageBox .splitter{
    width: 50%;
    display: block;
    float: left;
}
.messageBox p.halfTitle{
        width: 100%;
    display: block;
        font-family: Roboto;
    font-weight: 600;
    padding: 10px;
    font-size: 13px;
    background: #fff;
    color: #ADADAD;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom: 1px solid #ddd;
    -moz-box-shadow: 0px 1px 3px 0px rgba(220, 220, 220, 0.75);
    -webkit-box-shadow: 0px 1px 3px 0px rgba(220, 220, 220, 0.75);
    box-shadow: 0px 1px 3px 0px rgba(220, 220, 220, 0.75);
}

      
    </style>

    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>        
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='/js/jquery.js' type='text/javascript'%3E%3C/script%3E"));
    }
    </script>
    -->
    @yield('scripts_here')

    <script type="text/javascript">
      function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG")
          return false;
      }
      document.oncontextmenu = nocontext;
    </script>
  </head>

  
<body @if(isset($user) && ($user->welcome_package_sent == 0 || $user->email_confirm == 0))class="withNotif"@endif>	

  <div class="container-fluid verytopHeader">
        <div class="container">
          <div class="col-lg-24">
                <header>
                  <div class="col-xs-8 col-sm-5 col-md-5 col-lg-5 logobox">
                    <a href="{{ url('/') }}"><img class="logo" src="http://susanwins.com/uploads/52424_logo.png" alt="Logo"></a>
                  </div>
                  <div class="col-xs-14 col-sm-14 col-md-12 col-lg-11 hide991" style="text-align: right;">
                    <div class="search">
                      <input type="text" placeholder="Search Games" id="search" autocomplete="off">                  
                    </div>
                  </div>
                  <div class="col-xs-16 col-sm-19 col-md-19 col-lg-8 searchboxhead">
                    @if(Auth::check())

                      <div class="messageBox messageNotifBox">
                        <div class="arrow_box"></div>
                          <p> All Messages </p>
                          <ul id="myMessages">
                          </ul>
                      </div>


                      <!-- <div class="messageBox notificationBox">
                        <div class="arrow_box"></div>
                        <p> Friend Requests </p>
                        <ul id="myNotifications">
                        </ul>                      
                      </div> -->

                       <div class="messageBox globalNotifBox">
                        <div class="arrow_box"></div>
                          <div class="splitter">
                             <p class="halfTitle"> Friend Requests </p>
                            <ul id="myNotifications" class="halfNotif">
                            </ul> 
                          </div>
                          <div class="splitter">
                            <p class="halfTitle"> All Notifications </p>
                          <ul id="myGlobalNotifications" class="halfNotif">
                          </ul>
                          </div>
                      </div>

                      <ul class="topicons">
                              
                        <li> <a href="http://susanwins.com/clubhouse/home" id="userMenu"> <img src="http://susanwins.com/uploads/38368_clubhouseicon.png" /> </a> </li>
                        <li> 
                          <a href="javascript:;" id="messagesMenu"> 
                            <span id="unreadMessageNotification">
                              @if(isset($unread_messages_count) && $unread_messages_count > 0)
                                <span class="notifcount   animated bounce bounceInUp">{{ $unread_messages_count }}</span>
                              @endif
                            </span>
                            <img src="http://susanwins.com/uploads/64163_chaticon.png" />
                          </a> 
                        </li>

                        <li> 

                          <a href="javascript:;" id="globalNotifMenu">                       
                            <span id="unreadGlobalNotification">
                                @if(isset($global_notification_count) && $global_notification_count > 0)
                                <span class="notifcount   animated bounce bounceInUp">{{ $global_notification_count }}</span>
                              @endif
                            </span>
                        
                            <img src="http://susanwins.com/uploads/83444_notificationicon.png" />
                          </a> 
                         </li>
                        
                        <li> 
                          <a href="{{ url('clubhouse/chatroom') }}"> 
                           <span id="unreadChatroomNotification">
                                @if(isset($chatroom_notification_count) && $chatroom_notification_count > 0)
                                  <span class="notifcount   animated bounce bounceInUp"> 
                                        {{ $chatroom_notification_count }}
                                      </span>
                                @endif
                            </span>
                           <img src="http://susanwins.com/uploads/34532_friendicon.png" />
                           </a> 
                        </li>

                        <li style="margin-right: 6px;"> 
                          <a href="{{ url('/logout') }}"> 
                           <img src="http://susanwins.com/uploads/34338_logouticon.png" />
                          </a> 
                        </li>

                      </ul>

                   @else
                      <ul class="topicons">           
                        <li> <a target="_blank" href="https://twitter.com/SusanWins" class="twitterSM"> <img src="http://susanwins.com/uploads/73749_twittericon.png" />  </a> </li>
                        <li> <a target="_blank" href="https://www.facebook.com/SusanWinsOfficial/?fref=ts" class="facebookSM"> <img src="http://susanwins.com/uploads/84170_facebookicon.png" /> </a> </li>                        
                        <li> <a target="_blank" href="https://uk.pinterest.com/susanwins_/" class="pinterestSM"> <img src="http://susanwins.com/uploads/18419_pinteresticon.png" /> </a> </li>
                        <li> <a target="_blank" href="https://www.instagram.com/susanwinsofficial/" class="instagramSM"> <img src="http://susanwins.com/uploads/18859_instaicon.png" />   </a> </li>
                        <li style="margin-left: 10px;"> <!-- <img src="http://susanwins.com/uploads/74688_cherrylogin.gif" class="cherry" />  --> <a href="{{ url('/login') }}" class="loginbtn"> Login/Signup </a></li>
                        <!-- <li> <a href="#"> <i class="ion-social-youtube"></i>   <span>  Signout </span> </a> </li> -->
                      </ul>
                   @endif


                  </div>

               
                  <div class="grid_12">
                            <div id="search_result">
                        </div>
                  </div>


                </header>
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
  </div>

  <div id="welcomePackageAddress" class="modal">
   <div class="inner">
       <h2>  Do you wish to receive the amazing Free Welcome Pack?</h2>
          <p class="two">Enter your address below - We've got an incredible FREE welcome pack to send you!</p>
        <div class="form-group">
            <textarea name="address" placeholder="Enter Address" class="welcomeAddress"></textarea>

        </div>
        <div class="form-group">
          <button type="button" class="submitWelcomePackage">Here's my Address</button>
        </div>
      </div>
  </div>

  @if(isset($user))
     <input type="hidden" value="{{ $user->id }}" id="userId" data-profile="{{$user->user_detail->profile_picture}}" data-image="{{ $user->user_detail->profile_picture }}" data-name="{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}" data-isAdmin="{{ $user->is_admin }}" data-email="{{ $user->email }}">
  @endif

  @if(isset($session_id))
     <input type="hidden" value="{{ $session_id }}" id="sessionId">
  @endif

    @yield('homecontent')
    @yield('singlecontent')

  <!-- USER ACTIVITY -->
  @if(Auth::check())

    <div class="activity">

      <h2> Friends Recent Activity </h2>

      <ul id="friendUserActivityContainer">

        @if(isset($myFriends) && count($myFriends) > 0)


        @if(isset($user_activities) && count($user_activities) != 0 && $user_activities != null)

        @foreach($user_activities as $activity)
        <li> 
        <img src="{{ $activity->profile_picture ? asset('user_uploads/user_'.$activity->user_id.'/5050/'.$activity->profile_picture) : asset('images/default_profile_picture.png') }}">
        @if($activity->type == 1)
        <p>{{ $activity->full_name }} addedd <a href="{{ $activity->slug }}"  style="text-decoration:none;">{{ $activity->gamename }}</a> as a new Favorite</p>
        @elseif($activity->type == 2)
        <p>{{ $activity->full_name }} is playing <a href="{{ $activity->slug }}"  style="text-decoration:none;">{{ $activity->gamename }}</a></p>
        @elseif($activity->type == 3)
        <p>{{ $activity->full_name }} just won {{ $activity->prizename }}</p>
        @endif
        </li>
        @endforeach

        @endif


        @else

        <li> 
          <a href="{{ url('/clubhouse/chatroom') }}" style="
          overflow: hidden;
          font-weight: 400;
          color: #000;
          text-decoration: none;
          text-align: center;
          display: block;
          font-family: Roboto;">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/choblab/128.jpg" style="float: none; width: 50px; margin-bottom: 10px;">
            <p style="font-size: 17px;text-align: center;    font-family: Roboto;"> Aww you don't have any friends yet! 
              <span style="    
              text-decoration: none;
              font-weight: bold;
              color: #D21416;
              font-family: Roboto;
              font-size: 17px;"> 
              Join in the chat and make some now!  
              </span> 
            </p>
          </a> 
        </li>

        @endif  

      </ul>

      <a class="more" href="">
      <!--  <i class="fa fa-chevron-down"></i> -->
      </a>

    </div>
  @endif
  <!-- END USER ACTIVITY -->

  <!-- ABOUT SUSAN -->
  <div class="introBubble">
      <div class="bigbubble" tabindex="1">
        <p class="firstPara"> 
            <!-- <span class="one">Hi, I'm so glad you're finally here!</span> -->
            <span class="two"> I'm Susan and I LOVE playing slots!</span>
            <span class="three"> This is the BIGGEST Online Slots Community! </span>
            <span class="four"> Meet friends, and chat about the latest gossip in my chat lounges!</span>
            <span class="four"> Read my full reviews and watch my live slots videos!</span>
            <span class="four"> Win amazing prizes, let your hair down, have fun and RELAX!</span>
        </p>
      <!--   <p>
          <ul>
            <li><i class="fa fa-star" aria-hidden="true"></i> Find amazing new slots games to play!</li>
            <li><i class="fa fa-star" aria-hidden="true"></i> Read my full reviews and watch my slots gameplay videos!</li>
            <li><i class="fa fa-star" aria-hidden="true"></i> Nearly 1,000 AMAZING slots games showcased.</li>
            <li><i class="fa fa-star" aria-hidden="true"></i> Find exactly where to play them and get EXCLUSIVE welcome bonuses!</li>
            <li><i class="fa fa-star" aria-hidden="true"></i> Join my FREE member's club and receive an AMAZING FREE Welcome Pack!</li>
            <li><i class="fa fa-star" aria-hidden="true"></i> Chat about slots, celebs, and the latest gossip in my chat lounges!</li>
            <li><i class="fa fa-star" aria-hidden="true"></i> Win amazing prizes, let your hair down, have fun and RELAX!</li>
          </ul>
        </p> -->
        <p class="firstPara"> 
     <!--        <span class="one">I can't wait to meet you! </span> -->
            <span class="twotwo"> Click anywhere to close this window </span>
<!--             <span class="three"> and browse the hundreds of amazing slots games </span>
            <span class="four"> just waiting to be played! </span> -->
        </p>
      </div> 
     <img src="{{url('')}}/images/popupsusan.png">
  </div>
  <!-- END ABOUT SUSAN -->

  <div class="overlay"></div>

  @yield('homecontentResposnive')

        <div class="chatbox-panel" id="chatBoxPanel">
        @if(isset($miniChatrooms))
          
          @foreach($miniChatrooms as $room)
                <div class="chatbox-container chatterBox" id="chatbox-{{ $room->id }}" style="display:none">
                  <div class="chatbox" data-id="{{ $room->id }}" data-name="{{ $room->name }}" data-description="{{ $room->description }}">
                    <div class="inactivebox">
                    <b class="pmName">{{ $room->name }}</b>
                    <span class="peopleTalking"></span>

                    @if(isset($room['unread_count']) && $room['unread_count'] > 0)
                      <div class="notif">{{ $room['unread_count'] }}</div>
                    @endif

                    </div>
                    <div class="activebox" style="display: none;">
                      <div class="head">
                        <h2>
                          <i class="fa fa-minus minimizeChat"></i>
                          <a href="javascript:;">{{ $room->name }}</a>
                          <span>0 people are talking now</span>
                        </h2>
                      </div>
                      <div class="body"></div>
                      @if(isset($user))

                         <textarea class="common observeTyping observerEnd_room_{{ $room->id }}" placeholder="Type Message" style="width: 100%;" data-broadcastId="room_{{ $room->id }}" data-endbroadcastId="room_{{ $room->id }}"></textarea>
                      @else
                          <div class="joinBox"><a href="{{ url('/') }}/login" class="join">Join Chat</a></div>
                      @endif
                      
                      
                    </div>
                  </div>
                </div>
          @endforeach
            
        @endif
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    <script>

      // var _nxlOptions = _nxlOptions || [];
      // _nxlOptions.tracker_code = '$2y$10$P9Nx.8NNoidJZUKoSXDlpecCrJxKNaAGsKiAmIv0swXBoRkwFuFKu';
      
      // user_email = $("#userId").data('email');

      // if(user_email){
      //   _nxlOptions.user_email = user_email;
      // }

      //  (function(){


      //   _tracker = document.createElement('script');
      //   _tracker.type = 'text/javascript';
      //   _tracker.async = true;
      //   _tracker.src = ('https:' == document.location.protocol ? 'https://ssl.' : 'http://') + 'nexolytics.susanwins.com/js/tracker.js';

      //   var s = document.getElementsByTagName('script')[0];

      //   s.parentNode.insertBefore(_tracker,s);

      //  })();

    </script>
    <!--<script src="{{ asset('js/jquery.m.flip.js') }}"></script>   -->
    <!-- <script src="https://cdn.rawgit.com/nnattawat/flip/v1.0.19/dist/jquery.flip.min.js"></script> -->
    <script src="{{ asset('js/sockets.io.js') }}"></script>
    <script> 
            var myFriends = '<?php echo isset($myFriends) && count($myFriends) > 0 ? json_encode($myFriends) : "" ?>';
              BASE_URL = $('meta[name="baseURL"]').attr('content');
              CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
             socket = io.connect(BASE_URL+':8891', { 'reconnection': true, 'reconnectionDelay': 1000, 'timeout' : 1000 });
    </script>

     <script src="{{ asset('js/jquery.unveil.js') }}"></script> 
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script> 
    <script src="{{ asset('js/jquery.leanModal.min.js') }}"></script>   
    <script src="{{ asset('js/jquery.lazyimage.js') }}"></script>   
    <script src="{{ asset('js/jquery.sharrre.min.js') }}"></script>   
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>  
    <script src="{{ asset('js/interact.min.js') }}"></script> 
    <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    
    <script src="{{ asset('js/gameSearch.js') }}"></script> 
    <script src="{{ asset('js/moment.min.js') }}"></script> 
    <script src="{{ asset('js/moment-timezone.min.js') }}"></script> 
    <script src="{{ asset('js/livestamp.min.js') }}"></script> 
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/jquery.slotmachine.js') }}"></script>
    <script src="{{ asset('js/jquery.caret.js') }}"></script>
    <script src="{{ asset('js/tagging.js') }}"></script>

    <script src="{{ asset('js/classie.js') }}"></script>
    <script src="{{ asset('js/privateMessaging.js') }}"></script>
    <script src="{{ asset('js/ifvisible.js') }}"></script>
   <!--<script src="{{ elixir('js/custom/main.js') }}"></script> -->
   <script src="https://www.youtube.com/iframe_api"></script>

   <script src="{{ asset('js/home2.js') }}"></script>
  
 <script>

  $(document).ready(function(){

    /********************** START GET IMAGE ******************************************************************************/
    function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
    }

  /********************** END GET IMAGE ******************************************************************************/
     
timeZone = 'Europe/London';

// Comment ---------------
  
  $('.timestamp').each(function(){
      timestamp = this;
      datetime = $(timestamp).data('datetime');
      $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
      $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
  });

    socket.on('connect', function(){
      if(comment_type && content_id){
          socket.emit('connect_to_comment', {type : comment_type , content_id : content_id  , user : '{{ isset($user->email) ?$user->email : "Guest" }}'});
      }
      
    });

    socket.on('comment_connected', function(){
      comment_connected = true;
      allowToComment(); 
    });

    socket.on('login_success', function(){
      login_success = true;
      allowToComment(); 
    });

    function allowToComment(){

      if(login_success && comment_connected)
      {
        $('#submitCommentTextarea').removeAttr('disabled').tagging();
        $('#submitCommentForm').removeAttr('disabled');

      }

    }

    function Comment(){
      this.id,
      this.content,
      this.user_id,
      this.content_id,
      this.name,
      this.temporaryComment,
      this.theComment,
      this.profile_picture;
    }

    Comment.prototype.makeTemporaryComment = function(){

      this.temporaryComment = $('<li></li>').addClass('temporary')
            .append(
              $('<div></div>').addClass('commentlist')
              .append(
                $('<div></div>').addClass('comment-parent')
                .append(
                  //$('<img>').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic).addClass('avatar')
                  $('<img>').attr('src', getImage(this.profile_picture, this.user_id, 5050)).addClass('avatar')
                )
                .append(
                  $('<div></div>').addClass('comment-info').text(this.name)
                )
                .append(
                  $('<div></div>').addClass('comment-content').html(this.content)
                )
              )
            );

      return this.temporaryComment;
    };

    Comment.prototype.maketheComment = function(){

      var reply_form = '';

      if(user)
      {
        reply_form = $('<form></form>').addClass('reply-form').attr('action', '{{ url("add_reply") }}').attr('method', 'POST').css('display', 'none')
                .append( $('<input>').attr('type', 'hidden').attr('name', 'parent').val(this.id) )
                .append( $('<input>').attr('type', 'hidden').attr('name', 'user_id').val(user.id) )
                .append( $('<input>').attr('type', 'hidden').attr('name', 'content_id').val(this.content_id) )
                .append( $('<input>').attr('type', 'hidden').attr('name', 'email').val(user.email) )
                .append(
                  $('<div></div>').addClass('form-group')
                      .append(
                        $('<textarea>').addClass('form-control').attr('rows', 4).attr('placeholder', 'Write a reply').attr('name', 'content')
                        )
                   ).append( 
                  $('<div></div>').addClass('form-group')
                      .append(
                        $('<button type="submit" class="button_example" value="submit">').text('Submit')
                        )
                   );
      }
        this.theComment = 
                $('<li></li>')
                .append(
                  $('<div></div>').addClass('commentlist')
                  .append(
                    $('<div></div>').addClass('comment-parent').attr('id', 'comment-'+this.id)
                    .append(
                      //$('<img>').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic).addClass('avatar')
                      $('<img>').attr('src', getImage(this.profile_picture, this.user_id, 5050)).addClass('avatar')
                    )
                    .append(
                      $('<span class="timestamp"> | <span class="readable_time">'+moment.tz(timeZone).format('MMM DD, YYYY')+'</span></span>')

                          .prepend($('<span class="livetime"></span>').livestamp(moment.tz(timeZone).format()))
                      )
                    .append(
                      $('<div></div>').addClass('comment-info').text(this.name)
                    )
                    .append(
                      $('<div></div>').addClass('comment-content').html(this.content)
                    )
                    .append(
                      $('<a href="javascript:;">').addClass('reply_btn').text('Reply')
                    )
                    .append(
                      $('<div></div>').addClass('reply-list').attr('id', 'reply-to-'+this.id)
                    )
                    .append(
                      reply_form
                    )
                  )
                );
              
      return this.theComment;
    };

        $(document).on('click', '.viewPersonContainer .actionButtons button', function(){

        other_person = $(this).data('other_person');
        action = $(this).data('action');
        friend_id = $(this).data('friend_id');

        $(this).attr('disabled', 'disabled');

        //alert('i want to '+action+' person '+other_person+'using friend_id '+friend_id);

        if(action){

            if(other_person && action == 1){
              /*alert('add friend');*/
              addFriend(other_person);
            }else if(action == 2 && friend_id && other_person){
              /*alert('cancel friend request');*/
              cancelFriendRequest(friend_id, other_person);
            }else if(action == 3 && friend_id && other_person){
              /*alert('accept friend request');*/
              acceptFriendRequest(friend_id, other_person);
            }else if(action == 4 && friend_id && other_person){
              /*alert('unfriend');*/
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

              $('.viewPersonContainer .actionButtons').find('button').replaceWith(new_button);

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

              $('.viewPersonContainer .actionButtons').find('button').replaceWith(new_button);

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

            $('.viewPersonContainer .actionButtons').find('button').replaceWith(new_button);

          },error : function(xhr){
            console.log(xhr.responseText);
          }

      });

   }


   function addFriend(other_person){
      console.log(' add this friend '+other_person);

      $.ajax({

          url : friendUrl+'/addFriend',
          data : { user_id : user.id, friend_id : other_person, _token : CSRF_TOKEN },
          type : 'POST',
          dataType : 'json',
          success : function(data){
            console.log(data);

            new_button = $('<button>').data('action', 2).data('other_person', other_person).data('friend_id', data.id).text('Cancel Friend Request');
             socket.emit('send_addFriend_request', { from : user.id, to : other_person, id : data.id });
            $('.viewPersonContainer .actionButtons').find('button').replaceWith(new_button);

          },error : function(xhr){
            console.log(xhr.responseText);
          }

      });
   }

    $('.reply-form textarea').tagging();

    socket.on('push_comment', function(response){

      console.log('push_comment');
      console.log(response);

      $('#no-comments').remove();

      comment = new Comment();

      comment.id = response.id;
      comment.user_id = response.user_id;
      comment.content_id = response.content_id;
      comment.name = response.name;
      comment.content = response.content;
      comment.profile_picture = response.user.user_detail.profile_picture;

      if($('#comment-'+comment.id).length == 0)
      {

        getComment = comment.maketheComment();

        $('#commentList ul').append(getComment);
        lastComment = $('#commentList ul').find('> li').last();
        $(lastComment).find('textarea').tagging();
        console.log($(getComment).find('textarea'));
        $(document).trigger('adjustHeight');
      }

    });


    socket.on('push_reply', function(response){

      reply = new Reply();

      reply.id = response.id;
      reply.user_id = response.user_id;
      reply.content = response.content;
      reply.content_id = response.content_id;
      reply.name = response.name;
      reply.parent = response.parent;
      reply.profile_picture = response.profile_picture;

      if($('#reply-'+reply.id).length == 0)
      {
        $('#reply-to-'+reply.parent).append(reply.maketheReply());
        $(document).trigger('adjustHeight');
      }

    });

      

    $('#commentForm').on('submit', function(e){

      e.preventDefault();
      $(this).trigger('simulateSubmit');
      if(tempComment == null){

        comment = new Comment();

        comment.user_id = $(this).find('[name="user_id"]').val() || false;
        comment.content = $(this).find('[name="content"]').val();
        comment.content_id = $(this).find('[name="content_id"]').val() || false;
        comment.name = USER_NAME;
        comment.profile_picture = userImage;
        actionUrl = $(this).attr('action');

        friendTags = $(this).data('friendTags');
        if(comment.content)
        {

          tempComment = comment.makeTemporaryComment();

          $('#commentList ul').append(tempComment);

          $('#no-comments').remove();              
          if(comment.user_id && comment.user_id && comment.name)
          {

            $(this).find('[name="content"]').val('');

            $.ajax({
              type : 'post',
              data : { _token : CSRF_TOKEN , content : comment.content, user_id : comment.user_id, name : comment.name , content_id : comment.content_id, type : comment_type, friendTags : friendTags },
              url : actionUrl,
              dataType : 'json',
              success : function(response)
              {

                console.log(response);
                if(response)
                {
                  comment.id = response.id;
                  getComment = comment.maketheComment();
                  $(tempComment).replaceWith(getComment);
                  $(getComment).find('textarea').tagging();
                  /*createTag = setInterval(function(){

                      if($(getComment).find('textarea').length){
                        $(getComment).find('textarea').tagging();
                        clearInterval(createTag);
                      }
                  }, 500);*/
                  $(document).trigger('adjustHeight');
                  tempComment = null;
                  socket.emit('comment', response);
                }
              },
              error : function(res)
              {
                console.log(res.responseText);
              }
            });


          }
          else
          {
            alert('You must login first!');
          }

        }
        else{
          alert('Please write something!');
        }

      }

      return false;
      
    });

   $(document).on('click', '#commentList .reply_btn', function(){

      if(user && comment_connected && login_success)
      {
        form = $(this).parent().find('.reply-form');

        $('#commentList').find('.reply-form').not(form).slideUp();

        $(form).slideToggle('slow', function(){
          $(document).trigger('adjustHeight');
        });
      }

    });


    function Reply(){
      this.id, 
      this.user_id, 
      this.content, 
      this.content_id, 
      this.name, 
      this.parent, 
      this.temporaryReply, 
      this.theReply, 
      this.profile_picture;
    }

    Reply.prototype.makeTemporaryReply = function(){

       this.temporaryReply = $('<div></div>').addClass('replies-parent').addClass('temporary')
             .append(
                //$('<img>').addClass('avatar').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic)
                $('<img>').addClass('avatar').attr('src', getImage(this.profile_picture, this.user_id, 5050))
                )
              .append($('<div></div>').addClass('reply-info').text(this.name))
              .append($('<div></div>').addClass('reply-content').html(this.content));

      return this.temporaryReply;
    }

    Reply.prototype.maketheReply = function(){

        this.theReply = $('<div></div>').addClass('replies-parent').attr('id', 'reply-'+this.id)
              .append(
                //$('<img>').addClass('avatar').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic)
                $('<img>').addClass('avatar').attr('src', getImage(this.profile_picture, this.user_id, 5050))
                )
                .append(
                      $('<span class="timestamp"> | <span class="readable_time">'+moment.tz(timeZone).format('MMM DD, YYYY')+'</span></span>')

                          .prepend($('<span class="livetime"></span>').livestamp(moment.tz(timeZone).format()))
                      )
              .append($('<div></div>').addClass('reply-info').text(this.name))
              .append($('<div></div>').addClass('reply-content').html(this.content));

      return this.theReply;
    }

    $('#commentList').on('submit', '.reply-form', function(e){

      e.preventDefault();
      $(this).trigger('simulateSubmit');

      if(tempReply == null){

            reply = new Reply();

            reply.user_id = $(this).find('[name="user_id"]').val() || false;
            reply.content = $(this).find('[name="content"]').val();
            reply.content_id = $(this).find('[name="content_id"]').val() || false;
            reply.name = USER_NAME;
            _token = $('meta[name="csrf-token"]').attr('content');
            reply.profile_picture = userImage;
            reply.parent = $(this).find('[name="parent"]').val();

            actionUrl = $(this).attr('action');

             friendTags = $(this).data('friendTags');

            if(reply.content){

              $(this).find('[name="content"]').val('');

                tempReply = reply.makeTemporaryReply();
                $('#reply-to-'+reply.parent).append(tempReply);
                console.log("$('#reply-to-'+reply.parent)");
                console.log($('#reply-to-'+reply.parent));
                $(document).trigger('adjustHeight');
                $.ajax({
                    type : 'post',
                    data : {  user_id : reply.user_id, content : reply.content, content_id : reply.content_id, name : reply.name, _token : CSRF_TOKEN, parent : reply.parent, type : comment_type, friendTags : friendTags },
                    url : actionUrl,
                    dataType : 'json',
                    success : function(response){

                      console.log('maketheReply');
                      console.log(response);
                      if(response){

                            reply.id = response.id;
                            response.profile_picture = userImage;
                            
                            $(tempReply).replaceWith(reply.maketheReply());
                            $(document).trigger('adjustHeight');
                              tempReply = null;

                              
                              socket.emit('reply', response);

                      }
                    },error : function(res){
                      console.log(res.responseText);
                    }
                  });


            }else{
              alert('Please write something!');
            }

      }
      return false;

    });

// ENDOF Comment

    function dragMoveListener (event) {
      var target = event.target,
      // keep the dragged position in the data-x/data-y attributes
      x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
      y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

      // translate the element
      target.style.webkitTransform =
      target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

      // update the posiion attributes
      target.setAttribute('data-x', x);
      target.setAttribute('data-y', y);
    }

    $(document).keyup(function(e) {
      if (e.keyCode == 27) 
      { // escape key maps to keycode `27`
        $(".pmBox").hide();
      }
    });

    /*global document:false, $:false */
    var txt = $('#comments'),
        hiddenDiv = $(document.createElement('div')),
        content = null;

    txt.addClass('txtstuff');
    hiddenDiv.addClass('hiddendiv common');

    $('body').append(hiddenDiv);

    txt.on('keyup', function () {

      content = $(this).val();
      content = content.replace(/\n/g, '<br>');
      hiddenDiv.html(content + '<br class="lbr">');
      $(this).css('height', hiddenDiv.height());

    });

    $('.emojiTrigger').click(function(){
      $('#tooltip').toggle();
      $('.typeBox .arrow_box').toggle();
    });

    $('#userMenu').click(function(){
      $('.profileBox').toggle();
    });

          $('.messageBox .halfNotif').slimScroll({
    height: '366px',
    width:'200px',
    start: 'bottom'
  }).parent().css({'float' : 'left'});

  $('.messageBox ul:not(.halfNotif)').slimScroll({
    height: '366px',
    start: 'bottom'
  });

    $('.pmBox .messagesContent').slimScroll({
      height: '355px',
      start: 'bottom'
    });

    $(".categ-button").click(function(){
      $(".categ-entries").fadeToggle();
    });

    $('body').on('click', function(e){
      if( $('.categ-entries').is(':visible') && ( !$(e.target).hasClass('categ-entries') && !$(e.target).hasClass('categ-button')))
      {
        $(".categ-entries").fadeOut();
      } 
    });

    $('.pmBox .body h2 i').click(function() {        
      $(".pmBox").fadeToggle();
    });

    $('#pm-user').click(function() {
      $('#pmBox').fadeToggle();
    });

    $('.bxslider').bxSlider({
    mode: 'vertical',
    slideMargin: 5,
    minSlides: 6,
    maxSlides: 6,
    pager:false,
    prevText:'‹',
    nextText:'›'
    });

  });

 function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 10,
            header = document.querySelector(".verytopHeader");
        if (distanceY > shrinkOn) {
            classie.add(header,"smaller");
        } else {
            if (classie.has(header,"smaller")) {
                classie.remove(header,"smaller");
            }
        }
    });
}
window.onload = init();


  </script>


  @yield('footer_scripts')


</body>
</html>


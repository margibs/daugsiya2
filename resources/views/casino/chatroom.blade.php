@extends('admin.layout')

@section('content')

{{-- @include('casino.__navigation') --}}

 <link rel="stylesheet" href="{{ asset('css/master.css') }}" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="{{ asset('css/clubhouse.css') }}">   
<style>
.fa-smile-o{
  display: none;
}
	.bigChatBox{
  background: #F5F4F4;
  height: 719px;
  width: 523px;
  position: absolute;
  padding: 20px 25px;
}

.bigChatBox .head{
  height: 40px;
}

.bigChatBox .head ul{
  text-align: right;
  padding: 4px 0;
}
.bigChatBox .head ul li{
    display: inline-block;
    padding-left: 4px;
}
.bigChatBox .head ul li img{
    width: 20px;
    height: 20px;
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
     float: right;
     margin-top: 4px;
}
.bigChatBox .head span:not(#roomDetails){
    font-size: 11px;
    font-family: Roboto;
    color: #c9aea7;
}
.bigChatBox .head p{
  text-align: right;
  margin-top: -8px;
}
.bigChatBox .body{
  margin-top: 30px;
}
.bigChatBox .body ul{
    -moz-transition: all 0.5s ease-out;
    -webkit-transition: all 0.5s ease-out;
    transition: all 0.5s ease-out;
}
.bigChatBox .body ul li img{
    width: 55px;
    height: 55px;
    border-radius: 50%;
    float: left;
    margin: 0 10px 10px 0;
}
.bigChatBox .body  ul li{
  margin-bottom: 10px;
  overflow: hidden;
  display: block;
}
.bigChatBox .body  ul li p{
    font-family: 'Work Sans';
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    background: #fff;
    padding: 10px 25px;
    margin-left: 70px;
    border-radius: 30px;

    /*-moz-box-shadow: 0 0 10px -3px #C7C7C7;
    -webkit-box-shadow: 0 0 10px -3px #C7C7C7;
    box-shadow: 0 0 10px -3px #C7C7C7;*/
}
.bigChatBox .theFooter textarea{
    border: none;
    padding: 20px;
    width: 92%;
    height: 55px;
    border-radius: 5px;
    position: absolute;
    bottom: 18px;
    left: 20px;
    font-family: 'Work Sans';
    font-size: 14px;
    font-weight: 500;
    min-height: 55px;
    -moz-box-shadow: 0 0 7px -3px #D8D8D8;
    -webkit-box-shadow: 0 0 7px -3px #D8D8D8;
    box-shadow: 0 0 7px -3px #D8D8D8;
    padding-right: 80px;
}
.bigChatBox .theFooter .triggers{
    position: absolute;
    bottom: 33px;
    right: 30px;
    z-index: 2;
}
.bigChatBox .theFooter .triggers i{
    font-size: 20px;
    margin-left: 3px;
    color: #807C7C;
    cursor: pointer;
}
.bigChatBox .theFooter .arrow_box{
    right: -169px;
    top: 27px;
    z-index: 101;
}
.common {
    /*width: 500px;*/
    min-height: 15px;
    font-family: Arial, sans-serif;
    font-size: 12px;
    overflow: hidden;
}
.bigChatBox .theFooter #tooltip{
    position: relative;
    top: -194px;
    z-index: 100;
    right: -160px;
}

.bigChatBox .theFooter textarea::-webkit-input-placeholder {
   font-weight: 400
}

.bigChatBox .theFooter textarea:-moz-placeholder { /* Firefox 18- */
   font-weight: 400
}

.bigChatBox .theFooter textarea::-moz-placeholder {  /* Firefox 19+ */
   font-weight: 400  
}

.bigChatBox .theFooter textarea:-ms-input-placeholder {  
   font-weight: 400
}

.roomListContainer{
    position: relative;
    width: 167px;
    float: left;
}

.roomListContainer .roomList{
    position: absolute;
    top: 36px;
    margin-left: 25px;
    background: #d12324;
    
    z-index: 2;
    width: 150px;
    border-radius: 4px;
    display: none;
}

.roomListContainer .roomList li{
        float: left;
}

.roomListContainer .roomList li a{	
	color:#fff;
	padding: 5px 10px;
	display: block;
}

.roomListContainer .roomList li a:visited,
.roomListContainer .roomList li a:hover,
.roomListContainer .roomList li a:active
{
	color:#fff;
}
.roomListContainer .roomList {
    position: absolute;
    top: 36px;
    margin-left: 25px;
    background: #d12324;
    z-index: 2;
    width: 164px;
    border-radius: 4px;
    display: none;
}
.right{
	position: relative;
}

.bodyBackground{
	    width: 100%;
    height: 100%;
    background: #ccc;
    position: absolute;
}
.userlistchat{
  font-family: Roboto;
  padding: 20px 0;
  height: 719px;
}
.userlistchat h3{
  margin: 15px 0;
}
.userlistchat p{
    font-size: 13px;
    color: #A79F9F;
    margin-bottom: 10px;    
}
.userlistchat ul li{
    font-size: 13px;
    margin-top: 8px;
    font-weight: 600;
    cursor: pointer;
}
.userlistchat ul li.selected{
    background: #BBBBBB;
    padding: 6px;
    color: #fff;
    border-radius: 2px;
}
.userlistchat ul li span{
    font-weight: 400;
    font-size: 11px;
    color: #C50606;
    display: block;
}
.sendusermessage, .newroom, .banuser{
  margin: 20px 10px;
}
.sendusermessage{
    background: #ECEBEB;
    padding: 15px 15px;
    border-radius: 3px;
}

.sendusermessage h3{
  margin-bottom: 10px;
  color: #B1B0B0;
  font-family: Roboto;
  font-size: 13px;
}
.sendusermessage textarea{
  border: 1px solid #ddd;
  font-size: 16px;
  font-family: Roboto;
  padding: 9px;
  border-radius: 2px;
  width: 100%;
}
.sendusermessage span{
    display: block;
    padding: 10px 0px;
    font-size: 20px;
    font-weight: 600;
    font-family: Roboto;
    color: #000;
}
.submit{
    width: 115px;
    font-size: 16px;
    margin: 3px 0;
    padding: 5px;
}
.banuser{
    background: #ECEBEB;
    padding: 5px 15px;
    overflow: hidden;
    display: block;
    clear: both;
    border-radius: 3px;
}
.banuser a{
  font-family: Roboto;
  font-size: 15px;
  font-weight: 600;
  background: #A50505;
  padding: 2px 15px;
  border-radius: 50px;
  color: #fff;
  margin-right: 6px;
   display: inline-block;
  margin-bottom: 10px;
  text-decoration: none;
}
.banuser a.lift{
  background: #BD9F0A;
}
.banuser p{
  font-family: Roboto;
  font-weight: 500;
  margin: 10px 0;
}
.newroom{
    background: #ECEBEB;
    padding: 5px 15px;
    padding-bottom: 15px;
    border-radius: 3px;
}
.newroom h3{
  font-family: Roboto;
  font-weight: 500;
  margin: 10px 0;
}
.newroom input[type=text], .newroom textarea{
  border: 1px solid #ddd;
  font-size: 16px;
  font-family: Roboto;
  padding: 9px;
  border-radius: 2px;
  width: 100%;
  margin-bottom: 10px;
}

.bigChatBox em{
	    font-size: 12px !important;
    /* text-decoration: none !important; */
    padding: 0px 20px !important;
    margin: 0 !important;
}

.chatContainer a{
	text-decoration: none;
}

.userLoggedin{
	position: absolute;
    bottom: 0;
    color: #ccc;
    font-family: Helvetica;
    font-size: 12px;
}
</style>
@if($user)
<input type="hidden" value="{{ $user->id }}" id="userId" data-image="{{ $user->user_detail->profile_picture }}" data-name="{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}">
@endif
<div class="row">
  <div class="col-lg-6">

 
      <div class="bigChatBox">
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
              <li><a href="javascript:;" data-href="{{ url('admin/chatroom') }}/{{$room->name}}" data-name="{{ $room->name }}" data-description="{{ $room->description }}" data-id="{{ $room->id }}">{{ $room->name }}</a></li>
                  @endforeach
                  
                </ul>
              </div>
               <!-- <p>
                <span id="chatPopulation"></span>
                <ul id="peopleList">
                 
                </ul>
                             </p> -->
          </div>
          <div class="chatContainer">
              <div class="divContainer">
                <div class="body">
                  <ul class="child" id="messageContent">
              
                      @if($selectedRoom)
                        
                        @foreach($selectedRoom->room_messages as $msg)
                          <li data-user="{{ $msg->user->user_detail->user_id }}"> 
                                <a href="javascript:;" data-target="#friendProfile" class="subModalToggle viewFriendProfile">
                                  <!--   <em>{{ $msg->user->user_detail->firstname }} {{ $msg->user->user_detail->lastname }}</em> -->
                                    <img src="{{ $msg->user->user_detail->userPicture5050() }}" />
                                     </a>
                                    <!-- <p> {{ $msg->message }} </p> -->
                                    <em>{{ $msg->user->user_detail->fullName() }}</em>
                                    
                                    <p>{!! str_contains($msg->message, '.com') ? "<a target='_blank' href=' $msg->message ' style='text-decoration: none;'>$msg->message</a>"  : $msg->message !!} 
                                    <spa class="timestamp" data-datetime="{{ $msg->created_at }}"><em class="livetime"></em></em> 
                                    </p>

                               
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
                    <p class="userLoggedin">Logged in as : {{ $user->user_detail->firstname }} {{ $user->user_detail->lastname }}</p>
                </div>
              </div>
          </div>
      </div>
   

  </div>
   <div class="col-lg-2" style="background: #FDFAFA;padding: 0 9px;">
    <div class="userlistchat">
      <p id="usersTalking">  </p>
      <ul>
        <!-- <li> Gracelyn Caroline </li>
        <li class="selected"> Florence Titty <span>Banned</span> </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Gracelyn Caroline </li>
        <li> Florence Titty </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Gracelyn Caroline </li>
        <li> Florence Titty </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Gracelyn Caroline </li>
        <li> Florence Titty </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Gracelyn Caroline </li>
        <li> Florence Titty </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Gracelyn Caroline </li>
        <li> Florence Titty </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li>
        <li> Gracelyn Caroline </li>
        <li> Florence Titty </li>
        <li> Patrice Jessalyn </li>
        <li> Evaline Kinsley </li>
        <li> Evie Justina </li> -->
      </ul>
    </div>
  </div>
  <div class="col-lg-4">

        <button class="modOnline submit" id="notifyMod" type="button"> Go Online <i class="fa fa-bell"></i> </button>

        <div class="newroom">
        <h3> Create New Room</h3>
        <form action="{{ url('admin/addChatroom') }}" method="POST">
            {!! csrf_field() !!}
            <input type="text" placeholder="Room name..." name="name">
            <textarea placeholder="Description..." name="description"></textarea>
            <button class="submit"> Submit </button>

        </form>
        
      </div>

      <div id="adminActions" style="visibility:hidden">
        <div class="banuser">
        <p> Ban Options </p>
        <a href="#" id="oneHourBan"> 1 hour </a>
        <a href="#" class="lift" id="liftBan"> Lift Ban </a>
      </div>

       <div class="sendusermessage">
        <h3> Send a message to: <span id="currentUserName"> </span> </h3>
        <form id="submitPrivateMessage">
            <textarea id="privateTextarea">
            </textarea>
            <button class="submit"> Send </button>
        </form>
      </div>

      </div>

  </div>
 
</div>


<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/sockets.io.js') }}"></script>
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var userId = $('#userId').val();
   		var userImage = $('#userId').data('image');
	 	var userName = $('#userId').data('name');
	 	var publicUrl = '{{ asset("") }}';
	 	 var chatroomUrl = '{{ url("chatroom") }}';
     var messageUrl = '{{ url("message") }}';
     var notifyUrl  = '{{ url("notification") }}';
		var defaultProfilePic = publicUrl+'/images/default_profile_picture.png';

    FULL_NAME = "{{ Auth::user()->user_detail->fullName() ? Auth::user()->user_detail->fullName() : ''  }}";
   
    timeZone = 'Europe/London';
    $('.timestamp').each(function(){
        timestamp = this;
        datetime = $(timestamp).data('datetime');
        $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
        $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
    });
    


 

       $('#messageContent').animate({
              scrollTop: $('#messageContent')[0].scrollHeight
          }, 500);
       
		 $('.bigChatBox .body ul').slimScroll({
	        height: '556px',
          start: 'bottom'
	    });

     $('.userlistchat ul').slimScroll({
          height: '670px',
          start: 'bottom'
      });

     $('.userlistchat ul').on('click','li', function(){

        $('.userlistchat ul li').not(this).removeClass('selected');
        $(this).addClass('selected');

        $('#adminActions').css('visibility', 'visible').attr('data-user', $(this).data('user_id')).data('user', $(this).data('user_id'));
        $('#currentUserName').text($(this).data('user_name'));

     });

		 if(userId){
		 	var socket = io.connect('{{ url("/") }}:8891');

			 socket.on('connect', function(){
		          socket.emit('login', { user_id : userId , profile_picture : userImage, name : userName }, true, true);

		             last_room_id = $('#roomDetails').data('id');
		             last_room_name = $('#roomDetails').data('name');
		             last_room_description = $('#roomDetails').data('description');

		             if(last_room_id){
		              socket.emit('connect_room', { room_id : last_room_id, name : last_room_name, description : last_room_description });

		             }
		      });
		 }


     $('#notifyMod').on('click', function(){

          room_id = $('#roomDetails').data('id');
          button = this;
          $(button).attr('disabled', 'disabled');

          if(room_id){

            $.ajax({

              url : notifyUrl+'/moderatorJoinedChatroom',
              data : { room_id : room_id , _token : CSRF_TOKEN },
              dataType : 'json',
              type : 'POST',
              success : function(data){

                $(button).removeAttr('disabled');

                alert('Notification Sent!');

              },error : function(xhr){
                console.log(xhr.responseText);
              }

            });

          }


     });


     function resetUserList(){

        $('.userlistchat ul').html('');
        $('#adminActions').css('visibility', 'hidden').removeAttr('data-user');

     }

      socket.on('display_users', function(data){

        console.log('display_users');

        console.log(data);

        $('#chatRoomTextarea').removeAttr('disabled');

        resetUserList();

         $('#usersTalking').text(data.length+' Total Users Talking');

        $.each(data, function(){

            user = this;

            li =  $('<li>').attr('id', 'user-'+user.user_id).text(user.name).data('user_id', user.user_id).data('user_name', user.name);

          


          if(user.banned){

              $(li).addBan(user.banned);
            
          }

          $('.userlistchat ul').append(
              li
            );



        });

      });


      $('#submitPrivateMessage').on('submit', function(e){

          e.preventDefault();

          message = $('#privateTextarea').val();

          user = $('#adminActions').data('user');

          if(message){

            $('#privateTextarea').val('');

            $.ajax({
              url : messageUrl+'/sendPrivateMessage',
              data : { from : userId, to : user, message : message, _token : CSRF_TOKEN },
              type : 'POST',
              dataType : 'json',
              success : function(data){
                alert('Message sent!');
                socket.emit('send_private_message', { to : user, message : message });
              },error : function(xhr){
                console.log(xhr.responseText);
              }
            });

          }else{
            alert('Type a message first!');
          }

      });


      

      $('#oneHourBan').on('click', function(){

        user = $('#adminActions').data('user');

        if(user){

           $('#user-'+user).addBan(3600000); /*3600000*/
           socket.emit('add_user_ban', { user_id : user, time : 3600000 });
        }

      });

      $('#liftBan').on('click', function(){

          user = $('#adminActions').data('user');


          if(user){

            $('#user-'+user).find('span').remove();
            socket.emit('remove_user_ban', { user_id : user });
          }
      });


      $.fn.addBan = function(time){

        function millisToMinutesAndSeconds(millis) {
          var minutes = Math.floor(millis / 60000);
          var seconds = ((millis % 60000) / 1000).toFixed(0);
          return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
        }

        function countRemaining(span){

          remaining_time = $(span).data('remaining_time');

          remaining_time = remaining_time - 1000;

          if(remaining_time > 0){

            $(span).data('remaining_time', remaining_time);
            $(span).text('Banned for '+millisToMinutesAndSeconds(remaining_time));

          }else{
            clearInterval($(span).data('time_interval'));
            $(span).remove();
          }

          

        }

        return this.each(function(){

          span = $('<span>');

          if($(this).find('span').length){
            span = $(this).find('span');
          }else{
            $(this).append(span);
          }

          $(span).removeData('remaining_time').data('remaining_time', time);

          $(span).text('Banned for '+millisToMinutesAndSeconds(time));

          if($(span).data('time_interval')){

            clearInterval($(span).data('time_interval'));

          }

          $(span).data('time_interval', 

            setInterval(countRemaining, 1000, span)

            )



        });

      }



		 	/* socket.on('display_people', function(data){

			    $('#chatRoomTextarea').removeAttr('disabled');

				 	$('#chatPopulation').text(data.length+' users are talking right now');
				 	$('#peopleList').html('');
				 	$.each(data, function(){
				 		$('#peopleList')
				 			.append(
				 				$('<li>')
				 					.append(
				 						$('<img>').attr('src', this.profile_picture ? publicUrl+'/'+this.profile_picture : defaultProfilePic )
				 						)
				 				)
				 	});

				 });*/


				 $('#roomListBtn').on('click', function(){
				 	$('.roomList').slideToggle();
				 });

	 $('.chatCommon').each(function(){

        var txt = $(this),
        hiddenDiv = $(document.createElement('div')),
        content = null;

        txt.addClass('txtstuff');
        hiddenDiv.addClass('hiddendiv common');

        $('body').append(hiddenDiv);

        txt.on('keyup', function (e) {

          if (e.keyCode == 13) {
              $(txt).parent('form').submit();
          }else{

            content = $(this).val();

            content = content.replace(/\n/g, '<br>');
            hiddenDiv.html(content + '<br class="lbr">');

            $(this).css('height', hiddenDiv.height());
          }

        });

    });

   function messageChecker(message) {
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


              var get_message_page = 1;
                no_more_message = 1;

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
                                    $('<img>').attr('src', getImage(item.user.user_detail.profile_picture, item.user.user_detail.user_id, 5050) )
                                  )
                                  )
                                .append(
                            $('<em>').text(item.user.user_detail.firstname+' '+item.user.user_detail.lastname)
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


      /********************** START GET IMAGE ******************************************************************************/
    function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
    }

  /********************** END GET IMAGE ******************************************************************************/

   function initializeDate() {

          timeZone = 'Europe/London';
      
      $('.timestamp').each(function(){
          timestamp = this;
          datetime = $(timestamp).data('datetime');
          $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
          $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
      });

   }

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
                    $('<img>').attr('src', getImage(this.user.user_detail.profile_picture, this.user.user_detail.user_id, 5050) )
                  )
                )
		 					.append(
                  $('<em>').text(this.user.user_detail.firstname+' '+this.user.user_detail.lastname)
                  )
		 					.append(
		 						//$('<p>').text(this.message)
                //messageChecker(this.message)
                 messageChecker(this.message, this.updated_at) 
		 						)
	 					)
	 			});
          initializeDate();


        $('#chatRoomTextarea').removeAttr('disabled');

	 		},error : function(xhr){
	 			console.log(xhr.responseText);
	 		}	
	 	});

	 }
	
	$('.roomList').on('click', 'a', function(){

     newUrl = $(this).data('href');

    window.history.pushState({}, null, newUrl);

	 	room_id = $(this).attr('data-id');
    room_name = $(this).attr('data-name');
    room_description = $(this).attr('data-description');
    console.log('change to '+room_id);

	 	if(last_room_id != room_id){
	 		last_room_id = room_id;

	 		changeChatroom({ room_id : room_id, name : room_name, description : room_description });
	 		name = $(this).text();
		 	$('#roomDetails').attr('data-id', room_id).attr('data-name', room_name).attr('data-description', room_description).text(name);
		 	$('.roomList').slideToggle();
	 	}
	 	
	 });


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
                  $('<img>').attr('src', getImage(userImage, userId, 5050) )
                )
              )
              .append(
                  $('<em>').text(userName)
                  )				
	 					.append(
	 						//$('<p>').text(message)
              messageChecker(message, Date.now())
	 						)
	 				)

        $('#messageContent').animate({
              scrollTop: $('#messageContent')[0].scrollHeight
          },500);

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
                  $('<img>').attr('src', getImage(data.user.profile_picture, data.user.user_id, 5050) )
                )
              )
              .append(
                  $('<em>').text(data.user.name)
                  )
	 					.append(
	 						//$('<p>').text(data.message)
              messageChecker(data.message, Date.noew())
	 						)
	 				)
    	}


         $('#messageContent').animate({
              scrollTop: $('#messageContent')[0].scrollHeight
          },500);

         initializeDate();
 
    });

		
	});
</script>

@endsection
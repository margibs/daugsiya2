@extends('clubhouse.layout')


@section('content-list')

<style>
    .withnotif .app-page .app-content {
        padding-top: 66px;
    }
   .collapsible, .collapsible-header{
     border: none;
     box-shadow: 0 0 0;
     background: #fff;
   }
   .collapsible-body ul li a{
    font-size: 20px;
    /* margin: 20px 10px; */
    background: rgb(183, 10, 10);
    width: 100%;
    display: block;
    color: #fff;
    padding: 10px;
    }
    .collapsible-body ul li a i{
      margin-right: 10px;
    }

    div[data-page="chatroom"] .chatBox{
     /*     padding-top: 40px;*/
          background: #EDEDED;
    }
    #people_count{
          font-size: 12px;
    }
    .roomsandpeople{
      position:fixed;z-index: 2;width: 100%;top: 50px; height:50px
    }
    .withnotif .roomsandpeople{
      top: 65px;
    }
    footer{
      box-shadow: 0 0 0 0;
    }

     em {
    font-style: italic;
    color: #bfcaca;
    font-size: xx-small;
}
  
  .body {

    padding-bottom: 150px;
}

    .confirmNotification {
    margin-top: 7px;
    padding: 4px;
    background: #dfa941;
    text-align: center;
    color: #fff;
    font-weight: 300;
    font-family: "Roboto";
    font-size: 15px;
    overflow: hidden;
    position: relative;
    font-size: 2.2vw;
    /* line-height: 27px; */
    /* height: 24px; */
}
/* .collapsible-header i {
    width: 2rem;
    font-size: 1.6rem;
    line-height: 4rem;
    display: block;
    float: left;
    text-align: end;
    margin-right: 1rem;
} */
</style>

<div class="app-page" data-page="chatroom">
  	<div class="app-content">
 

    @section('content-menu')
       <a href="#" class="waves-effect back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a>
@endsection

	   <div class="row">
	   		<!--   <div class="chatroomHeader">
        <ul id="dropdown2" class="dropdown-content" data-id="{{ $selectedRoom->id }}">
                   @foreach($chatrooms as $room)
                      <li><a href="{{ url('clubhouse/chatroom') }}/{{$room->name}}">{{ $room->name }}<span class="badge"></span></a></li>
                    @endforeach
                </ul>
                  <a class="btn dropdown-button" href="#!" data-activates="dropdown2">{{ $selectedRoom->name }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <center>  
                    <p style="color: red">    
                       <a href="#" data-activates="mobile-demo" class="button-collapse2">{{ $selectedRoom->name }}<span id="people_count"></span></a>
                    </p>
                  </center>
        </div> -->
            <!-- menu 1 
          <div class="roomsandpeople">
              <ul id="dropdown2" class="dropdown-content" data-id="{{ $selectedRoom->id }}">
               {{--  @foreach($chatrooms as $room) --}}
                  <li><a href="{{ url('clubhouse/chatroom') }}/{{$room->name}}">{{ $room->name }}<span class="badge"></span></a></li>
               {{-- @endforeach --}}
              </ul>
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header"><i class="ion-chevron-down" data-id="{{ $selectedRoom->id }}"></i> {{ $selectedRoom->name }}  <a data-activates="mobile-demo" class="button-collapse2" style="    margin-left: 20px;"><span id="people_count"></span></a></div>
                  <div class="collapsible-body">
                  <ul>
                    {{-- @foreach($chatrooms as $room) --}}
                      <li><a href="{{ url('clubhouse/chatroom') }}/{{$room->name}}"><i class="ion-chatbubble"></i> {{ $room->name }}</a></li>
                    {{-- @endforeach --}}
                  </ul>
                  </div>
                </li>
              </ul>
          </div>
     <!-- end menu 1-->

       <div style="position:fixed;z-index: 2;width: 100%;top: -9999px;">
              <ul id="dropdown2" class="dropdown-content" data-id="{{ $selectedRoom->id }}">
                @foreach($chatrooms as $room)
                  <li><a href="{{ url('clubhouse/chatroom') }}/{{$room->name}}">{{ $room->name }}<span class="badge"></span></a></li>
                @endforeach
              </ul>
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header"><i class="ion-chevron-down" data-id="{{ $selectedRoom->id }}"></i> {{ $selectedRoom->name }}  <a data-activates="mobile-demo" class="button-collapse2" style="    margin-left: 20px;"><span id="people_count"></span></a></div>
                  <div class="collapsible-body">
                  <ul>
                    @foreach($chatrooms as $room)
                      <li><a href="{{ url('clubhouse/chatroom') }}/{{$room->name}}"><i class="ion-chatbubble"></i> {{ $room->name }}</a></li>
                    @endforeach
                  </ul>
                  </div>
                </li>
              </ul>
          </div>
					 	
				<div class="chatBox">
		            <div class="body">
		                <ul>
			               
								<li>
			                    	<img src="{{ asset('/images/default_profile_picture.png') }}" class="chatProfPic" data-id="">
                             <em><span></span><em>
			                    	<span></span>
			                	</li>
								
		            	</ul>
		            </div>
		            <div class="chatFooter">
		                   <div class="triggers">
		                      	<span class="sendMessage" id="sendChat"><i class="fa fa-paper-plane"></i></span>
		            		</div>
		                    	<textarea name="" placeholder="Connecting to server..." id="chatRoomTextarea" disabled="disabled"></textarea>
		            </div>
		        </div>
			</div>
  		</div>
  	</div>
</div>

    <div class="body" id="peopleContent">
              <ul class="side-nav" id="mobile-demo">
               <li>
                 <div class="chip">
                   <img src="{{ asset('images/default_profile_picture.png') }}">
                  <span id="user_name">fdsafsda</span>
                 </div>
               </li>
             </ul>
    </div> 



<div class="app-page" data-page="userDetails">

  <div class="app-content">
           

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
              <div id="friendDetailContainer" style="display:none">
                      <div class="userDetailBackground"></div>
    <div class="userDetail">
        <div class="upperHalf">
            <div class="imgContainer">
        <div class="changePicButtonContainer z-depth-1">
            <a href="javascript:;" class="changePicButton">
                
                     <img src="" alt="" id="friendProfilePic">
                
               
               
            </a>
            </div>

        </div>
          <h6></h6>
          <div class="row userDetailActions">

                <div class="col s8"><span class="actionButton" id="toggleRelationship">Unfriend</span></div>
                <div class="col s4"><span id="messageUser"><span class="icon ion-ios-chatbubble"></span> <span></span></span></div>
          
          </div>
        </div>
        <div class="lowerHalf">


            <div class="listFav">
                <p class="favTitle">Favourite Games</p>
                 <ul class="row" id="friendFavGameUl">

              
            </ul>
            </div>
            <div class="listFav">
                <p class="favTitle">Games you've played</p>
                 <ul class="row" id="friendPlayedGameUl">
              
            </ul>
            </div>
           
        </div>
    </div>
                      <div id="confirmModal" class="modal">
                      <div class="modal-content">
                        <h5></h5>
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" class=" modal-action modal-close waves-effect waves-green btn-flat confirmUnfriend">Yes</a>
                        <a href="javascript:;" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
                      </div>
                    </div>
              </div>
     </div>
</div>



@endsection

@section('script')
<script src="{{ asset('js/sockets.io.js') }}"></script>

<script>






(function(window, document, $){


      $('.app-page').css({ 'display' : 'block' });
        $('#mainLoading').remove();
        
		var profileUrl = '{{ url("profile") }}';

	var publicUrl = '{{ asset("") }}';
	 var imageUrl = '{{ asset("uploads") }}';
   var friendUrl = '{{ url("friends") }}';

    FULL_NAME = "{{ Auth::user()->user_detail->fullName() ? Auth::user()->user_detail->fullName() : ''  }}";


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

  App.controller('chatroom', function (page){
    $(page)
		.find('#sendChat')
		.on('click', function(){

		MESSAGE = $('#chatRoomTextarea').val();
		
			 if(MESSAGE == "") {
				//getData('Please insert data');
				alert("Please insert data");
			} 
			else {
				sendMessage(MESSAGE);
				//console.log(MESSAGE);
			}
			
		});

			


		$(page).on('click', '.chatProfPic', function(){

			user_id = $(this).attr('data-id');

			App.load('userDetails', { user_id : user_id });
			//App.load('userDetails');

		});

    $(page).on('appLayout', function(){
        chatBox = $(page).find('.chatBox');

        chatBody = chatBox.find('.body');
                chatBoxOffsetTop = chatBody.offset().top;
                chatBoxFooterOffsetTop = $(page).find('.chatFooter').offset().top;
                  
            //chatBody.css('height', (chatBoxFooterOffsetTop- chatBoxOffsetTop)+'px');
            chatBody.css('height', 50+'%');
            chatBody.scrollTop(chatBody[0].scrollHeight);
    });

     function messageChecker(message) {
      result = message.indexOf(".com");
      image = message.indexOf(".jpg");
      if(result != -1) {
         /* console.log(true);
          console.log(message);
          console.log(result);*/
          return "<p><a target='_blank' href='"+message+"' style='text-decoration: none;'>"+message+"</a></p>";
      }
      else {
         /* console.log(false);
          console.log(message);
          console.log(result);*/
          return "<p>"+message+"</p>";
      }
     
    }


		$(page).on('appShow', function(){
      chatTextarea = $(page).find('#chatRoomTextarea').on('change');

      console.log("change");

			$('#peopleContent').show();
			$('.drag-target:eq(1)').show();

			       chatBox = $(page).find('.chatBox');

            chatBody = chatBox.find('.body');
            chatBoxOffsetTop = chatBody.offset().top;
            chatBoxFooterOffsetTop = $(page).find('.chatFooter').offset().top;
                  
            chatBody.css('height', (chatBoxFooterOffsetTop- chatBoxOffsetTop)+'px');
            chatBody.scrollTop(chatBody[0].scrollHeight);

            chatTextarea = $(page).find('#chatRoomTextarea');
            chatTextarea.attr('disabled', 'disabled').attr('placeholder', 'Connecting to server...');



            socket.on('room_connected', function(banned){
            	/*console.log(banned && userId == banned.user_id &&  == banned.room_id);*/
            	console.log(ROOM_ID);
            	console.log(banned);
	      if(banned && USER_ID == banned.user_id && ROOM_ID == banned.room_id){
	        chatTextarea.initBan(banned.time);

	      }else{
	        chatTextarea.removeAttr('disabled').attr('placeholder', 'Type Message');
	      }

	   });

             socket.on('user_banned', function(data, room_id){
      if(data.user_id == USER_ID && ROOM_ID == room_id ){
        chatTextarea.initBan(data.time);

      }

   });

    socket.on('disconnect', function(){

    	chatTextarea.attr('placeholder', 'Disconnected. Connecting to Server...').attr('disabled', 'disabled');
    });
    socket.on('connect', function(){

    	chatTextarea.removeAttr('disabled').attr('placeholder', 'Type Message');
    });


   socket.on('lift_ban', function(user_id, room_id){
      if(user_id == USER_ID && ROOM_ID == room_id ){
        
        clearInterval(chatTextarea.data('time_interval'));
        chatTextarea.attr('placeholder', 'Type Message').removeAttr('disabled');

      }

   });

		});
		$(page).on('appForward', function(){
			$('#peopleContent').hide();
			$('.drag-target:eq(1)').hide();
		});

		

   		socket.on('display_people', function(data){

    	//console.log('display_people');
    	//console.log(data);
    	var count = Object.keys(data).length;
 		//console.log(count);
 		$(page).find('#people_count').html('');
 		$(page)	
   			.find('#people_count').append('<span> ' + count + ' people are talking now</span>');

   			$('#mobile-demo').html('');
    		//console.log(BASE_URL);
	   		$.each(data, function() {
	   			$('#mobile-demo').append(
	    				$('<li>').append(
	    					$('<div>').addClass('chip').append(
	    						//$('<img>').attr('src', this.profile_picture ? BASE_URL+'/user_uploads/user_'+this.user_id+'/'+this.profile_picture : DEFAULT_IMAGE)
                   $('<img>').attr('src', getImage(this.profile_picture, this.user_id, 5050))
	    					)
	    					.append(
			                  $('<span>').text(this.name)
			                )
	    				)
	    		)
	   		});
   		});

   	//get all chatroom
   		$(page).on('appShow', function(){

        console.log("all Change");
   			room_id = $(page).find('#dropdown2').data('id');
        console.log("test room id");
        console.log(room_id);
   			var is_loading = false; // initialize is_loading by false to accept new loading
			var limit = 4; // limit items per page
		
   			room_id = $(page).find('#dropdown2').data('id');
   			$.ajax({
   				  url : BASE_URL+'/mobile/getChatroom/'+room_id,
		          type : 'GET',
		          dataType : 'json',
		          success : function(data){

			   		$(page).find('.chatBox .body ul').html('');
			   		$.each(data, function() {
			   			 $(page).find('.chatBox .body ul').prepend(
				          $('<li>')
				              .append(
				               // $('<img>').attr('src', this.profile_picture ? BASE_URL+'/user_uploads/user_'+this.user_id+'/'+this.profile_picture : DEFAULT_IMAGE ).attr('data-id', this.user_id).addClass('chatProfPic')
                         $('<img>').attr('src', getImage(this.user.user_detail.profile_picture, this.user.user_detail.user_id, 5050) ).attr('data-id', this.user_id).addClass('chatProfPic')
				                )
				             /* .append(
				                  //$('<span>').text(this.message)
                           $('<span>').append(messageChecker(this.message))
				                )*/
               /*.append(
                            $('<em>').text(FULL_NAME)
                            )
                        .append(
                          $('<span>').append(messageChecker(this.message))
                        
                               .append($('<em></em>').addClass('timestamp').livestamp(moment.tz(this.updated_at, timeZone).format() ))
                            )*/

                .append(
                    $('<span>').append(messageChecker(this.message))
                       .append(
                        $('<em>').text(FULL_NAME)
                        )
                        .append($('<em></em>').addClass('timestamp').livestamp(moment.tz(this.created_at, timeZone).format() ))
                      )
				        );
			   		});
			   		$(page).find('.chatBox .body').scrollTop( $(page).find('.chatBox .body ul')[0].scrollHeight);
            console.log(page);

		          },
		          error: function(error)
		          {
		          	console.log(error.responseText);
		          }
   			});


   			$(document).ready(function(){
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
				      	url: BASE_URL+'/mobile/paginate/getchatroom',
				      	type: 'POST',
				      	data: {start: 10, end: messageIndex, room_id: room_id, _token : CSRF_TOKEN },
				      	dataType: 'json',
				      	success: function(data) {
				      		if(data.done != 1)
				      		{
				      			messageIndex = messageIndex + 20;
					      		//console.log(data);
					      		scrollAjax = false;
					      		
						   		$.each(data, function() {
						   			 $(page).find('.chatBox .body ul').prepend(
							          $('<li>')
							              .append(
							               // $('<img>').attr('src', this.profile_picture ? BASE_URL+'/user_uploads/user_'+this.user_id+'/'+this.profile_picture : DEFAULT_IMAGE ).attr('data-id', this.user_id).addClass('chatProfPic')
                               $('<img>').attr('src', getImage(this.user.user_detail.profile_picture, this.user.user_detail.user_id, 5050)).attr('data-id', this.user_id).addClass('chatProfPic')
							                )
							             /* .append(
							                  //$('<span>').text(this.message)
                                 $('<span>').append(messageChecker(this.message))
							                )*/
                               .append(
                                  $('<em>').text(FULL_NAME)
                                  )
                            .append(
                              $('<span>').append(messageChecker(this.message))
                                
                                  .append($('<em></em>').addClass('timestamp').livestamp(moment.tz(this.created_at, timeZone).format() ))
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
			
   		});
  });



App.controller('userDetails', function(page, request){
			 this.transition = 'slide-left';
				$(page).on('appShow', function(){
				$('#navbarTitle').text('Friend Details');
				//alert(JSON.stringify(request));

				//Hide the pageloading
				$(page).find('.pageLoading').show();
              	$(page).find('#friendDetailContainer').hide();


   $(page).find('#toggleRelationship').on('click', function(){

              		   	theButton = this;

    other_person = $(this).data('other_person');
    action = $(this).data('action');
    friend_id = $(this).data('friend_id');


    if(action){

        if(other_person && action == 1){

	           $.ajax({

			          url : friendUrl+'/addFriend',
			          data : { friend_id : other_person, _token : CSRF_TOKEN },
			          type : 'POST',
			          dataType : 'json',
			          success : function(data){

			            $(theButton).text('Cancel Friend Request').data('action', 2).data('other_person', other_person).data('friend_id', data.id);

			            socket.emit('send_addFriend_request', { from : userId, to : other_person, id : data.id });

			          },error : function(xhr){
			            console.log(xhr.responseText);
			          }

			      });

        }else if(action == 2 && friend_id && other_person){

				          $.ajax({

				          url : friendUrl+'/cancelFriendRequest',
				          data : { id : friend_id, _token : CSRF_TOKEN },
				          type : 'POST',
				          dataType : 'json',
				          success : function(deleted){
				     
				              $(theButton).text('Add Friend').data('action', 1).data('other_person', other_person);


				          },error : function(xhr){
				            console.log(xhr.responseText);
				          }

				      });
        }else if(action == 3 && friend_id && other_person){
          $.ajax({

            url : friendUrl+'/acceptFriendRequest',
            data : { id : friend_id , _token : CSRF_TOKEN },
            type : 'POST',
            dataType : 'json',
            success : function(data){

              if(data){
                socket.emit('friend_request_accepted', { other_person : other_person });
              }

              $(theButton).data('action', 4).data('other_person', other_person).data('friend_id', friend_id).text('Unfriend');


            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });

        }else if(action == 4 && friend_id && other_person){

        	$.ajax({

            url : friendUrl+'/unFriend',
            data : { id : friend_id , _token : CSRF_TOKEN },
            type : 'POST',
            dataType : 'json',
            success : function(data){

              $(theButton).data('action', 1).data('other_person', other_person).text('Add Friend');

            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });

        }


    }


   });

		setTimeout(function(){
			friendFavGameUl = $(page).find('#friendFavGameUl').html('');
      		friendPlayedGameUl = $(page).find('#friendPlayedGameUl').html('');

      		$.ajax({
      			url : profileUrl+'/viewFriendProfile',
          		data : { user_id : USER_ID, other_person : request.user_id, _token : CSRF_TOKEN },
          		dataType : 'json',
          		type : 'POST',
          		success : function(data){
          			//console.log(data);
          			
          			$(page).find('#friendDetailContainer').show().addClass('dataLoaded');
          			//$(page).find('#friendProfilePic').attr('src', data.user_detail.profile_picture ? BASE_URL+'/user_uploads/user_'+data.user_detail.user_id+'/'+data.user_detail.profile_picture : DEFAULT_IMAGE  );
          			//$(page).find('#friendProfilePic').attr('src', data.user_detail.profile_picture ? BASE_URL+'/user_uploads/user_'+data.user_detail.user_id+'/5050/'+data.user_detail.profile_picture : DEFAULT_IMAGE  );
                   $(page).find('#friendProfilePic').attr('src', getImage(data.user_detail.profile_picture, data.user_detail.user_id, 5050));

          			friendName = data.user_detail.firstname+' '+data.user_detail.lastname;
     				$(page).find('#friendDetailContainer h6').text(friendName);


     				/*****************UNFRIEND AND FAVOURITE GAMES AND GAMES YOU PLAYED********************/
		            $(page).on('click', '#messageUser', function(){
		                App.load('privateMessage', { user_id : request.user_id, name : friendName});

                    console.log("privateMessage hello");
		            });

		              friend_id = data.friend.friend_id;

		              $.each(data.favorites, function(){
		                       $(friendFavGameUl) 
		                        .append(
		                          $('<li>').addClass('col s2')
		                            .append(
		                              $('<a href="#">')
		                                .append(
		                                    $('<img>').attr('src', imageUrl+'/'+this['icon_feature_image'])
		                                  )
		                              )
		                                
		                          )
		                  });
		                  
		                  $.each(data.played_games, function(){
		                      $(friendPlayedGameUl)
		                        .append(
		                          $('<li>').addClass('col s2')
		                            .append(
		                              $('<a href="#">')
		                                .append(
		                                    $('<img>').attr('src', imageUrl+'/'+this['icon_feature_image'])
		                                  )
		                              )
		                                
		                          )
		                  });
		             /***************** UNFRIEND AND FAVOURITE GAMES AND GAMES YOU PLAYED ********************/

		             
		             /******************DISPLAY BUTTON ACCORDING TO RELATIONSHIP ****************/
		             	 relation = data.friend.relation;
          				friend_id = data.friend.friend_id;

          				if(relation != 2){

			                    actionBtn = $(page).find('#toggleRelationship').data('other_person', request.user_id);

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

			                  }else{
			                  	$(page).find('#toggleRelationship').hide();
			                  }

		             /******************DISPLAY BUTTON ACCORDING TO RELATIONSHIP ****************/
		          
     				//hide pageLoading after successfull
     				$(page).find('.pageLoading').hide();
      				$(page).find('#friendDetailContainer').show();

          		},
          		error: function(error){
          			console.log(error.responseText);
          		}
      		});

		},2000);
	});
});
	
	/*App.back(function(){
		alert("Hello World");
	});*/

  	App.load('chatroom');

  function sendMessage(message) {
  	console.log(message);
  	thePage = App.getPage(); 	
 	   $(thePage).find('.chatBox .body ul').append(
            $('<li>')
              .append(
                $('<span>').text(message).addClass('alt').text(message)
                )
        );

     $(thePage).find('.chatBox .body').scrollTop( $(thePage).find('.chatBox .body ul')[0].scrollHeight);

	 document.getElementById('chatRoomTextarea').value = "";

	$.ajax({
		url: BASE_URL+"/chatroom/postMessage",
		type:'POST',
		data: { user_id : USER_ID , message : message, room_id : ROOM_ID , _token : CSRF_TOKEN },
		dataType: 'json',
		success: function(result){
			socket.emit('send_chatroom_message', ROOM_ID, message );
			//socket.emit('send_chatroom_message', ROOM_ID, data);
			//console.log(result);
		},
		error: function(error){
			console.log(error.responseText);
		}
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


  socket.on('post_chatroom_message', function(data){
  	//var page = App.getPage();

  	thePage = App.getPage();
  	if(ROOM_ID == data.room_id) {
  		 $(thePage).find('.chatBox .body ul').append(
          $('<li>')
              .append(
                //$('<img>').attr('src',data.user.profile_picture ? BASE_URL+'/user_uploads/user_'+data.user.user_id+'/'+data.user.profile_picture : DEFAULT_IMAGE ).attr('data-id', data.user.user_id).addClass('chatProfPic')
                 $('<img>').attr('src', getImage(data.user.profile_picture, data.user.user_id, 5050)).attr('data-id', data.user.user_id).addClass('chatProfPic')
                )
             /* .append(
                  $('<span>').text(data.message)
                )*/
                .append(
                  $('<span>').append(messageChecker(data.message))
                     .append(
                      $('<em>').text(FULL_NAME)
                      )
                      .append($('<em></em>').addClass('timestamp').livestamp(moment.tz(Date.now(), timeZone).format() ))
                    )

        );

       $(thePage).find('.chatBox .body').scrollTop( $(thePage).find('.chatBox .body ul')[0].scrollHeight);
	 }
  });

  thePage = App.getPage();

  function getData(data){
     App.dialog({
                    title: 'Data Infromation',
                    text: data,
                    okButton: 'Try Again',
                    cancelButton: 'Cancel'
                },function (tryAgain) {
                    if (tryAgain) {
                        App.load('chatroom');
                    }
                });
  }	

})(window, document, jQuery);


/*$('textarea').focus(function() {
   $("footer").hide();
   $(".chatBox .chatFooter").css(
      "bottom","0"
   );
}).blur(function() {
   $("footer").show();
   $(".chatBox .chatFooter").css(
      "bottom","60px"
   );
});*/


$('textarea').focus(function() {
   $("footer").hide();
   $(".chatBox .chatFooter").css(
      "bottom","0"
   );
   $(".body").css(
      "padding-bottom", "65px"
    );
   $('.chatBox .body').scrollTop( $('.chatBox .body ul')[0].scrollHeight);
}).blur(function() {
   $("footer").show();
   $(".chatBox .chatFooter").css(
      "bottom","60px"
   );
    $(".body").css(
      "padding-bottom", "150px"
    );
    $('.chatBox .body').scrollTop( $('.chatBox .body ul')[0].scrollHeight);
});





</script>

@endsection
	var onlineFriendsList = [];

$(function(){

	console.log("Hello Wolrd");
	// window.onresize = function(){ location.reload(); }
	defaultProfilePic = BASE_URL+'/user_uploads/default_image/default_01.png';

	USER_UPLOADS = 'user_uploads/user_';

	//USER DETAILS
	userImage = $('#userId').data('image');
	userProfileImage = $('#userId').data('profile');
	userId = $('#userId').val();
    userName = $('#userId').data('name');
    isAdmin = $('#userId').data('isAdmin') == 1 ? true : false;
    sessionId = $('#sessionId').val();

    var chatterBox = $('.chatterBox .chatbox').map(function(){
    		return { 'id' : $(this).data('id') , 'name' : $(this).data('name'), 'description' : $(this).data('description') };
    }).get();

    var profileImage = $('#profile').val();

    var timeZone = 'Europe/London';
    //END USER DETAILS

    var profileUrl = BASE_URL+'/profile',
    	notifUrl = BASE_URL+'/notification',
    	messageUrl = BASE_URL+'/message',
    	gameExpUrl = BASE_URL+'/gameExp',
    	friendUrl = BASE_URL+'/friends';

	$.fn.preload = function() {
		this.each(function(){
			$('<img/>')[0].src = this;
		});
	}

	$(['http://susanwins.com/uploads/64878_click-header.png']).preload();


	//SOCKET ON

	socket.on('user_logged_in', function(){
		location.reload();
	});

	socket.on('user_logged_out', function(){
		location.reload();
	});

	socket.on('connect', function(){

		if(userId)
		{
		  socket.emit('login', { user_id : userId , profile_picture : userImage, name : userName, session_id : sessionId }, false, isAdmin, myFriends, chatterBox);
		}
		else
		{
		  socket.emit('look_at_room', sessionId, chatterBox);
		}

	});

	/*------- PEOPLE TYPING ----------------*/

		$(document).on('keypress', '.observeTyping', function(e){

			cooldown = $(this).data('cooldown');
			theText = $(this);
			broadcastId = $(this).attr('data-broadcastId');
			endbroadcastId = $(this).attr('data-endbroadcastId');
			console.log(endbroadcastId);
			if(!broadcastId){
				return;
			}
			if(cooldown){

			clearInterval(cooldown);
			$(this).removeData('cooldown');
			}

			var timeOut = setTimeout(function(){
					socket.emit('stopTyping', broadcastId, endbroadcastId);
				}, 1000);
				$(this).data('cooldown',timeOut);
				socket.emit('isTyping', broadcastId, endbroadcastId);


		});


		function whoIsTyping(small, firstname){

			userInSmall = small.data('userInSmall');
			if(userInSmall == undefined){
				userInSmall = [];
				userInSmall.push(firstname);
				small.data('userInSmall', userInSmall);

				return firstname+' is typing';
			}else{
				if(firstname && userInSmall.indexOf(firstname) == -1){
					userInSmall.push(firstname);
				}
				
				returnText = '';

				for(var i =0; i < userInSmall.length; i++){
					if(i > 2){
						returnText+= 'and '+(userInSmall.length - 3)+(userInSmall.length - 3 > 1 ? ' others' : ' other')+' are typing';
						break;
					}

					returnText += (i+1 == userInSmall.length && i > 0 ? 'and ' : '')+userInSmall[i]+(i+1 == userInSmall.length && i > 0 || userInSmall.length == 1 ? ' ' : ', ');

					if(i+1 == userInSmall.length){
						if(i == 0){
							returnText+= 'is typing';
						}else{
							returnText+= 'are typing';
						}
					}

					console.log(returnText);
				}

				return returnText;
			}

			


		}

		socket.on('someoneStopTyping', function(EndBroadcastId, userdata){
			var _endText = $('.observerEnd_'+EndBroadcastId);

			if(_endText.length > 0){

			var theSmall = $(_endText).parent().find('small');
			var _theFirstname = userdata.name.split(' ')[0];

				if(theSmall.length > 0){
				  var userInSmall = theSmall.data('userInSmall');

				  	if(userInSmall && userInSmall.length > 0){
				  		var index = userInSmall.indexOf(_theFirstname);
						if(index != -1) {
							userInSmall.splice(index, 1);
							theSmall.text(whoIsTyping(theSmall));
						}
				  	}
				}

			}
		});

		socket.on('someoneTyping', function(EndBroadcastId, userdata){
			var _endText = $('.observerEnd_'+EndBroadcastId);
			if(_endText.length > 0){
			

			var theSmall = $(_endText).parent().find('small');
			var _theFirstname = userdata.name.split(' ')[0];
			
			if(theSmall.length == 0){

				var userInSmall = [];
				
				userInSmall.push(_theFirstname)	;

				theSmall = $('<small>').data('userInSmall', userInSmall).css({'position' : 'absolute', 'marginTop' : '-12px', 'color' : '#ccc' , 'font-size' : '12px'});

				theSmall.text(whoIsTyping(theSmall, _theFirstname));

				$(_endText).before(theSmall);

				var _timeOut = setTimeout(function(){
					theSmall.remove();
				}, 3000);
				theSmall.data('cooldown', _timeOut)
				

			}else{
				sumCooldown = theSmall.data('cooldown');

				theSmall.text(whoIsTyping(theSmall, _theFirstname));
				clearInterval(sumCooldown);
				$(theSmall).removeData('cooldown');
				var _timeOut = setTimeout(function(){
					theSmall.remove();
				}, 3000);
				theSmall.data('cooldown', _timeOut)
			}

			}
		});

	/*------ END PEOPLE TYPING --------------*/

	/*------- CHATTERBOXES CONNECTED --------*/

	var chatterBoxes_connected = false;
	socket.on('chatterBoxes_connected', function(getRoomPeople){

		chatterBoxes_connected = true;

		$('.chatterBox').show();

		if(getRoomPeople && getRoomPeople.length > 0){

			for(i=0;i<getRoomPeople.length;i++){

					var room_id = getRoomPeople[i].room_id;
					var people = getRoomPeople[i].people;
					var banned = getRoomPeople[i].banned || false;

					$('#chatbox-'+room_id).find('.peopleTalking').text(people.length+' people talking');
					$('#chatbox-'+room_id).find('.activebox h2 span').text(people.length+' people are talking now');

					if(banned){
						$('#chatbox-'+room_id).find('textarea').initBan(banned);
					}
			}
		}
	});

	/*------- CHATTERBOXES END --------------*/

	socket.on('myOnlineFriends', function(onlineFriends){

		onlineFriendsList = onlineFriends;
	});

	socket.on('friendOffline', function(friend_id){
        index = onlineFriendsList.indexOf(parseInt(friend_id));
        if(index != -1){

        	onlineFriendsList.splice(index, 1);
        	offlineUserOnlineStatusElements(friend_id);
        }
    });
	socket.on('friendOnline', function(friend_id){
        
        index = onlineFriendsList.indexOf(parseInt(friend_id));
        friendIndex = myFriends.indexOf(parseInt(friend_id));
        if(index == -1 && friendIndex >=0 ){
        	onlineFriendsList.push(friend_id);
        	onlineUserOnlineStatusElements(friend_id);
        }

    });

    function offlineUserOnlineStatusElements(friend_id){
    if($('#pmBox').data('current') == friend_id && $('#pmBox').is(':visible'))
		{
			$('#pmBox').find('.body h2 > span').removeClass('online');
		}
    }
    function onlineUserOnlineStatusElements(friend_id){
    if($('#pmBox').data('current') == friend_id && $('#pmBox').is(':visible'))
		{
			$('#pmBox').find('.body h2 > span').addClass('online');
		}
    }

	socket.on('user_banned', function(data, room_id){
		console.log('user_banned');
		console.log($('#chatbox-'+room_id));
		console.log($('#chatbox-'+room_id).length);
      if(data.user_id == userId && $('#chatbox-'+room_id).length ){
        $('#chatbox-'+room_id).find('textarea').initBan(data.time);
      }

   });


   socket.on('lift_ban', function(user_id, room_id){
      console.log('lift_ban');
      console.log(user_id);
      console.log(room_id);
      if(user_id == userId && $('#chatbox-'+room_id).length){
        
        clearInterval($('#chatbox-'+room_id).find('textarea').data('time_interval'));
        $('#chatbox-'+room_id).find('textarea').attr('placeholder', 'Type Message').removeAttr('disabled');

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

      function initializeDate() {

          timeZone = 'Europe/London';
      
      $('.timestamp').each(function(){
          timestamp = this;
          datetime = $(timestamp).data('datetime');
          $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
          $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
      });

   }

   /* function messageChecker(message, updated_at) {
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
     
    }*/

     function messageChecker(message, updated_at, name) {
      result = message.indexOf(".com");
      image = message.indexOf(".jpg");

       /*$('<p>').addClass('bubble yellow').text(this.message)*/

      if(result != -1) {
          console.log(true);
          return "<p class='bubble yellow'><a target='_blank' href='"+message+"' style='text-decoration: none;'>"+message+"</a><dev class='timestamp' data-datetime='"+updated_at+"'>"+name+"<dev class='livetime'></dev></dev></p>";
      }
      else {
          console.log(false);
          
          return "<p class'bubble yellow'>"+message+"<dev class='timestamp' data-datetime='"+updated_at+"'>"+name+"<dev class='livetime'></dev></dev></p>";
      }
     
    }



      socket.on('post_friendTag_notification', function(data){

      		span = $('<span>').addClass('notifcount');
			notifcount = 1;

			if($('#unreadUserNotification').find('.notifcount').length)
			{
			  notifcount = parseInt($('#unreadUserNotification').find('.notifcount').text())+1;
			}

			$('#unreadUserNotification').html('').append($(span).text(notifcount));
			console.log(data);
			data_url = data.content;

			if(data.type == 3 || data.type == 2){
				data_url = data.content.slug;
			}

			data_url = BASE_URL+'/'+data_url;

			$('#myNotifications').prepend(
			  $('<li>').append(
							$('<a href="'+data_url+'">')
							.append(
								$('<img>').attr('src', data.user.user_detail.profile_picture ? BASE_URL+'/'+USER_UPLOADS+'/'+datat.user_id+"/"+data.user.user_detail.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text(data.user.user_detail.firstname+' '+data.user.user_detail.lastname+' tagged you in a comment. ')
								)
							)
						)
			);
      });

      socket.on('post_userActivity', function(data){

      	type = data.type;
      	p = $('<p></p>');
      	full_name = data.user.user_detail.firstname+' '+data.user.user_detail.lastname;
      	if(type == 1){
      		$(p).html(full_name+' added <a href="'+BASE_URL+'/'+data.content.slug+'"  style="text-decoration:none;">'+data.content.name+'</a> as a new Favorite');
      	}else if(type == 2){
      		$(p).html(full_name+' played <a href="'+BASE_URL+'/'+data.content.slug+'"  style="text-decoration:none;">'+data.content.name+'</a>');
      	}else if(type == 3){
      		$(p).html(full_name+' just won '+data.content.name);
      	}

      	$('#friendUserActivityContainer').prepend(
      			$('<li>')
      					.append($('<img>').attr('src', data.user.user_detail.profile_picture ? BASE_URL+'/'+USER_UPLOADS+data.user.user_detail.user_id+'/'+data.user.user_detail.profile_picture : defaultProfilePic )

      						)
      					.append(p)
      		)

      });

	socket.on('post_recommendGame_notification', function(friend){

		console.log('post_recommendGame_notification');

		span = $('<span>').addClass('notifcount');
		notifcount = 1;

		if($('#unreadUserNotification').find('.notifcount').length)
		{
		  notifcount = parseInt($('#unreadUserNotification').find('.notifcount').text())+1;
		}

		$('#unreadUserNotification').html('').append($(span).text(notifcount));


		$('#myNotifications').prepend(
		  $('<li>').append(
		    $('<a href="'+BASE_URL+'/'+friend.game.slug+'">').addClass('unread')
		    .append(
		      $('<img>').attr('src', friend.user.user_detail.profile_picture ? BASE_URL+'/'+friend.user.user_detail.profile_picture : defaultProfilePic )
		    )
		    .append(
		      $('<p>')
		      .append(
		        $('<span>').addClass('name').text(friend.user.user_detail.firstname+' '+friend.user.user_detail.lastname+' recommended you to play. ')
		      )
		      .append(
		        $('<div>').addClass('actionList')
		        .append(
		          $('<span>').text('Click to Play')
		        )
		      )
		    )
		  )
		);
	});

	socket.on('post_accepted_friend_notification', function(friend){
		span = $('<span>').addClass('notifcount');
		notifcount = 1;

		if($('#unreadUserNotification').find('.notifcount').length)
		{
		  notifcount = parseInt($('#unreadUserNotification').find('.notifcount').text())+1;
		}

		$('#unreadUserNotification').html('').append($(span).text(notifcount));

		$('#myNotifications').prepend(
		  $('<li>').append(
		    $('<a href="javascript:;">').addClass('unread')
		    .append(
		      $('<img>').attr('src', friend.profile_picture ? BASE_URL+'/'+friend.profile_picture : defaultProfilePic )
		    )
		    .append(
		      $('<p>')
		      .append(
		        $('<span>').addClass('name').text('You and '+friend.name+' are now friends!')
		      )
		      .append(
		        $('<div>').addClass('actionList').data('user', friend.user_id)
		        .append(
		          $('<button>').text('Message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
		        )
		      )
		    )
		  )
		);
	});

	socket.on('post_global_notification', function(notification){

	  console.log('post_global_notification');
	  console.log(notification);

	  if(notification)
	  {
	    span = $('<span>').addClass('notifcount');
	    notifcount = 1;

	    if($('#unreadGlobalNotification').find('.notifcount').length)
	    {
	      notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
	    }

	    $('#unreadGlobalNotification').html('').append($(span).text(notifcount));

	    if(notification.type == 1)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="'+BASE_URL+'/'+notification.game.slug+'">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text('New Game has Added!')
	            )
	          )
	        )
	      );

	    }
	    else if(notification.type == 2 && notification.room)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text('New Chatroom Created!')
	            )
	          )
	        )
	      );

	    }
	    else if(notification.type == 3 && notification.room)
	    {

	      $('#myGlobalNotifications').prepend(
	        $('<li>')
	        .append(
	          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">').addClass('unread')
	          .append(
	            $('<p>')
	            .append(
	              $('<span>').text(notification.moderator.user_detail.firstname+' '+notification.moderator.user_detail.lastname+' is now in '+notification.room.name)
	            )
	          )
	        )
	      );
	    }
	    else if(notification.type == 4)
	    {

	      var a =  $('<a href="//'+ notification.custom_notification.link +' ">').addClass('unread')
                            .append(
                              $('<p>')
                                .append(
                                  $('<span>').text(notification.custom_notification.description)
                                  )
                              );

              if(notification.custom_notification.image){
                   a =  $('<a href="//'+ notification.custom_notification.link +' ">').addClass('unread')
                            .append($('<img>').attr('src', BASE_URL+'/uploads/'+notification.custom_notification.image))
                            .append(
                              $('<p>')
                                .append(
                                  $('<span>').text(notification.custom_notification.description)
                                  )
                              );
              }

               $('#myGlobalNotifications').prepend(
                $('<li>')
                    .append(
                      a
                      )
                    );
	    }
	  }
	});

	socket.on('post_custom_notification', function(notification){
	  $.each(notification, function(){

              data = this;


              span = $('<span>').addClass('notifcount');
              notifcount = 1;
              if($('#unreadGlobalNotification').find('.notifcount').length){
                notifcount = parseInt($('#unreadGlobalNotification').find('.notifcount').text())+1;
              }

              $('#unreadGlobalNotification').html('').append($(span).text(notifcount));


              var a =  $('<a href="//'+ data.custom_notification.link +' ">').addClass('unread')
                            .append(
                              $('<p>')
                                .append(
                                  $('<span>').text(data.custom_notification.description)
                                  )
                              );

              if(data.custom_notification.image){
                   a =  $('<a href="//'+ data.custom_notification.link +' ">').addClass('unread')
                            .append($('<img>').attr('src', BASE_URL+'/uploads/'+data.custom_notification.image))
                            .append(
                              $('<p>')
                                .append(
                                  $('<span>').text(data.custom_notification.description)
                                  )
                              );
              }

              $('#myGlobalNotifications').prepend(
                $('<li>')
                    .append(
                        a
                      )
                    );

            });
	});

	socket.on('post_addFriend_request', function(request_id, request){

		console.log('post_addFriend_request');
		console.log(request);

		requestHtml =  $('<li>').attr('id','friend-request-'+request.user_id).append(
			$('<a href="javascript:;">').addClass('unread')
			.append(
				$('<img>').attr('src', request.profile_picture ? BASE_URL+'/'+request.profile_picture : defaultProfilePic )
			)
			.append(
				$('<p>')
				.append(
					$('<span>').addClass('name').text(request.name)
				)
				.append(
					$('<div>').addClass('actionList')
					.append(
						$('<button>').text('Accept').addClass('acceptFriend').data('id', request_id).data('user', request.user_id)
					)
					.append(
						$('<button>').text('Decline').addClass('declineFriend').data('id', request_id)
					)
				)
			)
		);

		if($('#friend-request-'+request.user_id).length)
		{
			$('#friend-request-'+request.user_id).replaceWith(requestHtml);
		}
		else
		{
			notifcount = $('#notificationMenu').find('.notifcount');

			if(notifcount.length)
			{
				notifs = parseInt($(notifcount).text());
				$(notifcount).text(notifs+1);
			}
			else
			{
				$('#notificationMenu').prepend($('<span>').addClass('notifcount').text(1));
			}

			$('#myNotifications').prepend( requestHtml );
		}
	});

	/*socket.on('post_private_message', function(message){

		console.log('you got a private message!');
		console.log(profileImage);
		console.log(BASE_URL+'/'+message.from.profile_picture);
		console.log(message);

		if($('#pmBox').data('current') == message.from.user_id && $('#pmBox').is(':visible'))
		{
			console.log('real time add');

			$('#pmMessageContent').append(
				$('<li>').append(
					$('<img>').attr('src', profileImage ? BASE_URL+'/'+message.from.profile_picture : defaultProfilePic )
				)
				.append(
					$('<span>').text(message.message)
				)
			);

			$('#pmMessageContent').animate({
				scrollTop: $('#pmMessageContent')[0].scrollHeight
			}, 2000);
		}
		else
		{

			if($('#inbox-user-'+message.from.user_id).length)
			{
				$('#inbox-user-'+message.from.user_id).find('a').addClass('unread').find('.message').text(message.message);
				$('#myMessages').prepend($('#inbox-user-'+message.from.user_id));

				$('#inbox-user-'+message.from.user_id).find('.timestamp').replaceWith($('<span></span>').addClass('timestamp').livestamp(moment.tz(timeZone).format()) );
			}
			else
			{
				$('#myMessages').prepend(
					$('<li>').attr('data-user', message.from.user_id).attr('id', 'inbox-user-'+message.from.user_id)
					.append(
						$('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox').addClass('unread')
						.append(
							$('<img>').attr('src', message.from.profile_picture ? BASE_URL+'/'+ message.from.profile_picture : defaultProfilePic )
						)
						.append(
							$('<p>')
							.append(
								$('<span>').addClass('name').text(message.from.name)
								.append($('<span></span>').addClass('timestamp').livestamp(moment.tz(timeZone).format()))
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
			);
		}
	});*/

	socket.on('open_current_room', function(room){
		if(room)
		{
			if($('#chatbox-'+room.id).length == 0)
			{

				$('#chatBoxPanel').append(
					$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+room.id)
					.append(
						$('<div>').addClass('chatbox').data('id', room.id).data('name', room.name)
						.append(
							$('<div>').addClass('inactivebox')
							.append(
								$('<b>').text(room.name)
							)
							.append(
								$('<span>').addClass('peopleTalking').text(room.people.length+' people talking').data('total', room.people.length)
							)
						)

						.append(
									$('<div>').addClass('activebox').css('display', 'none')
									.append(
										$('<div>').addClass('head')
										.append(
											$('<h2>')
											.append(
												$('<i>').addClass('fa fa-minus').addClass('minimizeChat')
											)
											.append(
												$('<a href="javascript:;">').text(room.name)
											)
											.append(
												$('<span>').text(room.people.length+' people are talking now')
											)
										)
									)
									.append(
										$('<div>').addClass('body')
									)

									.append(
										$('<div>').addClass('joinBox')
											.append(
												$('<a href="'+BASE_URL+'/login">').addClass('join').text('Join Chat')
											)
									)
								)
					)
				);
			}     
		}
	});

	/*socket.on('rooms_opened', function(rooms){

		console.log(rooms);

		$.each(rooms, function(){

			room =this;
			console.log($('#chatBoxPanel'));

			$.ajax({
				url : BASE_URL+'/chatroom/getUnreadCount',
				type : 'POST',
				data : { room_id : room.id, user_id : userId,  _token : CSRF_TOKEN },
				dataType : 'json',
				success : function(count)
				{

					textarea = $('<textarea>').addClass('common').attr('placeholder', 'Type Message').css('width', '100%');

					$('#chatBoxPanel').append(
						$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+room.id)
						.append(
							$('<div>').addClass('chatbox').data('id', room.id).data('name', room.name)
							.append(
								$('<div>').addClass('inactivebox')
								.append(
									$('<b>').text(room.name).addClass('pmName')
								)
								.append(
									$('<span>').addClass('peopleTalking').text(room.people.length+' people talking').data('total', room.people.length)
								)
							)

							.append(
									$('<div>').addClass('activebox').css('display', 'none')
									.append(
										$('<div>').addClass('head')
										.append(
											$('<h2>')
											.append(
												$('<i>').addClass('fa fa-minus').addClass('minimizeChat')
											)
											.append(
												$('<a href="javascript:;">').text(room.name)
											)
											.append(
												$('<span>').text(room.people.length+' people are talking now')
											)
										)
									)
									.append(
										$('<div>').addClass('body')
									)

									.append(
										textarea
									)
								)
						)
					);

					if(room.banned){
						$(textarea).initBan(room.banned);
					}

					if(count > 0)
					{
						$('#chatbox-'+room.id).find('.inactivebox')
						.append(
							$('<div>').addClass('notif').text(count)
						);
					}

					$(document).trigger('checkTabContainers');

				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
				}
			}); 
		});

	});*/



	socket.on('display_people', function(people, room_id){
		$('#chatbox-'+room_id).find('.peopleTalking').text(people.length+' people are talking');
		$('#chatbox-'+room_id).find('.activebox h2 span').text(people.length+' people are talking now');
	});

	/*socket.on('room_opened', function(data, banned){

		socket.emit('observer_room', data.room.id);
		console.log('room_opened');
		console.log(data);    

		if($('#chatbox-'+data.room.id).length == 0)
		{
			$.ajax({
				url : BASE_URL+'/chatroom/getUnreadCount',
				type : 'POST',
				data : { room_id : data.room.id, user_id : userId,  _token : CSRF_TOKEN },
				dataType : 'json',
				success : function(count)
				{
					textarea = $('<textarea>').addClass('common').attr('placeholder', 'Type Message').css('width', '100%');

					$('#chatBoxPanel').append(
						$('<div>').addClass('chatbox-container').addClass('chatMinimized').attr('id', 'chatbox-'+data.room.id)
						.append(
							$('<div>').addClass('chatbox').data('id', data.room.id).data('name', data.room.name)
							.append(
								$('<div>').addClass('inactivebox')
								.append(
									$('<b>').text(data.room.name).addClass('pmName')
								)
								.append(
									$('<span>').addClass('peopleTalking').text(data.people.length+' people talking').data('total', data.people.length)
								)
							).append(
									$('<div>').addClass('activebox').css('display', 'none')
									.append(
										$('<div>').addClass('head')
										.append(
											$('<h2>')
											.append(
												$('<i>').addClass('fa fa-minus').addClass('minimizeChat')
											)
											.append(
												$('<a href="javascript:;">').text(data.room.name)
											)
											.append(
												$('<span>').text(data.people.length+' people are talking now')
											)
										)
									)
									.append(
										$('<div>').addClass('body')
									)

									.append(
										textarea
									)
								)
						)

					);

					if(banned){
							$(textarea).initBan(banned);
						}

					if(count > 0)
					{
						$('#chatbox-'+data.room.id).find('.inactivebox')
						.append(
						$('<div>').addClass('notif').text(count)
						);
					}

					$(document).trigger('checkTabContainers');
				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
				}
			});  
		} 
	});*/

	socket.on('post_chatroom_message', function(data){

		console.log('a new message from room');
		console.log(data);
		console.log("testing");

		chatbox = $('#chatbox-'+data.room_id);
		if($(chatbox).length)
		{

			body = $(chatbox).find('.body');

			$(body).append(
				$('<div>').addClass('message')
				.append(
					$('<div>').addClass('avatar')
					.append(
						$('<a href="javascript:;">')
						.append(
							//$('<img src="'+( data.user.profile_picture ? BASE_URL+'/user_uploads/user_'+data.user.user_id+'/'+data.user.profile_picture : defaultProfilePic) +'">')
							$('<img>').attr('src', getImage(data.user.profile_picture,  data.user.user_id, 5050) )
						)
					)
				)
				.append(
					//$('<p>').addClass('bubble yellow').text(data.message)
					messageChecker(data.message, Date.now(), data.user.name)

				)
			);

			initializeDate();

			if($(chatbox).find('.inactivebox').is(':visible') && userId != data.user.user_id)
			{
				if($(chatbox).find('.inactivebox').find('.notif').length)
				{
					lastCount = parseInt($(chatbox).find('.inactivebox').find('.notif').text());
					$(chatbox).find('.inactivebox').find('.notif').text(lastCount+1);
				}
				else
				{
					$(chatbox).find('.inactivebox').append(
						$('<div>').addClass('notif').text(1)
					);
				}
			}
		}

		span = $('<span>').addClass('notifcount');
			notifcount = 1;

			if($('#unreadChatroomNotification').find('.notifcount').length)
			{
			  notifcount = parseInt($('#unreadChatroomNotification').find('.notifcount').text())+1;
			}

			$('#unreadChatroomNotification').html('').append($(span).text(notifcount));
		scrollDownChatBody();
	});

	socket.on('force_minimizeChat', function(room_id){
		chatbox = $('#chatbox-'+room_id).find('.chatbox');
		if(chatbox.length)
		{
			minimizeChat(chatbox);
		}
	});

	socket.on('force_closeChat', function(room_id){

		chatbox = $('#chatbox-'+room_id).find('.chatbox');
		if(chatbox.length)
		{
			closeChat(chatbox);
			socket.emit('leaveChat', room_id);
		}
	});

	socket.on('force_maximizeChat', function(room_id){
		chatbox = $('#chatbox-'+room_id).find('.chatbox');
		if(chatbox.length)
		{
			maximizeChat(chatbox);
		}
	});


	//END SOCKET ON

	// EVENTS

	$('#globalNotifMenu').on('click', function(){
		$('#unreadGlobalNotification').html('');
	});

	$('#globalNotifMenu').one('click', function(e){

	button = this;

	$('#myGlobalNotifications').html('').append($('<li style="border:none;">').addClass('loading').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>'));

		$.ajax({
		url : notifUrl+'/getGlobalNotifications',
		data : {  _token : CSRF_TOKEN },
		dataType : 'json',
		type : 'POST',
		success : function(data)
		{
		  console.log('getGlobalNotifications');
		  console.log(data);

		  $(button).bind('click', readGlobalNotification);

		  readGlobalNotification();

		  $('#myGlobalNotifications').html('');

		  $.each(data, function(){

		    notification = this;

		    li = $('<li>');

		    if(notification.type == 1)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="'+BASE_URL+'/'+notification.game.slug+'">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text('New Game has Added!')
		            )
		          )
		        )
		      );

		    }
		    else if(notification.type == 2 && notification.room)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text('New Chatroom Created!')
		            )
		          )
		        )
		      );

		    }
		    else if(notification.type == 3 && notification.room)
		    {

		      $('#myGlobalNotifications').append(
		        $(li)
		        .append(
		          $('<a href="'+BASE_URL+'/clubhouse/chatroom/'+notification.room.name+'">')
		          .append(
		            $('<p>')
		            .append(
		              $('<span>').text(notification.moderator.user_detail.firstname+' '+notification.moderator.user_detail.lastname+' is now in '+notification.room.name)
		            )
		          )
		        )
		      );
		    }
		    else if(notification.type == 4)
		    {

		      var a =  $('<a href="//'+ notification.custom_notification.link +' ">').addClass('unread')
                            .append(
                              $('<p>')
                                .append(
                                  $('<span>').text(notification.custom_notification.description)
                                  )
                              );

              if(notification.custom_notification.image){
                   a =  $('<a href="//'+ notification.custom_notification.link +' ">').addClass('unread')
                            .append($('<img>').attr('src', BASE_URL+'/uploads/'+notification.custom_notification.image))
                            .append(
                              $('<p>')
                                .append(
                                  $('<span>').text(notification.custom_notification.description)
                                  )
                              );
              }
 

                     $('#myGlobalNotifications').append(
                      $(li)
                          .append(
                            a
                            )
                          );

		    }


		    if(!notification.globalnotification_read)
		    {
		    $(li).find('a').addClass('unread');
		    }


		  });

		},
		error : function(xhr)
		{
		  console.log(xhr.responseText);
		}
		});
	});

/*	$(document).on('click','.pmFriend', function(){
		$('.pmBox').css('display','block');
		$('.messageNotifBox ').hide();
	});*/

		$(document).mouseup(function (e)
	{
	    var container = $(".messageBox");

	    if (!container.is(e.target)
	        && container.has(e.target).length === 0)
	    {
	        container.hide();
	    }
	});

	$('#notificationMenu').on('click', function(){

		$('#notificationMenu').find('.notifcount').remove();

	});

	$('#notificationMenu').one('click', function(){

		theButton = this;

		$('#myNotifications').html('').append($('<li style="border:none;">').addClass('loading').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>'));

		$.ajax({
			url : profileUrl+'/getFriendRequests',
			data : { user_id : userId, _token : CSRF_TOKEN },
			dataType : 'json',
			type : 'POST',
			success : function(data)
			{
				console.log('getFriendRequests');
				console.log(data);

				if(data)
				{
					readUserNotifications();
					$(theButton).bind('ckick', readUserNotifications);
				}

				$('#myNotifications').html('');

				$.each(data, function(){

					li = $('<li>');

					request = this;
					if(request.type == 0)
					{
						button = $('<a href="javascript:;">')
						.append(
							$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
						)
						.append(
							$('<p>')
							.append(
								$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname)
							)
							.append(
								$('<div>').addClass('actionList')
								.append(
									$('<button>').text('Accept').addClass('acceptFriend').data('id', request.id).data('user', request.user_id)
								)
								.append(
									$('<button>').text('Decline').addClass('declineFriend').data('id', request.id)
								)
							)
						);

						$(li).attr('id', 'friend-request-'+request.user_id).append(
						button
						);     

					}
					else if(request.type == 1)
					{
						$(li).append(
							$('<a href="javascript:;">')
							.append(
							$('<img>').attr('src', request.user.profile_picture ? BASE_URL+'/'+request.user.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text('You and '+request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' are now friends!')
								)
								.append(
									$('<div>').addClass('actionList').data('user', request.user.user_detail.user_id)
									.append(
										$('<button>').text('Message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
									)
								)
							)
						);

					}
					else if(request.type == 2)
					{

						$(li).append(
							$('<a href="'+BASE_URL+'/'+request.game.slug+'">')
							.append(
								$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' recommended you to play. ')
								)
								.append(
									$('<div>').addClass('actionList')
									.append(
										$('<span>').text('Click to Play')
									)
								)
							)
						);
					}
					else if(request.type == 3)
					{
						$(li).append(
							$('<a href="'+BASE_URL+'/all_games">')
							.append(
								$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
								)
							)
						);
					}
					else if(request.type == 5)
					{
						$(li).append(
							$('<a href="'+BASE_URL+'/'+request.postslug+'">')
							.append(
								$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
								)
							)
						);
					}
					else if(request.type == 4)
					{
						$(li).append(
							$('<a href="'+BASE_URL+'/'+request.categoryslug+'">')
							.append(
								$('<img>').attr('src', request.user.user_detail.profile_picture ? BASE_URL+'/'+request.user.user_detail.profile_picture : defaultProfilePic )
							)
							.append(
								$('<p>')
								.append(
									$('<span>').addClass('name').text(request.user.user_detail.firstname+' '+request.user.user_detail.lastname+' tagged you in a comment. ')
								)
							)
						);
					}

					if(request.read == 0)
					{
						$(li).find('a').addClass('unread');
					}

					$('#myNotifications').append(li);

				});

			},
			error : function(xhr)
			{
				console.log(xhr.responseText);
			}
		});

	});

	/*$('#sendPrivateMessage').on('submit', function(e){

		e.preventDefault();
		theUser = $(this).data('user');
		message = $('#privateMessageTextarea').val();

		$('#privateMessageTextarea').val('');

		if(theUser && message)
		{

			$('#pmMessageContent').append(
				$('<li>').addClass('alt').append(
					$('<span>').addClass('alt').text(message)
				)
			);

			$('#pmMessageContent').animate({
				scrollTop: $('#pmMessageContent')[0].scrollHeight
			}, 200);

			$.ajax({
				url : messageUrl+'/sendPrivateMessage',
				data : { from : userId, to : theUser, message : message, _token : CSRF_TOKEN },
				type : 'POST',
				dataType : 'json',
				success : function(data)
				{
					socket.emit('send_private_message', { to : theUser, message : message });
				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
					// message is not send resend?
				}
			});
		}
	});*/

	$('.chatCommon').each(function(){

		var txt = $(this),
			hiddenDiv = $(document.createElement('div')),
			content = null;

		txt.addClass('txtstuff');
		hiddenDiv.addClass('hiddendiv common');

		$('body').append(hiddenDiv);

		txt.on('keyup', function (e) {

			if (e.keyCode == 13) 
			{
				$(txt).parent('form').submit();
			}
			else
			{
				content = $(this).val();
				content = content.replace(/\n/g, '<br>');
				hiddenDiv.html(content + '<br class="lbr">');
				$(this).css('height', hiddenDiv.height());
			}

		});

	});



	// TRIGGER PLAY GAME ------------

	 post_id = $('.postcontent').data('post') || false;

	 if(post_id){

	 	ifvisible.setIdleDuration(30);
	 	activityTimerCounter = 0;
	 	userIdle = false;
	 	var activityTimer = setInterval(function() { 

	 		if(!userIdle){
	 			++activityTimerCounter;
	 			/*console.log(activityTimerCounter);*/
	 			if(activityTimerCounter == 160){
	 				activityTimerCounter = 0;
	 				/*getAllUserActivities();*/
	 			}
	 		}
	 		

	 	 }, 1000);


		ifvisible.on("idle", function(){
		   userIdle = true;
		   activityTimerCounter = 0;
		});

		ifvisible.on("wakeup", function(){	   		
			userIdle = false;
		});


					    var get_activity_page = 1;
                no_more_activities = 1;

                playGamePaginateAJAX = false;

	           $('.activity').on('scroll', function() {
	                var scrollBottom = $(this).scrollTop()+$(this).height(),
	                 scrollHeight = $(this)[0].scrollHeight;
	                 console.log(scrollBottom+' = '+scrollHeight);
	                 console.log(scrollBottom >= scrollHeight);
	                 /*console.log(playGamePaginateAJAX);*/
	                if(scrollBottom >= scrollHeight && no_more_activities == 1 && !playGamePaginateAJAX)
	                	
	                {

	                	playGamePaginateAJAX = true;
	                  $.ajax({
	                    url : gameExpUrl+'/playGamePaginate',
	                    data : { _token : CSRF_TOKEN,page : get_activity_page },
	                    type : 'POST',
	                    dataType : 'json',
	                    success : function(data)
	                    {

	                    	playGamePaginateAJAX = false;
	                      
	                      if(data && data.length )
	                      {

	                      	$.each(data, function(){

	                      		_d = this;

	                      		type = _d.type;
						      	p = $('<p></p>');
						      	full_name = _d.firstname+' '+_d.lastname;
						      	if(type == 1){
						      		$(p).html(full_name+' added <a href="'+BASE_URL+'/'+_d.slug+'"  style="text-decoration:none;">'+_d.gamename+'</a> as a new Favorite');
						      	}else if(type == 2){
						      		$(p).html(full_name+' is playing <a href="'+BASE_URL+'/'+_d.slug+'"  style="text-decoration:none;">'+_d.gamename+'</a>');
						      	}else if(type == 3){
						      		$(p).html(full_name+' just won '+_d.gamename);
						      	}

	                         $('#friendUserActivityContainer').append(
						      			$('<li>')
						      					.append($('<img>').attr('src', _d.profile_picture ? BASE_URL+'/'+USER_UPLOADS+_d.user_id+'/'+_d.profile_picture : defaultProfilePic )

						      						)
						      					.append(p)
						      		);
	                      	});
	                       
	                        $('.activity').scrollTop( scrollHeight -1 );
	                        get_activity_page++;
	                      }
	                      else
	                      {
	                        no_more_activities = 0;
	                      }

	                    },error : function(xhr){
	                      // console.log(xhr.responseText);
	                    }
	                  });
	                }

	            });

		function getAllUserActivities(){



		}

	 	$(document).on('click', '.casino_option, .get_me_article_banner, #playbig > a', function(){
			playIndex = 'play_'+post_id;
				if(lscache.get(playIndex) == null){
					lscache.set(playIndex, true, 1);
					$.ajax({
						url : gameExpUrl+'/triggerPlayGame',
						data : { post_id : post_id, _token : CSRF_TOKEN },
						type : 'POST',
						dataType : 'json', 
						success : function(data){
							console.log(data);
						},error : function(xhr){
							console.log(xhr.responseText);
						}
					})
				}else{
					alert('not expired yet');
					lscache.remove(playIndex);
				}
		});
	 }


	 // ------ TRIGGER PLAY GAME END



	/*$(document).on('click', '.pmFriend', function(){

		modal = $('#pmBox');

		$(this).removeClass('unread');

		if(!modal.hasClass('loading'))
		{
			$(modal).addClass('loading');
			theUser = $(this).parent().data('user');
			$('#pmBox').attr('data-current', theUser);
			$('#sendPrivateMessage').data('user', theUser);
			$(modal).find('.divContainer').hide();
			if(onlineFriendsList.indexOf(parseInt(theUser)) != -1){
				$('#pmBox').find('.body h2 > span').addClass('online');
			}else{
				$('#pmBox').find('.body h2 > span').removeClass('online');
			}

			loading = $('<div>').addClass('loadContainer').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>');

			$(modal).append(loading);
			$('#pmMessageContent').html('');

			$.ajax({
				url : messageUrl+'/getPrivateMessages',
				data : { user_id : userId , other_person : theUser , _token : CSRF_TOKEN },
				dataType : 'json',
				type : 'POST',
				success : function(data)
				{
					$('#unreadMessage').text('('+data['unread']+')');
					$('#readMessage').text('('+data['read']+')');

					$(modal).find('.divContainer').show();
					$(loading).remove();
					modal.removeClass('loading');

					$('#pmName').text( data.other_person.user_detail.firstname +' '+ data.other_person.user_detail.lastname);

					if(data.conversation && data.conversation.length > 0)
					{
						$.each(data.conversation, function(){

							li = $('<li>');

							span = $('<span>').text(this.message);

							if(this.from != userId)
							{
								$(li).append(                        
									$('<img>').attr('src', data.other_person.user_detail.profile_picture ? BASE_URL+'/'+USER_UPLOADS+data.other_person.user_detail.user_id+'/'+data.other_person.user_detail.profile_picture : defaultProfilePic )                        
								);
							}
							else
							{
								$(li).addClass('alt');
								$(span).addClass('alt');
							}

							$('#pmMessageContent').append(
							li.append(span)
							);

						});
					}

				},
				error : function(xhr)
				{
					console.log(xhr.responseText);
				}
			});
		}
	});*/


  
	$('#myNotifications').on('click', '.acceptFriend', function(){

		data_id = $(this).data('id');
		user = $(this).data('user');

		$(this).parents('li').find('.actionList').html('')

		.append(
			$('<span>').text('Request accepted! ').css('font-size', '12px').data('user', user)
			.append(
				$('<button>').text('Message').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
			)
		);

		$.ajax({
			url : friendUrl+'/acceptFriendRequest',
			data : { _token : CSRF_TOKEN, id : data_id },
			type : 'POST',
			dataType : 'json',
			success : function(data)
			{
				if(data)
				{
					socket.emit('friend_request_accepted', { other_person : user });
				}
			},
			error : function (xhr)
			{
				console.log(xhr.responseText);
			}
		});
	});
  
	$('#myNotifications').on('click', '.declineFriend', function(){

		data_id = $(this).data('id');

		$(this).parents('li').remove();

		$.ajax({
			url : friendUrl+'/cancelFriendRequest',
			data : { _token : CSRF_TOKEN, id : data_id },
			type : 'POST',
			dataType : 'json',
			success : function(data)
			{
				console.log(data);
			},error : function (xhr)
			{
				console.log(xhr.responseText);
			}
		});
	});

	$('#messagesMenu').one('click', function(){

		$('#myMessages').html('').append($('<li style="border:none;">').addClass('loading').append('<div class="typing-indicator"><span></span><span></span><span></span></div><p> Loading... </p>'));

		$.ajax({
			url : messageUrl+'/getInbox',
			data : { user_id : userId, _token : CSRF_TOKEN },
			dataType : 'json',
			type : 'POST',
			success : function(data)
			{
				/*sortDates = data.sort(function(a, b){
					return new Date(a.created_at) < new Date(b.created_at);
				});
*/
				unread_messages = [];
				read_messages = [];

				$.each(data, function(){

					if(this.read == 0)
					{
						unread_messages.push(this);
					}
					else
					{
						read_messages.push(this);
					}

				});

				inbox = unread_messages.concat(read_messages);

				$('#myMessages').html('');

				$.each(inbox, function(){

					msg = this;

					button = $('<a href="javascript:;">').addClass('subModalToggle pmFriend').attr('data-target', '#pmBox')
					.append(
						$('<img>').attr('src', getImage(msg.from_user.user_detail.profile_picture,  msg.from_user.user_detail.user_id, 5050) )
					)
					.append(
						$('<p>')
						.append(
							$('<span>').addClass('name').text(msg.from_user.user_detail.firstname+' '+msg.from_user.user_detail.lastname)
							.append($('<span></span>').addClass('timestamp').livestamp(moment.tz(msg.created_at, timeZone).format() ))
						)
						.append(
							$('<span>').addClass('message').text(msg.message)
						)
					);

					if(msg.read == 0)
					{
						$(button).addClass('unread');
					}

					$('#myMessages').append(
						$('<li>').attr('id', 'inbox-user-'+msg.from_user.user_detail.user_id).attr('data-user', msg.from_user.user_detail.user_id)
						.append(
							button
						)
					);
				});
			},
			error : function(xhr)
			{
				console.log(xhr.responseText);
			}
		});
	});

		  /********************** START GET IMAGE ******************************************************************************/
  	function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
    }

  /********************** END GET IMAGE ******************************************************************************/

	$('#myMessages').on('click', 'li a', function(){
		$('#unreadMessageNotification').html('');
	});

	$('#messagesMenu').on('click', function(){
		$('#unreadMessageNotification').html('');
	});

	$('#userMenu').click(function(){
		$('.profileBox').toggle();
	});

	$('#messagesMenu').click(function(){
		$('.messageNotifBox').toggle();
		$('.globalNotifBox ').hide();
		$('.notificationBox ').hide();
	});


	$('#globalNotifMenu').click(function(){
		$('.globalNotifBox').toggle();
		$('.messageNotifBox ').hide();
		$('.notificationBox ').hide();
	});

	$('#notificationMenu').click(function(){
		$('.notificationBox').toggle();
		$('.globalNotifBox ').hide();
		$('.messageNotifBox ').hide();
	});


	$('.messageBox ul').slimScroll({
		height: '366px',
		start: 'bottom'
	});

	$('#chatBoxPanel').on('click', '.minimizeChat', function(e){

		e.stopPropagation();
		chatbox = $(this).parents('.chatbox');
		room_id = $(chatbox).data('id');
		minimizeChat(chatbox);
		socket.emit('chat_minimized', room_id);
	});

	$('#chatBoxPanel').on('click', '.closeChat', function(e){
		e.stopPropagation();
		chatbox = $(this).parents('.chatbox');
		room_id = $(chatbox).data('id');
		closeChat(chatbox);
		socket.emit('stop_observing', room_id);
	});

	$('#chatBoxPanel').on('keydown', 'textarea', function(e){

		if(e.keyCode == 13)
		{
			message = $(this).val();
			chatbox = $(this).parents('.chatbox');
			room_id = $(chatbox).data('id');

			if(message && userId && room_id)
			{


				$(this).val('');
				body = $(this).parents('.activebox').find('.body');

				console.log(body);
				console.log('userImage');
				console.log(userImage);
				console.log("Test Profile");

				$(body).append(
					$('<div>').addClass('message')
					.append(
						$('<div>').addClass('avatar')
						.append(
							$('<a href="javascript:;">')
							// .append(
							//   $('<img src="img/assets/chat-avatar-shine.png">').addClass('shine')
							//   )
							.append(
								/*$('<img src="'+( userImage ? BASE_URL+'/user_uploads/user_'+userId+'/'+userImage : defaultProfilePic) +'">')*/
								$('<img src="'+( userProfileImage ? BASE_URL+'/'+userImage : defaultProfilePic) +'">')

							)
						)
					)
					.append(
						$('<p>').addClass('bubble yellow').text(message)
					)
				);

				$.ajax({
					url : BASE_URL+"/chatroom/postMessage",
					type : 'POST',
					data : { user_id : userId , message : message, room_id : room_id , _token : CSRF_TOKEN },
					dataType : 'json',
					success : function(data)
					{
						socket.emit('send_chatroom_message', room_id, message );
					},
					error : function(xhr)
					{
						console.log(xhr.responseText);
					}
				});

				scrollDownChatBody();
			}
		}

	});

	/*$('#chatBoxPanel').on('keyup', 'textarea', function(e){
		if(e.keyCode == 13)
		{
			$(this).val('');
		}
	});*/


	$('#chatBoxPanel').on('click','.chatbox', function(e){
		room_id = $(this).data('id');
		maximizeChat(this);
		if(room_id)
		{
			socket.emit('chat_maximized', room_id);
		}
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

	// END EVENTS

	// FUNCTIONS

	function readGlobalNotification(){
		$.ajax({
		  url : notifUrl+'/readGlobalNotifications',
		  data : { _token : CSRF_TOKEN },
		  dataType : 'json',
		  type : 'POST',
		  success : function(data)
		  {
		    console.log('readGlobalNotification');
		    console.log(data);
		  },
		  error : function(xhr)
		  {
		    console.log(xhr.responseText);
		  }
		});
	}

	function readUserNotifications(){
		$.ajax({
			url : profileUrl+'/readFriendRequests',
			data : { user_id : userId, _token : CSRF_TOKEN },
			dataType : 'json',
			type : 'POST',
			success : function(data)
			{
			 
			 console.log('readFriendRequests');
			 console.log(data);

			},
			error : function(xhr)
			{
			  console.log(xhr.responseText);
			}
		});
	}

	function minimizeChat(chatbox){

		console.log('minimizeChat');
		chatbox.find('.inactivebox').css('display', 'block');
		chatbox.find('.activebox').css('display', 'none');
		chatbox.parent().removeClass('chatMaximized').addClass('chatMinimized');
	}

	function maximizeChat(chatbox){

		room_id = $(chatbox).data('id');
		room_name = $(chatbox).data('name');
		peopleTalking = $(chatbox).find('.peopleTalking').data('total');
		$(chatbox).find('.notif').remove();
		$(chatbox).parent().removeClass('chatMinimized').addClass('chatMaximized');


		if(room_id)
		{

			$.ajax({
				url : BASE_URL+'/chatroom/userChatRead',
				type : 'POST',
				data : { user_id : userId, room_id : room_id, _token : CSRF_TOKEN },
				dataType : 'json',
				success : function(data)
				{
					// console.log(data);
					console.log('User is looged in')
				},
				error : function(xhr)
				{
					console.log('User is not logged in');
					// console.log(xhr.responseText);
				}
			});

			$(chatbox).find('.inactivebox').hide();

			if($(chatbox).find('.activebox .message').length > 0)
			{
				$(chatbox).find('.activebox').show();
			}
			else
			{
				$(chatbox).find('.activebox').show();
				body = $(chatbox).find('.body');
				

				$.ajax({
					url : BASE_URL+'/room/getRoomMessages',
					data : { room_id : room_id, _token : CSRF_TOKEN },
					type : 'POST',
					dataType : 'json',
					success : function(data)
					{
						$.each(data, function(){
							$(body)
							.append(
								$('<div>').addClass('message')
								.append(
									$('<div>').addClass('avatar')
									.append(
										$('<a href="javascript:;">')
										// .append(
										//   $('<img src="img/assets/chat-avatar-shine.png">').addClass('shine')
										//   )
										.append(
											$('<img src="'+(this.user.user_detail.profile_picture ? BASE_URL+'/user_uploads/user_'+this.user.id+'/'+this.user.user_detail.profile_picture : defaultProfilePic) +'">')
										)
									)
								)
								.append(
								$('<p>').addClass('bubble yellow').text(this.message)
								//$('<p>').addClass('bubble yellow').text("Hello World")
								)
							);
						});
						console.log('watermelon2222222333344');
						scrollDownChatBody();
					},
					error : function(xhr)
					{
						console.log(xhr.responseText);
					}
				});
			}
		}


	}

	function closeChat(chatbox){

		$(chatbox).parent('.chatbox-container').remove();

	}

	function scrollDownChatBody(){

		$('#chatBoxPanel').find('.body').scrollTop($('#chatBoxPanel').find('.body')[0].scrollHeight);
	}

	// END FUNCTIONS

});
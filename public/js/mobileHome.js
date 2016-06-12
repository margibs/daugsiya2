(function(window, document, $){

	var BASE_URL = $('meta[name="baseURL"]').attr('content');
	var defaultProfilePic = "http://susanwins.com/images/default_profile_picture.png";
	var sessionId = $('#sessionId').val();
	console.log('sessionId '+sessionId);






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
     		return this.temporaryComment = $('<li></li>').addClass('temporary')
     					.append($('<img>').attr('src', this.profile_picture).addClass('avatar'))
     					.append($('<p>').addClass('name').text(this.name))
     					.append($('<p>').addClass('comment').html(this.content));
 		};

 	Comment.prototype.maketheComment = function(){

 		reply_form = '';
 		if(USER_ID){
 			reply_form = $('<form></form>').attr('action', BASE_URL+'/add_reply').css('display', 'none').addClass('reply_form')
 							.append( $('<input type="hidden">').attr('name', 'parent').val(this.id) )
 							.append( $('<input type="hidden">').attr('name', 'content_id').val(this.content_id) )
 							.append( $('<textarea>').addClass('reply').attr('placeholder', 'Add Reply').attr('name', 'content') )
 							.append( $('<button type="submit">').addClass('replyBtn').text('Reply') );

 			 /*<form action="{{ url('add_reply') }}" method="POST" style="display:none">
				                          <input type="hidden" name="parent" value="{{ $comment->id }}">
			                              <input type="hidden" name="content_id" value="{{ $current_category_id }}">
				                            <textarea class="reply" placeholder="Add Reply"></textarea>
				                            <button type="button" class="replyBtn">Reply</button>
				                        </form>*/
 		}

 		return this.theComment = $('<li>').append( $('<img>').attr('src', this.profile_picture).addClass('avatar') )
 									.append($('<p>').addClass('name').text(this.name))
 									.append($('<p>').addClass('comment').html(this.content))
 									.append($('<div>').addClass('replyArea')
 											.append($('<ul>').addClass('replyList').attr('id', 'reply-to-'+this.id) )
 											.append(reply_form)
 											.append( $('<a href="javascript:;">').addClass('toggleReply').text('Reply') )
 										);

 	}


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
     		return this.temporaryComment = $('<li></li>').addClass('temporary')
     					.append($('<img>').attr('src', this.profile_picture).addClass('avatar'))
     					.append($('<p>').addClass('name').text(this.name))
     					.append($('<p>').addClass('comment').html(this.content));
 		};


 Reply.prototype.maketheReply = function(){
   return this.theReply = $('<li></li>').addClass('reply-'+this.parent)
     					.append($('<img>').attr('src', this.profile_picture).addClass('avatar'))
     					.append($('<p>').addClass('name').text(this.name))
     					.append($('<p>').addClass('comment').html(this.content));
    }


  $('#popMessage').html('');
  //$('#unreadChat').html('');

    socket.on('chatterBoxes_connected', function(getRoomPeople){


    if(getRoomPeople && getRoomPeople.length > 0){

      for(i=0;i<getRoomPeople.length;i++){

          var room_id = getRoomPeople[i].room_id;
          var people = getRoomPeople[i].people;
          var banned = getRoomPeople[i].banned || false;

          if(room_id == 1){
            $('#popMessage').html('').append('<span> ' + people.length + ' people are talking now</span>');
          }
      }
    }
  });

    socket.on('display_people', function(people, room_id){

      if(room_id == 1){
        $('#popMessage').html('').append('<span> ' + people.length + ' people are talking now</span>');
      }
  });
    
  socket.on('open_current_room', function(room){

       $('#popMessage').html('').append('<span> ' + room.people.length + ' people are talking now</span>');
       
       });

	  socket.on('post_chatroom_message', function(data){

			if($('#unreadChat').find('.notif').length)
				{
					lastCount = parseInt($('#unreadChat').find('.notif').text());
					$('#unreadChat').find('.notif').text(lastCount+1);
				}
				else
				{
					$('#unreadChat').html('').append('<span class="notif animated bounce bounceInUp"> 1 </span>');
				}


	  });




     var comment_connected = false;
    var login_success = false;

     $('.reply_form textarea').tagging();

	$.fn.attachCommentEvents = function (){

		
		return this.each(function(){
				page = this;

				     socket.on('connect', function(){
					      if(comment_type && content_id){
					          socket.emit('connect_to_comment', {type : comment_type , content_id : content_id  , user : USER_FULLNAME ? USER_FULLNAME : 'Guest' });
					      }
					      if(USER_ID == '') {
					      	socket.emit('look_at_room', sessionId);
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

					      if(login_success && comment_connected && USER_ID)
					      {	
					      	$(page).find('#submitCommentTextarea').removeAttr('disabled').tagging();
					      	$(page).find('#submitCommentForm').removeAttr('disabled');

					      }

					    }


            if(USER_ID == ''){

                  $(page).find('#submitCommentTextarea').removeAttr('disabled').attr('readonly', 'readonly');
                  $(page).find('#submitCommentForm').removeAttr('disabled').attr('readonly', 'readonly');
                  $(page).on('click', '#submitCommentTextarea, #submitCommentForm', function(){
                    $('#loginModal').openModal();
                  });
            }


			 socket.on('push_comment', function(response){

		      console.log('push_comment');
		      console.log(response);

		      $(page).find('#no-comments').remove();

		      comment = new Comment();

		      comment.id = response.id;
		      comment.user_id = response.user_id;
		      comment.content_id = response.content_id;
		      comment.name = response.name;
		      comment.content = response.content;
		      //comment.profile_picture = response.user.user_detail.profile_picture;
		      comment.profile_picture = getImage(response.user.user_detail.profile_picture, response.user.user_detail.user_id, 5050);

		      if($(page).find('#comment-'+comment.id).length == 0)
		      {

		        getComment = comment.maketheComment();

		        $(page).find('#commentList').append(getComment);
		        $(getComment).find('textarea').tagging();
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
		      reply.profile_picture = getImage(response.user.user_detail.profile_picture, response.user.user_detail.user_id, 5050);

		      if($(page).find('#reply-'+reply.id).length == 0)
		      {
		        $(page).find('#reply-to-'+reply.parent).append(reply.maketheReply());
		      }

		    });


				$(page).on('click', '.toggleReply', function(){

					if(USER_ID && comment_connected && login_success)
      				{
      					$(this).parent('.replyArea').find('form').show();
      				}
	       			
	       		});

	       		$(page).on('submit', '#commentForm', function(e){
	       			e.preventDefault();
	       			$(this).trigger('simulateSubmit');

	       			content = $(this).find('[name="content"]').val();

	       			if(!content && USER_ID){
	       				//alert('Please write something!');
	       				return;
	       			}

	       			if(!USER_ID){

	       				return;
	       			}

	       			comment = new Comment();

			        comment.user_id = USER_ID || false;
			        comment.content = content;
			        comment.content_id = $(this).find('[name="content_id"]').val() || false;
			        comment.name = USER_FULLNAME || false;
			        //comment.profile_picture = userImage;
			        comment.profile_picture = getImage(userImage, comment.user_id, 5050);
			        actionUrl = $(this).attr('action');

			        friendTags = $(this).data('friendTags');

			        tempComment = comment.makeTemporaryComment();

			        $(page).find('#commentList').append(tempComment);

			        $(this).find('[name="content"]').val('');

			        $.ajax({
			              type : 'post',
			              data : { _token : CSRF_TOKEN , content : comment.content, user_id : comment.user_id , content_id : comment.content_id, type : comment_type, friendTags : friendTags },
			              url : actionUrl,
			              dataType : 'json',
			              success : function(response)
			              {

			                if(response)
			                {
			                  comment.id = response.id;
			                  response.name = comment.name;
			                  getComment = comment.maketheComment();
			                  $(tempComment).replaceWith(getComment);
			                  socket.emit('comment', response);
			                   $(getComment).find('textarea').tagging();
			                 /* $(getComment).find('textarea').tagging();
			                  socket.emit('comment', response);*/
			                }
			              },
			              error : function(res)
			              {
			                console.log(res.responseText);
			              }
			            });

			       /* setTimeout(function(){
			        	getComment = comment.maketheComment();
                  		$(tempComment).replaceWith(getComment);

			        },2000);*/
	       		
	       		});

	       		 /********************** START GET IMAGE ******************************************************************************/
			    function getImage(profile_picture ,user_id, size) {

			      if(size === null) {
			          return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
			      }
			       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
			    }

				$(page).on('submit', '.reply_form', function(e){
					
					e.preventDefault();
					$(this).trigger('simulateSubmit');

					content = $(this).find('[name="content"]').val();

	       			if(!content){
	       				alert('Please write something!');
	       				return;
	       			}

	       			if(!USER_ID){
	       				alert('You must login first!');

	       				return;
	       			}


	       			reply = new Reply();

			        reply.user_id = USER_ID || false;
			        reply.content = content;
			        reply.content_id = $(this).find('[name="content_id"]').val() || false;
			        reply.name = USER_FULLNAME || false;
			        //reply.profile_picture = userImage;
			        reply.profile_picture = getImage(userImage, reply.user_id, 5050);
			        reply.parent = $(this).find('[name="parent"]').val();
			        actionUrl = $(this).attr('action');

			        friendTags = $(this).data('friendTags');

			        tempReply = reply.makeTemporaryReply();

			        $(page).find('#reply-to-'+reply.parent).append(tempReply);

			        $(this).find('[name="content"]').val('');

			        $.ajax({
                    type : 'post',
                    data : {  user_id : reply.user_id, content : reply.content, content_id : reply.content_id, _token : CSRF_TOKEN, parent : reply.parent, type : comment_type, friendTags : friendTags },
                    url : actionUrl,
                    dataType : 'json',
                    success : function(response){
                      if(response){

                            reply.id = response.id;
                            response.name = reply.name;
                            getReply = reply.maketheReply();
                  			$(tempReply).replaceWith(getReply);

                            socket.emit('reply', response);

                      }
                    },error : function(res){
                      console.log(res.responseText);
                    }
                  });

			        setTimeout(function(){
			        	

			        },2000);

				})


		});

	}

})(window, document, jQuery);
(function(window, document, $){

      $('.app-page').css({ 'display' : 'block' });
      $('#mainLoading').remove();


      


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

      $(document).on('click', '#resendConfirmation', function(){
            
            $(this).parent('.confirmNotification').addClass('done').text('Resend Confirmation Sent! Please Check Your Email.');
        });

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var baseUrl = $('meta[name="baseURL"]').attr('content');

                  var userId = $('#userId').val();
                 var userImage = $('#userId').data('image');
                 var userName = $('#userId').data('name');
                 var isAdmin = $('#userId').data('isAdmin') == 1 ? true : false;

                 var sessionUrl = baseUrl+'/session';
                 var profileUrl = baseUrl+'/profile';
                 var friendUrl = baseUrl+'/friends';
                 var messageUrl = baseUrl+'/message';

                 var notifUrl = baseUrl+'/notification';
                 var clubhouseUrl = baseUrl+'/clubhouse';

                 var chatterBox = [];

                 if($('#miniChatrooms').length > 0 && $('#miniChatrooms').val() != null){
                  chatterBox = JSON.parse( $('#miniChatrooms').val() );

                  chatterBox = chatterBox.map(function(arr){
                      return { 'id' : arr.id , 'name' : arr.name, 'description' : arr.description };
                  });
                 }
               /*  chatterBox = $('.chatterBox .chatbox').map(function(){
                    return { 'id' : $(this).data('id') , 'name' : $(this).data('name'), 'description' : $(this).data('description') };
                }).get();*/
                 
           var sessionId = $('#sessionId').val();
          var defaultProfilePic = baseUrl+'/images/default_profile_picture.png';


        socket.on('connect', function(){

          if(userId){
                      socket.emit('login', { user_id : userId , profile_picture : userImage, name : userName, session_id : sessionId }, true, isAdmin, myFriends, chatterBox);
          }else{
              socket.emit('look_at_room', sessionId, chatterBox);
            }

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
                          $('<img>').attr('src', friend.user.user_detail.profile_picture ? baseUrl+'/'+friend.user.user_detail.profile_picture : defaultProfilePic )
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
              $('<img>').attr('src', friend.user.profile_picture ? baseUrl+'/'+friend.user.profile_picture : defaultProfilePic )
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
                                      $('<img>').attr('src', data.user.user_detail.profile_picture ? baseUrl+'/'+data.user.user_detail.profile_picture : defaultProfilePic )
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


socket.on('post_addFriend_request', function(request_id, request){


          if(App.current() == 'myGlobalNotifs'){

              readUserNotifs();

              thePage = App.getPage();


              requestHtml = $('<li>').attr('id', 'friend-request-'+request.user_id)
            .append(
              $('<img>').attr('src', request.profile_picture ? baseUrl+'/'+request.profile_picture : defaultProfilePic )
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
                          $('<img>').attr('src', message.from.profile_picture ? baseUrl+'/'+message.from.profile_picture : defaultProfilePic)
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



                 setTimeout(function(){
                        
                      }, 2000);

            });

              App.controller('myMessages', function(page, request){
                this.transition = 'slide-left';
                  this.restorable = false;
                $(page).on('appShow', function(){
                        $('#navbarTitle').text('Messages');

                        });

                $(page).on('click','li.unread', function(){
                    $(this).removeClass('unread');
                    messageCount = parseInt($('#unreadMessageNotification').find('.notifcount'));
                    if(messageCount > 0){
                      $('#unreadMessageNotification').find('.notifcount').text(messageCount--);
                    }else{
                       $('#unreadMessageNotification').find('.notifcount').remove();
                    }
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
                                              $('<img>').attr('src', msg.from_user.user_detail.profile_picture ? baseUrl+'/'+ msg.from_user.user_detail.profile_picture : defaultProfilePic )
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

              App.controller('privateMessage', function (page, request) {
           		 this.transition = 'slide-left';

               console.log("test");

              $(page).on('appDestroy', function(){
                $('.bottomNotification').show();
              });
              $(page).on('appShow', function(){
                $('.bottomNotification').hide();


                chatBox = $(page).find('.chatBox');
                chatBoxOffsetTop = chatBox.offset().top;
                chatBoxFooterOffsetTop = $(page).find('.chatFooter').offset().top;
                  
                  $(page).find('.chatBox .body').css('height', (chatBoxFooterOffsetTop- chatBoxOffsetTop)+'px');



                  
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

                                      span = $('<span>').text(this.message);

                                      if(this.from != userId){

                                        $(li).append(                        
                                          $('<img>').attr('src', data.other_person.user_detail.profile_picture ? baseUrl+data.other_person.user_detail.profile_picture : defaultProfilePic )                        
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

                                      span = $('<span>').text(this.message);

                                      if(this.from != userId){

                                        $(li).append(                        
                                          $('<img>').attr('src', data.other_person.user_detail.profile_picture ? baseUrl+data.other_person.user_detail.profile_picture : defaultProfilePic )                        
                                        );

                                      }else{

                                       
                                        $(span).addClass('alt');

                                     
                                      }

                                     $(page).find('.chatBox .body ul').prepend(
                                        li.append(span)
                                        );



                                    });
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
        menuWidth: 300, // Default is 240
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
      }
    );

    })(window, document, jQuery);
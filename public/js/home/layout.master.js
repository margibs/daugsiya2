  $(document).ready(function(){

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // target elements with the "draggable" class
    interact('.draggable')
      .draggable({
        // enable inertial throwing
        inertia: true,
        // keep the element within the area of it's parent
        restrict: 
        {
          restriction: ".pmBoxContainer",
          endOnly: true,
          elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
        },
        // enable autoScroll
        autoScroll: true,
        // call this function on every dragmove event
        onmove: dragMoveListener,
        // call this function on every dragend event
        onend: function (event) 
        {
          // var textEl = event.target.querySelector('p');
          // textEl && (textEl.textContent =
          //   'moved a distance of '
          //   + (Math.sqrt(event.dx * event.dx +
          //                event.dy * event.dy)|0) + 'px');
        }
      });


        submitWelcomePackageAJAX = false;
              $('#yesWelcomePackage').leanModal( { top : '50%' } );
        $(document).on('click','.submitWelcomePackage', function(){
          address = $(this).parents('.modal').find('.welcomeAddress').val();
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
                      $("#lean_overlay").trigger("click");
                    $('.confirmNotification').addClass('done').text('Welcome Package Request Sent!');

                 },error : function(xhr){
                   console.log(xhr.responseText);
                 }
             });

          }
      });

          resendConfirmationAjax = false;
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
             
        });


    var comment_connected = false;
    var login_success = false;
    var tempComment = null;
    var tempReply = null;
    var user_json = '{!! isset($user) ? json_encode($user->with(array("user_detail"=>function($query){

        $query->select("id","firstname", "lastname", "user_id", "profile_picture");
    }))->first(), JSON_HEX_APOS ) : null !!}';

    var user = user_json ? JSON.parse(user_json) : false;
    var comment_type = "{{ isset($comment_type) ? $comment_type : '' }}";
    var content_id = "{{ isset($content_id) ? $content_id : '' }}";
    var friendUrl = BASE_URL+'/friends';
    var profileImage = $('#data-profile').val();
    var USER_NAME = $('#userId').attr('data-name');
    var publicUrl = '{{ asset("") }}';
    var defaultProfilePic = publicUrl+'/user_uploads/default_image/default_01.png';

       /********************** START GET IMAGE ******************************************************************************/
    function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
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

    $('.messageBox ul').slimScroll({
      height: '366px'
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

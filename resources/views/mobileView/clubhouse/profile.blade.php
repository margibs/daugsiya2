@extends('clubhouse.layout')
	
@section('custom-styles')
<link rel="stylesheet" href="{{ asset('css/rateit.css') }}">
 <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
 <link rel="stylesheet" href="{{ asset('css/jrate.css') }}">
 <style>
 input:not([type]), input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea, textarea{
  font-size: 20px;
 font-weight: 600;
 
 }
 .profileForm textarea{
  border: none;
 }
@media(min-width: 600px){
  .listFav .row .col.s2{
    width: 10.666667%;
  }
}
@media(min-width: 720px){
  .userDetail .upperHalf {
    background: #fff url(http://susanwins.com/uploads/31383_tab-profile-bg-big.jpg) no-repeat 100% 55%;
    height: 365px;
  }
  .userDetail .changePicButton{
    width: 150px;
    height: 150px;
  }
  .userDetail .imgContainer .changePicButtonContainer {
    width: 154px;
  }
  .userDetail .upperHalf .userDetailActions .app-button, .userDetail .upperHalf .userDetailActions #messageUser{
    font-size: 25px
  }
  .userDetail .upperHalf .userDetailActions .app-button .icon, .userDetail .upperHalf .userDetailActions #messageUser .icon{
    font-size: 50px;
  }
  .userButtons span, .userButtons a{
    padding: 10px;
    font-size: 20px;
  }
  #rateModal h4 {
    font-size: 40px;
    font-weight: 600;
  }

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
.rateContainer li{
    width: 15%!important;
}
 </style>
@endsection

 


  @section('content-menu')
     <a href="javascript:;" class="waves-effect back_button" id="backButton"><i class="material-icons">chevron_left</i> </a> 
  @endsection 


@section('content')

  <div class="app-page" data-page="main">

  <div class="app-content">
          <div class="userDetailBackground"></div>
    <div class="userDetail">
        <div class="upperHalf">
            <div class="imgContainer">
        <div class="changePicButtonContainer z-depth-1" id="uploadBtn">
            <div class="changePicButton">
                
                     <img src="{{ $user->user_detail->profile_picture  ? url().'/user_uploads/user_'.$user->id.'/'.$user->user_detail->profile_picture : url().'/user_uploads/default_image/default_01.png' }}" alt="" id="picPreview">
                
            </div>
               <label>
                  <span> + </span>
                </label>
                <input type="file" class="upload file-input" name="profilePic" accept="image/*" id="profilePic" />
            </div>

        </div>
          
          <h6>{{ $user->user_detail->firstname.' '.$user->user_detail->lastname }}</h6>
          
          <div class="row userDetailActions">

                  
          <div class="col s6"><span class="app-button" data-target="yourFriends"><span class="icon  ion-android-people"></span> <span>{{ count($user->myFriends) }} </span></span></div>
          <div class="col s6"><span class="app-button" data-target="yourMessages" data-target-args='{ "count" : "{{ count($user->myMessages) }}" }'><span class="icon ion-ios-chatbubble"></span> <span>{{ count($user->myMessages) }}</span></span></div>
          </div>

        </div>
        <div class="lowerHalf">
            
            <div class="row userButtons">
                 <span class="editProfile"><i class="ion-android-create"> </i> Profile</span>
                  <span class="changePassword"><i class="ion-android-lock"></i> Password</span>
                <!--   <a href="{{ url('clubhouse/magazine') }}"> <i class="ion-android-person"></i> About you </span></a> -->
            </div>

            <div class="listFav">
                <p class="favTitle">Favourite Games</p>
                 <ul class="row">

                  @foreach($user->favorites()->take(12)->get() as $favorite)
                    <li class="col s2 rateGame" data-args='{ "user_rating" : "{{ $favorite->user_rating ? $favorite->user_rating->rating : 0 }}", "totalRating" : "{{ $favorite->gameRating['totalRating'] }}" , "post" : "{{ $favorite->id }}" , "slug" : "{{ $favorite->slug }}", "background_image" : "{{ $favorite->thumb_feature_image }}" }'><img src="{{ asset('uploads') }}/{{ $favorite->icon_feature_image }}"></li>
                  @endforeach
              
            </ul>
            </div>
            <div class="listFav">
                <p class="favTitle">Games you've played</p>
                 <ul class="row">

                   @foreach($user->played_games()->take(12)->get() as $played_game)
                    <li class="col s2 rateGame" data-args='{ "user_rating" : "{{ $played_game->user_rating ? $played_game->user_rating->rating : 0 }}", "totalRating" : "{{ $played_game->gameRating['totalRating'] }}" , "post" : "{{ $played_game->id }}" , "slug" : "{{ $played_game->slug }}", "background_image" : "{{ $played_game->thumb_feature_image }}" }'><img src="{{ asset('uploads') }}/{{ $played_game->icon_feature_image }}"></li>
                    
                  @endforeach
              
            </ul>
            </div>
            <div class="listFav">
                <p class="favTitle">Games you haven't played yet </p>
                 <ul class="row">

                  @foreach($user->unplayed_games->take(12) as $unplayed_game)

                   <li class="col s2 rateGame" data-args='{ "user_rating" : "{{ $unplayed_game->user_rating ? $unplayed_game->user_rating->rating : 0 }}", "totalRating" : "{{ $unplayed_game->gameRating['totalRating'] }}" , "post" : "{{ $unplayed_game->id }}" , "slug" : "{{ $unplayed_game->slug }}", "background_image" : "{{ $unplayed_game->thumb_feature_image }}" }'><img src="{{ asset('uploads') }}/{{ $unplayed_game->icon_feature_image }}"></li>
                  @endforeach
              
            </ul>
            </div>
           
        </div>
    </div>

      </div>
</div>
         <div id="cropModal" class="modal">
    <div class="modal-content">
        <div id="cropperH"></div>
        <div class="progressBar" style="display:none" id="cropProgressBar">
              <div class="progressBarPercent" style="width:0">0%</div>
          </div>
    </div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn" id="doneCropping">Save</a>
    </div>
  </div>
     <div id="rateModal" class="modal">
    <div class="modal-content">
    <h4></h4>
      <div id="jRate">
           

      </div>
        <button type="button" class="buttonone" id="playGame"> Play Now </button>
        <button type="button"><a href="javascript:;" id="goToGame"> Read Review</a></button>
    </div>
  </div>
     <div id="selectCasinoModal" class="modal">
    <div class="modal-content">
    <h4>Select from these casinos:</h4>
          <ul id="selectCasino">
          </ul>
    </div>
  </div>


<div class="app-page" data-page="yourFriends">

  <div class="app-content defaultBg">
         <div class="row">
              <div class="col s12">
                <ul id="yourFriendSorting">
                    <li><div class="active">All <span class="countAll">(<span id="countAll"></span>)</span></div></li>
                    <li><div>Online <span class="countOnline">(<span id="countOnline"></span>)</span></div></li>
                    <li><div>Offline <span class="countOffline">(<span id="countOffline"></span>)</span></div></li>

                </ul>
              </div>
              <div id="myFriends" class="col s12">
            <ul class="friendList row">
                   @foreach($user->myFriends as $fr)

                       <li class="app-button col s3" data-target="userDetails" data-target-args='{ "user_id" : "{{ $fr->friend->user_detail->user_id }}" }' id="friend_li_{{ $fr->friend->user_detail->user_id }}">
                            <span class="user_online_status offline" id="friend-online-status-{{ $fr->friend->user_detail->user_id }}"></span>
                          <!--   <img src="{{ $fr->friend->user_detail->profile_picture ? asset('').'/'.$fr->friend->user_detail->profile_picture : asset('images/default_profile_picture.png') }}" alt=""> -->
                           <img src="{{ $fr->friend->user_detail->userPicture5050()  }}" alt="">
                            <span class="userName">{{ ucwords( $fr->friend->user_detail->firstname ) }}</span>
                          </li>
                   @endforeach
                     </ul>
              </div>
            </div>
      </div>
</div>

<div class="app-page" data-page="yourMessages">

  <div class="app-content defaultBg">
              <div id="myMessages" class="col s12">
            <ul class="messageList">
                   @foreach($user->myMessages as $msg)
                        <li class="app-button" data-target="privateMessage" data-target-args='{ "user_id" : "{{ $msg->from_user->user_detail->user_id }}", "name" : "{{ ucwords($msg->from_user->user_detail->firstname) }}" }'>
                         <!--  <img src="{{ $msg->from_user->user_detail->profile_picture ? asset('').'/'.$msg->from_user->user_detail->profile_picture : asset('images/default_profile_picture.png') }}" alt=""> -->
                        <img src="{{ $msg->from_user->user_detail->userPicture5050() }}" alt="">
                          <div class="msgContent">
                              <div class="info">
                                <span class="timestamp" data-datetime="{{ $msg->created_at }}"><span class="livetime"></span></span>
                                <h6>{{ ucwords($msg->from_user->user_detail->firstname) }} </h6>
                              </div>
                              <p> {{ $msg->message }} </p>
                          </div>

                        </li>
                       
                   @endforeach
                     </ul>
              </div>
      </div>
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

                <div class="col s4"><span class="actionButton"> <i class="ion-android-cancel"></i>  </span></div>
                <div class="col s8"><span id="messageUser"><span class="icon ion-ios-chatbubble"></span> Send message <span></span></span></div>
          
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



<div class="app-page" data-page="edit-profile" style="background: #fff;">
    <div class="app-content"  style="background:#fff;padding-top: 30px;">
         <form class="profileForm" action="{{ url('clubhouse/profile/userDetails') }}" method="POST">
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
            <input type="text" name="phone_no" class="form-control" value="{{ isset($user->user_detail) ? $user->user_detail->phone_no || '' : '' }}"  placeholder="Phone Number">
          </div>
          <div class="form-group">
            <button type="submit" class="waves-effect waves-light btn">Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>


<div class="app-page" data-page="edit-password" style="background: #fff;">
    <div class="app-content"  style="background:#fff;padding-top: 30px;">
          <div class="box2 good keybox">
            <form class="profileForm" action="{{ url('clubhouse/profile/changePassword') }}" method="POST">           
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
                  <button type="submit" class="waves-effect waves-light btn">Submit</button>
                </div>
              </form>
      </div>
    </div>
  </div>
</div>


@endsection

@section('app-js')
<script src="{{ asset('js/clubhouse/croppie.js') }}"></script>
<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
<script src="{{ asset('js/jonasRate.js') }}"></script>
<script>


 (function(window, document, $){

          $('.app-page').css({ 'display' : 'block' });
        $('#mainLoading').remove();

      var gameExpUrl = '{{ url("gameExp") }}';
      var profileUrl = '{{ url("profile") }}';
      var messageUrl = '{{ url("message") }}';
      var sessionUrl = '{{ url("session") }}';
      var friendUrl = '{{ url("friends") }}';
      var userId = $('#userId').val();
      var userImage = $('#userId').data('image');
      var userName = $('#userId').data('name');
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var imageUrl = '{{ asset("uploads") }}';
      var baseUrl = '{{ url() }}';
      var publicUrl = '{{ asset("") }}';
      var defaultProfilePic = publicUrl+'/images/default_profile_picture.png';

   /*   FIRST_NAME = "{{ $user->user_detail->firstname }}";
      LAST_NAME = "{{ $user->user_detail->lastname }}";*/


      //console.log(FIRST_NAME);



        function changeFriendOnlineStatusCount(page, FriendId, add){


          if(FriendId && parseInt(FriendId) > 0){

            FriendId = parseInt(FriendId);

            if(add){

               index = onlineFriendsList.indexOf(parseInt(FriendId));
              friendIndex = myFriends.indexOf(parseInt(FriendId));
                if(index == -1 && friendIndex >=0 ){
                    onlineFriendsList.push(FriendId);
                }
            }else{
              index = onlineFriendsList.indexOf(FriendId);
                      if(index != -1){

                        onlineFriendsList.splice(index, 1);
                        myFriendsCount = myFriendsCount - 1;
                      }

                 
            }


          }
         
          $(page).find('#countAll').text(myFriendsCount);

                  console.log(onlineFriendsList);
          $(page).find('#countOnline').text(onlineFriendsList.length);
          $(page).find('#countOffline').text(parseInt(myFriendsCount) - onlineFriendsList.length);
        }

        

        App.controller('userDetails', function(page, request){
           this.transition = 'slide-left';


            $(page).on('appDestroy', function(){
                $(page).find('#friendDetailContainer').removeClass('dataLoaded');
            });
            $(page).on('appShow', function(){
                $('#navbarTitle').text('Friend Details');

                 if(request.user_id && !$(page).find('#friendDetailContainer').hasClass('dataLoaded')){

              setTimeout(function(){
                $(page).find('.pageLoading').show();
              $(page).find('#friendDetailContainer').hide();


              friendFavGameUl = $(page).find('#friendFavGameUl').html('');
              friendPlayedGameUl = $(page).find('#friendPlayedGameUl').html('');

                                $.ajax({
                  url : profileUrl+'/viewFriendProfile',
                  data : { user_id : userId, other_person : request.user_id, _token : CSRF_TOKEN },
                  dataType : 'json',
                  type : 'POST',
                  success : function(data){
                    console.log(data);

                     $(page).find('.pageLoading').hide();
              $(page).find('#friendDetailContainer').show().addClass('dataLoaded');

              //$(page).find('#friendProfilePic').attr('src', data.user_detail.profile_picture ? publicUrl+'/'+data.user_detail.profile_picture : defaultProfilePic  );
                $(page).find('#friendProfilePic').attr('src', getImage(data.user_detail.profile_picture, data.user_detail.user_id, null) );

              friendName = data.user_detail.firstname+' '+data.user_detail.lastname;
              $(page).find('#friendDetailContainer h6').text(friendName);


            $(page).on('click', '#messageUser', function(){
                App.load('privateMessage', { user_id : request.user_id, name : friendName});
            });

              friend_id = data.friend.friend_id;

              $(page).on('click', '.actionButton', function(){
                      
                      theModal = $(page).find('#confirmModal');
                      $(theModal).find('h5').text('Are you sure to unfriend '+friendName+' ?');
                        $(theModal).data('friend_id', request.user_id).data('id', friend_id).openModal();
                     });

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
          

                  },error : function(xhr){
                    console.log(xhr.responseText);
                  }
                });
              }, 2000);


            }
             
            });

            $(page).on('click', '#confirmModal .confirmUnfriend', function(){
                
                /*App.load('yourFriends', {'removeUser' : .data('friend_id')});*/
                
                theModal = $(this).parents('#confirmModal');

                theId = $(theModal).data('id');

                       $.ajax({
                            url : friendUrl+'/unFriend',
                              data : { id : theId , _token : CSRF_TOKEN },
                              type : 'POST',
                              dataType : 'json',
                              success : function(data){

                                  App.back(function(){
                                        thePage = App.getPage();
                                        theFriend_id = $(theModal).data('friend_id');
                                        $(thePage).find('#friend_li_'+theFriend_id).remove();
                                         changeFriendOnlineStatusCount(thePage, theFriend_id);
                                    });

                              },error : function(xhr){
                                console.log(xhr.responseText);
                              }

                            });


            });

      });

        App.controller('yourMessages', function(page, request){
          this.transition = 'slide-left';

        /*  alert(JSON.stringify(request));*/
          $(page).on('appShow', function(){
                $('#navbarTitle').html('Your Messages <span>('+request.count+')</span>');
            });

        });

        App.controller('yourFriends', function(page, request){

       /*   if(request){
            alert(JSON.stringify(request));
          }*/
        this.transition = 'slide-left';

                    $(page).on('appShow', function(){
                $('#navbarTitle').text('Your Friends');
            });

        changeFriendOnlineStatusCount(page);
  

        for(i=0;i<onlineFriendsList.length;i++){
              friend_id = onlineFriendsList[i];
              $(page).find('#friend-online-status-'+friend_id).removeClass('offline').parent('li').prependTo($(page).find('.friendList'));
          }

             socket.on('friendOffline', function(friend_id){
                   $(page).find('#friend-online-status-'+friend_id).addClass('offline');
                   changeFriendOnlineStatusCount(page, friend_id);
              });

               socket.on('friendOnline', function(friend_id){
                    $(page).find('#friend-online-status-'+friend_id).removeClass('offline').parent('li').prependTo($(page).find('.friendList'));
                    changeFriendOnlineStatusCount(page, friend_id, true);
              });


      });


     
      App.controller('main', function (page) {
            this.transition = 'slide-right';

      /***********edit progile ************************/
          $(page).on('click', '.editProfile', function(){
            //data_user = $(this).attr('data-user');
              //alert(data_user);
              //console.log(data_user);
              //console.log(this.user_id);
              App.load('edit-profile');
          })

          App.controller('edit-profile', function(page){
            this.transition = 'slide-left';
              $(page).on('appShow', function(){
              })
          });

      /***********edit progile ************************/

      /************** change password ***********************/

      $(page).on('click', '.changePassword', function(){
          App.load('edit-password');
      })

      App.controller('edit-password', function(page){
          this.transition = "slide-left";

      })
      /************** change password ***********************/

          cropModal = $('#cropModal');

            $(page).on('appShow', function(){
                $('#navbarTitle').text('Profileroom');
            });

            $(page).on('click', '#profilePic', function(e){
                           e.stopPropagation();
              });

             
              ratingAJAX = false;
            $(page).on('click', '.rateGame', function(){

                args = JSON.parse($(this).attr('data-args'));
                console.log(args);
                  theModal = $('#rateModal');
                  theModal.data('post_id', args.post);
                  rating = parseInt(args.user_rating) || 0;

                  if(rating > 0){
                    theModal.find('h4').text('My Rating');
                  }else{
                     theModal.find('h4').text('My Rating - NOT RATED');
                  }

                  theModal.find("#jRate").jRate(rating, function(val){

                    if(val && !ratingAJAX){
                      ratingAJAX = true;
                            $.ajax({
          type : 'POST',
          url: gameExpUrl+'/rateGame',
          data : { rating : val, user_id : userId , post_id : args.post , _token : CSRF_TOKEN },
          dataType : 'json',
          success : function(data){
            ratingAJAX = false;
                                theModal.find('h4').text('Thanks for rating!');
                    setTimeout(function(){ theModal.find('h4').text('My Rating') }, 1000);
          },error : function(xhr){
            console.log(xhr.responseText);
          }

        });
                    }

                  });


    var playNowAJAX = false;
    
    $(theModal).find('#playGame').unbind('click').bind('click', function(){
      
      post_id = $(theModal).data('post_id');
      if(post_id){
          $('#selectCasinoModal').openModal();
           if(!playNowAJAX){
          playNowAJAX = true;
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

              casino = this;
              $('#selectCasino').append(
                  $('<li>')
                      .append(
                        $('<a href="'+baseUrl+'/'+casino.id+'" target="_blank">')
                            .append(
                              $('<img alt="">').attr('src', '{{url("uploads")}}/'+casino.claim_image)
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
    }
      
            /*<li><a href="http://daugsiya.dev/3" target="_blank"><img alt="" src="http://daugsiya.dev/uploads/13553_hardrock2.jpg"></a></li>*/
       /*                  

     
      }*/
                });

                $(theModal).find('#goToGame').attr('href', baseUrl+'/'+args.slug);
 

                theModal.openModal();
            });
          
          $(page).on('click', '#uploadBtn', function(e){
                           e.stopPropagation();
                            $('#profilePic').trigger('click');
                      });

                      var $uploadCrop;

              function readFile(input) {

                 cropModal.openModal();

                if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        
                        reader.onload = function (e) {
                                    cropModal.find('#imageView').hide();
                       

                          $uploadCrop.croppie('bind', {
                            url: e.target.result,
                          });
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }

              }


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


              uploadCropAjax = false;
              $uploadCrop = cropModal.find('#cropperH').croppie({
                   
                         viewport: {
                            width: 150,
                            height: 150,
                            type: 'square'
                         },
                         boundary: {
                            width: 200,
                            height: 200
                         },
                          enableOrientation: true,
                          enableExif: true,
                      });

              $(page).on('change','#profilePic', function () { readFile(this); });
              cropModal.on('click','#doneCropping', function (ev) {
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
                            console.log(data);
                            uploadCropAjax = false;
                              $('#cropModal').closeModal();
                            $(page).find('#picPreview').attr('src',resp );
                            $('#cropProgressBar').hide().find('.progressBarPercent').css('width', '0').text('0%');
                          },error : function(xhr){
                            console.log(xhr.responseText);
                          }
                        });
                  }

                });
              });

      });
            
             App.load('main');
             

 })(window, document, jQuery);

</script>
@endsection
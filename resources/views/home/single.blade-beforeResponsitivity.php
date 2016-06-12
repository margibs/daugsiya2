@extends('home.layout')

@section('page-title')
 - {{$post->title}}
@endsection

@section('scripts_here')
  <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
@endsection

@section('for_og')
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ url('uploads') }}/{{ $post->thumb_feature_image }}"/>
  <link rel="image_src" href="{{ url('uploads') }}/{{ $post->thumb_feature_image }}"/>
  <meta property="og:title" content="{{$post->title}}" />
@endsection

@section('singlecontent')

<style type="text/css">


/** ============================================ SLOTS ============================================== **/
.ezslot-outermost{
margin: -285px 0 0 48px;
height: 210px;
width: 93.8%;
overflow: hidden;
background: #101010;
}
.ezslots>.window>.slider>.symbol>.content{
      position: relative;
    top: -22px;
}
.ezslot-outermost ul li{
display: inline-block;
}
.ezslot-outermost ul li img{
border:none!important;
/*margin-top: -43px;*/
width: 100%;
}
.ezslot-outermost .content{
background:none;
}
#wrapper a img {
margin-top: -42px!important;
}
.slotwrapper a{
width: 100%!important;
height: 100%!important;
position: initial!important;
}
h3{
padding: 0 0px 0px 0px;
margin: 3px 0 0 2px;
font-family: 'Work Sans';
color: #9a0a0e;
font-weight: 800;
font-size: 30px;
border-bottom: 1px solid #b00c0c;
}
.divider{
height:100%;
top: 8px;
}
.divider1 {
left: 37px;
}
.divider2 {
right: 40px;
}
.details{
position: relative;
}
.totalcontainer{
position: absolute;
overflow: hidden;
width: 159px;
height: 32px;
left: 11%;
}
.totalcontainer .innertotalcontainer{
width: 85%;
height:auto;
overflow: hidden;
}
.totalcontainer .innertotalcontainer img{
  width: 135px;
}
#playbig a{
height: 49px;
top: -15px;
left: -40px;
}
#playbig .button {
font: 24px;
}
.socbtn a.button{
top: -24px!important;
}
.w48{
  width: 48px;
}

.reply-list{
      margin-left: 10%;
    margin-top: 10px;
    overflow: hidden;
    position: relative;
    float: left;
    width: 90%;
}

#commentList .temporary{
      opacity: 0.2;
}

.recommendBox{
left: 46%;
    top: 32%;
    position: fixed;
    z-index: 10;
}

.recommendBox .fa-times{
      position: absolute;
    z-index: 2;
    right: 0;
    margin: 7px;
    color: #CECECE;
    cursor: pointer;
}

.recommendBox .recommendFriends{
    overflow: hidden;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.98);
    width: 370px;
    height: 490px;
    text-align: center;
    position: relative;
    padding: 0 0 20px 0;
    display: none;
    -moz-box-shadow: 0 0 30px -10px #000;
    -webkit-box-shadow: 0 0 30px -10px #000;
    box-shadow: 0 0 30px -10px #000;
}

.recommendFriends ul{
height: 426px;
    padding-top: 30px;
}

.recommendFriends ul li{
   overflow: hidden;
    border-bottom: 1px solid rgba(255, 255, 255, 0.48);
    padding-bottom: 10px;
    padding: 10px 20px;
    background: rgba(255, 255, 255, 0.50);
    transition: background 0.2s ease;
    position: relative;
    text-align: left;
}

.recommendFriends ul li .msgImgcont{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    float: left;
}

.recommendFriends ul li .msgImgcont img{
  width: 100%;
}

.recommendFriends ul li h6{
    font-family: 'Work Sans';
    margin-left: 75px;
    display: block;
    font-size: 16px;
    font-weight: 600;
    padding-top: 10px;
    color: #000;
}

.recommendFriends ul li .recommendCheck{
      float: right;
    margin-top: -12px;
    margin-right: 16px;
}

.recommendBox .recommendBtn{
      background: #A40605;
    border: none;
    display: block;
    width: 352px;
    padding: 7px;
    border-radius: 2px;
    color: #fff;
    font-family: 'Work Sans';
    font-size: 20px;
    font-weight: 500;
    -moz-box-shadow: 0px 2px 3px -2px #696969;
    -webkit-box-shadow: 0px 2px 3px -2px #696969;
    box-shadow: 0px 2px 3px -2px #696969;
    cursor: pointer;
       margin: 8px auto;
}

#recommendToFriend{
    background: #A40605;
    padding: 9px 10px;
    border-radius: 2px;
    color: #fff;
    font-family: 'Work Sans';
    font-size: 14px;
    font-weight: 200;
    display: block;
    position: relative;
    top: -3px;
    -moz-box-shadow: 0px 2px 3px -2px #696969;
    -webkit-box-shadow: 0px 2px 3px -2px #696969;
    box-shadow: 0px 2px 3px -2px #696969;
    cursor: pointer;
    border: none;
}

</style>
      <div class="recommendBox">
          
          <div class="recommendFriends">
              <i class="fa fa-times"></i>
              <ul id="friendRecommentList">
  </ul>
        <button class="recommendBtn" id="recommendBtn" type="button">Recommend Game</button>
          </div>

      </div>
<div class="container_24">

  <div class="grid_24" id="main">

    <!-- Sidebar -->
    <div class="sidebar">
      <h3> 
        <img src="http://susanwins.com/uploads/28532_sidebartext.png" alt=""> 
      </h3>
      <div class="rellimg"></div>
    </div>
    <!-- End Sidebar -->

    <div class="main">

      <img src="http://susanwins.com/uploads/26351_single-susan.png" alt="" class="susan"> 

      <div class="featImg featimg">
        <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="">
      </div>

      <div id="wrapper"> 

        <!-- Reels -->
        <div class="ezslot-outermost">
          <ul>
            <li> <div id="ezslots15"></div> </li>
            <li> <div id="ezslots16"></div> </li>
            <li> <div id="ezslots17"></div> </li>        
            <li> <div id="ezslots18"></div> </li>             
          </ul>                                  
        </div>

        <div id="playbig">
          <a id="winwinwin3" class="button pink serif round glass"> Play Now! </a>         
        </div>
        
        <!-- Reel Social Share -->
        <div class="socbtn"> 
          <a class="button fbblue serif round glass sharrre" id="share_via_facebook" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="Share this up!"><img src="http://susanwins.com/uploads/34329_fb-button.png"></a>
          <a class="button pink serif round glass sharrre" id="share_via_pinterest" style="left:55px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="Pin me!"><img src="http://susanwins.com/uploads/76008_pinterestubtton.png"></a>
          <a class="button blue serif round glass sharrre" id="share_via_twitter" style="left: 40px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="I'm tweeting this awesome game!"><img src="http://susanwins.com/uploads/70478_twitter-icon.png"></a>      
          <a class="button pink serif round glass sharrre" id="share_via_googlePlus" style="left:25px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text=""><img src="http://susanwins.com/uploads/79339_g+button.png"></a>
        </div>
        <!-- End Reel Social Share -->

        <!-- END Reels -->

      </div>

      @if(isset($user))
        <link rel="stylesheet" href="{{ asset('css/rateit.css') }}"> 

        <div class="gameExp" data-user="{{ $user->id }}">

          @if($favorite)
            <a class="fave" id="removeToFavorite" data-id="{{ $favorite->id }}"> 
              <img src="http://susanwins.com/images/homepage/remove2fave.png" /> 
              <span> Remove from Favorites </span>  
            </a>
          @else
            <a class="fave" id="addToFavorite"> 
              <img src="http://susanwins.com/images/homepage/add2fave.png" /> 
              <span> Add to Favourites </span>  
            </a>
          @endif


          @if($played_game)
          <!-- <div class="col-sm-6 col-sm-offset-3" id="playedText">You have played this game! Happy Susan</div> -->
          <a href="#" class="fave" style="padding: 10px 20px; left: 570px;">                                                
            <input type="range" value="{{ $gameRating['totalRating'] }}" step="0.5" id="gameRating">
            <div class="rateit" data-rateit-backingfld="#gameRating" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0.5" data-rateit-max="5"></div>
            <span id="totalVoters" style="top: -3px;margin-left: 7px;">({{ $gameRating['voters'] }})</span>
            <div id="ratingThanks"></div>
          </a>
          @else
            <!-- <div class="col-sm-6 col-sm-offset-3" id="playedText">You havent played this game! Sad Susan</div> -->
            <a href="#" class="fave" style="left: 478px;" id="playedGame" >
              <img src="http://susanwins.com/images/homepage/alreadyPlayedIcon.png" />
              <span> I have played this game </span>
            </a>
          @endif
        </div>
      @endif

    </div> 
        	
        	 
    <div class="content" style="position:relative;">

      <div class="divider divider1"></div>
      <div class="divider divider2"></div>
      
      <!-- POST CONTENT -->
      <div class="postcontent" data-post="{{$post->id }}">

        <div class="susantinyimg"></div>

        <h2> {{$post->title}} <span> Written by Susan &nbsp;&nbsp;&nbsp; <a class="commentCount"> <i class="fa fa-comment"></i> 120  </a></span> </h2>

        <ul class="contentSociallinks">
          <li>
            <span id="api_count" data-url="{{url('')}}/{{$post->slug}}"></span>
          </li>
          <li>
            <a href="javascript:;" data-target="#share_via_facebook" class="fb" data-url="{{url('')}}/{{$post->slug}}" data-text="Share this up!">
              <i class="fa fa-facebook"></i>
            </a>
          </li>                        
          <li>
            <a href="javascript:;" data-target="#share_via_pinterest" class="pn" data-url="{{url('')}}/{{$post->slug}}" data-text="Pin me!">
              <i class="fa fa-pinterest-p"></i>
            </a>
          </li>
          <li>
            <a href="javascript:;" data-target="#share_via_twitter" class="tw" data-url="{{url('')}}/{{$post->slug}}" data-text="I'm tweeting this awesome game!">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="javascript:;" data-target="#share_via_googlePlus" class="g" data-url="{{url('')}}/{{$post->slug}}" data-text="">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
          <li>
            <button id="recommendToFriend" type="button">Recommend to Friends</button>
          </li>
        </ul> 

        <p>
          <b>
            {{$post->introduction}}
          </b>
        </p>

        {!!$post->content!!}

        <h2 > My thoughts </h2> 
        <p style="margin-bottom: 50px;"> 
          {{ $widget_ratings->final_verdict }}
        </p>
      </div>
      <!-- END POST CONTENT -->

      <div class="clearfix"></div>

      <div class="buttons">

        <div class="grid_9">
          <a href="#" id="random_game"> 
            <div class="randombutton">
              <div class="inner">
                  <img id="random_game_image" src="http://susanwins.com/images/homepage/random.png" />
              </div>
            </div>
          </a>  
        </div>

        <div class="grid_9">
          <div class="claimbutton">
            <div class="inner">
              <img src="http://susanwins.com/images/homepage/claim.png" />
            </div>
          </div>
        </div>

      </div>

      <div class="clearfix"></div>

      <div class="bottomCasinos">
        <ul>
          @foreach($casino_lists2 as $k => $v) 
          {!! $v !!}
          @endforeach
        </ul>
      </div>

      <img src="http://susanwins.com/images/homepage/singleDivider.png" class="thickDivider" />

      <div class="related">

        <div class="outer">
          <div class="inner">
            <h6> Top Categories </h6>

            <ul>
              @foreach($category_randomizer as $k => $v) 
                {!! $v !!}
              @endforeach
            
<!--           <li><a href="http://susanwins.com/celebs"><img src="http://susanwins.com/uploads/49000_celebs.png"></a></li>
              <li><a href="http://susanwins.com/superheroes"><img src="http://susanwins.com/uploads/28203_superhero.png"></a></li>
              <li><a href="http://susanwins.com/tropicaljungle"><img src="http://susanwins.com/uploads/41272_tropical.png"></a></li>
              <li><a href="http://susanwins.com/seasonal"><img src="http://susanwins.com/uploads/52845_seasonal.png"></a></li>
              <li><a href="http://susanwins.com/animal"><img src="http://susanwins.com/uploads/63125_animals.png "></a></li>
              <li><a href="http://susanwins.com/cute"><img src="http://susanwins.com/uploads/63299_cute.png"></a></li>
              <li><a href="http://susanwins.com/myths-legends"><img src="http://susanwins.com/uploads/26569_myths.png"></a></li>
              <li><a href="http://susanwins.com/relaxingsoothing"><img src="http://susanwins.com/uploads/49793_relaxing.png"></a></li>
              <li><a href="http://susanwins.com/television"><img src="http://susanwins.com/uploads/28435_television.png"></a></li>
              <li><a href="http://susanwins.com/sorcery"><img src="http://susanwins.com/uploads/88737_sorcery.png"></a></li>
              <li><a href="http://susanwins.com/movie"><img src="http://susanwins.com/uploads/18354_movies.png"></a></li>
              <li><a href="http://susanwins.com/romance"><img src="http://susanwins.com/uploads/33566_romantic.png"></a></li>
              <li><a href="http://susanwins.com/mysterious"><img src="http://susanwins.com/uploads/32493_mystery.png"></a></li>
              <li><a href="http://susanwins.com/pirates"><img src="http://susanwins.com/uploads/70833_pirate.png"></a></li>
              <li><a href="http://susanwins.com/egyptian"><img src="http://susanwins.com/uploads/76342_egyptian.png"></a></li>
              <li><a href="http://susanwins.com/comic"><img src="http://susanwins.com/uploads/27452_comic.png "></a></li>
              <li><a href="http://susanwins.com/party"><img src="http://susanwins.com/uploads/30641_party.png"></a></li>
              <li><a href="http://susanwins.com/vegas"><img src="http://susanwins.com/uploads/35722_vegas.png"></a></li>
              <li><a href="http://susanwins.com/sea-2"><img src="http://susanwins.com/uploads/42258_sea.png"></a></li>
              <li><a href="http://susanwins.com/adventure"><img src="http://susanwins.com/uploads/76393_adventure.png"></a></li>
              <li style="position: relative; top: 10px;"><a href="http://susanwins.com/sexy"><img src="http://susanwins.com/uploads/24631_sexy.png"></a></li>
              <li><a href="http://susanwins.com/cowboywestern"><img src="http://susanwins.com/uploads/71559_cowboy.png"></a></li>
              <li><a href="http://susanwins.com/fantasy"><img src="http://susanwins.com/uploads/48873_fantasy.png"></a></li>
              <li><a href="http://susanwins.com/medieval"><img src="http://susanwins.com/uploads/43173_medieval.png"></a></li>  -->   
            </ul>  

            <h6 style="border-top: 1px solid #F9EBCF;"> Recent Comments </h6>

            <div class="comments">

              <div class="comment-section">

                <div class="comments-list" id="commentList">
                  @if(count($comments))
                    <ul>
                      @foreach($comments as $comment)
                      <li>

                        <div class="commentlist">

                          <div class="comment-parent">

                            <img src="{{$comment->user->user_detail->profile_picture ? url('').'/'.$comment->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar">
                            <span class="timestamp"> 10hrs ago | Jan 20, 2016 </span>
                            <div class="comment-info">{{$comment->user->email}}</div>
                            <div class="comment-content">{{ $comment->content }}</div>
                            <a href="javascript:;" class="reply_btn">Reply</a>

                            <div class="reply-list" id="reply-to-{{$comment->id}}">
                              @foreach($comment->replies as $reply)
                              <div class="replies-parent">
                                <img src="{{$comment->user->user_detail->profile_picture ? url('').'/'.$comment->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar">
                                <span class="timestamp"> 10hrs ago | Jan 20, 2016 </span>
                                <div class="reply-info">{{$reply->user->email}}</div>
                                <div class="reply-content">{{ $reply->content }}</div>
                              </div>
                              @endforeach
                            </div>

                            @if(isset($user))
                            <form class="reply-form" action="{{ url('add_reply') }}" method="POST" style="display:none">
                              <input type="hidden" name="parent" value="{{ $comment->id }}">
                              <input type="hidden" name="user_id" value="{{ $user->id }}">
                              <input type="hidden" name="post_id" value="{{ $post->id }}">
                              <input type="hidden" name="email" value="{{ $user->email }}">

                              <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Write a reply" name="content"></textarea>
                              </div>
                              <div class="form-group"></div>
                              <div class="form-group">
                                <button type="submit" class="button_example"  value="submit">Submit</button>
                              </div>
                            </form>
                            @endif                                                              
                          </div>
                        </div>

                      </li>         
                      @endforeach
                    </ul> 

                  @else
                    <ul></ul>
                    <p id="no-comments">No Comments yet.</p>
                  @endif 
                </div>

                <form class="comment-form" action="{{ url('add_comment') }}" method="POST" id="commentForm">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <textarea class="form-control" rows="4" placeholder="Write a comment" name="content" id="submitCommentTextarea" disabled="disabled"></textarea>
                  </div>
                  <div class="form-group">

                    @if(isset($user))
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                      <input type="hidden" name="email" value="{{ $user->email }}">
                      <p style="display:none;">Signed in as {{ $user->email }}  
                        <a href="{{ url('logout') }}?redirect={{ Request::url() }}"><i class="fa fa-sign-out"></i></a> 
                      </p>
                    @else
                      <div class="rednotifbox">
                        <a href="{{ url('login') }}?redirect={{ Request::url() }}">Login to Comment</a> or <a href="{{ url('register') }}?redirect={{ Request::url() }}">Register</a>
                      </div>
                    @endif

                  </div>
                  <div class="form-group">
                    <button type="submit" class="button_example"  value="submit" id="submitCommentForm" disabled="disabled">Submit</button>
                  </div>
                </form>

              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    
    <img src="http://susanwins.com/images/homepage/singleFooter.png" class="singleFooter" />
    <div class="popunder">
      <img src="http://susanwins.com/uploads/35599_scrollsusan.png" alt="Scroll down to see my videos and read my review!" />
    </div>
  </div>
</div>

@endsection


@section('footer_scripts')

<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/livestamp.min.js') }}"></script>
<script src="{{ asset('js/single/singlePage.js') }}"></script>

<script>

  $(function() {

    var user_id = $('.gameExp').data('user') || false,
        post_id = $('.postcontent').data('post') || false,
        gameExpUrl = '{{ url("gameExp") }}',
        profileUrl = '{{ url("profile") }}',
        notifUrl = '{{ url("notification") }}',
        get_casino_category = '{{$get_casino_category}}',
        get_post_id = '{{$post->id}}',
        header_counter = 0,
        finalSidebarContentHeight = 0,
        contentOffset = 1,
        ajaxDone = false,
        sidebarContentHeight = 0,
        sideBarHeightLeft = 0,
        sideBarCompleted = false,
        sideBarAjaxDone = true,
        pendingSideBarElements = [],
        sideBarSpacer = parseInt($('.rellimg').css('padding-bottom')),
        sideBarSingleContentHeight = 117 + (sideBarSpacer),
        posts_category_id = '{{$posts_category_id->category_id}}',
        totalImages = $(".postcontent img").length,
        imageLoaded = 0,
        allImageLoaded = false,
        singleImageLoaded = true,
        startAddingSidebarInterval = null,
        maxSidebarAutoLoad = 10 * 10, //10 seconds
        maxSidebarCounter = 0;

        game_room_connected = false;
        login_success = false;
        user_json = '{!! isset($user) ? json_encode($user) : null !!}';
        user = user_json ? JSON.parse(user_json) : false;
        tempComment = null;
        tempReply = null;

        setSidebarLoadInterval();

        recommendFriendAJAX = false;
        $("#recommendToFriend").click(function(){

        $(".recommendFriends").fadeToggle('fast', function(){
              if($(".recommendFriends").is(':visible')){  

              if(!recommendFriendAJAX){
                recommendFriendAJAX = true;
                $('#friendRecommentList').html('').append($('<li>').text('Loading...'));
                $.ajax({
                     url : profileUrl+'/getMyFriends',
                     data : { _token : CSRF_TOKEN },
                     dataType : 'json',
                     type : 'POST',
                     success : function(data){
                        
                        $('#friendRecommentList').html('');
                        if(data && data.length){
                          $.each(data, function(){
                            f = this;

                                $('#friendRecommentList').append(
                                  $('<li>')
                                      .append(
                                        $('<div>').addClass('msgImgcont')
                                            .append(
                                              $('<img>').attr('src', f.friend.user_detail.profile_picture ? BASE_URL+'/'+ f.friend.user_detail.profile_picture : defaultProfilePic )
                                              )
                                        )
                                      .append(
                                        $('<h6>').text(f.friend.user_detail.firstname+' '+f.friend.user_detail.lastname)
                                        )
                                      .append(
                                        $('<input type="checkbox" name="friends[]" value="'+f.friend.user_detail.user_id+'">').addClass('recommendCheck')
                                        )
                                  )
                          });
                        }
                     },error : function(xhr){
                      console.log(xhr.responseText);
                     }
                  });
              } 
   /* <li><div class="msgImgcont">
                                      <img src="http://susanwins.com//user_uploads/user_5/profile_picture-2016-04-04-11-54-17.jpg" alt="">
                                    </div>
  <h6> nam name</h6>
  <input type="checkbox" class="recommendCheck"  name="friend[]">
</li>*/
               


              }
        });

        

      });

      $('#recommendBtn').on('click', function(){

        friends = [];

          $('#friendRecommentList').find('input[name="friends[]"]').each(function(){
                if($(this).is(':checked')){
                    friends.push($(this).val());
                }
          });

          if(friends.length){

              $.ajax({
                url : notifUrl+'/recommendGame',
                data : { friends : friends, post_id : post_id, _token : CSRF_TOKEN },
                type : 'POST',
                dataType : 'json',
                success : function(data){
                  console.log(data);
                },error : function(xhr){
                  console.log(xhr.responseText);
                }
              });

          }else{
            alert('Please select atleast 1 friend');
          }

      });

        $('.recommendFriends .fa-times').on('click', function(){
            $(".recommendFriends").fadeOut('fast');
        });

    socket.on('connect', function(){
      room = 'game_room_{{$post->id}}';
      socket.emit('connect_to_room', {room : room , user : '{{ isset($user->email) ?$user->email : "Guest" }}'});
    });

    socket.on('game_room_connected', function(){
      game_room_connected = true;
      allowToComment(); 
    });

    socket.on('login_success', function(){
      login_success = true;
      allowToComment(); 
    });

    function allowToComment(){

      if(login_success && game_room_connected)
      {
        $('#submitCommentTextarea').removeAttr('disabled');
        $('#submitCommentForm').removeAttr('disabled');
      }

    }

    function Comment(){
      this.id,
      this.content,
      this.user_id,
      this.post_id,
      this.email,
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
                  $('<img>').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic).addClass('avatar')
                )
                .append(
                  $('<div></div>').addClass('comment-info').text(this.email)
                )
                .append(
                  $('<div></div>').addClass('comment-content').text(this.content)
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
                .append( $('<input>').attr('type', 'hidden').attr('name', 'post_id').val(this.post_id) )
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
                      $('<img>').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic).addClass('avatar')
                    )
                    .append(
                      $('<div></div>').addClass('comment-info').text(this.email)
                    )
                    .append(
                      $('<div></div>').addClass('comment-content').text(this.content)
                    )
                    .append(
                      $('<a href="javascript:;">').addClass('reply_btn').text('Reply')
                    )
                    .append(
                      $('<div"></div>').addClass('reply-list').attr('id', 'reply-to-'+this.id)
                    )
                    .append(
                      reply_form
                    )
                  )
                );
              
      return this.theComment;
    };

    socket.on('post_comment', function(response){

      console.log('post_comment');
      console.log(response);

      $('#no-comments').remove();

      comment = new Comment();

      comment.id = response.id;
      comment.user_id = response.user_id;
      comment.post_id = response.post_id;
      comment.email = response.email;
      comment.content = response.content;
      comment.profile_picture = response.user.user_detail.profile_picture;

      if($('#comment-'+comment.id).length == 0)
      {
        $('#commentList ul').append(comment.maketheComment());
        $(document).trigger('adjustHeight');
      }

    });


    socket.on('post_reply', function(response){

      reply = new Reply();

      reply.id = response.id;
      reply.user_id = response.user_id;
      reply.content = response.content;
      reply.post_id = response.post_id;
      reply.email = response.email;
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

      if(tempComment == null){

        comment = new Comment();

        comment.user_id = $(this).find('[name="user_id"]').val() || false;
        comment.content = $(this).find('[name="content"]').val();
        comment.post_id = $(this).find('[name="post_id"]').val() || false;
        comment.email = $(this).find('[name="email"]').val() || false;
        comment.profile_picture = userImage;
        _token = $(this).find('[name="_token"]').val();
        actionUrl = $(this).attr('action');

        if(comment.content)
        {

          tempComment = comment.makeTemporaryComment();

          $('#commentList ul').append(tempComment);
          $('#no-comments').remove();              

          if(comment.user_id && comment.user_id && comment.email)
          {

            $(this).find('[name="content"]').val('');

            $.ajax({
              type : 'post',
              data : { _token : _token , content : comment.content, user_id : comment.user_id, email : comment.email , post_id : comment.post_id },
              url : actionUrl,
              dataType : 'json',
              success : function(response)
              {

                console.log(response);
                if(response)
                {
                  comment.id = response.id;
                  $(comment.temporaryComment).replaceWith(comment.maketheComment());
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


    $('.gameExp').on('click','#addToFavorite', function(){

        _this = $(this).attr('disabled', 'disabled');
        if(user_id && post_id){

          $.ajax({
            url: gameExpUrl+'/addFavorite',
            type : 'POST',
            data : { user_id : user_id , post_id : post_id, _token : CSRF_TOKEN  },
            dataType : 'json',
            success : function(data){
              if(data && data.id){
                $(_this).replaceWith($('<a class="fave"></a>').addClass('col-sm-6').attr('id', 'removeToFavorite').data('id', data.id)
                    .append($('<img src="http://susanwins.com/images/homepage/remove2fave.png">'))
                    .append($('<span>').text(' Remove from Favorites')));
              }

            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });

        }

    });

    $('.gameExp').on('click','#removeToFavorite', function(){
        _this = $(this).attr('disabled', 'disabled');

        data_id = $(_this).data('id');
        if(data_id){

          $.ajax({
            url: gameExpUrl+'/removeFavorite',
            type : 'POST',
            data : { id : data_id , _token : CSRF_TOKEN  },
            dataType : 'json',
            success : function(data){
                $(_this).replaceWith($('<a class="fave"></a>').addClass('col-sm-6').attr('id', 'addToFavorite')
                  .append($('<img src="http://susanwins.com/images/homepage/add2fave.png" />'))
                  .append($('<span>').text(' Add to Favorites')));

            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });

        }

    });

    $('.gameExp').on('click','#playedGame', function(){

        _this = $(this).attr('disabled', 'disabled');
        if(user_id && post_id){

          $.ajax({
            url: gameExpUrl+'/playedGame',
            type : 'POST',
            data : { user_id : user_id , post_id : post_id, _token : CSRF_TOKEN  },
            dataType : 'json',
            success : function(data){
              if(data && data.id){
                $('#playedText').text('You have played this game! Happy Susan');
                  
                  rateIt = $('<div data-rateit-backingfId="#gameRating" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">').addClass('rateit');


                  ratingThanks = $("<div id='ratingThanks'></div>");

                $(_this).replaceWith(

                  $('<a style="padding: 10px 20px; left: 570px;">').addClass('fave')
                        .append(

                            $('<input type="hidden" step="0.1" id="gameRating">').data('id', data.id)
                          )

                        .append(

                          rateIt  

                          )

                        .append(
                          $('<span id="totalVoters" style="top: -3px;margin-left: 7px;"></span>').text('('+data.gameRating['voters']+')')
                          )

                        .append(
                            ratingThanks
                          )


                  );

                $(rateIt).rateit({ max: 5, step: 0.1, min : 0.5, backingfld: '#gameRating' });

              }

            },error : function(xhr){
              console.log(xhr.responseText);
            }

          });

        }

    });
  

  $('.gameExp').bind('rated', '#gameRating', function(e, value){

        data_id = $('#gameRating').data('id');

        if(user_id && post_id){

          $.ajax({
              url: gameExpUrl+'/rateGame',
              type : 'POST',
              data : { user_id : user_id, rating : value , post_id : post_id, _token : CSRF_TOKEN  },
              dataType : 'json',
              success : function(data){
                if(data){
                  $('#ratingThanks').text('Thanks for rating!');

                  setTimeout(function(){
                      $('#gameRating').val(data.totalRating);
                      $('#totalVoters').text('('+data.voters+')');
                     $('#ratingThanks').text('');
                  }, 1000);

                }

              },error : function(xhr){
                console.log(xhr.responseText);
              }

            });
        }
  });


    $(document).on('click', '#commentList .reply_btn', function(){

      if(user && game_room_connected && login_success)
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
      this.post_id, 
      this.email, 
      this.parent, 
      this.temporaryReply, 
      this.theReply, 
      this.profile_picture;
    }

    Reply.prototype.makeTemporaryReply = function(){

       this.temporaryReply = $('<div></div>').addClass('replies-parent').addClass('temporary')
             .append(
                $('<img>').addClass('avatar').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic)
                )
              .append($('<div></div>').addClass('reply-info').text(this.email))
              .append($('<div></div>').addClass('reply-content').text(this.content));

      return this.temporaryReply;
    }

    Reply.prototype.maketheReply = function(){

        this.theReply = $('<div></div>').addClass('replies-parent').attr('id', 'reply-'+this.id)
              .append(
                $('<img>').addClass('avatar').attr('src', this.profile_picture ? BASE_URL+'/'+this.profile_picture : defaultProfilePic)
                )
              .append($('<div></div>').addClass('reply-info').text(this.email))
              .append($('<div></div>').addClass('reply-content').text(this.content));

      return this.theReply;
    }

    $('#commentList').on('submit', '.reply-form', function(e){

      e.preventDefault();
      if(tempReply == null){

            reply = new Reply();

            reply.user_id = $(this).find('[name="user_id"]').val() || false;
            reply.content = $(this).find('[name="content"]').val();
            reply.post_id = $(this).find('[name="post_id"]').val() || false;
            reply.email = $(this).find('[name="email"]').val() || false;
            _token = $('meta[name="csrf-token"]').attr('content');
            reply.profile_picture = userImage;
            reply.parent = $(this).find('[name="parent"]').val();

            actionUrl = $(this).attr('action');

            if(reply.content){

              $(this).find('[name="content"]').val('');

                tempReply = reply.makeTemporaryReply();
                $('#reply-to-'+reply.parent).append(tempReply);
                $(document).trigger('adjustHeight');
                $.ajax({
                    type : 'post',
                    data : {  user_id : reply.user_id, content : reply.content, post_id : reply.post_id, email : reply.email, _token : CSRF_TOKEN, parent : reply.parent },
                    url : actionUrl,
                    dataType : 'json',
                    success : function(response){

                      console.log('maketheReply');
                      console.log(response);
                      if(response){

                            reply.id = response.id;
                            response.profile_picture = userImage;
                            
                            $(reply.temporaryReply).replaceWith(reply.maketheReply());
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

    $('.postcontent').on('click','.casino_yes',function(e){

      e.preventDefault();
      var $this = $(this);
      var casino_yes_parent = $this.parent();
       casino_yes_parent.html("<div class='loader'><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--text'></div></div>");
            

      $.ajax({
          type: 'post',
          url: "{{url('casino/ajax/get_casino')}}",
          data: {_token: CSRF_TOKEN,'category_id' : get_casino_category,'post_id' : get_post_id}, 
          success: function(response)
          {
            var parsed = JSON.parse(response);
            var casino = '<p class="popupheading">Casino List</p> <ul class="casinolist">';
           
            $.each( parsed, function( index, obj){
              var casino_url = '';

              casino_url = obj.link_desktop;

              casino += "<li><a href='"+casino_url+"' track-action='56ddbe5eb51c9' track-value='"+obj.name+"' class='casino_option' get-this-id="+obj.id+"><img src='{{url("uploads")}}/"+obj.image_url+"' style='width:auto;'></a></li>";

            });

            casino += "</ul>";

            setTimeout(function() {
             casino_yes_parent.html(casino);
            }, 3000);

          }
        });

    });


    //Article Banner
    var total_image = $( ".postcontent img" ).length;

    if(total_image >= 1)
    {

      var articleBannerRatio = {{$articleBannerRatio}},
      banner_type = 1;

      $.ajax({
        type: 'post',
        url: "{{url('casino/ajax/get_article_banner')}}",
        data: {_token: CSRF_TOKEN,'articleBannerRatio' : articleBannerRatio,'total_image' : total_image,'banner_type' : banner_type}, 
        success: function(response)
        {
          var parsed = JSON.parse(response),
              no_total = articleBannerRatio;

          $.each( parsed, function( i, l){

            if(total_image < articleBannerRatio)
            {
              no_total = total_image;
            }

            no_total -= 1;
            var every_nth = "img:eq("+no_total+")";
            $( ".postcontent" ).find(every_nth).parent().after(l);
            no_total += articleBannerRatio + 2;

          });

        }
      });
    }
    //END Article Banner

    // Random Game
    $('#random_game').on('click',function(e){
      e.preventDefault();
      $('#random_game_image').attr('src','http://susanwins.com/uploads/66058_default.gif').addClass('w48');

      setTimeout(function(){
        location.href = '{{url("")}}/{{$random_single_page->slug}}';
      }, 2000);
    });
    // END Random Game

    // REELS
    var images4 = 
    [
    '<div class="slotwrapper"><div class="details"><div class="totalcontainer" style="top: 57%;"><div class="innertotalcontainer" style="width:{{ $widget_ratings->music_sounds / 10 * 100 }}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" /></div></div><img src="http://susanwins.com/uploads/19401_music.jpg"></div></div>'
    ];

    var images5 = 
    [
    '<div class="slotwrapper"><div class="details"><div class="totalcontainer" style="top: 53%;"><div class="innertotalcontainer" style="width:{{$widget_ratings->long_term_play / 10 * 100}}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" /></div></div><img src="http://susanwins.com/uploads/80687_longterm.jpg"></div></div>'
    ];

    var images6 = 
    [
    '<div class="slotwrapper"><div class="details"><div class="totalcontainer" style="top: 50%;"><div class="innertotalcontainer" style="width:{{$widget_ratings->fun_rate / 10 * 100}}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" /></div></div><img src="http://susanwins.com/uploads/81613_funrating.jpg"></div></div>'
    ];

    var images7 = 
    [
    '<div class="slotwrapper"><div class="details"><div class="totalcontainer" style="top: 51%;"><div class="innertotalcontainer" style="width:{{$widget_ratings->graphics / 10 * 100}}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" /></div></div><img src="http://susanwins.com/uploads/47931_graphic.jpg"></div></div>'
    ];

    $("#winwinwin3").click(function(){

      if(header_counter == 0)
      {

        images4.push('{!! $casino_lists[0] !!}');
        images5.push('{!! $casino_lists[1] !!}');
        images6.push('{!! $casino_lists[2] !!}');
        images7.push('{!! $casino_lists[3] !!}');

        $('.featimg img').fadeOut(300, function() {

        $('.featimg img').attr("src","http://susanwins.com/uploads/64878_click-header.png");
        $('.featimg img').fadeIn(100);

        });

      }
      ezslot15.win();
      ezslot16.win();
      ezslot17.win();
      ezslot18.win();

      header_counter++;

    });

    var ezslot15 = new EZSlots("ezslots15",{"reelCount":1,"winningSet":[1,1,1,1],"symbols":images4,"height":255,"width":169});
    var ezslot16 = new EZSlots("ezslots16",{"reelCount":1,"winningSet":[1,1,1,1],"symbols":images5,"height":255,"width":169});
    var ezslot17 = new EZSlots("ezslots17",{"reelCount":1,"winningSet":[1,1,1,1],"symbols":images6,"height":255,"width":169});
    var ezslot18 = new EZSlots("ezslots18",{"reelCount":1,"winningSet":[1,1,1,1],"symbols":images7,"height":255,"width":169});

    //END REELS

    // SIDEBAR AJAX
    function updateSidebarHeight(){

      mainHeight = $('#main').height() - ($('.main').height()) - parseInt($('.singleFooter').css('padding-bottom').replace('px', ''));

      sideBarHeight = mainHeight + ( $('.postcontent').offset().top - $('.sidebar').offset().top );
      finalSidebarContentHeight = sideBarHeight - ( $('.sidebar').find('h3').height() + (sideBarSpacer ) );
      $('.sidebar').css('height', sideBarHeight+'px');
      sidebarContentHeight = $('.rellimg').height();
      sideBarHeightLeft = finalSidebarContentHeight - sidebarContentHeight;

      lastElement = $('.rellimg').children(':visible').last();

      if( $('.rellimg').find('.updateHeight').length > 0)
      {
        lastElement = $('.rellimg').find('.updateHeight').first();
        lastElement.next().css('visibility', 'hidden');
      }

      theImage = $(lastElement).find('img');

      if(sideBarHeightLeft <= sideBarSpacer)
      { 

        offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

        if(!lastElement.hasClass('updateHeight'))
        {
          lastElement.addClass('updateHeight').data('originalHeight', $(theImage).height());
          theImage.css('height', offsetBottom+'px');
        }
        else
        {
          lastElement.css('visibility', 'visible');
          if(offsetBottom > 0 && offsetBottom < lastElement.data('originalHeight'))
          {
            theImage.css('height', offsetBottom+'px');
          }
          else if(offsetBottom >= lastElement.data('originalHeight'))
          {
            theImage.css('height', lastElement.data('originalHeight')+'px');
          }
          else
          {
            console.log('unshift');
            prevElement = lastElement.prev();
            prevElementImage = prevElement.find('img');

            if(offsetBottom <= 0)
            {
              lastElement.css('visibility', 'hidden');
            }
            // else
            // {

            // }

            prevOffsetBottom = ($('.sidebar').offset().top+sideBarHeight) - prevElement.offset().top - (sideBarSpacer);

            prevElement.addClass('updateHeight').data('originalHeight', $(prevElementImage).height());
            prevElementImage.css('height', prevOffsetBottom+'px');
          }
        }

      }
      else
      {

        if(lastElement.hasClass('updateHeight'))
        {

          if(theImage.height() >= lastElement.data('originalHeight'))
          {
            theImage.css('height', lastElement.data('originalHeight')+'px');
            lastElement.removeClass('updateHeight').removeData('originalHeight');
          }
          else
          {
            offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

            if(offsetBottom <= lastElement.data('originalHeight'))
            {
              theImage.css('height', offsetBottom+'px');
            }
            else
            {

              if(offsetBottom - lastElement.data('originalHeight') > 0)
              {
                lastElement.next().css('visibility', 'visible');
              }
              else
              {
                lastElement.next().css('visibility', 'hidden');
              }

              changeHeight = lastElement.attr('data-height') ? lastElement.attr('data-height') : lastElement.data('originalHeight');
              theImage.css('height', changeHeight+'px');

              if(!lastElement.attr('data-height') )
              {
                lastElement.attr('data-height', lastElement.data('originalHeight') );
              }

              lastElement.addClass('updatedHeight').removeClass('updateHeight').removeData('originalHeight');

            }     
          }
        }
      }
    }
    
    $(window).scroll(function(event){
      //console.log(sideBarCompleted);
      if(!sideBarCompleted){
        clearInterval(startAddingSidebarInterval);
        setSidebarLoadInterval();
      }
    });

    $(document).on('adjustHeight', function(){
          sideBarCompleted = false;
          startAddingSidebarContent();
    });

    function setSidebarLoadInterval(){
      startAddingSidebarInterval = setInterval(function(){

        maxSidebarCounter++;

        if(maxSidebarAutoLoad == maxSidebarCounter)
        {
          clearInterval(startAddingSidebarInterval);
        }
        else
        {
          if(sideBarCompleted)
          {
            clearInterval(startAddingSidebarInterval);
          }else
          {
            startAddingSidebarContent();
          }
        }

      }, 100);
    }

    function startAddingSidebarContent(){

      updateSidebarHeight();
      //console.log('startAddingSidebarContent');

      if(finalSidebarContentHeight > sidebarContentHeight && sideBarHeightLeft >= sideBarSingleContentHeight)
      {
        getSidebarContent();
      }
      else
      {
        if(sideBarHeightLeft <= 0)
        {
          if(allImageLoaded)
          {

            lastImage = $('.rellimg').children().last();
            pendingSideBarElements.push($(lastImage)[0].outerHTML);
            //$(lastImage).remove();
            sideBarCompleted = true;
          }

        }
        else if(allImageLoaded)
        {
          sideBarCompleted = true;
        }
      }
    }

    function getSidebarContent(){

      if(sideBarAjaxDone && sideBarHeightLeft >= sideBarSingleContentHeight)
      {

        if(pendingSideBarElements.length > 0)
        {

          temp = pendingSideBarElements;

          stillPending = [];

          $.each(temp, function(i, l){

            /* if(sideBarHeightLeft >= sideBarSingleContentHeight){
            $( ".rellimg" ).append(l);
            updateSidebarHeight();
            }else{
            stillPending.push(l);
            }*/

            singleSidebarImage(l, function(el){
              stillPending.push(el);
            });

          });

          pendingSideBarElements = stillPending;

        }
        else
        {

          sideBarAjaxDone = false;
          sideBarAJAX().done(function(response){

            var parsed = JSON.parse(response);

            contentOffset++;

            $.each( parsed, function( i, l ){
              /* if(sideBarHeightLeft >= sideBarSingleContentHeight){

              $( ".rellimg" ).append(l);
              updateSidebarHeight();
              }else{
              pendingSideBarElements.push(l);
              }*/

              singleSidebarImage(l, function(el){
                pendingSideBarElements.push(el);
              });
            });

            sideBarAjaxDone = true;
          });
        }

      }

    }

    function singleSidebarImage(el, callback){

      if(sideBarHeightLeft >= sideBarSingleContentHeight && singleImageLoaded)
      {

        element = $(el).hide();

        singleImageLoaded = false;

        $( ".rellimg" ).append(element);

        image = new Image();

        image.onload = function(){

          singleImageLoaded = true;

          theHeight = this.fixedHeight == 117 ? this.fixedHeight : this.naturalHeight;
          $(this.element).find('img').css('height', theHeight+'px');

          $(this.element).show();
          updateSidebarHeight();

        }

        image.onerror = function(){
          singleImageLoaded = true;
          $(this.element).show();
          updateSidebarHeight();
        }

        image.src = $(el).find('img').attr('src');
        image.fixedHeight = parseInt($(el).find('img').css('height').replace('px', ''));
        image.element = element;

      }
      else
      {
        callback(el);
      }

    }


    function sideBarAJAX(){

      var dfr = $.Deferred();
      maxThrottles = 10;
      throttleCounter = 0;
      throttleTimeout = 3000;

      (function throttle(){
        $.ajax({
          type: 'post',
          url: "{{url('home/ajax_get_ads_posts_init')}}",
          data: {_token: CSRF_TOKEN,'posts_category_id' : posts_category_id,'posts_id' : post_id, 'contentOffset' :contentOffset },
          success : dfr.resolve, 
          error : function(xhr)
          {

            throttleCounter++;
            if ( xhr.status === 401 || xhr.status === 500 && throttleCounter <= maxThrottles) 
            {
              return setTimeout(function(){ throttle( this ) }, throttleTimeout);
            }

            dfr.rejectWith.apply( this, [] );
          }

        });
      })();

      return dfr.promise();

    }
    // END SIDEBAR AJAX

    //LAZY LOADING
    $(".postcontent img").unveil(200, function() {
      $(this).load(function() {
        $(this).css('width','100%').removeClass('img-loading');
        // $('.content p img').css('width','100%');
           imageLoaded++;

          if(totalImages == imageLoaded){
            allImageLoaded = true;
          }else{
            if(!sideBarCompleted){
                    clearInterval(startAddingSidebarInterval);
                    setSidebarLoadInterval();
                }
          }
          $(this).css('width','100%');
        });
    });
    //END LAZY LOADING

    // IDLE POPUP//
    // $(window).scroll(function () { 
    //   if( $(window).scrollTop() > 300 ) 
    //   {
    //     $('.popunder').animate({bottom: '-340px'}, 300);
    //   }
    // })

    startIdleCounting = setInterval( checkIdle, 1000 );
    idleCounter = 0;
    maxIdle = 10;

    //checkTitleSeen()

    function checkIdle(){


    // idleCounter++;
    //  console.log(idleCounter);

    //  title_is_seen = checkTitleSeen();

    // if(idleCounter == maxIdle){
    //     clearInterval(startIdleCounting);

    //     if(title_is_seen == false){
    //         $('.popunder').animate({bottom: '-9px'}, 300);
    //     }

    // }

    }

    $(window).bind('scroll load', function(){
    // title_is_seen = checkTitleSeen();
    // if(title_is_seen){
    //      clearInterval(startIdleCounting);
    // }
    });

    function checkTitleSeen(){

    //   title = $('a[name="gohere"]');
    //   titleOffsetHeight = title.offset().top + $('.susantinyimg').height();
    //   pageHeight = window.height || document.documentElement.clientHeight;

    //   documentOffsetTop = document.documentElement.scrollTop || document.body.scrollTop;  
    //   documentHeight = documentOffsetTop + pageHeight;

    //   if(titleOffsetHeight > documentHeight){
    //       return false;
    //   }

    //   return true;

    //           //if(titleOffsetHeight)

    //           /*$('.popunder').animate({bottom: '-9px'}, 300);*/

    }

    // ENDOF IDLE POPUP

  });
</script>

<!-- YOUTUBE SCRIPT HERE -->
<script type="text/javascript">

  $(document).ready(function(){

    function getFrameID(id) {

      var elem = document.getElementById(id);
      if (elem) 
      {
        if (/^iframe$/i.test(elem.tagName)) return id; //Frame, OK
        // else: Look for frame
        var elems = elem.getElementsByTagName("iframe");

        if (!elems.length) return null; //No iframe found, FAILURE
        for (var i = 0; i < elems.length; i++) 
        {
          if (/^https?:\/\/(?:www\.)?youtube(?:-nocookie)?\.com(\/|$)/i.test(elems[i].src)) break;
        }

        elem = elems[i]; //The only, or the best iFrame

        if (elem.id) return elem.id; //Existing ID, return it
        // else: Create a new ID
        do 
        { //Keep postfixing `-frame` until the ID is unique
          id += "-frame";
        } 
        while (document.getElementById(id));

        elem.id = id;

        return id;
      }
      // If no element, return null.
      return null;
    }

    // Define YT_ready function. 
    var YT_ready = (function() {
      //for debug
      // console.log('watermelon2!!!!');
      var onReady_funcs = [],
      api_isReady = false;
    /* @param func function     Function to execute on ready
         * @param func Boolean      If true, all qeued functions are executed
         * @param b_before Boolean  If true, the func will added to the first
                                     position in the queue*/
      return function(func, b_before) {
          if (func === true) {
              api_isReady = true;
              for (var i = 0; i < onReady_funcs.length; i++) {
                  // Removes the first func from the array, and execute func
                  onReady_funcs.shift()();
              }
          }
          else if (typeof func == "function") {
              if (api_isReady) func();
              else onReady_funcs[b_before ? "unshift" : "push"](func);
          }
      }
    })();

    //for debug
    // console.log('watermelon 3.0 !!!!');
    YT_ready(true);

    var players = {};
  //Define a player storage object, to enable later function calls,
  //  without having to create a new class instance again.
    YT_ready(function() {
      // for debug
      // console.log('watermelon4221!!!!');
      readyYoutube();

      function readyYoutube(){
        // console.log('readyYoutube function');
        if(YT && YT.Player)
        {
          $("iframe[id]").each(function() {
            var identifier = this.id;

            // console.log('samoka this guy oi');
            // console.log(identifier);
            var frameID = getFrameID(identifier);
            if (frameID) 
            {
              //If the frame exists
              // console.log(frameID);
              // players[frameID] = readyYoutube(frameID);
              players[frameID] = new YT.Player(frameID, {
                playerVars: 
                {                          
                  'controls': 1   
                },
                events: 
                {
                  // "onReady": createYTEvent(frameID, identifier),
                  'onStateChange': onPlayerStateChange
                }
              });
              // console.log(players[frameID]);
            }
          });
        }
        else
        {
          setTimeout(readyYoutube, 100);
        }
        //ONPLAYERSTATECHANGE
        function onPlayerStateChange(event) 
        {
          // for debug
          // console.log('am i in?');
          var state = event.target.getPlayerState();
          if (state === 2) 
          {
            // console.log('this is a state');
            // console.log(event.target.F.videoData.video_id);
            // var new_src = '//www.youtube.com/embed/'+event.target.F.videoData.video_id+'?enablejsapi=1&rel=0&controls=1';
            // $('iframe').attr('src',new_src).parent().html("<div style='position: relative; z-index:999;'><img src='{{url('uploads')}}/{{$yt_image_url}}'></div>");
          }
          else if (state === 0) 
          {
            // var iframe_id_men = event.target.f.id;
            // $("#"+iframe_id_men).parent().html("<div style='position: relative; z-index:999;'><img src='{{url('uploads')}}/{{$yt_image_url}}'></div>");
            var new_src = '//www.youtube.com/embed/'+event.target.F.videoData.video_id+'?enablejsapi=1&rel=0&controls=1';
            // console.log('samoka this guy 2');
            // console.log(new_src);
            $('iframe[src="'+new_src+'"]').parent().html("<div style='position: relative; z-index:999;'><a href='{{$yt_image_link}}'><img class='not_count' src='{{url('uploads')}}/{{$yt_image_url}}'></a></div>");
            // <div style='position: relative; z-index:999;'><a href='{{$yt_image_link}}'><img src='{{url('uploads')}}/{{$yt_image_url}}'></a></div>
          }
        }
        //END ONPLAYERSTATECHANGE
      };


    });


    });
  </script>
  <!-- END YOUTUBE SCRIPT HERE -->


@endsection
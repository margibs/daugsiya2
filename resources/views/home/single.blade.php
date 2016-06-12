@extends('home.layout')

@section('page-title')
 - {{$post->title}}
@endsection

@section('scripts_here')
     <link rel="stylesheet" href="{{asset('css/home/single.master.css')}}"> 
 <!--   <link rel="stylesheet" href="{{ elixir('css/home/single.master.min.css') }}"> -->
    <style>
    .related .outer .inner ul li a, .related .outer .inner ul li a img{
      height: auto;
    }
    </style>
@endsection

@section('for_og')
  <meta property="og:type" content="website">
  <meta property="og:image" content="{{ url('uploads') }}/{{ $post->thumb_feature_image }}"/>
  <link rel="image_src" href="{{ url('uploads') }}/{{ $post->thumb_feature_image }}"/>
  <meta property="og:title" content="{{$post->title}}" />
@endsection

@section('singlecontent')
@if(isset($user))
      <div class="recommendBox">
        <div class="recommendFriends">
          <i class="fa fa-times"></i>
          <p> Select your friends: </p>
          <ul id="friendRecommentList">
          </ul>
          <button class="recommendBtn" id="recommendBtn" type="button"> <i class="ion-android-happy"> </i> Recommend Game</button>
        </div>
      </div>
@endif
<div clbeass="container-fluid">
  <div class="container"  style="position:relative;">
    <div class="row no-gutter">
      <div class="col-xs-24 col-lg-24 col-lg-24 col-lg-24">
       

        <div class="col-xs-24 col-sm-24 col-md-19 col-lg-19 left" id="main">

          <img src="{{ url('images/responsive/singleTopReel.png') }}" class="singelTopReel" />
          <img src="{{ url('images/responsive/singlePostBG.png') }}" class="singlePostBG">
          
          <div class="featImg featimg">
             <img src="{{ asset('images/responsive/clickoncasinos.png') }}" class="hidethenshow" />
             <img src="{{ asset('images/responsive/belowToPlay.png') }}" class="hidethenshowtwo" />
             <!-- <img src="{{ url('uploads')}}/{{$post->feat_image_url}}" alt="" class="replaceme"> -->
             <img src="{{ url('tiny_uploads')}}/{{$post->feat_image_url}}" data-src="{{ url('uploads')}}/{{$post->feat_image_url}}" alt="" class="replaceme">
          </div>

         <div class="reels">
                  <div class="row no-gutter">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine2">
                         
                              <div class="text-center">
                                <div class="totalcontainer musicStar">
                                <div class="innertotalcontainer" style="width:{{ $widget_ratings->music_sounds / 10 * 100 }}%;">
                                <img src="http://susanwins.com/uploads/56148_stars.jpg" style="border:none;"  /></div></div>
                                <img src="http://susanwins.com/uploads/19401_music.jpg">                            
                              </div>

                              <div class="text-center">
                               {!! $casino_lists[3] !!}
                              </div> 

                              <div class="text-center">
                               {!! $casino_lists[0] !!}
                              </div> 

                              <div class="text-center">
                               {!! $casino_lists[2] !!}
                              </div> 
                            
                              
                          </div>
                    </div>          
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine3" >

                              <div class="text-center">
                                <div class="totalcontainer longtermStar"><div class="innertotalcontainer" style="width:{{$widget_ratings->long_term_play / 10 * 100}}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" style="border:none;"  /></div></div>
                                <img src="http://susanwins.com/uploads/80687_longterm.jpg">  
                              </div>

                             <div class="text-center">
                                {!! $casino_lists[1] !!}
                              </div> 

                              <div class="text-center">
                                {!! $casino_lists[0] !!}
                              </div> 

                              <div class="text-center">
                                {!! $casino_lists[2] !!}
                              </div> 
                              
                           
                          </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine4">

                          <div class="text-center">
                            <div class="totalcontainer funStar"><div class="innertotalcontainer" style="width:{{$widget_ratings->fun_rate / 10 * 100}}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" style="border:none;" /></div></div>
                            <img src="http://susanwins.com/uploads/81613_funrating.jpg">         
                          </div>

                          <div class="text-center">
                            {!! $casino_lists[2] !!}
                          </div>
                           
                           <div class="text-center">
                            {!! $casino_lists[0] !!}
                          </div>

                          <div class="text-center">
                            {!! $casino_lists[1] !!}
                          </div>
                          
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div id="planeMachine5">

                          <div class="text-center">
                            <div class="totalcontainer graphicStar"><div class="innertotalcontainer" style="width:{{$widget_ratings->graphics / 10 * 100}}%;"><img src="http://susanwins.com/uploads/56148_stars.jpg" style="border:none;"  /></div></div>
                            <img src="http://susanwins.com/uploads/47931_graphic.jpg">
                          </div>

                         <div class="text-center">
                             {!! $casino_lists[3] !!}
                          </div> 

                          <div class="text-center">
                             {!! $casino_lists[2] !!}
                          </div> 

                          <div class="text-center">
                             {!! $casino_lists[1] !!}
                          </div> 
                          
                      
                        </div>
                    </div>
                  </div>
          </div> 

          <div id="wrapper">
            <div class="socbtn"> 
              <a class="button fbblue serif round glass sharrre" id="share_via_facebook" data-url="{{url('')}}/{{ $post->slug }}" data-text="Share this up!">
              <img src="http://susanwins.com/uploads/34329_fb-button.png" style="left: 2px!important;top: -4px;"></a>
              <a class="button pink serif round glass sharrre" id="share_via_pinterest" style="left:55px;" data-url="{{url('')}}/{{ $post->slug }}" data-text="Pin me!"><img src="http://susanwins.com/uploads/76008_pinterestubtton.png" style="left:4px!important;top: -3px;"></a>
              <a class="button blue serif round glass sharrre" id="share_via_twitter" style="left: 40px;" data-url="{{url('')}}/{{ $post->slug }}" data-text="I'm tweeting this awesome game!"><img src="http://susanwins.com/uploads/70478_twitter-icon.png" style="top: -3px;left: 1px;"></a>      
              <a class="button pink serif round glass sharrre" id="share_via_googlePlus" style="left:25px;" data-url="{{url('')}}/{{ $post->slug }}" data-text=""><img src="http://susanwins.com/uploads/79339_g+button.png"></a>
            </div>

            <div id="playbig">
              <a id="winwinwin3" class="button pink serif round glass"> Play Now! </a>         
            </div>


          </div>


             @if(isset($user))
              <link rel="stylesheet" href="{{ asset('css/rateit.css') }}"> 

            <div class="gameExp" data-user="{{ $user->id }}">

                    @if($favorite)
                      <a class="fave" id="removeToFavorite" data-id="{{ $favorite->id }}"> 
                        <img src="http://susanwins.com/images/homepage/remove2fave.png" /> 
                        <span> Remove from Faves </span>  
                      </a>
                    @else
                      <a class="fave" id="addToFavorite"> 
                        <img src="http://susanwins.com/images/homepage/add2fave.png" /> 
                        <span> Add to Favourites  </span>  
                      </a>
                    @endif
           
                    @if($played_game)
                     <img src="{{ url('images')}}/happySusan.png" class="susanExpression moveLeft" />
                     <div class="fave played" id="playedText">  You've Played it! <span class="hideat1199"> Please Rate  it <i class="fa fa-arrow-right" aria-hidden="true" style="margin-left:5px;"></i> </span>
                              <a class="playedGamePad">                                                
                                  <input type="range" value="{{ $gameRating['totalRating'] }}" step="0.5" id="gameRating">
                                  <div class="rateit" data-rateit-backingfld="#gameRating" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-max="5"></div>
                                  <span id="totalVoters">({{ $gameRating['voters'] }})  </span>
                                  <div id="ratingThanks"></div>
                                </a>
                     </div> 
                    
                    @else
                        <img src="{{ url('images')}}/sadSusan.png"  class="susanExpression" />  
                        <div class="fave noplayed" id="playedText"> Not Played  <span class="hideat1199"> Yet </span> </div> 
                        <a id="playedGame" class="fave">
                        <img src="http://susanwins.com/images/homepage/alreadyPlayedIcon.png" />
                        <span> Add to Played List </span>
                        </a>
                        
                      
                    @endif
                 

            </div>

             @else
          <div class="gameExp">
               <a class="fave" id="addToFavorite" href="#loginModal"> 
                        <img src="http://susanwins.com/images/homepage/add2fave.png" /> 
                        <span> Add to Favourites  </span>  
                      </a>
                <img src="{{ url('images')}}/sadSusan.png"  class="susanExpression" />  
                        <a href="#loginModal" class="fave noplayed" id="playedText"> Not Played Yet</a> 
                        <a id="playedGame" class="fave" href="#loginModal">
                        <img src="http://susanwins.com/images/homepage/alreadyPlayedIcon.png" />
                        <span> Add to Played List </span>
                        </a>
                        
            </div>
          @endif
          

          <div class="content">     

            <div class="pointingSusan">
               <a id="alllist">
                  <img src="http://susanwins.com/uploads/53949_giftbox.png" />
                  Claim Bonus!
               </a>
                  <img src="{{ url('images/responsive/pointingSusan.png') }}" >
                 <blockquote class="oval-speech-border">
                   <p> Claim your bonus and Play now! </p>
                 </blockquote>
            </div>

            <div class="postcontent" data-post="{{ $post->id }}">

                         <div class="susantinyimg"></div>

                        <h2> {{$post->title}} <span> Written by Susan &nbsp;&nbsp;&nbsp; <a class="commentCount"> <i class="fa fa-comment"></i> {{ $post->total_comments()->count() }}  </a></span> </h2>

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
                            @if(isset($user))
                                    <li>
                              <button id="recommendToFriend" type="button"> <i class="ion-android-happy"></i> Recommend to Friends</button>
                            </li>
                            @endif
                          </ul> 

                          <p>
                            <b>
                              {{$post->introduction}}
                            </b>
                          </p>

                          {!!$post->content!!}
						
<!-- 						  <p style="position:relative;">
						  	<span class="overlay_ni_men" style="display: block; position: absolute; z-index: 2; top: 0; width: 100%; height: 100%; text-align: center; background-color:rgba(255, 255, 255, 0.9); "><div class="outer"><div class="middle"><div class="inner"><p>Do you want to play this game?</p> <br><a href="#" class="casino_yes" track-action="56ddbe4fe6b07" track-value="Yes Count"> <div class="glossy"> Yes </div> </a> <a href="#" class="casino_no" track-action="56ddbe560574d" track-value="No Count"> <div class="glossy" style="float: left;"> No </div> </a></div></div></div> </span>						  	
						  </p> -->

                          <h2> My thoughts </h2> 
                          <p style="margin-bottom: 50px;"> 
                            {{ $widget_ratings->final_verdict }}
                          </p>
              </div>
                       <!--  <a href="#" id="random_game"> 
                              <div class="randombutton">
                                <div class="inner">
                                    <img id="random_game_image" src="http://susanwins.com/images/homepage/random.png" />
                                </div>
                              </div>
                            </a>   -->
                          

          </div>


            



            <div class="commentRelativeBox">



                <img src="http://susanwins.com/uploads/74843_singlepagebartranspa.png" class="commentsReel">

                <div class="related">


                             <div class="bottomCasinos" >
                                 <div id="circle">
                                  <div id="gift">
                                    <div id="ribbon"></div>
                                    <div id="giftbox"></div>
                                  </div>
                                </div>
                                  <ul class="animated bounceIn">
                                    @foreach($casino_lists2 as $k => $v) 
                                    {!! $v !!}
                                    @endforeach
                                  </ul>
                              </div>


                              <div class="outer">




                                  <div class="inner">

                                         

                                         
                                          


                          
                                                                
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

                             <img src="{{$comment->user->user_detail->profile_picture ? url('').'/user_uploads/user_'.$comment->user->user_detail->user_id.'/5050/'.$comment->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar">
                            <span class="timestamp" data-datetime="{{ $comment->created_at }}"><span class="livetime"></span> | <span class="readable_time"></span></span>
                            <div class="comment-info">{{ ucfirst($comment->user->user_detail->firstname) }} {{ucfirst($comment->user->user_detail->lastname)}}</div>
                            <div class="comment-content">{!! $comment->content !!}</div>
                            <a href="javascript:;" class="reply_btn">Reply</a>

                            <div class="reply-list" id="reply-to-{{$comment->id}}">
                              @foreach($comment->post_replies as $reply)
                              <div class="replies-parent">
                                <img src="{{$reply->user->user_detail->profile_picture ? url('').'/user_uploads/user_'.$reply->user->user_detail->user_id.'/5050/'.$reply->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar">
                                <span class="timestamp" data-datetime="{{ $reply->created_at }}"><span class="livetime"></span> | <span class="readable_time"></span></span>
                                <div class="reply-info">{{ ucfirst($reply->user->user_detail->firstname) }} {{ucfirst($reply->user->user_detail->lastname)}}</div>
                                <div class="reply-content">{!! $reply->content !!}</div>
                              </div>
                              @endforeach
                            </div>

                            @if(isset($user))
                            <form class="reply-form" action="{{ url('add_reply') }}" method="POST" style="display:none">
                              <input type="hidden" name="parent" value="{{ $comment->id }}">
                              <input type="hidden" name="user_id" value="{{ $user->id }}">
                              <input type="hidden" name="content_id" value="{{ $post->id }}">
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
                  @if(isset($user))
                    <textarea class="form-control" rows="4" placeholder="Write a comment" name="content" id="submitCommentTextarea" disabled="disabled"></textarea>
                    @else
                    <a href="#loginModal" class="triggerLoginModal" style="display:block"><textarea class="form-control" href="#loginModal" rows="4" placeholder="Write a comment" name="content" id="submitCommentTextarea" disabled="disabled"></textarea></a>
                    
                    @endif
                  </div>
                  <div class="form-group">

                    @if(isset($user))
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <input type="hidden" name="content_id" value="{{ $post->id }}">
                      <input type="hidden" name="email" value="{{ $user->email }}">
                      <p style="display:none;">Signed in as {{ $user->email }}  
                        <a href="{{ url('logout') }}?redirect={{ Request::url() }}"><i class="fa fa-sign-out"></i></a> 
                      </p>
                    @else
                      <div class="rednotifbox">
                        <a href="{{ url('login') }}">Login to Comment</a> or <a href="{{ url('signup') }}">Register</a>
                      </div>
                    @endif

                  </div>
                  <div class="form-group">
                    <button type="submit" class="button_example"  value="submit" id="submitCommentForm" disabled="disabled">Submit</button>
                  </div>
                </form>

              </div>
            </div> 
                        
                                     <h6> Top Categories </h6>
                                      <ul>
                                         @foreach($category_randomizer as $k => $v) 
                                              {!! $v !!}
                                          @endforeach
                                                                                        
                                      </ul>  

                      </div>
                    </div>
                </div>



               <!--  <img src="{{ url('images/responsive/singleFooter.png') }}" class="singleFooter"> -->
            </div>

               <div class="simpleFooter"></div>

        </div>

          <div class="col-xs-24 col-sm-24 col-md-5 col-lg-5 right">
               <div class="sidebar">
                    @if(!isset($user))                
                      <!-- <blockquote class="oval-speech bounceIn animated">
                        <p> You're Missing All the Fun! <a href="{{ url('/signup') }}"> Signup Now </a> </p>
                      </blockquote> -->
                       <a href="{{ url('/signup') }}">
                             <div class="talk-bubble tri-right btm-right-in bounceIn animated">
                              <div class="talktext">
                                <p> You're Missing All the Fun! <span> Signup Now </span> </p>
                              </div>
                            </div>
                             </a>

                    @endif
                  <img src="{{ url('images/single-susan.png') }}" alt="" class="susan">
                      <div class="sidebarInner">
                        <h3> <img src="http://susanwins.com/uploads/28532_sidebartext.png" alt=""> </h3>
                         <div class="rellimg"></div>
                     </div>
               </div>
          </div>

        
             
         

              </div>

               <div class="col-xs-24">
                    <p class="terms">
                      <a href="#">Terms & Conditions</a> <a href="#"> Privacy Policy </a> Gambling is for over <img src="http://susanwins.com/uploads/48153_18-logo.gif" class="eighteen" />  <a href="#"> <img src="http://susanwins.com/uploads/63793_gambleaware.gif" class="gambleaware" /> </a> <br /> <b>Copyright &copy; <?php echo date("Y") ?> SusanWins</b>
                    </p>
              </div>

            </div>  

            

        </div>
    </div>
  </div>
 <div class="popunder">
   <img src="{{ url('images/scrollsusan.png') }}" alt="Scroll down to see my videos and read my review!" />
  </div>
    <div id="loginModal" style="top: 50%">
    
    You must be logged in to use this feature! <br />
    It's totally free and you'll receive an <b>AMAZING</b> welcome pack!
     <a href="{{ url() }}/signup" class="signup">Sign Up Today!</a>
    or 
        
    <a href="{{ url() }}/login" class="login"> <i class="ion-locked"></i> Login</a>
  </div>
  <div id="lean_overlay"></div>

  <div id="casino_after_youtube" style="display: none;">
    <p> Play this game at </p>
    @foreach($casino_lists_orig as $casino_list)      
      <a href="{{ $casino_list->link_desktop }}" target="_blank"><img src="{{url('uploads')}}/{{$casino_list->image_url}}" width="100px;" height="100px;"></a>
    @endforeach
  </div>

@endsection


@section('footer_scripts')
<script type="text/javascript" src="https://www.youtube.com/player_api"></script>
<script src="{{ asset('js/jquery.rateit.min.js') }}"></script>
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

        header_counter = 0;

        post_comment_connected = false;
        login_success = false;
        user_json = '{!! isset($user) ? json_encode($user) : null !!}';
        user = user_json ? JSON.parse(user_json) : false;
        tempComment = null;
        tempReply = null;

        var publicUrl = '{{ asset("") }}';
        var defaultProfilePic = publicUrl+'/images/default_profile_picture.png';

        setSidebarLoadInterval();

        recommendFriendAJAX = false;

        if(!user_id){
          $('.fave, .triggerLoginModal').leanModal({ 'top' : '50%' });
        }

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
                        recommendFriendAJAX = false;
                        $('#friendRecommentList').html('');
                        if(data && data.length){
                          $.each(data, function(){
                            f = this;

                                $('#friendRecommentList').append(
                                  $('<li>')
                                      .append(
                                        $('<div>').addClass('msgImgcont')
                                            .append(
                                              //$('<img>').attr('src', f.friend.user_detail.profile_picture ? BASE_URL+'/'+ f.friend.user_detail.profile_picture : defaultProfilePic )
                                               $('<img>').attr('src', getImage(f.friend.user_detail.profile_picture, f.friend.user_detail.user_id, 5050) )
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

  /********** API COUNT ********************/

      function getApiCount(value){
  
        min = 603;
        max = 1422;
        count = 0;

        if(value){

        value = parseInt(value) * 2;
          
           median = max - min;
          
          if( (median - value) >=0 ){
            count = min + (value - 1);
          }else{
            getApiCount(value - median);
          }
        }

        if(count > 999){
            count = (count / 1000).toFixed(1)+'K';
          }

        
        return count;
      }

    $('#api_count').text(getApiCount(post_id));
  /********** END API COUNT ********************/

    /********************** START GET IMAGE ******************************************************************************/
    function getImage(profile_picture ,user_id, size) {

      if(size === null) {
          return  profile_picture ? publicUrl+'/user_uploads/user_'+user_id+'/'+profile_picture : defaultProfilePic;
      }
       return  profile_picture ? BASE_URL+'/user_uploads/user_'+user_id+'/'+size+'/'+profile_picture : defaultProfilePic;
    }

  /********************** END GET IMAGE ******************************************************************************/

      $('#recommendBtn').on('click', function(){

            theButton = this;

            $(theButton).attr('disabled', 'disabled').text('Sending...');

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
                  $(theButton).text('Recommendation Sent!');
                  setTimeout(function(){
                        $(".recommendFriends").fadeOut('fast');
                        $(theButton).html('<i class="ion-android-happy"> </i> Recommend Game').removeAttr('disabled');
                        $('#friendRecommentList').html('');
                  }, 800);
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

        $('#alllist').on('click', function(){
          /* var y = $(window).scrollTop(); */
          var y = $('.pointingSusan').offset().top;
           $("html, body").animate({ scrollTop: y }, 400); 

           var explode = function(){
               $('.bottomCasinos').css({
                  'height':'180px',
                  'padding':'10px 0'
               });
                var ulOpen = function(){
                    $('#circle').css({
                        'display':'none'                       
                     });
                };
                setTimeout(ulOpen, 1000);


                 var giftbox = function(){
                      $('.bottomCasinos ul').css({
                           'display':'block'                       
                        });
                  };
                  setTimeout(giftbox, 1100);
                  

            };
            setTimeout(explode, 500);

          
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
              console.log(data);
              if(data && data.id){
                $(_this).replaceWith($('<a href="javascript:;" class="fave" id="playedGame"></a>').addClass('').attr('id', 'removeToFavorite').data('id', data.id)
                    .append($('<img src="http://susanwins.com/images/homepage/remove2fave.png">'))
                    .append($('<span>').text(' Remove from Faves')));
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
                $(_this).replaceWith($('<a href="javascript:;" class="fave" id="playedGame"></a>').addClass('').attr('id', 'addToFavorite')
                  .append($('<img src="http://susanwins.com/images/homepage/add2fave.png" />'))
                  .append($('<span>').text(' Add to Favourites ')));

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
                  $(_this).remove();
                $('#playedText').css({'width':'561px','left':'35%'}).html("Now You've Played! Please Rate it <i class='fa fa-arrow-right' aria-hidden='true'></i>");
                $('.susanExpression').replaceWith($('<img>').attr('src', BASE_URL+'/images/happySusan.png').addClass('susanExpression moveLeft'))
                  rateIt = $('<div data-rateit-backingfId="#gameRating" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">').addClass('rateit');


                  ratingThanks = $("<div id='ratingThanks'></div>");

                $('#playedText').append(

                  $('<a href="javascript:;">').addClass('playedGamePad')
                        .append(

                            $('<input type="hidden" step="0.1" id="gameRating" style="top: 81px;">').data('id', data.id)
                          )

                        .append(

                          rateIt  

                          )

                        .append(
                          $('<span id="totalVoters" ></span>').text('('+data.gameRating['voters']+')')
                          )

                        .append(
                            ratingThanks
                          )


                  );

                $(rateIt).rateit({ max: 5, step: 0.1, backingfld: '#gameRating' });

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
                  // $('#ratingThanks').text('Thanks for rating!');

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

    $('.postcontent').on('click','.casino_yes',function(e){

      e.preventDefault();
      var $this = $(this);
      var casino_yes_parent = $this.parent();
       casino_yes_parent.html("<div class='cssload-loader'></div><p style='position:relative;top:30px;'> Searching for Casinos... </p>");
            

      $.ajax({
          type: 'post',
          url: "{{url('casino/ajax/get_casino')}}",
          data: {_token: CSRF_TOKEN,'category_id' : get_casino_category,'post_id' : get_post_id}, 
          success: function(response)
          {
            var parsed = JSON.parse(response);
            var casino = '<p class="popupheading">This game is available to play at the following casinos:</p> <ul class="casinolist">';
           
            $.each( parsed, function( index, obj){
              var casino_url = '';

              casino_url = obj.link_desktop;

              casino += "<li><a target='_blank' href='"+casino_url+"' track-action='56ddbe5eb51c9' track-value='"+obj.name+"' class='casino_option' get-this-id="+obj.id+"><img src='{{url("uploads")}}/"+obj.image_url+"' style='width:auto;'></a></li>";

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
        type: 'get',
        url: "{{url('casino/ajax/get_article_banner')}}",
        data: {'articleBannerRatio' : articleBannerRatio,'total_image' : total_image,'banner_type' : banner_type,'get_casino_category' : get_casino_category}, 
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

    // SIDEBAR AJAX
    function updateSidebarHeight(){

      mainHeight = $('#main').height() - ($('.singelTopReel').height())/* - parseInt($('.singleFooter').css('padding-bottom').replace('px', ''))*/;

      sideBarHeight = mainHeight + ( $('.postcontent').offset().top - $('.sidebarInner').offset().top );
      finalSidebarContentHeight = sideBarHeight - ( $('.sidebarInner').find('h3').height() + (sideBarSpacer ) );
      $('.sidebarInner').css('height', sideBarHeight+'px');
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

        offsetBottom = ($('.sidebarInner').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer );

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

            prevOffsetBottom = ($('.sidebarInner').offset().top+sideBarHeight) - prevElement.offset().top - (sideBarSpacer );

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
            offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer );

            if(offsetBottom <= lastElement.data('originalHeight') )
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

    var random_sidebar_order_number = {{$random_sidebar_order_number}};

    function sideBarAJAX(){

      var dfr = $.Deferred();
      maxThrottles = 10;
      throttleCounter = 0;
      throttleTimeout = 3000;

      (function throttle(){
        $.ajax({
          type: 'get',
          url: "{{url('home/ajax_get_ads_posts_init')}}",
          data: {'posts_category_id' : posts_category_id,'posts_id' : post_id, 'contentOffset' :contentOffset, random_sidebar_order_number : random_sidebar_order_number,'get_casino_category' : get_casino_category },
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

    $('.replaceme').unveil(600);
$('.postcontent img').css('display','inline');
    //LAZY LOADING
    $(".postcontent img").unveil(600, function() {
            
      $(this).load(function() {
            $(this).css('width','100%').removeClass('img-loading');
            // $(this).renameAttr('height', 'data-height' );
            // $(this).renameAttr('width', 'data-width' );   

           imageLoaded++;

          if(totalImages == imageLoaded){
            allImageLoaded = true;

         // $('.content p img').css({
         //    "width":"743px",
         //    "height":"463px",
         // });

            $(document).trigger('adjustsinglePostBG');
            // var width = $(window).width(); 
            // var result = $(".content").height();             
            // var result2 = $(".related").height(); 
                  
            
            

            //    if ( width > 1199 ) {
            //     $('.sidebarInner').height( result + result2 + 720 );
            //     $(".singlePostBG").height( result + 200 );
            //   }
            //   else if ( width > 991 && width < 1200 ) {
            //     $('.sidebarInner').height( result + result2 + 570 );
            //     $(".singlePostBG").height( result + 200 );
            //   }
            //   else if( width > 767 && width < 992 ){
            //     $('.sidebarInner').height( result + result2 + 450 );
            //     $(".singlePostBG").height( result + 500 );
            //   }
            //   else if( width > 765 && width < 767 ){
            
            //   }
            //   else if( width < 766 ){
               
            //   }

          }
          else{
            if(!sideBarCompleted){
                    clearInterval(startAddingSidebarInterval);
                    setSidebarLoadInterval();
                }
          }
          //$(this).css('width','100%');
        });
    });
    //END LAZY LOADING

     //IDLE POPUP//


    startIdleCounting = setInterval( checkIdle, 1000 );
    idleCounter = 0;
    maxIdle = 2;
    popunderShown = false;
      $(window).scroll(function () { 
      /*if( $(window).scrollTop() > 300 ) 
      {
        $('.popunder').animate({bottom: '-340px'}, 300);
      }*/

           
    });

    //checkTitleSeen()

    function checkIdle(){


    idleCounter++;
    console.log(idleCounter);

     title_is_seen = checkTitleSeen();

    if(idleCounter == maxIdle){
        
          $('.popunder').animate({bottom: '-7px'}, 300);
          popunderShown= true;
          clearInterval(startIdleCounting);

       /* if(title_is_seen == false){
            $('.popunder').animate({bottom: '-9px'}, 300);
        }*/

    }

    }

    $(window).on('scroll', function(){
    title_is_seen = checkTitleSeen();
    idleCounter = 0;
    if(popunderShown || ($(window).scrollTop() >= $('.postcontent > h2').offset().top+$('.postcontent > h2').height())){
        clearInterval(startIdleCounting);
        $('.popunder').animate({bottom: '-340px'}, 300);
      /*  popunderShown = false;
        $('.popunder').animate({bottom: '-340px'}, 300);
        startIdleCounting = setInterval( checkIdle, 1000 );*/
    }

   /* if(title_is_seen){
         clearInterval(startIdleCounting);
    }*/
    });

    function checkTitleSeen(){

      /*title = $('a[name="gohere"]');*/
      title = $('.postcontent h2');
      titleOffsetHeight = title.offset().top + $('.susantinyimg').height();
      pageHeight = window.height || document.documentElement.clientHeight;

      documentOffsetTop = document.documentElement.scrollTop || document.body.scrollTop;  
      documentHeight = documentOffsetTop + pageHeight;

      if(titleOffsetHeight > documentHeight){
          return false;
      }

      return true;

              //if(titleOffsetHeight)

              /*$('.popunder').animate({bottom: '-9px'}, 300);*/

    }

    // ENDOF IDLE POPUP

  });
</script>

<!-- YOUTUBE SCRIPT HERE -->
<script type="text/javascript">

  $(document).ready(function(){

    $("iframe[src^='//www.youtube.com']").parent().wrap("<div class='yt_container'></div>");

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
          }
          else if (state === 0) 
          {
            var watermelon_id = event.target.getVideoData();
            var get_this_casino_for_yt = $("#casino_after_youtube").html();
            // var iframe_id_men = event.target.f.id;
            // var new_src = '//www.youtube.com/embed/'+event.target.D.videoData.video_id+'?enablejsapi=1&rel=0&controls=1';
            var new_src = '//www.youtube.com/embed/'+watermelon_id.video_id+'?enablejsapi=1&rel=0&controls=1';
            $('iframe[src="'+new_src+'"]').parent().html(get_this_casino_for_yt);

          }
        }
        //END ONPLAYERSTATECHANGE
      };


    });


    });

  $(window).bind("load", function() {

        var machine2 = $("#planeMachine2").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
         randomize : function(activeElementIndex){
              return 2;
          }
        });

        var machine3 = $("#planeMachine3").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
         randomize : function(activeElementIndex){
              return 1;
          }      
        });

        var machine4 = $("#planeMachine4").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
         randomize : function(activeElementIndex){
              return 1;
          }
        });

        var machine5 = $("#planeMachine5").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
         randomize : function(activeElementIndex){
              return 1;
          }
        });

        function onComplete(active){
          switch(this.element[0].id){
            case 'machine1':
              $("#planeMachine2").text("Index: "+this.active);
              break;
            case 'machine2':
              $("#planeMachine3").text("Index: "+this.active);
              break;
            case 'machine3':
              $("#planeMachine4").text("Index: "+this.active);
              break;
            case 'machine4':
              $("#planeMachine5").text("Index: "+this.active);
              break;
          }
        }

        $("#winwinwin3").click(function(){

          machine2.shuffle(5, onComplete);

          setTimeout(function(){
            machine3.shuffle(5, onComplete);
          }, 500);

          setTimeout(function(){
            machine4.shuffle(5, onComplete);
          }, 600);

          setTimeout(function(){
            machine5.shuffle(5, onComplete);
          }, 700);


         if(header_counter == 0)
         {

           $('.featimg .replaceme').fadeOut(300, function() {
          

           $('.featimg .replaceme').attr("src","http://susanwins.com/uploads/64878_click-header.png");
           $('.featimg .replaceme').fadeIn(100);

            $('.hidethenshow').css({'display':'block'}).addClass('animated bounceIn');

              function showme(){
                  $('.hidethenshowtwo').css({'display':'block'}).addClass('animated bounceIn');
               }
               setTimeout(showme, 500);

           });

           header_counter++;

         }

        })

   });     

  </script>
  <!-- END YOUTUBE SCRIPT HERE -->


@endsection
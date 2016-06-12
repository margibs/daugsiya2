			@extends('home.layout')

@section('singlecontentResposnive')

<div class="app-page" data-page="main">
	<div class="app-content">


<style type="text/css">
  .round{
    height: 240px;
        border-radius: 92%/25%;
  }
	.round2{		
    border-radius: 48%/6%;
	}
  .round2 .featimg{
    position: static;
    width: 100%;
    margin-top: -2px;
   height: 100px;
  }
  #maincontainer{
         margin-top: -3px;
    padding: 1px 2px;
  }
	.latestgames{
	    margin-left: -7px;
	    margin-top: -10px;
      margin-bottom: -2px;
	    z-index: 22;
  	}
   .latestgamescontent .inner{
	    background: #FDF6E9;
	    box-shadow: 0px 0px 10px 3px #DCB76B inset;
	    border: 1px solid #A07019;
   }
   .latestgamescontent .inner img{
      border: none;
      padding: 0;
      box-shadow: 0 0;
   }
   .thickgolddivider{
      background: #fff;
      padding: 2px 10px;
      margin-top: 0;
   }
    .thickgolddivider .rate img{
        width: 60px;
  }
    .thickgolddivider .rate i{
         font-size: 50px;
    color: #CA3A3A;
    position: relative;
    top: -10px;
    }
    .thickgolddivider button{
      font-size: 21px;
    } 
    #categoryContainer{  
      margin-top:70px;
    }
   .bonusCasino a{
      display: inline-block;
      padding: 5px;
      width: 49%;
   }
   .bonusCasino a img{
      width: 100%;
      border-radius: 4px;
   }
   .thickgolddivider button{
      font-family: Roboto;
      text-decoration: none;
      font-weight: 800;
      font-size: 17px;
      background: rgba(255, 255, 255, 0.13);
      display: block;
      padding: 6px 20px;
      border-radius: 23px;
      color: #CCC79A;
      margin: 4px 3px;
      border: 1px solid #DAD09E;
          text-align: center;
              width: 100%;
   }
   .thickgolddivider button.added{
      color: #B10B05;
   }
   .thickgolddivider p{
      font-size: 15px;
      text-shadow: 0 0 0;
      color: #DAD3B1;
      font-weight: 400;
      margin-top: -5px;
          float: left;
    width: 100%;
        height: 13px;
   }

   .susanFace{
   	  float: left;
    	position: relative;
      width: 55px;
      margin-top: 5px;
      margin-right: 8px;
   }

   .subDiv{   	
    position: relative;
    width: 100%;
/*        margin-left: -12px;
    padding-left: 73px;*/
   }
   .subDiv .rateContainer{
      margin-top: 13px;
      margin-left: 5px;
   }

   .subDiv > button{
   	    margin-top: 5px;
   }

   .playedGame, .notPlayedGame{
   		    position: relative;
	    float: left;
	    width: 100%;
   }
   .playedGame .play, .notPlayedGame .play{
    width: auto;
    font-size: 12px;
    padding: 4px 12px;
    margin-top: 15px;
    position: absolute;
    right: -7px;
    z-index: 1;
    color: #fff;
    background: #A30703;
    border: none;
    
   }
   .playedGame .play i, .notPlayedGame .play i{
    margin-right: 3px;
   }
   .innerfirst{
   	height:auto;
   }

    #recommendFriendModal p{
          font-family: Roboto;
          font-weight: 500;
          margin-top: 10px;
          font-size: 13px;
          color: #BFBABA;
          border-bottom: 1px solid #F0F0F0;
          padding-bottom: 9px;
      }
	
	#recommendFriendModal ul{
      height: 426px;      
      }

      #recommendFriendModal ul li{
      overflow: hidden;
      border-bottom: 1px solid rgba(255, 255, 255, 0.48);
      padding-bottom: 10px;
      padding: 6px 20px;
      background: rgba(255, 255, 255, 0.50);
      transition: background 0.2s ease;
      position: relative;
      text-align: left;
      }

      #recommendFriendModal ul li .msgImgcont{
      width: 50px;
      height: 50px;
      border-radius: 3px;
      overflow: hidden;
      float: left;
      }

      #recommendFriendModal ul li .msgImgcont img{
      width: 100%;
      }

      #recommendFriendModal ul li h6{
      font-family: 'Work Sans';
      margin-left: 75px;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding-top: 10px;
      color: #000;
      }

      #recommendFriendModal ul li .recommendCheck{
      float: right;
      margin-top: -12px;
      margin-right: 16px;
	   position: relative;
	   opacity: 1;
	   left: 0;
      }

      #recommendFriendModal .recommendBtn{
      background: #A40605;
      border: none;
      display: block;
      width: 100%;
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

      #recommendFriendModal .modal-content{
      	    padding: 0 16px;
      }
      .overlay_ni_men .inner p{
        font-weight: 600;
        font-size: 19px!important;
        margin: 30px 0 0px 0;
            margin-bottom: -10!important;
      }
      .overlay_ni_men .inner .glossy{
        float: none!important;
        display: block;
        text-align: center;
        width: 85%;
        margin: 5px auto;
        color: #fff;
        background: rgb(152, 5, 3);
        font-size: 21px;
        height: auto;
        padding: 8px;
        border-radius: 50px;
      }
      .casinolist{
        position: absolute;
        top:-6%;
        left: 0;
        z-index: 999;
        background: #fff;
      }
      .casinolist li{
        width: 48%;
      }

      .casinolist li, .casinolist li a{
        display: inline-block;
            margin: 0 1px;
      }
      .casinolist li a img{
          width: 150%;
          border-radius: 10px;
      }

      footer ul {
        padding: 33px 0 0 0!important;
      }
      footer ul li span{
        position: static!important;
      }
      .casino_youtube a{
        display: inline;
      }
      .casino_youtube a img{
        width: auto!important;
        border-radius: 10px;
      }
/********** MEDIA QUERIES *************/
@media(min-width: 360px){  
      .round2 .featimg{
        height: auto;
        } 
       .thickgolddivider{
          margin-top: -1px;
       }
    .thickgolddivider .rate img{
      width: 60px;
    }
    .thickgolddivider .rate i{
      font-size: 57px;
      color: #CA3A3A;
      position: relative;
      top: -10px;
    }
    .thickgolddivider button{
      font-size: 18px;
    }
    #maincontainer{
         margin-top: -3px;
    padding: 1px 2px;
    }
    .thickgolddivider p{
          margin: 0px 0 2px 0;
    }
}
@media(min-width: 480px){
  #categoryContainer {
      margin-top: 90px;
  }
  .playedGame .play, .notPlayedGame .play{
    right: -1px;
    top: 8px;
    font-size: 15px;
    font-weight: 400;
  }
}
@media(min-width: 600px){
  #categoryContainer {
    margin-top: 96px;
  }
  .thickgolddivider {    
    padding: 10px 10px 20px 10px;
  }
    .thickgolddivider button {
      font-size: 22px;
}
  .playedGame .play, .notPlayedGame .play{
        font-size: 20px;
        top: 0;
  }
  .subDiv .rateContainer{
    margin-top: 0;
    margin-bottom: 0;
  }
  .modal{
    max-height:100%;
  }
  .overlay_ni_men .inner .glossy{
    margin: 12px auto;
    font-size: 25px;
    padding: 12px;
  }
  .overlay_ni_men .inner p{
    margin-top: 105px;
    font-size: 25px!important;
  }
  .casinolist{
    top: 11%;
  }
  .casinolist li {
    width: 32%;
  }
  .gamelist li a img{
    height: 149px;
  }
}

@media(min-width: 720px){
  .gamelist li a img {
      height: 171px;
  }
  #postcontent h1, #postcontent h2 {
    font-size: 38px;
  }
  #postcontent p, .commentsContainer ul li p.comment {
    line-height: 25px;
    font-size: 20px;
  }
  #postcontent b {
    font-size: 20px;
    line-height: 26px;
  }
  .commentsContainer ul li p.name {
    font-size: 15px;
  }
  .commentsContainer ul li img.avatar{
    margin-top: 15px;
  }
  .overlay_ni_men .inner p{   
    font-size: 30px!important;
  }
}
.contentSociallinks li a{
  margin: 0 1px;
}
#selectCasinoModal h4{
  margin:10px 0 0 0 ;
}
#selectCasino ul{
  list-style: none;
}
#selectCasino li:first-child:nth-last-child(3), #selectCasino li:first-child:nth-last-child(3) ~ li{
  width: 49%;
}
</style>

<div class="featImgDiv">
  <img src="{{ url('images/mobileHeaders')}}/mh_{{substr($post->feat_image_url, 0, -3)}}jpg" class="featimg" />
</div>


<div id="maincontainer" data-post="{{ $post->id }}">
 
	<div class="innerfirst"> 

            
   <!-- 
        <div id="playbig">
            <a id="gogogo2" class="button pink glass"> Play Now! </a>         
        </div>     --> 

        
         <div class="thickgolddivider gameExp">
                      @if(isset($user))
                        

                      @if($played_game)
                         <div class="playedGame">

                          <img src="http://susanwins.com/images/happySusan.png" alt="" class="susanFace">          
                           @if(isset($user))
                               @if($favorite)
                                <button type="button" class="play" data-id="{{ $favorite->id }}" id="removeToFavorite"> <i class="ion-close-round"></i> Remove </button>
                                 @else
                                <button type="button" class="play" id="addToFavorite"> <i class="ion-ios-heart"></i> Fave </button>
                                 @endif
                            @endif  

                          
                            <div id="ratingDiv" class="subDiv" data-value="{{ $gameRating['totalRating'] }}"></div>
                            <p id="ratingPlayedNotif"> You've Played it!</p>
                         </div>
                      @else
                        <div class="notPlayedGame">

                          <!-- <img src="http://susanwins.com/images/sadSusan.png" alt="" class="susanFace"> -->
                            <div class="subDiv"><button type="button" class="added" id="playedGame"> <i class="ion-checkmark-round"></i> Add to Played List </button></div>            
                                    <p> Not Played Yet</p>
                         </div>
                         <div class="playedGame"  style="display:none">

                          <img src="http://susanwins.com/images/happySusan.png" alt="" class="susanFace">          
                              @if(isset($user))
                               @if($favorite)
                                <button type="button" class="play" data-id="{{ $favorite->id }}" id="removeToFavorite"> <i class="ion-close-round"></i> Remove </button>
                                 @else
                                <button type="button" class="play" id="addToFavorite"> <i class="ion-ios-heart"></i> Fave </button>
                                 @endif
                            @endif  
                            <div id="ratingDiv" class="subDiv"></div>
                            <p id="ratingPlayedNotif"> You've Played it! Please Rate it!</p>
                         </div>
                      @endif
        
         

      
                         
                         @else

                               <div class="notPlayedGame">

                          <!-- <img src="http://susanwins.com/images/sadSusan.png" alt="" class="susanFace"> -->
                            <div class="subDiv"><button type="button" class="added toggleLoginModal" id="playedGame"> <i class="ion-checkmark-round"></i> Add to Played List </button></div>             
                                    <p> Not Played Yet</p>
                         </div>
                       
                       <!--   <a href="#"> <i class="ion-checkmark"></i> Not Played </a> -->
                       
                  @endif
       </div>
             

        <div id="categoryContainer">
            
              
            <div id="postcontent">

          

	         <!--   
               <button type="button" class="added toggleLoginModal" id="addToFavorite"> <i class="ion-ios-heart"></i> Add to Favourites </button>
 -->
                  <button class="play" id="showCasino"> Play Game </button>

             <h1>  {{$post->title}} </h1>
             <span> Written by Susan &nbsp;&nbsp;&nbsp;</span><span class="commentCount"> <i class="ion-ios-chatbubble"></i> {{ $post->total_comments()->count() }}</span>
             
           
            <ul class="contentSociallinks">
                            <li>
                              <span id="api_count" data-url="{{url('')}}/{{$post->slug}}"></span>
                            </li>
                            <li>
                              <a href="javascript:;" id="share_via_facebook" class="fb sharrre" data-url="{{url('')}}/{{$post->slug}}" data-text="Share this up!">
                                <i class="fa fa-facebook"></i>
                              </a>
                            </li>                        
                            <li>
                              <a href="javascript:;" id="share_via_pinterest" class="pn sharrre" data-url="{{url('')}}/{{$post->slug}}" data-text="Pin me!">
                                <i class="fa fa-pinterest-p"></i>
                              </a>
                            </li>
                            <li>
                              <a href="javascript:;" id="share_via_twitter" class="tw sharrre" data-url="{{url('')}}/{{$post->slug}}" data-text="I'm tweeting this awesome game!">
                                <i class="fa fa-twitter"></i>
                              </a>
                            </li>
                            <li>
                              <a href="javascript:;" id="share_via_googlePlus" class="g sharrre" data-url="{{url('')}}/{{$post->slug}}" data-text="">
                                <i class="fa fa-google-plus"></i>
                              </a>
                            </li>
                            @if(isset($user))
                            <!--         <li>
                              <button id="recommendToFriend" type="button"> <i class="ion-android-happy"></i> Recommend to Friends</button>
                            </li> -->
                            @endif
                          </ul>

             <b>{{$post->introduction}}</b>
            {!!$post->content!!}
             
            

              <h2> My thoughts </h2>
              <p> {{ $widget_ratings->final_verdict }} </p>
            </div>

            <div id="claimBonusOuter">
              <a id="claimBonus">
                <img src="http://susanwins.com/uploads/53949_giftbox.png">
                <span>Claim Bonus!</span>
             </a>
           </div>

        </div>    

        
        <div class="latestgames"></div>
        <div class="latestgamescontent">
          <ul class="bonusCasino" style="display:none">
             @foreach($casino_lists2 as $k => $v) 
              {!! $v !!}
              @endforeach
          </ul>

          <div class="inner">

              <div class="commentsContainer">
                <h2> Recent Comments </h2>

                @if(count($comments))
					<ul id="commentList">
						 @foreach($comments as $comment)
							<li>
		                   <!--  <img src="{{$comment->user->user_detail->profile_picture ? url('').'/user_uploads/user_'.$comment->user->id.'/'.$comment->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar" /> -->
                         <img src="{{$comment->user->user_detail->userPicture5050() }}" class="avatar" />
		                    <p class="name"> {{$comment->user->user_detail->firstname.' '.$comment->user->user_detail->lastname }} </p>
		                    <p class="comment">{!! $comment->content !!} </p>
		                    <div class="replyArea">
				                    <ul class="replyList" id="reply-to-{{$comment->id}}">

				                     @foreach($comment->post_replies as $reply)
										<li>
					                       <!--  <img src="{{$reply->user->user_detail->profile_picture ? url('').'/user_uploads/user_'.$reply->user->id.'/'.$reply->user->user_detail->profile_picture : url('').'/images/default_profile_picture.png' }}" class="avatar" /> -->
                                   <img src="{{$reply->user->user_detail->userPicture5050() }}" class="avatar" />
					                        <p class="name"> {{$reply->user->user_detail->firstname.' '.$reply->user->user_detail->lastname }} </p>
					                        <p class="comment"> {!! $reply->content !!} </p>
					                      </li>
				                     @endforeach
				                      
				                    </ul>

				                     @if(isset($user))
				                        <form action="{{ url('add_reply') }}" method="POST" style="display:none" class="reply_form">
				                          <input type="hidden" name="parent" value="{{ $comment->id }}">
			                              <input type="hidden" name="content_id" value="{{ $post->id }}">
				                            <textarea class="reply" placeholder="Add Reply" name="content"></textarea>
				                            <button type="submit" class="replyBtn">Reply</button>
				                        </form>

				                      @endif
				                    <a href="javascript:;" class="toggleReply"> Reply </a></div>
		                  </li>
						 @endforeach
					</ul>
                 @else
                    <ul id="commentList"></ul>
                    <p id="no-comments">No Comments yet.</p>
                  @endif 

                 <form class="comment-form" action="{{ url('add_comment') }}" method="POST" id="commentForm">
                    <textarea class="form-control" rows="4" placeholder="Write a comment" name="content" id="submitCommentTextarea" disabled="disabled"></textarea>
 
                  <div class="form-group">

                    @if(isset($user))
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                      <input type="hidden" name="content_id" value="{{ $post->id }}">
                      <input type="hidden" name="email" value="{{ $user->email }}">
                      <p style="display:none;">Signed in as {{ $user->email }}  
                        <a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i></a> 
                      </p>
                    @else
                      <div class="rednotifbox">
                        <a href="{{ url('login') }}">Login to Comment</a> or <a href="{{ url('signup') }}">Register</a>
                      </div>
                    @endif

                  </div>
                  <div class="form-group">
                    <button type="submit" value="submit" id="submitCommentForm" disabled="disabled">Submit</button>
                  </div>
                </form>
              </div>

              <h2> Top Categories </h2>

              <div class="row">
              <ul class="row gameList">
                 @foreach($category_randomizer as $key => $value)

                    {{--  @if(($key) % 5 == 0) --}}

                      <div class="col s4" style="padding:0;">
                     {{--  @endif --}}
                    {!! $value !!}
                      {{-- @if(($key+1) % 5 == 0)  --}}
                      </div>
                     {{-- @endif --}}
                    @endforeach
              </ul>           
              </div>
          </div>
        </div>
        <div class="bottomads">
         <!--  <img src="http://susanwins.com/uploads/86112_foxycasino01_763x364.jpg" alt=""> -->
         <a href="{{$ads_rand->link}}">
           <img src="{{ url('uploads').'/'.$ads_rand->image}}" alt="">
          </a>
        </div>
        
      </div>

           <p class="terms">
            <a href="#">Terms &amp; Conditions</a> <a href="#"> Privacy Policy </a> Gambling is for over 
            <br /> <img src="http://susanwins.com/uploads/48153_18-logo.gif" class="eighteen">  <a href="#"> <img src="http://susanwins.com/uploads/63793_gambleaware.gif" class="gambleaware"> </a> <br> 
            <br /><b>Copyright © 2016 SusanWins</b>
          </p>
  
</div> 

			<div id="recommendFriendModal" class="modal">
			    <div class="modal-content">
			     <p> Select your friends: </p>
          <ul id="friendRecommentList">
          </ul>
          <button class="recommendBtn" id="recommendBtn" type="button"> <i class="ion-android-happy"> </i> Recommend Game</button>
			    </div>
			  </div>

	</div>
</div>

  <div id="casino_after_youtube" style="display: none;">
    <div class="casino_youtube">
      <p> Play this game at </p>
      @foreach($casino_lists_orig as $casino_list)      
        <a href="{{ $casino_list->link_desktop }}" target="_blank"><img src="{{url('uploads')}}/{{$casino_list->image_url}}" width="100px;" height="100px;"></a>
      @endforeach
    </div>
  </div>

@endsection
      @if(!isset($user))
      <div id="loginModal" class="modal">
          <div class="modal-content">
           <h4> Signup today to use this feature and receive an AMAZING Welcome Pack! <a href="{{ url('/signup') }}"> Signup </a> or <a href="{{ url('/login') }}"> Login </a></h4>
          </div>
        </div>
    @endif
        <div id="selectCasinoModal" class="modal" style="border-radius:10px;border-width: 4px;padding:0;">
          <div class="modal-content">
          <h4 style="margin-bottom: 0;">Select from these casinos:</h4>
                <ul id="selectCasino" style="margin-top: 0;">
             @foreach($casino_lists as $k => $v) 
              {!! $v !!}
              @endforeach
                    </ul>
          </div>
        </div>

<script>
	
	articleBannerRatio = {{$articleBannerRatio}};
	get_casino_category = {{$get_casino_category}};
</script>

@section('app-js')
  <script>
       $(document).on('ready', function(){

            $('.app-page').css({ 'display' : 'block' });
            $('#mainLoading').remove();


       		App.controller('main', function(page){


       			$(page).attachCommentEvents();

       			$(page).attachSinglePageEvents();

       			/*$(page).on('click', '.toggleReply', function(){

	       			$(this).parent('.replyArea').find('form').show();
	       		});*/
       		});

             App.load('main');

       });
  </script>

@endsection
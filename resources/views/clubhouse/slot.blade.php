@extends('clubhouse.layout')




@section('page-title', 'Slots Room')


@section('scripts_here')

<link rel="stylesheet" href="{{ asset('css/rateit.css') }}">

@endsection

 @section('switch-button')
 	  <button class="categ-button"> <a href="{{ url('logout') }}">Logout</a></button>
@endsection

@section('background-content')

<style type="text/css">
.cd-tour-nav{
  display: none;
}
	#roombg{
		top: -5px;
    	left: -11px;
		width: 106%;
	}
	.gamelist{
	  width: 689px;
    height: 390px;
    position: absolute;
    top: 225px;
    left: 643px;
    z-index: 2;
    overflow-x: hidden;
    overflow-y: scroll;
	}
	.gamelist ul li, .gamelist ul li a{
	  display: inline-block;
	      width: 100%;
	}
	.gamelist ul li{
	  width: 162px;
	}
	.gamelist ul li a img{
	     width: 100%;
    border-radius: 3px;
    margin: 3px;
    margin: 3px auto;
    background-color: #fff;
	}
	.guideSusanContainer{
		left: 0;
	}
	@media(max-width: 1680px){
		.gamelist{
			width: 626px;
		    height: 349px;
		    top: 192px;
		    left: 558px;
		}
		.gamelist ul li{
			    width: 149px;
		}
	}
	@media(min-width: 1440px){
	  #roombg{
	     top: 0;
	  }	
	 .gamelist {
		    width: 539px;
		    height: 298px;
		    top: 165px;
		    left: 477px;
		}
		.gamelist ul li {
		width: 127px;
		}
	}

	@media(max-width: 1366px){
	  #roombg{
	     top: -20px;
	     left: -40px;
	     width: 110%;
	  }	  
	  .gamelist{
	    top: 146px;
	    left: 439px;
	    height: 289px;
	    width: 516px;
	  }
	  .gamelist ul li a img{
	  	margin: 1px 3px;
	  }
	  .gamelist ul li {
		    width: 120px;
	  }
	  .slotsroomPage .cd-single-step:nth-of-type(1) {
		    left: 27%;
		}
	}	
	@media(max-width: 1280px){
		#roombg {
		    top: -10px;
		    left: -100px;
		    width: 120%;
		}
		.gamelist {
		    top: 158px;
		    left: 389px;
		    height: 298px;
		    width: 549px;
		}
		.gamelist ul li {
			width: 128px;
			}
	}
	@media(max-width: 1024px){
		#roombg {
		    top: 0;
		    left: -198px;
		    width: 142%;
		}
		.gamelist {
		top: 158px;
		left: 264px;
		height: 283px;
		width: 518px;
		}
		.gamelist ul li {
		width: 121px;
		}
	}
	
	

</style>

<div class="roomNavIcons">
  <ul>
    <li> <a href="{{ url('/clubhouse/profile')}}"> <img src="http://susanwins.com/images/clubhouse/profileroom-thumb.gif" alt="" title="Profile Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/slotsroom')}}"> <img src="http://susanwins.com/images/clubhouse/slotsroom-thumb.gif" alt="" title="Slots Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/chatroom')}}"> <img src="http://susanwins.com/images/clubhouse/chatroom-thumb.gif" alt="" title="Chatroom Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/prizeroom')}}"> <img src="http://susanwins.com/images/clubhouse/prizeround.png" alt="" title="Prize Room">  </a> </li>
  </ul>
</div>

	@if(!$user->completed_slotsroom_tour)

  @section('guide-susan')
    <div class="guideSusanContainer">
    <img src="{{url('images')}}/guide-susan-left.png" class="guide-susan">
</div>
  @endsection

  <ul class="cd-tour-wrapper slotsroomPage">
    <li class="cd-single-step no-pulse">
      <div class="cd-more-info">
        <h2> The Slots Room </h2>
        <p> Here's where you can browse the entire selection of online slots on SusanWins - <br /> Find new games, and relive old classics! Scroll through the games and find amazing new challenges! </p>
        <img src="img/step-1.png" alt="step 1">
      </div>
    </li> <!-- .cd-single-step -->
    <!-- <li class="cd-single-step">
      <span>Step 1</span>

      <div class="cd-more-info left">
        <h2> Your Diary </h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi alias animi molestias in, aperiam.</p>
        <img src="img/step-1.png" alt="step 1">
      </div>
    </li> --> <!-- .cd-single-step -->

  </ul> <!-- .cd-tour-wrapper -->

  @endif

	<div class="bgwrapper">
			<img id="roombg" src="{{url('images/clubhouse')}}/slotroom.jpg" alt="">		

			<div class="gamelist">
			  <ul>
					@foreach($posts as $post)
					        <li>           
					            <a href="{{url('')}}/{{$post->slug}}">                  
					              <img class="lazyload" src="{{ asset('uploads/66058_default.gif') }}" data-src="{{asset('uploads')}}/{{$post->thumb_feature_image}}">
					            </a>
					        </li>  
					 @endforeach

			    </ul>
			</div>

	</div>

@endsection

@section('custom_scripts')
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
<script type="text/javascript">


	/*		$(function(){
		  $(".lazyload").unveil(200);
		});*/
	// $('.gamelist ul').slimScroll({
 //        height: '388px'
 //    });
</script>

@endsection
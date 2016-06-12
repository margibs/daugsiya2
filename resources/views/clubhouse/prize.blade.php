@extends('clubhouse.layout')




@section('page-title', 'Prize Room')



 @section('switch-button')
 	  <button class="categ-button"> <a href="{{ url('logout') }}">Logout</a></button>
@endsection

@section('background-content')

<style type="text/css">
body{
  height: 100%;
  width: 100%;
}
.cd-tour-nav{
  display: none;
}
.roulette {
  position: absolute;
  margin: 0 auto;
  width: 560px;
  height: 560px;
  left: 653px;
  top: 180px;
  background-color: transparent;
  background-size: 560px 560px;
  background-image: url(../images/clubhouse/sharpwheel.png);
  border-radius: 300px;
  z-index: 2;
}

.spinner {
  cursor: pointer;
  color: red;
  font-weight: bold;
  border: none;
  position: absolute;
  width: 205px;
  height: 205px;
  top: 357px;
  left: 830px;
  border-radius: 100%;
  z-index: 2;
  
  background: rgb(196,3,7);
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M0MDMwNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNiMjAwMDIiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: -moz-linear-gradient(top,rgb(255, 255, 255) 0%, rgba(255, 255, 255, 0.89) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(255, 255, 255)), color-stop(100%,rgba(255, 255, 255, 0.89)));
  background: -webkit-linear-gradient(top,rgb(255, 255, 255) 0%,rgba(255, 255, 255, 0.89) 100%);
  background: -o-linear-gradient(top,rgb(255, 255, 255) 0%,rgba(255, 255, 255, 0.89) 100%);
  background: -ms-linear-gradient(top,rgb(255, 255, 255) 0%,rgba(255, 255, 255, 0.89) 100%);
  background: linear-gradient(to bottom,rgb(255, 255, 255) 0%,rgba(255, 255, 255, 0.89) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c40307', endColorstr='#b20002',GradientType=0 );
  outline: none;
  -moz-box-shadow: 0 0 19px -3px #000;
  -webkit-box-shadow: 0 0 19px -3px #000;
  box-shadow: 0 0 19px -3px #000;

}

.spinner span{
	color: rgb(255, 255, 255);
	font-size: 23px;
	font-family: 'Work Sans';
	line-height: 39px;
	text-shadow: 0px 1px 2px rgb(76, 72, 72);
	display: block;
	font-weight: 600;
	margin-left: 32px;
    display: none;
}
.spinner span img{
	width: 84%;
	margin: 50px 10px 0 -11px;
}
.spinner span p{
	margin-left: 36px;
	margin-top: -1px;
}
.spinner .pointer {
  position: absolute;
  width: 0; 
  height: 0; 
  top: -9px;
  left: 45%;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid #fff;
}
.shadow{
  width: 560px;
  height: 560px;
  background: transparent;
  position: absolute;
  top: 180px;
  left: 653px;
  border-radius: 50%;
  -moz-box-shadow: 0px 0px 19px -2px rgb(62, 60, 60);
  -webkit-box-shadow: 0px 0px 19px -2px rgb(62, 60, 60);
  box-shadow: 0px 0px 19px -2px rgb(62, 60, 60);
}
#roombg{position: relative;}

.entercode{
    position: absolute;
    top: 387px;
    left: 807px;
    background: rgb(196,3,7);
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M0MDMwNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNiMjAwMDIiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top,  rgb(255, 255, 255) 0%, rgba(241, 241, 241, 0.94) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(255, 255, 255)), color-stop(100%,rgba(241, 241, 241, 0.94)));
    background: -webkit-linear-gradient(top,  rgb(255, 255, 255) 0%,rgba(241, 241, 241, 0.94) 100%);
    background: -o-linear-gradient(top,  rgb(255, 255, 255) 0%,rgba(241, 241, 241, 0.94) 100%);
    background: -ms-linear-gradient(top,  rgb(255, 255, 255) 0%,rgba(241, 241, 241, 0.94) 100%);
    background: linear-gradient(to bottom,  rgb(255, 255, 255) 0%,rgba(241, 241, 241, 0.94) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c40307', endColorstr='#b20002',GradientType=0 );

    padding: 10px;
    width: 230px;
/*    overflow: hidden;*/

    border-radius: 5px;
    z-index: 3;

/*    width: 205px;
    height: 205px;*/
    border-radius: 2%;
    text-align: center;
    
   /* border: 1px solid #D8D8D8;*/

    -moz-box-shadow: 0 0 30px 1px #737171;
    -webkit-box-shadow: 0 0 30px 1px #737171;
    box-shadow: 0 0 30px 1px #737171;

    /*transform: perspective(482px) rotateY(35deg);*/
}

.entercode a{
  text-decoration: none;
  font-size: 15px;
  color: #fff;
  font-weight: 500;
  font-family: 'Work Sans';
  padding: 6px 0;
  display: block;
  border-radius: 20px;
  margin: 7px 47px;
  border: 1px solid #902134;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M0MDMwNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQ0JSIgc3RvcC1jb2xvcj0iIzhmMDIyMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNiMjAwMDIiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: -moz-linear-gradient(top,  rgba(196,3,7,1) 0%, rgba(143,2,34,1) 44%, rgba(178,0,2,1) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(196,3,7,1)), color-stop(44%,rgba(143,2,34,1)), color-stop(100%,rgba(178,0,2,1)));
  background: -webkit-linear-gradient(top,  rgba(196,3,7,1) 0%,rgba(143,2,34,1) 44%,rgba(178,0,2,1) 100%);
  background: -o-linear-gradient(top,  rgba(196,3,7,1) 0%,rgba(143,2,34,1) 44%,rgba(178,0,2,1) 100%);
  background: -ms-linear-gradient(top,  rgba(196,3,7,1) 0%,rgba(143,2,34,1) 44%,rgba(178,0,2,1) 100%);
  background: linear-gradient(to bottom,  rgba(196,3,7,1) 0%,rgba(143,2,34,1) 44%,rgba(178,0,2,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c40307', endColorstr='#b20002',GradientType=0 );

  cursor: pointer;

}
.entercode input[type=text]{
  text-align: center;
  font-family: "Work Sans";
  font-size: 45px;
  font-weight: 600;
  width: 170px;
  border: medium none;
  border-radius: 2px;
  -moz-box-shadow: inset 0 0 6px -2px #000;
  -webkit-box-shadow: inset 0 0 6px -2px #000;
  box-shadow: inset 0 0 6px -2px #000;
  outline: none;
}
.entercode  p{
  text-align: center;
  font-family: Roboto;
  font-size: 13px;
  margin-bottom: 7px;
  color: rgb(187, 187, 187);
  font-weight: 600;
  /*margin-top: 55px;*/
}
.entercode span{
	
	padding:8px 10px;
	display: block;
	width: 59%;
	border-radius: 30px;
	color: rgb(255, 255, 255);
	font-family: Roboto;
	margin: 0px auto;
	position: absolute;
	top: 90px;
	left: 40px;
	visibility: hidden;
}
.entercode span.error{
	background: rgb(228, 23, 23) none repeat scroll 0% 0%;
	top: -39px;
}
.entercode span.active{
	background: rgb(7, 182, 21) none repeat scroll 0% 0%;
}
.none{
	z-index: -5!important;
}
.topz{
	z-index: 5!important;
}
.vizible{
	visibility: visible!important;
}
.stand{
  position: absolute;
  top: 732px;
  left: 815px;
}
.congrats{
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: -5;
	visibility: hidden;
	text-align: center;
	height: 100%;
	width: 100%;
	color: rgb(255, 255, 255);
	padding: 270px 20px 0px 20px;
	font-family: "Work Sans";
	font-weight: 600;

	width: 30%;
    margin: 0 60px;
    background: rgba(0, 0, 0, 0.83);
}
.congrats h3{
	font-size: 50px;
	text-shadow: 0px 0px 14px rgb(0, 0, 0);
}
.congrats a{
	display: block;
	text-decoration: none;
    font-size: 17px;
    margin-top: 13px;
    text-shadow: 0px 0px 14px rgb(0, 0, 0);
    font-weight: 500;
    line-height: 20px;
    color: #FFA3A3;
    padding: 0 50px;
}
.congrats img{
	width: 110px;
    margin-top: 20px;
}
#confetti{
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	z-index: 99;
/*	display: none;*/
	pointer-events: none;
}
@media(min-width: 1440px){
  #roombg{
     top: 0;
     left: 0;
  }
  .roulette{
  	left: 715px;
    top: 224px;
  }
  .stand {  
    top: 772px;
    left: 830px;
  }
  .spinner{
  	top: 401px;
    left: 892px;
  }
  .entercode {    
    top: 439px;
    left: 881px;
   }
}

@media(max-width: 1366px){

    #roombg {
      top: -90px;
      left: -150px;
  }
  .roulette, .shadow{
   left: 413px;
   top: 90px;
  }
  .spinner{
	top: 267px;
	left: 590px;
  }
  .entercode{
	    top: 305px;
    left: 576px;
  }
  .stand {
    top: 636px;
    left: 515px;
  }
}

.price{
	pointer-events: all;
	position: absolute;
	top: 20%;
	left: 90%;
	background: red none repeat scroll 0% 0%;
}


@media(max-width: 1280px){
  #roombg {
      top: -90px;
      left: -150px;
      width: 130%;
  }
  .roulette, .shadow {
    left: 413px;
    top: 145px;
  }
  .spinner {
    top: 322px;
    left: 591px;
  }
  .entercode {
    top: 359px;
    left: 576px;
  }
  .stand {
    top: 692px;
    left: 515px;
  }
}

@media(max-width: 1024px){
#roombg {
    top: -90px;
    left: -150px;
    width: 158%;
}
.roulette, .shadow {
    left: 250px;
    top: 120px;
}
.spinner {
    top: 297px;
    left: 427px;
}
.entercode {
    top: 330px;
    left: 419px;
}
.stand {
    top: 666px;
    left: 359px;
}
}

</style>

<canvas id="confetti" width="1" height="1" style="display:none;"></canvas>

<div class="roomNavIcons">
  <ul>
    <li> <a href="{{ url('/clubhouse/profile')}}"> <img src="http://susanwins.com/images/clubhouse/profileroom-thumb.gif" alt="" title="Profile Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/slotsroom')}}"> <img src="http://susanwins.com/images/clubhouse/slotsroom-thumb.gif" alt="" title="Slots Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/chatroom')}}"> <img src="http://susanwins.com/images/clubhouse/chatroom-thumb.gif" alt="" title="Chatroom Room">  </a> </li>
    <li> <a href="{{ url('/clubhouse/prizeroom')}}"> <img src="http://susanwins.com/images/clubhouse/prizeround.png" alt="" title="Prize Room">  </a> </li>
  </ul>
</div>
	@if(!$user->completed_prizeroom_tour)

  @section('guide-susan')
    <div class="guideSusanContainer">
    <img src="{{url('images')}}/guide-susan.png" class="guide-susan">
</div>
  @endsection

  <ul class="cd-tour-wrapper prizeroomPage">
    <li class="cd-single-step no-pulse">

      <div class="cd-more-info">
        <h2> Susan's Prize Room! </h2>
        <p> If you're lucky enough to have a prize code you can put it in here! There are a few ways to get prize codes: 
          <ul>
            <li> You'll get your first prize code in the welcome pack - make sure to fill out your details in your profile room so we can send it to you </li>
            <li> You'll also get prize codes when you participate in the Chat Lounges - My chat hosts love to give them out! </li>
            <li> The last way to get prize codes is by referring friends to my club! The more the merrier! </li>
          </ul>
        </p>
        <img src="img/step-1.png" alt="step 1">
      </div>
    </li> <!-- .cd-single-step -->

  </ul> <!-- .cd-tour-wrapper -->

  @endif

	

	<div class="bgwrapper">
			<img id="roombg" src="{{url('images/clubhouse')}}/prizeroom.jpg" alt="">		
				 
				<div class="entercode">
					<span class="error"> Code is Invalid </span>
					<span class="active"> Code is Invalid </span>
		            <p> Enter 4-Digit Coupon Code </p>
		            <input type="Text" maxlength="4" placeholder="####" id="prizeCode" />
		            <a> Submit </a>
		          </div>

		          <!-- <div class="shadow"></div> -->
		          <div class="roulette">
		          </div>
		          <a class="spinner"><span> <img src="http://susanwins.com/uploads/52424_logo.png" /> <p> Take a Spin! </p> </span> <div class="pointer"></div></a>  
		          <div class="stand">
		           <img src="{{url('images/clubhouse')}}/wheelfeet.png" class="">
		          </div>
		          <div class="price">
		          </div>


	</div>

@endsection

@section('custom_scripts')

<script src="{{ asset('js/jquery.fortune.js') }}"></script>
<script src="{{ asset('js/roulette.js') }}"></script>

<script type="text/javascript">
	$('.gamelist ul').slimScroll({
        height: '388px'
    });
    



    $(document).ready(function(){

    	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	    	$('.entercode a').click(function() { 

	    		prizeCode = $('#prizeCode').val();

	    		button = this;
	    		$(button).attr('disabled', 'disabled');
	    		if(prizeCode){

	    			$.ajax({

	    				url : '{{ url("prize/checkPrizeCode") }}',
	    				type : 'POST',
	    				data : { _token : CSRF_TOKEN, code : prizeCode },
	    				dataType : 'json',
	    				success : function(validation){
	    					
	    					if(validation.valid){
	    						useRoulette(validation.prizeCode);
	    						$(button).removeAttr('disabled');
	    					}else{
	    						// alert(validation.message);
	    						$('.error').addClass('topz vizible animated shake');
	    						function removeanimation(){
								  $('.entercode span.error').removeClass(' vizible animated shake');		   
								}
								setTimeout(removeanimation, 2000);
	    					}

	    					

	    				},error : function(xhr){
	    					console.log(xhr.responseText);
	    				}

	    				});  

	    		}


	    });

	    	userSpinned = false;

	    	 function useRoulette(prizeCode){


		    		$('.entercode').addClass('animated zoomOut');
			    	

				    	function showspintext(){
						  $('.spinner span').fadeToggle();
						  $('.entercode').addClass('none');

						  
						}
						setTimeout(showspintext, 700);

				    	function removeanimation(){
						  $('.entercode span.error').removeClass(' animated shake');		   
						}
						setTimeout(removeanimation, 2000);

		    	    var $r = $('.roulette').fortune(24);

					var clickHandler = function() {
					  $('.spinner').off('click');
					  //$('.spinner span').hide();

					  if(!userSpinned){
					  	userSpinned = true;
					  	$r.spin().done(function(price) {
					  		// $('.price').text('You have: ' + price);
					      console.log(prizeCode);

					      $.ajax({
					      	url : '{{ url("prize/claimPrize") }}',
					      	type : 'POST',
					      	data : { prizeCode_id : prizeCode.id, _token : CSRF_TOKEN, price : price },
					      	dataType : 'json',
					      	success : function(result){
					      		console.log('yeah');
					      			console.log(result);
					      		if(result){
					      			if(result.won && result.prize){						      			
						      			$('#roombg').after('<div class="congrats"><h3>Congratulations! You have won '+result.prize.name+'  </h3><a href="'+result.prize.prize_link+'"> Click here to register an account and claim your bonus</a><img src="{{url("images")}}/gift.png" alt=""></div>');
						      			$('#confetti').css('display', 'block');
						      			$('.congrats').addClass('topz vizible animated bounceIn');
						      			userSpinned = false;
						      		}else{
						      			alert('Error in claiming prize. Please try again using your code.');
						      		}
					      		}

					      	},error : function(xhr){
					      		console.log(xhr.responseText);
					      	}

					      })

					      //$('.spinner span').show();
					    });

					  }
					  
					};

					$('.spinner').one('click', clickHandler);
		    }

    });







    //confettie
    var retina = window.devicePixelRatio,

				// Math shorthands
				PI = Math.PI,
				sqrt = Math.sqrt,
				round = Math.round,
				random = Math.random,
				cos = Math.cos,
				sin = Math.sin,

				// Local WindowAnimationTiming interface
				rAF = window.requestAnimationFrame,
				cAF = window.cancelAnimationFrame || window.cancelRequestAnimationFrame;

			// Local WindowAnimationTiming interface polyfill
			(function (w) {
				/**
				* Fallback implementation.
				*/
				var prev = new Date().getTime();
				function fallback(fn) {
					var curr = _now();
					var ms = Math.max(0, 16 - (curr - prev));
					var req = setTimeout(fn, ms);
					prev = curr;
					return req;
				}

				/**
				* Cancel.
				*/
				var cancel = w.cancelAnimationFrame
					|| w.webkitCancelAnimationFrame
					|| w.clearTimeout;

				rAF = w.requestAnimationFrame
					|| w.webkitRequestAnimationFrame
					|| fallback;

				cAF = function(id){
					cancel.call(w, id);
				};
			}(window));

			document.addEventListener("DOMContentLoaded", function() {
				var speed = 50,
					duration = (1.0 / speed),
					confettiRibbonCount = 11,
					ribbonPaperCount = 30,
					ribbonPaperDist = 8.0,
					ribbonPaperThick = 8.0,
					confettiPaperCount = 95,
					DEG_TO_RAD = PI / 180,
					RAD_TO_DEG = 180 / PI,
					colors = [
						["#df0049", "#660671"],
						["#00e857", "#005291"],
						["#2bebbc", "#05798a"],
						["#ffd200", "#b06c00"]
					];

				function Vector2(_x, _y) {
					this.x = _x, this.y = _y;
					this.Length = function() {
						return sqrt(this.SqrLength());
					}
					this.SqrLength = function() {
						return this.x * this.x + this.y * this.y;
					}
					this.Add = function(_vec) {
						this.x += _vec.x;
						this.y += _vec.y;
					}
					this.Sub = function(_vec) {
						this.x -= _vec.x;
						this.y -= _vec.y;
					}
					this.Div = function(_f) {
						this.x /= _f;
						this.y /= _f;
					}
					this.Mul = function(_f) {
						this.x *= _f;
						this.y *= _f;
					}
					this.Normalize = function() {
						var sqrLen = this.SqrLength();
						if (sqrLen != 0) {
							var factor = 1.0 / sqrt(sqrLen);
							this.x *= factor;
							this.y *= factor;
						}
					}
					this.Normalized = function() {
						var sqrLen = this.SqrLength();
						if (sqrLen != 0) {
							var factor = 1.0 / sqrt(sqrLen);
							return new Vector2(this.x * factor, this.y * factor);
						}
						return new Vector2(0, 0);
					}
				}

				Vector2.Lerp = function(_vec0, _vec1, _t) {
					return new Vector2((_vec1.x - _vec0.x) * _t + _vec0.x, (_vec1.y - _vec0.y) * _t + _vec0.y);
				}

				Vector2.Distance = function(_vec0, _vec1) {
					return sqrt(Vector2.SqrDistance(_vec0, _vec1));
				}

				Vector2.SqrDistance = function(_vec0, _vec1) {
					var x = _vec0.x - _vec1.x;
					var y = _vec0.y - _vec1.y;
					return (x * x + y * y + z * z);
				}

				Vector2.Scale = function(_vec0, _vec1) {
					return new Vector2(_vec0.x * _vec1.x, _vec0.y * _vec1.y);
				}

				Vector2.Min = function(_vec0, _vec1) {
					return new Vector2(Math.min(_vec0.x, _vec1.x), Math.min(_vec0.y, _vec1.y));
				}

				Vector2.Max = function(_vec0, _vec1) {
					return new Vector2(Math.max(_vec0.x, _vec1.x), Math.max(_vec0.y, _vec1.y));
				}

				Vector2.ClampMagnitude = function(_vec0, _len) {
					var vecNorm = _vec0.Normalized;
					return new Vector2(vecNorm.x * _len, vecNorm.y * _len);
				}

				Vector2.Sub = function(_vec0, _vec1) {
					return new Vector2(_vec0.x - _vec1.x, _vec0.y - _vec1.y, _vec0.z - _vec1.z);
				}

				function EulerMass(_x, _y, _mass, _drag) {
					this.position = new Vector2(_x, _y);
					this.mass = _mass;
					this.drag = _drag;
					this.force = new Vector2(0, 0);
					this.velocity = new Vector2(0, 0);
					this.AddForce = function(_f) {
						this.force.Add(_f);
					}
					this.Integrate = function(_dt) {
						var acc = this.CurrentForce(this.position);
						acc.Div(this.mass);
						var posDelta = new Vector2(this.velocity.x, this.velocity.y);
						posDelta.Mul(_dt);
						this.position.Add(posDelta);
						acc.Mul(_dt);
						this.velocity.Add(acc);
						this.force = new Vector2(0, 0);
					}
					this.CurrentForce = function(_pos, _vel) {
						var totalForce = new Vector2(this.force.x, this.force.y);
						var speed = this.velocity.Length();
						var dragVel = new Vector2(this.velocity.x, this.velocity.y);
						dragVel.Mul(this.drag * this.mass * speed);
						totalForce.Sub(dragVel);
						return totalForce;
					}
				}

				function ConfettiPaper(_x, _y) {
					this.pos = new Vector2(_x, _y);
					this.rotationSpeed = (random() * 600 + 800);
					this.angle = DEG_TO_RAD * random() * 360;
					this.rotation = DEG_TO_RAD * random() * 360;
					this.cosA = 1.0;
					this.size = 5.0;
					this.oscillationSpeed = (random() * 1.5 + 0.5);
					this.xSpeed = 40.0;
					this.ySpeed = (random() * 60 + 50.0);
					this.corners = new Array();
					this.time = random();
					var ci = round(random() * (colors.length - 1));
					this.frontColor = colors[ci][0];
					this.backColor = colors[ci][1];
					for (var i = 0; i < 4; i++) {
						var dx = cos(this.angle + DEG_TO_RAD * (i * 90 + 45));
						var dy = sin(this.angle + DEG_TO_RAD * (i * 90 + 45));
						this.corners[i] = new Vector2(dx, dy);
					}
					this.Update = function(_dt) {
						this.time += _dt;
						this.rotation += this.rotationSpeed * _dt;
						this.cosA = cos(DEG_TO_RAD * this.rotation);
						this.pos.x += cos(this.time * this.oscillationSpeed) * this.xSpeed * _dt
						this.pos.y += this.ySpeed * _dt;
						if (this.pos.y > ConfettiPaper.bounds.y) {
							this.pos.x = random() * ConfettiPaper.bounds.x;
							this.pos.y = 0;
						}
					}
					this.Draw = function(_g) {
						if (this.cosA > 0) {
							_g.fillStyle = this.frontColor;
						} else {
							_g.fillStyle = this.backColor;
						}
						_g.beginPath();
						_g.moveTo((this.pos.x + this.corners[0].x * this.size) * retina, (this.pos.y + this.corners[0].y * this.size * this.cosA) * retina);
						for (var i = 1; i < 4; i++) {
							_g.lineTo((this.pos.x + this.corners[i].x * this.size) * retina, (this.pos.y + this.corners[i].y * this.size * this.cosA) * retina);
						}
						_g.closePath();
						_g.fill();
					}
				}

				ConfettiPaper.bounds = new Vector2(0, 0);

				function ConfettiRibbon(_x, _y, _count, _dist, _thickness, _angle, _mass, _drag) {
					this.particleDist = _dist;
					this.particleCount = _count;
					this.particleMass = _mass;
					this.particleDrag = _drag;
					this.particles = new Array();
					var ci = round(random() * (colors.length - 1));
					this.frontColor = colors[ci][0];
					this.backColor = colors[ci][1];
					this.xOff = (cos(DEG_TO_RAD * _angle) * _thickness);
					this.yOff = (sin(DEG_TO_RAD * _angle) * _thickness);
					this.position = new Vector2(_x, _y);
					this.prevPosition = new Vector2(_x, _y);
					this.velocityInherit = (random() * 2 + 4);
					this.time = random() * 100;
					this.oscillationSpeed = (random() * 2 + 2);
					this.oscillationDistance = (random() * 40 + 40);
					this.ySpeed = (random() * 40 + 80);
					for (var i = 0; i < this.particleCount; i++) {
						this.particles[i] = new EulerMass(_x, _y - i * this.particleDist, this.particleMass, this.particleDrag);
					}
					this.Update = function(_dt) {
						var i = 0;
						this.time += _dt * this.oscillationSpeed;
						this.position.y += this.ySpeed * _dt;
						this.position.x += cos(this.time) * this.oscillationDistance * _dt;
						this.particles[0].position = this.position;
						var dX = this.prevPosition.x - this.position.x;
						var dY = this.prevPosition.y - this.position.y;
						var delta = sqrt(dX * dX + dY * dY);
						this.prevPosition = new Vector2(this.position.x, this.position.y);
						for (i = 1; i < this.particleCount; i++) {
							var dirP = Vector2.Sub(this.particles[i - 1].position, this.particles[i].position);
							dirP.Normalize();
							dirP.Mul((delta / _dt) * this.velocityInherit);
							this.particles[i].AddForce(dirP);
						}
						for (i = 1; i < this.particleCount; i++) {
							this.particles[i].Integrate(_dt);
						}
						for (i = 1; i < this.particleCount; i++) {
							var rp2 = new Vector2(this.particles[i].position.x, this.particles[i].position.y);
							rp2.Sub(this.particles[i - 1].position);
							rp2.Normalize();
							rp2.Mul(this.particleDist);
							rp2.Add(this.particles[i - 1].position);
							this.particles[i].position = rp2;
						}
						if (this.position.y > ConfettiRibbon.bounds.y + this.particleDist * this.particleCount) {
							this.Reset();
						}
					}
					this.Reset = function() {
						this.position.y = -random() * ConfettiRibbon.bounds.y;
						this.position.x = random() * ConfettiRibbon.bounds.x;
						this.prevPosition = new Vector2(this.position.x, this.position.y);
						this.velocityInherit = random() * 2 + 4;
						this.time = random() * 100;
						this.oscillationSpeed = random() * 2.0 + 1.5;
						this.oscillationDistance = (random() * 40 + 40);
						this.ySpeed = random() * 40 + 80;
						var ci = round(random() * (colors.length - 1));
						this.frontColor = colors[ci][0];
						this.backColor = colors[ci][1];
						this.particles = new Array();
						for (var i = 0; i < this.particleCount; i++) {
							this.particles[i] = new EulerMass(this.position.x, this.position.y - i * this.particleDist, this.particleMass, this.particleDrag);
						}
					}
					this.Draw = function(_g) {
						for (var i = 0; i < this.particleCount - 1; i++) {
							var p0 = new Vector2(this.particles[i].position.x + this.xOff, this.particles[i].position.y + this.yOff);
							var p1 = new Vector2(this.particles[i + 1].position.x + this.xOff, this.particles[i + 1].position.y + this.yOff);
							if (this.Side(this.particles[i].position.x, this.particles[i].position.y, this.particles[i + 1].position.x, this.particles[i + 1].position.y, p1.x, p1.y) < 0) {
								_g.fillStyle = this.frontColor;
								_g.strokeStyle = this.frontColor;
							} else {
								_g.fillStyle = this.backColor;
								_g.strokeStyle = this.backColor;
							}
							if (i == 0) {
								_g.beginPath();
								_g.moveTo(this.particles[i].position.x * retina, this.particles[i].position.y * retina);
								_g.lineTo(this.particles[i + 1].position.x * retina, this.particles[i + 1].position.y * retina);
								_g.lineTo(((this.particles[i + 1].position.x + p1.x) * 0.5) * retina, ((this.particles[i + 1].position.y + p1.y) * 0.5) * retina);
								_g.closePath();
								_g.stroke();
								_g.fill();
								_g.beginPath();
								_g.moveTo(p1.x * retina, p1.y * retina);
								_g.lineTo(p0.x * retina, p0.y * retina);
								_g.lineTo(((this.particles[i + 1].position.x + p1.x) * 0.5) * retina, ((this.particles[i + 1].position.y + p1.y) * 0.5) * retina);
								_g.closePath();
								_g.stroke();
								_g.fill();
							} else if (i == this.particleCount - 2) {
								_g.beginPath();
								_g.moveTo(this.particles[i].position.x * retina, this.particles[i].position.y * retina);
								_g.lineTo(this.particles[i + 1].position.x * retina, this.particles[i + 1].position.y * retina);
								_g.lineTo(((this.particles[i].position.x + p0.x) * 0.5) * retina, ((this.particles[i].position.y + p0.y) * 0.5) * retina);
								_g.closePath();
								_g.stroke();
								_g.fill();
								_g.beginPath();
								_g.moveTo(p1.x * retina, p1.y * retina);
								_g.lineTo(p0.x * retina, p0.y * retina);
								_g.lineTo(((this.particles[i].position.x + p0.x) * 0.5) * retina, ((this.particles[i].position.y + p0.y) * 0.5) * retina);
								_g.closePath();
								_g.stroke();
								_g.fill();
							} else {
								_g.beginPath();
								_g.moveTo(this.particles[i].position.x * retina, this.particles[i].position.y * retina);
								_g.lineTo(this.particles[i + 1].position.x * retina, this.particles[i + 1].position.y * retina);
								_g.lineTo(p1.x * retina, p1.y * retina);
								_g.lineTo(p0.x * retina, p0.y * retina);
								_g.closePath();
								_g.stroke();
								_g.fill();
							}
						}
					}
					this.Side = function(x1, y1, x2, y2, x3, y3) {
						return ((x1 - x2) * (y3 - y2) - (y1 - y2) * (x3 - x2));
					}
				}
				ConfettiRibbon.bounds = new Vector2(0, 0);
				confetti = {};
				confetti.Context = function(id) {
					var i = 0;
					var canvas = document.getElementById(id);
					var canvasParent = canvas.parentNode;
					var canvasWidth = canvasParent.offsetWidth;
					var canvasHeight = canvasParent.offsetHeight;
					canvas.width = canvasWidth * retina;
					canvas.height = canvasHeight * retina;
					var context = canvas.getContext('2d');
					var interval = null;
					var confettiRibbons = new Array();
					ConfettiRibbon.bounds = new Vector2(canvasWidth, canvasHeight);
					for (i = 0; i < confettiRibbonCount; i++) {
						confettiRibbons[i] = new ConfettiRibbon(random() * canvasWidth, -random() * canvasHeight * 2, ribbonPaperCount, ribbonPaperDist, ribbonPaperThick, 45, 1, 0.05);
					}
					var confettiPapers = new Array();
					ConfettiPaper.bounds = new Vector2(canvasWidth, canvasHeight);
					for (i = 0; i < confettiPaperCount; i++) {
						confettiPapers[i] = new ConfettiPaper(random() * canvasWidth, random() * canvasHeight);
					}
					this.resize = function() {
						canvasWidth = canvasParent.offsetWidth;
						canvasHeight = canvasParent.offsetHeight;
						canvas.width = canvasWidth * retina;
						canvas.height = canvasHeight * retina;
						ConfettiPaper.bounds = new Vector2(canvasWidth, canvasHeight);
						ConfettiRibbon.bounds = new Vector2(canvasWidth, canvasHeight);
					}
					this.start = function() {
						this.stop()
						var context = this;
						this.update();
					}
					this.stop = function() {
						cAF(this.interval);
					}
					this.update = function() {
						var i = 0;
						context.clearRect(0, 0, canvas.width, canvas.height);
						for (i = 0; i < confettiPaperCount; i++) {
							confettiPapers[i].Update(duration);
							confettiPapers[i].Draw(context);
						}
						for (i = 0; i < confettiRibbonCount; i++) {
							confettiRibbons[i].Update(duration);
							confettiRibbons[i].Draw(context);
						}
						this.interval = rAF(function() {
							confetti.update();
						});
					}
				}
				var confetti = new confetti.Context('confetti');
				confetti.start();
				window.addEventListener('resize', function(event){
					confetti.resize();
				});
			});

</script>

@endsection
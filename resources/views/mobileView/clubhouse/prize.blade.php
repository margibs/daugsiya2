
@extends('clubhouse.layout')
	
@section('custom-styles')
<style type="text/css">
body{
  background: #fff url(http://susanwins.com/uploads/72437_bg-mobile-prizeroom.jpg) 23% top;
}
.roulette {
    position: relative;
    width: 145%;
    top: 0;
    left: -74%;
    bottom: 0%;
    padding-bottom: 145%;
    background-color: transparent;
    background-size: 100% 100%;
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
  /* width: 205px;
  height: 205px; */
 /*  top: 357px;
 left: 830px; */

   /* left: -103px;
    top: 178px; */
	
	width: 51%;
    height: 36%;
    left: -26%;
    top: 32%;
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

.bgwrapper{
    width: 100%;
    float: left;
    left: 0;
    /* top: 112px; */
    /* overflow: hidden; */
    bottom: 0;
    position: relative;
    height: auto;



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
   top: 44%;
    left: 99%;
border-bottom: 10px solid transparent;
    border-top: 10px solid transparent;
    border-left: 10px solid #fff;
}
.shadow{
  width: 560px;
  height: 560px;
  background: transparent;
  position: absolute;
 /*  top: 180px;
 left: 653px; */
  border-radius: 50%;
  -moz-box-shadow: 0px 0px 19px -2px rgb(62, 60, 60);
  -webkit-box-shadow: 0px 0px 19px -2px rgb(62, 60, 60);
  box-shadow: 0px 0px 19px -2px rgb(62, 60, 60);
}
#roombg{position: relative;}

.entercode{
    position: absolute;
  /*   top: 387px;
  left: 807px; */

    /*   top: 187px;
        left: 135px; */

            top: 50%;
    left: 50%;
    margin-top: -116px;
    margin-left: -115px;
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
  /* top: 732px;
  left: 815px; */
      left: -102px;
    top: 177px;
}
.congrats{
    position: absolute;
    top: 50%;
    left: 0px;
    bottom: 0;
    z-index: -5;
    visibility: hidden;
    text-align: center;
    width: 100%;
    float: left;
    color: rgb(255, 255, 255);
    height: 295px;
    font-family: "Work Sans";
    font-weight: 600;
    margin-top: -147.5px;
    word-wrap: break-word;
    background: rgba(0, 0, 0, 0.83);
}
.congrats h3{
	font-size: 24px;
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
	display: none;
	pointer-events: none;
}
@media(min-width: 600px){
  body {
    background: #fff url(http://susanwins.com/uploads/61773_tab-prize-bg.jpg) no-repeat 100% 3%;
  }
}
</style>
@endsection
    
    @section('content-menu')
       <a href="#" class="waves-effect back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a>
@endsection

 @section('navbar-title', 'Home')
@section('content')
   <div class="app-page" data-page="main">
   <div class="app-topbar"></div>
  <div class="app-content">
        		<canvas id="confetti" width="1" height="1" style="display:none;"></canvas>

	<div class="bgwrapper">	
				 
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

		          <div class="price">
		          </div>


	</div>
  </div>
  </div>
     

@endsection


@section('app-js')
<script src="{{ asset('js/jquery.m.fortune.js') }}"></script>
<script src="{{ asset('js/roulette.js') }}"></script>
  <script>
       $(document).on('ready', function(){

                 $('.app-page').css({ 'display' : 'block' });
        $('#mainLoading').remove();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

             App.controller('main', function(page){

             	 $(page).on('appShow', function(){
                        $('#navbarTitle').text('Prizeroom');

                        });


             		$(page).find('.entercode a').click(function() { 

	    		prizeCode = $(page).find('#prizeCode').val();

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
	    						$(page).find('.error').addClass('topz vizible animated shake');
	    						function removeanimation(){
								  $(page).find('.entercode span.error').removeClass(' vizible animated shake');		   
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


		    		$(page).find('.entercode').animate({ 'left' : 0 });
			    	

				    	function showspintext(){
						  $(page).find('.spinner span').fadeToggle();
						  $(page).find('.entercode').addClass('none');

						  
						}
						setTimeout(showspintext, 700);

				    	function removeanimation(){
						  $(page).find('.entercode span.error').removeClass(' animated shake');		   
						}
						setTimeout(removeanimation, 2000);

		    	    var $r = $(page).find('.roulette').fortune(24);

					var clickHandler = function() {
					  $(page).find('.spinner').off('click');
					  //$('.spinner span').hide();

					  if(!userSpinned){
					  	userSpinned = true;


					  	var rand_number = Math.floor((Math.random() * 100) + 1);

			      if(rand_number >= 1 && rand_number <= 75){

			         console.log('Casino Bonus');
			        prices = [2,6,18];

			        price = prices[Math.floor(Math.random()*prices.length)];

			      }else{
			        console.log('Voucher');

			        prices = [5,7,21];

			        price = prices[Math.floor(Math.random()*prices.length)];
			      }

					  	$r.spin(price).done(function(price) {
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

						      			$(page).find('.bgwrapper').prepend('<div class="congrats"><h3>Congratulations! You have won '+result.prize.name+'   </h3><a href="'+result.prize.prize_link+'"> Click here to register an account and claim your bonus</a><img src="{{url("images")}}/gift.png" alt=""></div>');
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

 				App.load('main');

       });
  </script>

@endsection
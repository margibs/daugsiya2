@extends('clubhouse.layout')




@section('page-title', 'Login')

@section('background', 'default')

 @section('switch-button')
 	  <button class="categ-button"> <a href="{{ url('welcome') }}"> Login</a></button>
@endsection

@section('split-content')

<style type="text/css">
#roombg{
    top: 0;
    left: -45px;
    width: 110%;
}
.singupcontainer{
	  margin-top: 200px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    background: rgba(249, 247, 245, 0.85);
/*
    background: rgb(238,238,238);
    background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(251,251,251,0.95);
    background: -webkit-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(251,251,251,0.95);
    background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(251,251,251,0.95);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#eeeeee',GradientType=0 );*/

    position: absolute;
    top: 0;
    z-index: 2;
}
.signupform{
  position: absolute;
  top: 52%;
  left: 30%;
  z-index: 2;
  background:rgba(255, 255, 255, 0.85);
  padding: 25px 20px;
  border-radius: 3px;
  overflow: hidden;
  -moz-box-shadow: 0 0 10px -2px #000;
  -webkit-box-shadow: 0 0 10px -2px #000;
  box-shadow: 0 0 10px -2px #000;
  width: 310px;
}
.signupform h3{
    font-family: 'Work Sans',Roboto,Arial,Helvetica,sans-serif;
    font-size: 28px;
    margin-bottom: 20px;
    font-weight: 600;
}
.singupcontainer .signupform h1{
	font-family: 'Work Sans';
    font-weight: 700;
    font-size: 35px;
    text-align: center;
    margin-bottom: 20px;
    text-transform: uppercase;
}
.signupform input[type="text"], .signupform input[type="password"], .signupform input[type="email"]{
    background: #FFFFFF;
    border: medium none;
    padding: 12px 20px;
    font-size: 17px;
    font-family: Roboto;
    border-radius: 2px;
    margin-bottom: 12px;
    width: 100%;
    color: #000;
/*    -moz-box-shadow: inset 0 0 10px -2px #ABABAB;
    -webkit-box-shadow:inset 0 0 10px -2px #ABABAB;
    box-shadow: inset 0 0 10px -2px #ABABAB;*/
}
.signupform button{
  background: rgb(242, 155, 32);
	/*background: rgb(230,206,172);
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2U2Y2VhYyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNkNmI1ODgiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: -moz-linear-gradient(top,  rgba(230,206,172,1) 0%, rgba(214,181,136,1) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(230,206,172,1)), color-stop(100%,rgba(214,181,136,1)));
  background: -webkit-linear-gradient(top,  rgba(230,206,172,1) 0%,rgba(214,181,136,1) 100%);
  background: -o-linear-gradient(top,  rgba(230,206,172,1) 0%,rgba(214,181,136,1) 100%);
  background: -ms-linear-gradient(top,  rgba(230,206,172,1) 0%,rgba(214,181,136,1) 100%);
  background: linear-gradient(to bottom,  rgba(230,206,172,1) 0%,rgba(214,181,136,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6ceac', endColorstr='#d6b588',GradientType=0 );*/
      margin-top: 10px;
  border: none;
  display: block;
  width: 100%;
  padding: 10px;
  font-family: Roboto;
  font-weight: 600;
  color: #fff;
  font-size: 23px;
  /*border: 1px solid #ba9f78;*/
  border-radius: 4px;
  cursor: pointer;

  /*margin-top: 12px;*/

}
label{
font-family: Roboto;
    font-weight: 400;
    display: block;
    color: #ECA446;
    margin-bottom: 10px;
    font-size: 17px;
}
.singupcontainer .benefitlist ul li{
	font-family: 'Work Sans';
}
.errors{
  background: rgba(243, 56, 56, 0.8) none repeat scroll 0% 0%;
  padding: 10px;
  margin-bottom: 10px;
  color: rgb(255, 188, 188);
  font-family: Roboto;
  font-size: 13px;
  line-height: 16px;
  margin-top: -13px;
}
.singupbox{
    position: absolute;
    top: auto;
    bottom: 207px;
    right: 30%;
    z-index: 3;
    background: rgba(255, 255, 255, 0.85);
    padding: 58px 35px;
    border-radius: 3px;
    overflow: hidden;
    -moz-box-shadow: 0 0 10px -2px #000;
    -webkit-box-shadow: 0 0 10px -2px #000;
    box-shadow: 0 0 10px -2px #000;
    width: 370px;
    font-family: 'Work Sans';
    font-weight: 600;
}
.singupbox p{
    color: #685230;
    font-size: 35px;
    display: block;
    text-align: center;
    margin-bottom: 12px;
}
.singupbox h2{
  color: #000;
  font-size: 47px;
  text-align: center;
  margin-top: 6px;
  font-weight: 800;
}
.singupbox h2 span a{
  text-transform: uppercase;
  color: #eca446;
  text-decoration: none;

}

.susan{
    position: absolute;
    top: auto;
    left: 15%;
    bottom: -5px;
    width: auto;
}
.butler{
    position: absolute;
    bottom: -6px;
    z-index: 2;
    right: 150px;
    width: 800px;
}


.oval-outer{
  position:absolute;
  top: 32%;
  left: 23%;
}
.oval-speech {
    position: absolute;
    width: 378px;
    padding: 66px 35px;
    margin: 1em auto 50px;
    text-align: center;
    color: #fff;
        background: #fff;
/*    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top, rgba(255,214,94,1) 0%, rgba(254,191,4,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,214,94,1)), color-stop(100%,rgba(254,191,4,1)));
    background: -webkit-linear-gradient(top, rgba(255,214,94,1) 0%,rgba(254,191,4,1) 100%);
    background: -o-linear-gradient(top, rgba(255,214,94,1) 0%,rgba(254,191,4,1) 100%);
    background: -ms-linear-gradient(top, rgba(255,214,94,1) 0%,rgba(254,191,4,1) 100%);
    background: linear-gradient(to bottom, rgba(255,214,94,1) 0%,rgba(254,191,4,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffd65e', endColorstr='#febf04',GradientType=0 );*/
    -webkit-border-top-left-radius: 220px 120px;
    -webkit-border-top-right-radius: 220px 120px;
    -webkit-border-bottom-right-radius: 220px 120px;
    -webkit-border-bottom-left-radius: 220px 120px;
    -moz-border-radius: 220px / 120px;
    border-radius: 228px / 135px;
    border: 4px solid #FFE9AA;
    -moz-transform: rotate(-6deg);
    -webkit-transform: rotate(-6deg);
    transform: rotate(-6deg);
}
.oval-speech p{
       font-family: 'Work Sans',Roboto,Arial,Helvetica,sans-serif;
    font-size: 49px;
    font-weight: 600;
    line-height: 43px;
    color: #000;
    /*text-shadow: 0px 3px 4px rgb(253, 189, 0);*/
}
.oval-speech p span{
  color: #A51615;
}
/*.oval-speech:before {
    content: "";
    position: absolute;
    z-index: -1;
    bottom: -30px;
    right: 50%;
    height: 30px;
    border-right: 60px solid #5a8f00;
    background: #5a8f00;
    -webkit-border-bottom-right-radius: 80px 50px;
    -moz-border-radius-bottomright: 80px 50px;
    border-bottom-right-radius: 80px 50px;
    -webkit-transform: translate(0, -2px);
    -moz-transform: translate(0, -2px);
    -ms-transform: translate(0, -2px);
    -o-transform: translate(0, -2px);
    transform: translate(0, -2px);
}
.oval-speech:after {
    content: "";
    position: absolute;
    z-index: -1;
    bottom: -30px;
    right: 50%;
    width: 60px;
    height: 30px;
    background: #fff;
    -webkit-border-bottom-right-radius: 40px 50px;
    -moz-border-radius-bottomright: 40px 50px;
    border-bottom-right-radius: 40px 50px;
    -webkit-transform: translate(-30px, -2px);
    -moz-transform: translate(-30px, -2px);
    -ms-transform: translate(-30px, -2px);
    -o-transform: translate(-30px, -2px);
    transform: translate(-30px, -2px);
}*/

@media(max-width: 1680px){
  #roombg {
    top: 0;
    left: -130px;
    width: 120%;
}
  .susan {
      top: auto;
      left: 8%;
      width: auto;
      bottom: -10px;
  }
  .butler {
    top: auto;
    right: 35px;
    width: auto;
    bottom: -10px;
  }
  .signupform {
    left: 25%;
    width: 320px;
  }
  .singupbox {
    right: 29%;
    top: auto;
    bottom: 212px;
  }
  .oval-outer {
    position: absolute;
    top: 26%;
    left: 17%;
  }
}
/*@media(max-width: 1679px){
  .susan {
      top: 23%;
      left: 0;
      width: 800px;
  }
  .butler{
    top: 41%;
    right: 35px;
    width: 685px;
  }
  .singupbox h2{
    font-size: 45px;
  }
  .singupbox{
    right: 28%;
    padding: 66px 35px;
  }
  .signupform{
    left: 30%;
    width: 270px;
  }
}*/
@media(max-width: 1440px){
  #roombg {
      width: 117%;
      left: -130px;
      top: 10px;
  }
.susan {
    top: auto;
    left: 6%;
    width: auto;
    bottom: -10px;
}
.butler {
    top: auto;
    right: 0;
    bottom: -10px;
    width: 750px;
}
  .signupform {
      top: auto;
      left: 25%;
      bottom: 175px;
  }
  .singupbox h2{
      font-size: 46px;
  }
  .singupbox{
    top: auto;
    right: 29%;
    padding: 30px 20px;
    width: 325px;
        bottom: 189px;
  }
  .oval-outer {
    position: absolute;
    top: auto;
    left: 14%;
    bottom: 690px;
}
}
@media(max-width: 1366px){
  .oval-outer {
    top: 11%;
    left: 19%;
  }
  .oval-speech{
    padding: 47px 0px;
    width: 338px;
    border-radius: 223px / 115px;
    top: 40px;
    left: -70px;
  }
  .oval-speech p{
    font-size: 49px;
    line-height: 39px;
    color: #151515;
  }
  #roombg{
    top: 0px;
    left: -112px;
    width: 115%;
  }
  .as ul li p{
    top: 110px;
    left: 90px;
  }
  .as ul li a{
  	width: 150px;
    height: 150px;
  }
  .as ul li a img{
  	 width: 150px;
  }
  .arrowselection img{
  	right: 22px;
    bottom: -1px;
    width: 25px!important;
  }
  .as ul li.slot {
    top: 220px;
    left: -198px;
  }
  .as ul li.profile {
    left: 238px;
    top: -20px;
  }
  .as ul li.chat {
    top: 220px;
    left: 240px;
  }
  .as ul li.prize {
    left: 680px;
    top: 200px;
 }
 .signupform{
    top: 43%;
    left: 20%;
    width: 310px;
    bottom: auto;
 }
 .singupbox {
    top: 276px;
    right: 26%;
    padding: 42px 20px;
    width: 373px;
    bottom: auto;
}
.singupbox h2 {
    font-size: 45px;
}
 .susan {
    bottom: -28px;
    top: auto;
    left: 3%;
    width: 438px;
}
 .butler {
    top: auto;
    z-index: 2;
    right: 0;
    width: 700px;
    bottom: -30px;
}
}
@media(max-width: 1280px){
  #roombg {
    left: -62px;
    width: 106%;
  }
  .susan {
    top: 120px;
    left: -140px;
    width: 710px;
  }
  .butler {
    top: 35%;
    right: -50px;
    width: 580px;
  }
  .signupform {
    top: 44%;
    left: 24%;
  }
  .singupbox {
    top: 49.5%;
    right: 27%;
    width: 230px;
 }
}
@media(max-width: 1199px){
  #roombg {
      left: -122px;
      width: 127%;
  }
  .susan {
    top: 310px;
    left: 30px;
    width: 450px;
  }
  .butler {
    top: 39%;
    right: -87px;
    width: 690px;
  }
  .singupbox {
    top: 44.2%;
    right: 23%;
    width: 320px;
  }
}
@media(max-width: 1024px){
  #roombg{
    left: -192px;
    width: 145%;
  }
  .susan {
    top: 310px;
    left: -40px;
    width: 450px;
  }
  .butler {
   top: auto;
    right: -137px;
    width: 660px;
    bottom: 0;
  }
  .singupbox {
    top: 49.2%;
    right: 19%;
    width: 320px;
  }
  .signupform {
    top: 44%;
    left: 19%;
  }
  .singupbox h2 {
    font-size: 44px;
  }
  .susan {
    top: auto;
    left: -20px;
    width: 400px;
    bottom: -10px;
  }
  .butler {
    top: auto;
    right: -120px;
    width: 620px;
    bottom: 0;
  }
  .signupform {
    top: 44%;
    left: 18%;
  }
  .singupbox {
    top: 50.2%;
    right: 19%;
    width: 320px;
  }
  .oval-outer {
    top: 19%;
    left: 13%;
  }
}
@media(max-width: 768px){
  .showor{
        display: block;
    text-align: center;
    font-size: 40px;
    color: #a79172;
  }
#roombg {
    left: -512px;
    width: 265%;
}
.susan{
  width: auto;
}
.butler, .oval-outer{
    display: none;
  }
  .signupform {
    top: 49%;
    left: 230px;
    width: 500px;
        padding-bottom: 25px;
  }
  .singupbox{
    top: 18%;
    left: 230px;
    right: auto;
    width: 500px; 
  }
  .singupbox h2{
     font-size: 60px;
  }
  .signupform h3{
        font-size: 35px;
  }
  label {
    font-size: 25px;
  }
  .signupform input[type="text"], .signupform input[type="password"], .signupform input[type="email"]{
        font-size: 30px;
  }
  .signupform button{
        font-size: 40px;
  }
}
</style>



	<div class="bgwrapper">
		<img id="roombg" src="{{url('images/clubhouse')}}/front-house.jpg" alt="">		      	

					


					  <div class="container_24">
    							<div class="grid_12">	
                    <div class="oval-outer">
                       <blockquote class="oval-speech">
                          <p> <span>Have Fun</span> Come on in!  </p>
                        </blockquote>
                    </div>
                        
    								<div class="signupform">									

                    
    									<form action="{{ url('login/post') }}" method="POST">
    									{!! csrf_field() !!}

    										
    										@if(count($errors->all()) > 0)

    											<ul class="errors">
    												@foreach($errors->all() as $error)
    													
    													<li>{{ $error }}</li>
    														
    												@endforeach
    											</ul>
    										@endif

    										<section>

                          <h3> Enter Login Details </h3>
    										<div class="form-group">
    											<label for="">Enter your Email</label>
    												<input type="text" name="email">
    										</div>
    										<div class="form-group">
    											<label for="">Your Password</label>
    												<input type="password" name="password">
    										</div>
    										</section>
    										<input type="checkbox" name="remember" checked style="display:none;">
    										<button>Let me in</button>

    									</form>
    								</div>
    							</div>
                  <div class="grid_12">
                    <div class="singupbox">
                      <p> Not a member? </p>
                      <h2> Sign Up Now For <span> <a href="{{ url('/signup') }}"> Free! </a> </span> </h2> 
                      <b class="showor"> or </b>      
                    </div>
                  </div>  
					  </div>

            <img src="{{url('images')}}/front-susan2.png" class="susan">
            <img src="{{url('images')}}/front-butler.png" class="butler">

		</div>

@endsection

@section('custom_scripts')

<script type="text/javascript">
  
   // = true;
  // $(document).ready(function(){
  //   $('.susan').addClass('animated slideInLeft');
  //   $('.signupform').addClass('animated slideInUp');
  //   $('.butler').addClass('animated slideInRight');    
  //   $('.singupbox').addClass('animated slideInUp');
  // });
</script>

@endsection
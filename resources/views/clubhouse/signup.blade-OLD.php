

@extends('clubhouse.layout')




@section('page-title', 'Login')

@section('background', 'default')

 @section('switch-button')
 	  <button class="categ-button"> <a href="{{ url('welcome') }}">Login / Sign-Up</a></button>
@endsection

@section('split-content')

<style type="text/css">
  .bgwrapper{
    padding-top: 100px;
  }
  .formBox{
    margin-right: 110px;
    margin-left: 20px;
    border: 1px solid #EAEAEA;
    padding: 20px 30px;
    border-radius: 3px;
  }
  .formBox h1{
    font-family: 'Work Sans',Roboto,Helvetica,Arial,Sans-serif;
    font-size: 50px;
  }
  .formBox h2{
    color: #cccccc;
    font-family: Roboto,Helvetica,Arial,Sans-serif;
    font-weight: 500;
    margin: 8px 0 20px 0;
    font-size: 18px;
  }
  .formBox input[type=text], .formBox input[type=password], .formBox input[type=email]{
    font-family: Roboto;
    padding: 10px;
    width: 100%;
    border-radius: 2px;
    border: 1px solid #EFEFEF;
    font-size: 20px;
    margin: 7px 0;
  }
  .formBox button{
    background: #dfa522;
    background: -moz-linear-gradient(top,  #dfa522 0%, #f2c154 100%);
    background: -webkit-linear-gradient(top,  #dfa522 0%,#f2c154 100%);
    background: linear-gradient(to bottom,  #dfa522 0%,#f2c154 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dfa522', endColorstr='#f2c154',GradientType=0 );
    color: #fff;
    font-family: 'Work Sans',Roboto,Helvetica,Arial,Sans-serif;
    border: 1px solid #F5C863;
    font-size: 30px;
    font-weight: 500;
    padding: 10px 20px;
    width: 100%;
    border-bottom: 2px solid #E1A828;
    border-radius: 2px;
    margin-top: 20px;
    cursor: pointer;
    -moz-box-shadow: 0 0 10px -2px #B3B3B3;
    -webkit-box-shadow: 0 0 10px -2px #B3B3B3;
    box-shadow: 0 0 10px -2px #B3B3B3;
    text-shadow: 0px 1px 2px rgb(167, 121, 17);
  }
  .formBox .terms{
    font-family: Roboto;
    font-size: 11px;
    line-height: 16px;
    margin: 10px 0;
    color: #B7B4B4;
  }
  .formBox .terms a{
    text-decoration:none;
    color: #982A29
  }
  .benefits{
     margin-top: 10px;
  }
  .benefits h2{
    font-family: 'Work Sans';
    font-size: 36px;
    line-height: 31px;
  }
  .benefits ul li{
    font-family: Roboto;
    font-weight: 600;
    font-size: 18px;
    margin: 20px 0;
  }
  .benefits ul li i{
    font-size: 40px;
    margin-right: 10px;
    position: relative;
    top: 8px;
  }
  .benefits ul{
        margin-top: 30px;
  }
</style>



	<div class="bgwrapper">
	<!-- 	<img id="roombg" src="{{url('images/clubhouse')}}/front-house.png" alt="">		      	
 -->


	<div class="container">

		  <div class="row">
                <div class="col-lg-12">
                  <div class="formBox">
                    <h1> Sign-up </h1>
                    <h2> It's free and always will be </h2>

                    <form action="{{ url('signup/post') }}" method="POST">
                      {!! csrf_field() !!}
                        
                        @if(count($errors->all()) > 0)

                          <ul class="errors">
                            @foreach($errors->all() as $error)
                              
                              <li>{{ $error }}</li>
                                
                            @endforeach
                          </ul>
                        @endif

                        <section>
                        <div class="form-group">
                          <!-- <label for="">Enter your Firstname</label> -->
                            <input type="text" name="firstname" placeholder="Firstname">
                        </div>
                        <div class="form-group">
                         <!--  <label for="">Enter your Lastname</label> -->
                            <input type="text" name="lastname" placeholder="Lasttname">
                        </div>
                        <div class="form-group">
                          <!-- <label for="">Enter your Email</label> -->
                            <input type="text" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                          <!-- <label for="">Type a Password</label> -->
                            <input type="password" name="password" placeholder="Password">
                        </div>
                      <!--   <div class="form-group" style='display:none;'>
                        <label for="">Confirm Password</label>
                          <input type="password" name="password_confirmation">
                      </div> -->
                        </section>
                        
                        <button> Sign me up! </button>
                        <p class="terms"> By clicking Sign Up, you agree to our <a href="#"> Terms </a> and that you have read our <a href="#"> Data Policy </a>, including our Cookie Use. </p>

                      </form>

                  </div>    
                </div>  

                 <div class="col-lg-12">
                      
                      <div class="benefits">
                        <h2> Connect with friends and the world around you on Susanwins</h2>
                        <ul>
                          <li> <i class="ion-images" style="color: #10A590;"></i> See photos and updates from friends in News Feed. </li>
                          <li> <i class="ion-easel" style="color: #CC6464;"></i> Share what's new in your life on your Timeline. </li>
                          <li> <i class="ion-heart" style="color: #AC070A;"></i> Find more of what you're looking for with Facebook Search. </li>
                        </ul>
                      </div>
                  
			           </div>
							   
					</div>
    </div>
  			
  </div>


@endsection






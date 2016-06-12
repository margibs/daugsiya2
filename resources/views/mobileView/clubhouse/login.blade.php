
@extends('clubhouse.layout')
  
@section('custom-styles')
<style type="text/css">
body{
  background: #E9F6FE url(http://susanwins.com/uploads/61221_signup-bg-mobile.jpg) center 17% no-repeat;
}
.app-page .app-content {
    padding-top: 15px!important;
}
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
  .formBox .terms {
    font-family: helvetica,Arial,Sans-serif;
    font-size: 12px;
    text-align: center;
        margin: 16px 0;
    color: #B7B4B4;
}
  .formBox .terms a{
    text-decoration:none;
    color: #F5C582
  }
      
  form button{
    background: #f19b20!important;
    display: block!important;
    width: 95%;
    font-family: 'Work Sans';
    text-transform: initial!important;
    font-size: 28px;
    font-weight: 600;
    height: auto!important;
    padding: 10px!important;
    letter-spacing: 0!important;
    margin-left: 10px;
  }
  .input-field{
    margin-top: 0;
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
  form input[type=text], form input[type=password], form input[type=email]{
    background: #fff;
    /* border: 1px solid #E6E3E3; */
    /* border-radius: 4px; */
    border-bottom: 1px solid #F3DCBB;
    text-align: center;
    padding: 0 10px;
    width: 93%;
    font-family: Roboto,Helvetica,Arial,Sans-serif;
    font-size: 16px;
    color: #000;
    box-shadow: 0 0 0 0;
    margin-bottom: 6px;
  }
  input:not([type]).valid, input:not([type]):focus.valid, input[type=text].valid, input[type=text]:focus.valid, input[type=password].valid, input[type=password]:focus.valid, input[type=email].valid, input[type=email]:focus.valid, input[type=url].valid, input[type=url]:focus.valid, input[type=time].valid, input[type=time]:focus.valid, input[type=date].valid, input[type=date]:focus.valid, input[type=datetime].valid, input[type=datetime]:focus.valid, input[type=datetime-local].valid, input[type=datetime-local]:focus.valid, input[type=tel].valid, input[type=tel]:focus.valid, input[type=number].valid, input[type=number]:focus.valid, input[type=search].valid, input[type=search]:focus.valid, textarea.materialize-textarea.valid, textarea.materialize-textarea:focus.valid {
    border-bottom:none;
    box-shadow: 0 0 0 0!important;
  }
  header{
    display: none;
  }
  .signinlogo{
    text-align: center;
  }
  .signinlogo img{
    width: 170px;
    margin: 20px 0
  }
  .signuplink{
    text-align: center;
    font-size: 20px;
  }
  .signuplink a{
    color: #F19B20;
    font-weight: 700;
  }
  .errors{
    text-align: center;
    background: #E41A29;
    color: #fff;
    padding: 10px;
    border-radius: 10px;
    font-size: 15px;
    margin: 10px 20px;
  }
</style>

@endsection

 @section('navbar-title', 'Login')

  @section('content')

      <div class="app-page" data-page="main">
  <div class="app-content">
        
                
  
               <div class="row">

                  <div class="col-xs-24">
                    <div class="signinlogo">
                      <a href="{{ url('/') }}"> <img src="http://susanwins.com/uploads/52424_logo.png" alt=""> </a>
                    </div>
                  </div>

                   @if(count($errors->all()) > 0)
                        <ul class="errors">
                          @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      @endif

                  <form class="col s12" action="{{ url('login/post') }}" method="POST">
                  {!! csrf_field() !!}
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="email" type="text" class="validate" name="email" placeholder="Email">
                        
                      </div>
                      <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password" placeholder="Password">
                      <!--   <label for="password">Enter Your Password</label> -->
                      </div>
                      <button class="waves-light btn" type="Submit">Let me in</button>
                      <p class="signuplink"> or <a href="{{ url('/signup')}}"> Create an Account </a></p>
                       
                      
                    </div>
                  </form>
                </div>
              
        
  </div>
  </div>

    @endsection


<!-- <form action="{{ url('login/post') }}" method="POST" class="form-horizontal">
            
              {!! csrf_field() !!}
        
                        <div class="form-group">
                          <label for="">Enter your Email</label>
                            <input type="text" name="email">
                        </div>
                        <div class="form-group">
                          <label for="">Your Password</label>
                            <input type="password" name="password">
                        </div>
                        <input type="checkbox" name="remember" checked="" style="display:none;">
                        <button type="submit">Let me in</button>
        
                      </form> -->



@section('app-js')
  <script>
       $(document).on('ready', function(){
               $('.app-page').css({ 'display' : 'block' });
                $('#mainLoading').remove();
             App.load('main');
       });
  </script>
@endsection


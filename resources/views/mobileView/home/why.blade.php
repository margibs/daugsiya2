
@extends('clubhouse.layout')
  
@section('custom-styles')
<style type="text/css">

.app-page .app-content {
    padding-top: 15px!important;

background: #F09819; /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #F09819 , #EDDE5D); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #F09819 , #EDDE5D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      
}
  .why{
    padding:0 15px 20px 15px;
  }
  h1{
        font-family: 'Work Sans';
    color: #fff;
    font-weight: 600;
    margin: 0 10px;
    font-size: 26px;
    line-height: 26px;
  }
  header{
    display: none!important;
  }
  ul{
    margin: 10px 0 10px 0;
  }
  ul li{
    overflow: hidden;
    background: #F3EAEA;
    margin-bottom: 5px;
    border-radius: 10px;
  }
  ul li img{
    width: 80px;
    float: left;
    margin-right: 7px;
  }
  ul li span{
    color: #D6A050;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 600;
    line-height: 18px;
    display: block;
    margin-top: 15px;
  }
  ul li i{
    margin-right: 5px;
  }
  .signupbtn{
        display: block;
    text-align: center;
    color: #fff;
    padding: 8px 10px;
    border: 2px solid #fff;    
    border-radius: 9px;
    font-size: 20px;
    font-weight: 600;
  }
</style>

@endsection

 @section('navbar-title', 'Login')

  @section('content')

      <div class="app-page" data-page="main">
  <div class="app-content">
        
                
  
               <div class="row">

                  <div class="col-xs-24">
                    <div class="why">
                    <h1> Here's Why you Should Sign Up with Susan... </h1>
                    <ul>
                      <li> <img src="http://susanwins.com/uploads/21012_1.png" alt=""/> <span> Receive Susan's Welcome Pack with Free Gifts! </span> </li>
                      <li> <img src="http://susanwins.com/uploads/67010_2.png" alt="" /> <span> 24/7 Chat Lounges - Meet New Friends & Have a Laugh  </span> </li>
                      <li> <img src="http://susanwins.com/uploads/19581_3.png" alt="" /> <span>Get Exclusive Casino Bonuses & Offers (Only For Susan's Members!) </span></li>
                      <li> <img src="http://susanwins.com/uploads/72253_4.png" alt="" /> <span>VIP Susan's Club Membership Card – Access Hot Events Worldwide </span></li>
                      <li> <img src="http://susanwins.com/uploads/37709_5.png" alt="" /> <span> Win Amazing Prizes & Holidays </span></li>
                      <li> <img src="http://susanwins.com/uploads/77547_6.png" alt="" /> <span> Get 24/7 Access to My Private Clubhouse </span></li>
                      <li> <img src="http://susanwins.com/uploads/31806_7.png" alt="" /> <span> Keep up to Date With the Latest Slots Games </span></li>
                    </ul>
                    <a href="{{ url('/signup') }}" class="signupbtn"> Sign up now </a>
                    </div>
                  </div>

                
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


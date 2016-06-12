
@extends('clubhouse.layout')
  
@section('custom-styles')
@endsection

 @section('navbar-title', 'Home')
@section('content')

  <style type="text/css">

   body {
    background: #fff url(http://susanwins.com/uploads/71471_bg-mobile.jpg) no-repeat 100% 15%;
  }
  .collection{
border: none;
    padding-bottom: 67px;
    margin: 0;
  }
  .collection .collection-item{
    background: transparent;
    border: none;
  }
  .collection .collection-item.avatar{
    min-height: 148px;
  }
  .collection .collection-item.avatar .circle{
    width: 140px;
    height: 140px;
    border: 2px solid #FFF;
    -moz-box-shadow: 0 0 10px -1px #000;
    -webkit-box-shadow: 0 0 10px -1px #000;
    box-shadow: 0 0 10px -1px #000;
  }
  .collection .collection-item.avatar .title{
    font-size: 23px;
    font-weight: 600;
    display: block;
    text-align: center;
    margin-top: 50px;
    color: #fff;
    background: rgb(207,11,11);
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top, rgba(207,11,11,0.96) 0%, rgba(165,6,6,0.96) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(207,11,11,1)), color-stop(100%,rgba(165,6,6,0.96)));
    background: -webkit-linear-gradient(top, rgba(207,11,11,0.96) 0%,rgba(165,6,6,0.96) 100%);
    background: -o-linear-gradient(top, rgba(207,11,11,0.96) 0%,rgba(165,6,6,0.96) 100%);
    background: -ms-linear-gradient(top, rgba(207,11,11,0.96) 0%,rgba(165,6,6,0.96) 100%);
    background: linear-gradient(to bottom, rgba(207,11,11,0.96) 0%,rgba(165,6,6,0.96) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cf0b0b', endColorstr='#a50606',GradientType=0 );
    padding: 11px;
    border-radius: 30px;
    margin-left: 40px;
    width: 84%;
  }

 @media(min-width: 480px){
  body {
    background: #fff url(http://susanwins.com/uploads/71471_bg-mobile.jpg) no-repeat 100% 3%;
  }
 }
@media(min-width: 600px){
  body {
    background: #fff url(http://susanwins.com/uploads/78605_tab-clubhouse-bg.jpg) no-repeat 100% 3%;
  }
  .collection .collection-item.avatar {
    min-height: 178px;
  }
  .collection .collection-item.avatar .circle {
    width: 160px;
    height: 160px;
  }
 }
 @media(min-width: 720px){
  body {
    background: #fff url(http://susanwins.com/uploads/91292_tab-clubhouse-bg-big.jpg) no-repeat 100% 3%;
  }
}
  </style>

<!-- NEED TO MODIFIED -->
 <!-- @section('content-menu')
       <a href="#" class="waves-effect back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a>
 @endsection  -->
 
   <div class="app-page" data-page="main">
<!--    <div class="app-topbar"></div> -->
  <div class="app-content">
         <ul class="collection">
        
          <li class="collection-item avatar">
          <a href="{{ url('clubhouse/profile') }}">
            <img src="http://susanwins.com/images/clubhouse/profileroom-thumb.gif" alt="" class="circle">
            <span class="title">Profile</span>
            </a>
          </li>
              
             
                <li class="collection-item avatar">
                 <a href="{{ url('clubhouse/chatroom') }}">
            <img src="http://susanwins.com/images/clubhouse/chatroom-thumb.gif" alt="" class="circle">
            <span class="title">Chatroom</span>
            </a>
          </li>
              
              
                <li class="collection-item avatar">
                <a href="{{ url('clubhouse/prizeroom') }}">
            <img src="http://susanwins.com/images/clubhouse/prizeround.png" alt="" class="circle">
            <span class="title">Prizeroom</span>
             </a>
          </li>
             
              
                <li class="collection-item avatar">
                <a href="{{ url('clubhouse/slotsroom') }}">
            <img src="http://susanwins.com/images/clubhouse/slotsroom-thumb.gif" alt=""  class="circle">
            <span class="title">Slotsroom</span>
            </a>
          </li>
              
        </ul>
  </div>
  </div>
     

@endsection

   @if(isset($user) && $user->welcome_package_sent == 0 && $user->ignore_welcome_package == 0)
          <button data-target="initialWelcomePackage" class="modal-trigger" style="display:none" id="initialWelcomePackageTrigger"></button>
          <div id="initialWelcomePackage" class="modal">
            <div class="inner">
                 <h2>   Thanks for signing up!</h2>
                  <h4>There are just 2 things you need to do now!</h4>

                  <p class="one"><span>1</span> Check your email and click on the confirmation link we sent you to confirm your membership!</p>

                    <p class="two"><span>2</span> Enter your address below - We've got an incredible FREE welcome pack to send you! <b>(you can skip this part if you want to miss out on your welcome gifts)</b></p>
                    
                     <div class="form-group">
                              <textarea name="address" placeholder="Enter Address" class="welcomeAddress"></textarea>

                          </div>
                          <div class="form-group">
                            <button type="button" class="submitWelcomePackage">Save Address</button>
                          </div>
                </div>
              </div>
  @endif


@section('app-js')
  <script>
       $(document).on('ready', function(){
            
            $('.app-page').css({ 'display' : 'block' });
            $('#mainLoading').remove();

             App.load('main');

       });
  </script>

@endsection
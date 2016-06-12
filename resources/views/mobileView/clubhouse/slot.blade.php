
@extends('clubhouse.layout')
  
@section('custom-styles')
@endsection
<style>	
body{
  background: #fff;
}
	#slotsList{
	    text-align: center;
    margin: 0;
    padding-bottom: 67px;
	}

	#slotsList li{
		width:48%;
		    display: inline-block;
	}
  #slotsList li a img.lazyloading{
    width: auto;
    height: auto;
    background: #fff;
  }
	#slotsList li a img.lazyloaded{
		width:100%;
		border-radius: 5px;
  -moz-box-shadow: 0 0 10px -3px #000;
  -webkit-box-shadow: 0 0 10px -3px #000;
  box-shadow: 0 0 10px -3px #000;
	}
  footer ul {
    padding: 33px 0 0 0!important;
  }
  footer ul li span{
    position: static!important;
  }
  @media(min-width: 600px){
    #slotsList li {
      width: 32%;
    }
  }
</style>
 @section('navbar-title', 'Slots')
@section('content')

    @section('content-menu')
       <a href="#" class="waves-effect back_button button-collapse" data-activates="slide-out" ><i class="ion-navicon"></i>  </a>
@endsection


   <div class="app-page" data-page="main">
<!--    <div class="app-topbar"></div> -->
  <div class="app-content">
        <ul id="slotsList">
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


@section('app-js')
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
  <script>
       $(document).on('ready', function(){

        $('.app-page').css({ 'display' : 'block' });
        $('#mainLoading').remove();

       		/*	App.controller('main', function(page){

       				    $(page).on('appShow', function(){
                      $(page).find('#slotsList img').unveil();
                  });
       				    $(page).find('#slotsList img:lt(6)').trigger('unveil');
       			});*/
       

             App.load('main');

       });
  </script>

@endsection
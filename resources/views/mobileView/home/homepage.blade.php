@extends('home.layout')


@section('homecontentResposnive')

<div class="app-page" data-page="main">
    <div class="app-content">
      <style type="text/css">
  .round{
    height: 372px;
    border-radius: 92%/28%;
  }
  .round2{
    position: relative;
  }
  .round2 img{
    right: -62px;
    position: absolute;
    width: 210px;
    top: 36px;
  }
  #maincontainer{
    margin-top: 0;
  }
  .latestgamescontent p{
    font-family: 'Work Sans',Helvetica,Arial,sans-serif;
    color: #D8B472;
    font-size: 19px;
    text-align: center;
    font-weight: 700;
    margin-top: -10px;
    margin-bottom: 3px;
    text-shadow: 0px 1px 2px rgb(99, 66, 7);
  }
  .latestgamescontent .inner{
    padding:0;
  }
  .latestgamescontent .inner img{
        border-radius: 1px;
    margin-bottom: -6px;
  }
  @media(min-width: 360px){
  .round2 img{
    right: -69px;
    position: absolute;
    width: 230px;
    top: 19px;
  }
}
  </style>

<!-- 
<div class="round ellipse">
  <div class="round2 ellipse">
    <h1> Hi! I'm Susan and I LOVE playing slots! </h1>
    <img src="http://susanwins.com/images/single-susan.png">
    <ul>
      <li> Find Amazing Slot Games </li>
      <li> Join my FREE members club </li>
      <li> Win Fantastic Prizes! </li>
    </ul>
  </div>  
</div>
 -->

 <!--  <div class="carousel">
   <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1"></a>
   <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
   <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
   <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
   <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a>
 </div>
 
 <div class="carousel carousel-slider">
   <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"></a>
   <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2"></a>
   <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3"></a>
   <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4"></a>
 </div> -->

<!-- 
<div class="round ellipse">
  <div class="round2 ellipse">
   <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1"></a>
    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
    <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a>
  </div>

  <div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"></a>
    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4"></a>
  </div>

  </div>  
</div> 
 -->
  <div class="carousel carousel-slider">
  <a class="carousel-item" href="#two!"><img src="http://susanwins.com/uploads/84151_susan-slider.jpg"></a>
  @foreach($home_images_all as $images) 
   <a target="_blank" class="carousel-item" href="{{ $images->link }}" id="image_link"><img src="{{ url('uploads').'/'.$images->image}} "></a> 
   <!--  <a class="carousel-item" href="#one!"><img src="http://susanwins.com/uploads/86112_foxycasino01_763x364.jpg"></a>
   <a class="carousel-item" href="#two!"><img src="http://susanwins.com/uploads/60362_ladbrokes_763x364_uk.jpg"></a>
   <a class="carousel-item" href="#three!"><img src="http://susanwins.com/uploads/83381_mrgreen_763x364.jpg"></a>
   <a class="carousel-item" href="#four!"><img src="http://susanwins.com/uploads/57363_foxycasino02_763x364.jpg"></a> -->
   @endforeach 
  </div>
      

<div id="maincontainer">

      <div class="innerfirst"> 

  
             
   
       <div id="playbig">
            
             @if(isset($user))
                <a class="button pink glass"> Welcome! </a>
             @else
               <a href="{{ url('/why') }}" class="button pink glass"> Join my Clubhouse! </a>
             @endif             
            
          </div>     
   
        <div class="thickgolddivider">
          <p> Whatever your mood, there's a game for you...  </p>
        </div>

          <div id="categoryContainer">
         
            <div class="categories">
              <div class="row no-gutters">

              <ul class="row gameList">
                 @foreach($category_randomizer as $key => $value)

                   {{--   @if(($key) % 5 == 0)  --}}

                      <div class="col s4" style="padding:0;">
                      {{--  @endif  --}}
                        {!! $value !!}
                       {{--  @if(($key+1) % 5 == 0)  --}}
                      </div>
                   {{--  @endif  --}}
                    @endforeach
              </ul>            
              </div>
            </div>
          </div>    

        <div class="bottomads">
          <a target="_blank" href="{{$home_images_footer_ad->link}}">
          <img src="{{ url('uploads').'/'.$home_images_footer_ad->image}}" alt="">
          </a>
        </div>    
<!--         <div class="biggestwins">
            <div class="inner">
              <h2> My Biggest Wins </h2>
            </div>
        </div>              
        <div class="biggestwinscontent">
          <img src="http://susanwins.com/uploads/98317_starscape.jpg" />
        </div> -->
        <div class="latestgames"></div>
        <div class="latestgamescontent">
        <p> Top Rated Games </p>
          <div class="inner">              
              <div class="row">

                 
                  @foreach($posts as $k=> $post)
                   {{--  @if(($k) % 5 == 0) --}}

                      <div class="col s4" style="padding:1px;">
                      {{--   @endif --}}

                          <a href="{{url('')}}/{{$post->slug}}">                  
                            <img src="{{url('uploads')}}/{{$post->thumb_feature_image}}">
                          </a>

                          {{-- @if(($k+1) % 5 == 0) --}} 
                      </div>
                            {{-- @endif --}}
                       @endforeach                     
              </div>
          </div>
        </div>
        <div class="bottomads" style="margin-bottom: -2px;">
          <!-- <img src="http://susanwins.com/uploads/60362_ladbrokes_763x364_uk.jpg" alt=""> -->
          @if($home_images_footer_ad2 != null)
            <a target="_blank" href="{{$home_images_footer_ad2->link}}">
          <img src="{{ url('uploads').'/'.$home_images_footer_ad2->image}}" alt="">
          </a>
          @endif
        </div>
       
      </div>

          <p class="terms">
            <a href="#">Terms &amp; Conditions</a> <a href="#"> Privacy Policy </a> Gambling is for over 
            <br /> <img src="http://susanwins.com/uploads/48153_18-logo.gif" class="eighteen">  <a href="#"> <img src="http://susanwins.com/uploads/63793_gambleaware.gif" class="gambleaware"> </a> <br> 
            <br /><b>Copyright © 2016 SusanWins</b>
          </p>
     

</div>
    </div>
</div>

@endsection

@section('app-js')
  <script>
       $(document).on('ready', function(){

            $('.app-page').css({ 'display' : 'block' });
            $('#mainLoading').remove();

            

            App.controller('main', function(page){
                $(page).attachCommentEvents();
            });
             App.load('main');
             /* $('.carousel').carousel();*/
            $('.carousel').carousel({
              full_width:true
            });


               

       });
  </script>

@endsection


@extends('home.layout')

@section('scripts_here')
 <link rel="stylesheet" href="{{asset('css/home/homepage.master.css')}}"> 
   <!-- <link rel="stylesheet" href="{{ elixir('css/home/homepage.master.min.css') }}">-->
  <style>
  .categories ul li a, .categories ul li a img, .latestMain ul li a img{
    height: auto;
  }
  </style>
@endsection

@section('homecontentResposnive')
<div class="container-fluid" style="overflow: hidden;">
  <div class="container"  style="position:relative;">
    <div class="row">
      <div class="col-lg-24">

        <img src="{{ asset('images/responsive/smallerHomepageReel.jpg')}}" class="topReel" />
        <img src="http://susanwins.com/uploads/57806_catbg4.jpg"  class="categoryReel"/>
        <img src="http://susanwins.com/uploads/35281_bigwins-traspa.png" class="bigwinsMainReel">        
       <!--  <img src="{{ asset('images/responsive/footerReel.jpg')}}" class="footerReel"> -->

         <div class="col-lg-24">
              <div class="homepageReel">
                 <img src="{{ asset('images/responsive/withtdog.png') }}" class="susan">
                <h1 class="headText2"> Hi! I'm Susan 
                  <span> Let's Play </span> 
                </h1>  
                                <div class="reels">
                  <div class="row no-gutter">

                    <?php 
                      $counter = 1;
                      $segment = ceil($reel_posts_count) / 4;
                      $counter1 = 0;
                      $counter2 = 0;
                      $counter3 = 0;
                      $counter4 = 0;
                    ?>

                    @foreach($reel_posts as $reel_post)

                      @if($counter == 1)
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div id="planeMachine2">
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                             
                            </div>
                            <?php $counter1++; ?>
                      @elseif($counter < $segment)
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                              
                            </div>
                            <?php $counter1++; ?>
                      @elseif($counter == $segment)
                          </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div id="planeMachine3">
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                             
                            </div>
                            <?php $counter2++; ?>
                      @elseif($counter < $segment*2 && $counter > $segment)
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                              
                            </div>
                            <?php $counter2++; ?>
                      @elseif($counter == $segment*2)
                          </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div id="planeMachine4">
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                              
                            </div>
                            <?php $counter3++; ?>
                      @elseif($counter < $segment*3 && $counter > $segment && $counter > $segment*2)
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                              
                            </div>
                            <?php $counter3++; ?>
                      @elseif($counter == $segment*3)
                          </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div id="planeMachine5">
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                              
                            </div>
                            <?php $counter4++; ?>
                      @elseif($counter < $segment*4 && $counter > $segment && $counter > $segment*2 && $counter > $segment*3)
                            <div class="text-center">
                              <a href="{{url('')}}/{{$reel_post->slug}}">
                                <img src="{{url('')}}/uploads/{{$reel_post->reels_image}}" width="261px" height="294px">
                              </a>                              
                            </div> 
                            <?php $counter4++; ?>
                      @endif

                      <?php $counter++; ?>

                    @endforeach
                          </div>
                          </div>
                  </div>
                </div>

               
                 <div id="gogogo2"  class="recbtn"><div class="outer halfRound"><div class="height halfRound redbg"><div class="inner halfRound redbgInner"> Spin!  </div></div></div></div>
                 <div class="recbtn longText" id="whatIsSusan"><div class="outer halfRound"><div class="height halfRound purplebg"><div class="inner halfRound purplebgInner whatInner"> <span>What is</span> SusanWins?  </div></div></div></div>

              </div>
              <div class="categoryMain">
               

                <!-- <div id="playbig">
                  <a id="gogogo2" class="button pink serif round glass"> Spin! </a>         
         
               
               
                </div>  -->



                   <h6 class="homeText"> Whatever your mood, there's a game for you...  </h6>
                   <h6 class="homeText2"> Whatever your mood, there's a game for you...  </h6>

                <div class="col-xs-24 col-sm-19 col-md-19 col-lg-19 categoryCol">

                  <div class="categories">

                    <ul>
                    @foreach($category_randomizer as $key => $value)
                    {!! $value !!}
                    @endforeach
                      </ul>
                  </div>
                </div>
                <div class="col-xs-24 col-sm-5 col-md-5 col-lg-5 categAds1366">
                  <img src="{{ asset('images/responsive/categoryReelDivider.png') }}" class="homeCategoryDivider">
                  <div class="categAds">
                  @foreach($get_home_ads as $images)
                   <a href="{{ $images->link }}" target="_blank">                      
                     <img src="{{ url('uploads').'/'.$images->image}}">
                    <!--  <div class="questionMarkHover hint--left hint--bounce hint--rounded  hint--warning" data-hint="Click to know more"> ? </div> -->
                   </a> 
                  @endforeach
                   <!--  <a href="#">                      
                     <img src="http://susanwins.com/uploads/86029_201x503.jpg">
                     <div class="questionMarkHover hint--left hint--bounce hint--rounded hint--warning" data-hint="Click to know more"> ? </div>
                   </a>
                   <a href="#">                      
                     <img src="http://susanwins.com/uploads/83977_foxycasino01_201x503.jpg">
                     <div class="questionMarkHover hint--left hint--bounce hint--rounded  hint--warning" data-hint="Click to know more"> ? </div>
                   </a> -->
                  </div>
                </div>
              </div>
              <div class="bigwinsMain">
                <ul>
                  @foreach($biggest_wins as $b)
                       <li class="refCell"> 
                         <img class="info" src="http://susanwins.com/uploads/24372_goldcoins.png" alt=""> 
                         <a href="{{ url().'/'.$b->post->slug }}"> 
                           <img src="{{ $b->custom_image ? url('uploads').'/'.$b->custom_image : url('uploads').'/'.$b->post->reels_image }}" /> 
                         </a>
                          <a href="{{ url().'/'.$b->post->slug }}" class="info2">
                                  <p> Total Win:</p>
                                  <h3> £{{ $b->total_wins }} </h3>
                                  <button class="yellow"> Play Now! </button>
                         </a>
                     </li>
                  @endforeach
                </ul>
              </div>
               <div class="latestMain">
                  <div class="col-xs-24 col-sm-18 col-md-18 col-lg-18">  
                      <div class="gameList">
                        <div class="inner">
                      <!--     <img src="http://susanwins.com/images/homepage/latestGamesSusan.png" class="susan"> -->
                          <ul>
                                  
                                  @foreach($posts as $post)
                                    <li>           
                                      <a href="{{url('')}}/{{$post->slug}}">                  
                                        <img src="{{url('uploads')}}/{{$post->thumb_feature_image}}" width="179px" height="143px">
                                      </a>
                                  </li>  
                                @endforeach
                                
                          </ul>
                        </div>
                      </div>
                  </div>
                  <div class="col-xs-24 col-sm-5 col-md-5 col-lg-5">  
                      <div class="ads2">
                       @foreach($get_home_ads2 as $images)
                       <a href="{{ $images->link }}" target="_blank">                      
                         <img src="{{ url('uploads').'/'.$images->image}}">
                        <!--  <div class="questionMarkHover hint--left hint--bounce hint--rounded  hint--warning" data-hint="Click to know more"> ? </div> -->
                       </a> 
                       @endforeach
                      <!--   <a target="_blank">
                        <img src="http://susanwins.com/uploads/86029_201x503.jpg">
                        <div class="questionMarkHover hint--left hint--bounce hint--rounded hint--warning " data-hint="Click to know more"> ? </div>
                      </a>
                      <a target="_blank">
                        <img src="http://susanwins.com/uploads/83977_foxycasino01_201x503.jpg">
                        <div class="questionMarkHover hint--left hint--bounce hint--rounded  hint--warning" data-hint="Click to know more"> ? </div>
                      </a>
                      <a target="_blank">
                        <img src="http://susanwins.com/uploads/74087_williamhill_201x503.jpg">
                        <div class="questionMarkHover hint--left hint--bounce hint--rounded hint--warning" data-hint="Click to know more"> ? </div>
                      </a>
                        -->
                      </div>
                  </div>
              </div>
              <div class="simpleFooter"></div>
        </div>

        <p class="terms">
         <a href="#">Terms & Conditions</a> <a href="#"> Privacy Policy </a> Gambling is for over <img src="http://susanwins.com/uploads/48153_18-logo.gif" class="eighteen" /> <img src="http://susanwins.com/uploads/63793_gambleaware.gif" class="gambleaware" /> <br /> <b>Copyright &copy; <?php echo date("Y") ?> SusanWins</b>
        </p>

      </div>
    </div>
  </div>  

</div>
  

@endsection


@section('footer_scripts')
   <script>

   (function($){
        $('#whatIsSusan').on('click', function(){
        $('.introBubble').animate({'top' : 0}, 500);
        $('.bigbubble').css('outline', '0').focus();
        bubbleShown = true;
    });

    $('.bigbubble').on('blur', function(){
         $('.introBubble').animate({'top' : '100%'}, 500);
    });

   })(jQuery);

    $(document).ready(function(){



      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
      page = 1;

      function preload() {
        // console.log(preload.arguments[0]);
        for (i = 0; i < preload.arguments.length; i++) {
          var images2 = new Image();
          images2.src = preload.arguments[i];
        }
      }


      $(function(){

          var $divView = $('div.view');
          var innerHeight = $divView.removeClass('view').height();
          $divView.addClass('view');
            
          $('div.slide').click(function() {
              $('div.view').animate({
                height: (($divView.height() == 450)? innerHeight  : "450px")
              }, 500);
              return false;
          });

        var options = {
          horizontalPixelsCount: 90,
          verticalPixelsCount: 5,
          pixelSize: 5,
          disabledPixelColor: '#080808',
          enabledPixelColor: '#ff0101',
          pathToPixelImage: 'http://susanwins.com/uploads/43978_pixel.png',
          stepDelay: 40,
          // only for canvas
          backgroundColor: '#080808',
          // only for canvas
          pixelRatio: 0.7,
          runImmidiatly: true
        };

      });


    });



   $(window).bind("load", function() {
        
        new_blah1 = 0;
        new_blah2 = 0;
        new_blah3 = 0;
        new_blah4 = 0;

        var machine1 = $("#planeMachine2").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
          randomize:function(activeElementIndex){
              return new_blah1;
          }
        });

        var machine2 = $("#planeMachine3").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
          randomize:function(activeElementIndex){
              return new_blah2;
          }
        });

        var machine3 = $("#planeMachine4").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
          randomize:function(activeElementIndex){
              return new_blah3;
          }
        });

        var machine4 = $("#planeMachine5").slotMachine({
          active  : 0,
          delay : 500,
          direction: 'down',
          randomize:function(activeElementIndex){
              return new_blah4;
          }
        });


        function watermelon(new_blah)
        {
          return new_blah;
        }

        $("#gogogo2").click(function(){

          new_blah1++;
          new_blah2++;
          new_blah3++;
          new_blah4++; 

          if(new_blah1 == {{$counter1}})
          {
            new_blah1 = 0;
          }

          if(new_blah2 == {{$counter2}})
          {
            new_blah2 = 0;
          }

          if(new_blah3 == {{$counter3}})
          {
            new_blah3 = 0;
          }

          if(new_blah4 == {{$counter4}})
          {
            new_blah4 = 0;
          }

          machine1.shuffle(3);

          setTimeout(function(){
            machine2.shuffle(3);
          }, 500);

          setTimeout(function(){
            machine3.shuffle(3);
          }, 700);

          setTimeout(function(){
            machine4.shuffle(3);
          }, 900);

        });
});
  </script>

@endsection
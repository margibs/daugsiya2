@extends('home.layout')

@section('page-title')
 - All Games
@endsection

@section('scripts_here')
  <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}">    
  <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">    
@endsection


@section('singlecontent')


<style type="text/css">
.divider{
  top: 9px;
  height: 100%;
}
.divider1 {
  left: 38px;
}
.divider2 {
  right: 40px;
}
section.latestgames{
  background: transparent;
  border: none;
}
section.latestgames .gameList{
  margin:10px 34px 9px 31px;
}
section.latestgames .gameList .inner{
      padding-top: 15px;
}
.singleFooter{
      margin-left: 5px;
}
.slick-dots li button:before{
      font-size: 35px;
}
.slick-dots li{
  width: auto!important;
  height: 35px;
}
.slick-dots li.slick-active button:before{
  color: #C091F3;
}
.slick-dots li button:before{
  color: #B6A1CE;
}
.slick-list{
  padding-top: 20px;
}




/** ============================================ SLOTS ============================================== **/
.ezslot-outermost{
margin: 21px 0 0 48px;
height: 222px;
overflow: hidden;
position: relative;
top: -14px;
}

.ezslot-outermost ul li{
display: inline-block;
}
.ezslot-outermost ul li img{
border:none!important;
margin-top: -43px;
width: 100%;
}
.ezslot-outermost .content{
background:none;
}
#wrapper
{
  top: 185px;
}
#wrapper a img {
margin-top: -42px!important;
}
.slider{
  margin: 0 2px;
}
.slotwrapper a{
width: 100%!important;
height: 100%!important;
position: initial!important;
}
#playbig a{
height: 49px;
top: -15px;
left: -40px;
}
#playbig .button {
font: 24px;
}
#playbig{
  top: 200px;
}


</style>

<div class="container_24">

  <div id="main" class="grid_24">

        

          <!-- <div class="sidebar">

                    <h2> <img src="http://susanwins.com/uploads/28532_sidebartext.png" /> </h2>

                    <div class="rellimg">
                            <a href="http://susanwins.com/The-Alchemists-Lab-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/61228_alchemist_lab.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/hot-gems-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/30686_hot-gems.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/ice-hockey-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/21698_ice-hokey.jpg" style="display:block; height:117px;"> </a><div class="side_bar_banner" style="visibility: visible;"><a href="banner 3" class="get_me_skyscraper_banner" get-this-id="6"><img src="http://susanwins.com/uploads/38775_ads.jpg" style="height: auto;"></a></div><a href="http://susanwins.com/innocence-or-temptation-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/77776_innocence-temptation.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/iron-man-slots-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/75031_iron-man.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/jackpot-giant-slots-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/77280_jackpot-giant.jpg" style="display:block; height:117px;"> </a><div class="side_bar_banner" style="visibility: visible;"><a href="banner 2" class="get_me_skyscraper_banner" get-this-id="5"><img src="http://susanwins.com/uploads/38775_ads.jpg" style="height: auto;"></a></div><a href="http://susanwins.com/john-wayne-slots-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/32145_john-wayne.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/jungle-boogie-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/92183_jungle-boogie.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/la-chatte-rouge-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/95958_la-chatte-rouge.jpg" style="display:block; height:117px;"> </a><div class="side_bar_banner" style="visibility: visible;"><a href="asdas" class="get_me_skyscraper_banner" get-this-id="4"><img src="http://susanwins.com/uploads/38775_ads.jpg" style="height: auto;"></a></div><a href="http://susanwins.com/little-britain-slots-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/47087_little-britain.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/lucky-panda-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/57127_luckypanda.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/azteca-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/80031_azteca.jpg" style="display:block; height:117px;"> </a><div class="side_bar_banner" style="visibility: visible;"><a href="banner 3" class="get_me_skyscraper_banner" get-this-id="6"><img src="http://susanwins.com/uploads/38775_ads.jpg" style="height: auto;"></a></div><a href="http://susanwins.com/marilyn-monroe-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/40393_monroe.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/monty-pythons-spamalot-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/22611_spamalot.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/mrcashback-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/42636_cashback.jpg" style="display:block; height:117px;"> </a><div class="side_bar_banner" style="visibility: visible;"><a href="asdas" class="get_me_skyscraper_banner" get-this-id="4"><img src="http://susanwins.com/uploads/38775_ads.jpg" style="height: auto;"></a></div><a href="http://susanwins.com/hot-gems-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/30686_hot-gems.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/ice-hockey-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/21698_ice-hokey.jpg" style="display:block; height:117px;"> </a><a href="http://susanwins.com/innocence-or-temptation-online-slots-review" track-action="56cec60624f42" style="visibility: visible;"> <img src="http://susanwins.com/uploads/77776_innocence-temptation.jpg" style="display:block; height:117px;"> </a><div class="side_bar_banner" style="visibility: hidden;"><a href="banner 3" class="get_me_skyscraper_banner" get-this-id="6"><img src="http://susanwins.com/uploads/38775_ads.jpg" style="height: auto;"></a></div>
                    </div>

            </div> -->

                
                <div class="sidebar">
                   
                    <h3> <img src="http://susanwins.com/uploads/28532_sidebartext.png" alt=""> </h3>
                    <div class="rellimg">                
                  </div>
                </div>
        
            

            <div class="main">
             <img src="http://susanwins.com/uploads/26351_single-susan.png" alt="" class="susan"> 
                <div class="featImg featimg">
                  <img src="http://susanwins.com/uploads/80615_allgamesheader.png" />
                </div>

                <div id="wrapper">

                       <div class="ezslot-outermost">
                            <ul>
                               <li> <div id="ezslots"></div> </li>                    
                            </ul>                                  
                        </div>

                        <div id="playbig">
                            <a id="gogogo2" class="button pink serif round glass"> Play Now! </a>         
                          <!--   <img src="http://susanwins.com/uploads/94727_holder.png" alt="">  -->
                          </div>


                        <a class="button fbblue serif round glass sharrre" id="share_via_facebook" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="Share this up!"><img src="http://susanwins.com/uploads/34329_fb-button.png">
                        </a> 
                        <a class="button pink serif round glass sharrre" id="share_via_pinterest" style="left:55px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="Pin me!"><img src="http://susanwins.com/uploads/76008_pinterestubtton.png" ></a>
                        </a>
                        <a class="button blue serif round glass sharrre" id="share_via_twitter" style="left: 40px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text="I'm tweeting this awesome game!"><img src="http://susanwins.com/uploads/70478_twitter-icon.png"></a>
                        </a>         
                       <a class="button pink serif round glass sharrre" id="share_via_googlePlus" style="left:25px;" data-url="http://susanwins.com/sunset-beach-online-slots-review" data-text=""><img src="http://susanwins.com/uploads/79339_g+button.png"></a>   
                </div>
      

            </div> 
          
           
                  <div class="content" style="position:relative;">

                    <div class="divider divider1"></div>
                    <div class="divider divider2"></div>

                      <div class="postcontent">

                        <section class="latestgames" style="background: transparent;border: none;">    
                          <div class="grid_19">  
                              <div class="gameList">
                                <div class="inner">
                                  
                                  <div class="gameslider">
                                      <?php $counter_ni = 0; ?>
                                      @foreach($posts as $post)

                                        @if($counter_ni == 0)
                                          <div>
                                            <ul>
                                              <li> <a href="{{url('')}}/{{$post->slug}}"><img class="forlazy" data-lazy="{{url('uploads')}}/{{$post->thumb_feature_image}}" src="http://susanwins.com/uploads/all_games_loading.gif"> </a> </li>
                                              <?php $counter_ni++ ?>
                                        @elseif($counter_ni % 20 == 0)
                                            </ul>
                                          </div>
                                          <div>
                                            <ul>
                                            <li> <a href="{{url('')}}/{{$post->slug}}"><img class="forlazy" data-lazy="{{url('uploads')}}/{{$post->thumb_feature_image}}" src="http://susanwins.com/uploads/all_games_loading.gif"> </a> </li>
                                            <?php $counter_ni++ ?>
                                        @else
                                            <li> <a href="{{url('')}}/{{$post->slug}}"><img class="forlazy" data-lazy="{{url('uploads')}}/{{$post->thumb_feature_image}}" src="http://susanwins.com/uploads/all_games_loading.gif"> </a> </li>
                                            <?php $counter_ni++ ?>
                                        @endif
                                      @endforeach
                                          </ul>
                                        </div>

                                  </div>
                                      
                                </div>
                              </div>
                          </div>
                        </section>
                        </div>
            
           
                  </div>
         
                <img src="http://susanwins.com/images/homepage/singleFooter.png" class="singleFooter footer" />
            </div>
             

    </div>
</div>




@endsection


@section('footer_scripts')

<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
 <script>
    $(document).ready(function(){


      var page = 1,
      all_games_page = 1,
      random_order_number = '{{$random_order_number}}';

        $('.gameslider').slick({
          dots:true,
          lazyLoad: 'ondemand',
          arrows:false,
          speed:250
        });

      var reels_image = [
            @foreach($reel_posts as $reel_post)
              '<div class="slotwrapper"><div class="details"><a href="{{url('')}}/{{$reel_post->slug}}" class="img-shadow"><img style="border-left: 2px solid #000;" src="{{url('uploads')}}/{{$reel_post->reels_image}}"></a></div></div>',
            @endforeach
        ];

      var reel_post_buffers = 
          [
            @foreach($reel_post_buffers as $reel_post_buffer)
              '<div class="slotwrapper"><div class="details"><a href="{{url('')}}/{{$reel_post_buffer->slug}}" class="img-shadow"><img style="border-left: 2px solid #000;" src="{{url('uploads')}}/{{$reel_post_buffer->reels_image}}"></a></div></div>',
            @endforeach
            @foreach($reel_posts as $reel_post)
              '<div class="slotwrapper"><div class="details"><a href="{{url('')}}/{{$reel_post->slug}}" class="img-shadow"><img style="border-left: 2px solid #000;" src="{{url('uploads')}}/{{$reel_post->reels_image}}"></a></div></div>',
            @endforeach
          ];

          <?php $count_yeah = 1; ?>

          preload(
            @foreach($reel_post_buffers as $reel_post_buffer)
              '{{url('uploads')}}/{{$reel_post_buffer->reels_image}}',
            @endforeach
            @foreach($reel_posts as $reel_post)
              <?php 
                if($count_yeah < 20) {
              ?>
              '{{url('uploads')}}/{{$reel_post->reels_image}}',
              <?php 
                }else
                {
              ?>
              '{{url('uploads')}}/{{$reel_post->reels_image}}'
              <?php 
              }
              ?>

              <?php $count_yeah++; ?>
            @endforeach

          );


      var buffer_more = reels_image;

      var ezslot = new EZSlots("ezslots",{"reelCount":4,"winningSet":[0,1,2,3],"symbols":reels_image,"height":287,"width":171});
      


        $("#gogogo2").click(function(){

          $('#ezslots').html('');
          if(page == 1)
          {
            var ezslot = new EZSlots("ezslots",{"reelCount":4,"winningSet":[0,1,2,3],"symbols":reel_post_buffers,"height":287,"width":171});
          }
          else
          {
            var ezslot = new EZSlots("ezslots",{"reelCount":4,"winningSet":[4,5,6,7],"symbols":reel_post_buffers,"height":287,"width":171});
          }
          

          ezslot.win();
          $("#gogogo2").css({
            'pointer-events':'none'
          });

          function pointevent(){
            $("#gogogo2").css({
              'pointer-events':'auto'
            });
          }
          setTimeout(pointevent, 2550);

          $.ajax({
            type: 'post',
            url: "{{url('home/ajax_get_reels_post')}}",
            data: {_token: CSRF_TOKEN,'page' : page,'random_order_number' : random_order_number}, 
            success: function(response)
            {
              
              var parsed = JSON.parse(response),
              number_of_object = Object.keys(parsed).length;

              reel_post_buffers = [];


              if(number_of_object < 4)
              {
                // console.log('less than 4');
                reel_post_buffers = reels_image;
                page = 1;
              }
              else
              {
                // console.log('go on');
                reel_post_buffers.push(buffer_more[0]);
                reel_post_buffers.push(buffer_more[1]);
                reel_post_buffers.push(buffer_more[2]);
                reel_post_buffers.push(buffer_more[3]);

                $.each( parsed, function( index, obj){

                  reel_post_buffers.push('<div class="slotwrapper"><div class="details"><a href="{{url('')}}/'+obj.slug+'"><img src="{{url('uploads')}}/'+obj.reels_image+'"></a></div></div>');
                  preload('{{url("uploads")}}/'+obj.reels_image);
                });
                page++;

              }

            }
            
          });
       
        });

      


    // var images2 = new Array();

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



    var finalSidebarContentHeight = 0, sidebarContentHeight = 0;
    contentOffset = 1;
    ajaxDone = false;
    sideBarHeightLeft = 0;
    sideBarCompleted = false;
    sideBarAjaxDone = true;

    pendingSideBarElements = [];

    sideBarSpacer = parseInt($('.rellimg').css('padding-bottom'));
    console.log('sideBarSpacer '+sideBarSpacer);

    sideBarSingleContentHeight = 117 + (sideBarSpacer * 2);

    function updateSidebarHeight(){

     mainHeight = $('#main').height() - ($('.main').height()) - parseInt($('.singleFooter').css('padding-bottom').replace('px', ''));

             sideBarHeight = mainHeight + ( $('.postcontent').offset().top - $('.sidebar').offset().top );
        finalSidebarContentHeight = sideBarHeight - ( $('.sidebar').find('h3').height() + (sideBarSpacer ) );
        $('.sidebar').css('height', sideBarHeight+'px');
        sidebarContentHeight = $('.rellimg').height();
        sideBarHeightLeft = finalSidebarContentHeight - sidebarContentHeight;

        lastElement = $('.rellimg').children(':visible').last();

        if( $('.rellimg').find('.updateHeight').length > 0){
             lastElement = $('.rellimg').find('.updateHeight').first();
               lastElement.next().css('visibility', 'hidden');
        }

        theImage = $(lastElement).find('img');

        if(sideBarHeightLeft <= sideBarSpacer){ 

          offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

            if(!lastElement.hasClass('updateHeight')){

              lastElement.addClass('updateHeight').data('originalHeight', $(theImage).height());
              theImage.css('height', offsetBottom+'px');
            }else{
              lastElement.css('visibility', 'visible');
              if(offsetBottom > 0 && offsetBottom < lastElement.data('originalHeight')){
                 theImage.css('height', offsetBottom+'px');

              }else if(offsetBottom >= lastElement.data('originalHeight')){

                theImage.css('height', lastElement.data('originalHeight')+'px');

              }else{

               
                   console.log('unshift');

                  prevElement = lastElement.prev();

                  prevElementImage = prevElement.find('img');


                  if(offsetBottom <= 0){
                     lastElement.css('visibility', 'hidden');
                   }else{

                   }

                  prevOffsetBottom = ($('.sidebar').offset().top+sideBarHeight) - prevElement.offset().top - (sideBarSpacer);

                  prevElement.addClass('updateHeight').data('originalHeight', $(prevElementImage).height());
                   prevElementImage.css('height', prevOffsetBottom+'px');
                
              }
            }
            

       
              }else{

                if(lastElement.hasClass('updateHeight')){

                  if(theImage.height() >= lastElement.data('originalHeight')){
                       theImage.css('height', lastElement.data('originalHeight')+'px');
                        lastElement.removeClass('updateHeight').removeData('originalHeight');
                    }else{

                      offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

                      if(offsetBottom <= lastElement.data('originalHeight')){
                          theImage.css('height', offsetBottom+'px');
                      }else{
                        

                          if(offsetBottom - lastElement.data('originalHeight') > 0){

                            lastElement.next().css('visibility', 'visible');

                          }else{

                             lastElement.next().css('visibility', 'hidden');
                          }

                          changeHeight = lastElement.attr('data-height') ? lastElement.attr('data-height') : lastElement.data('originalHeight');
                          theImage.css('height', changeHeight+'px');

                          if(!lastElement.attr('data-height') ){
                            lastElement.attr('data-height', lastElement.data('originalHeight') );
                          }

                          lastElement.addClass('updatedHeight').removeClass('updateHeight').removeData('originalHeight');



                          
                      }     
                       
                    }

                }

              }
        }
    


    startAddingSidebarInterval = null;
    setSidebarLoadInterval();
    maxSidebarAutoLoad = 10 * 10; //10 seconds
    maxSidebarCounter = 0;

    $(window).scroll(function(event){
      //console.log(sideBarCompleted);
            if(!sideBarCompleted)
            {
                clearInterval(startAddingSidebarInterval);
                setSidebarLoadInterval();
            }
            else
            {
              // console.log('sideBarCompleted');
            }
    });

    $(document).on('adjustHeight', function(){
          sideBarCompleted = false;
          startAddingSidebarContent();
    });

    function setSidebarLoadInterval(){
        startAddingSidebarInterval = setInterval(function(){
          maxSidebarCounter++;

          if(maxSidebarAutoLoad == maxSidebarCounter){
            clearInterval(startAddingSidebarInterval);
          }else{
             if(sideBarCompleted){
              clearInterval(startAddingSidebarInterval);
            }else{
              startAddingSidebarContent();
            }
          }
         
        

      }, 100);
    }

    function startAddingSidebarContent(){

        updateSidebarHeight();
        //console.log(sideBarCompleted);
            
          if(finalSidebarContentHeight > sidebarContentHeight && sideBarHeightLeft >= sideBarSingleContentHeight){
              getSidebarContent();
            }else{
              if(sideBarHeightLeft <= 0){
                  //console.log(sideBarHeightLeft);
                   lastImage = $('.rellimg').children().last();

                  pendingSideBarElements.push($(lastImage)[0].outerHTML);
                      console.log('sideBarCompleted = true');
                      //$(lastImage).remove();
                      sideBarCompleted = true;
               
              }else{
                sideBarCompleted = true;
              }
            }
    }

     function getSidebarContent(){

          if(sideBarAjaxDone && sideBarHeightLeft >= sideBarSingleContentHeight){ 

            if(pendingSideBarElements.length > 0){

                temp = pendingSideBarElements;

                stillPending = [];

                $.each(temp, function(i, l){

                                     /* if(sideBarHeightLeft >= sideBarSingleContentHeight){
                                          $( ".rellimg" ).append(l);
                                            updateSidebarHeight();
                                      }else{
                                        stillPending.push(l);
                                      }*/

                                    singleSidebarImage(l, function(el){
                                       stillPending.push(el);
                                    });

                });

                pendingSideBarElements = stillPending;

      }else{
              
              sideBarAjaxDone = false;
              sideBarAJAX().done(function(response){
                             

                              var parsed = JSON.parse(response);

                              contentOffset++;

                              $.each( parsed, function( i, l ){
                               

                               /* if(sideBarHeightLeft >= sideBarSingleContentHeight){

                                    $( ".rellimg" ).append(l);
                                      updateSidebarHeight();
                                }else{
                                   pendingSideBarElements.push(l);
                                }*/

                                singleSidebarImage(l, function(el){
                                  pendingSideBarElements.push(el);
                                });
                              });
                              sideBarAjaxDone = true;
              });
      }


                     
          }



    }


    function sideBarAJAX(){

      var dfr = $.Deferred();


      maxThrottles = 10;
      throttleCounter = 0;
      throttleTimeout = 3000;
      (function throttle(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
                          type: 'post',
                          url: "{{url('home/ajax_get_ads_posts_init')}}",
                          data: {_token: CSRF_TOKEN, 'contentOffset' :contentOffset },
                          success : dfr.resolve, 
                          error : function(xhr){

                            throttleCounter++;
                            if ( xhr.status === 401 || xhr.status === 500 && throttleCounter <= maxThrottles) {
                                return setTimeout(function(){ throttle( this ) }, throttleTimeout);
                            }

                            dfr.rejectWith.apply( this, [] );
                          }
                
              });
      })();

      return dfr.promise();

    }


      singleImageLoaded = true;

    function singleSidebarImage(el, callback){

     

      if(sideBarHeightLeft >= sideBarSingleContentHeight && singleImageLoaded){

        element = $(el).hide();

        singleImageLoaded = false;

        $( ".rellimg" ).append(element);

        image = new Image();

        image.onload = function(){

          singleImageLoaded = true;

          theHeight = this.fixedHeight == 117 ? this.fixedHeight : this.naturalHeight;
          $(this.element).find('img').css('height', theHeight+'px');

          $(this.element).show();
          updateSidebarHeight();

        }

        image.onerror = function(){
          singleImageLoaded = true;
          $(this.element).show();
           updateSidebarHeight();
        }

        image.src = $(el).find('img').attr('src');
        image.fixedHeight = parseInt($(el).find('img').css('height').replace('px', ''));
        image.element = element;



      
      }else{
        callback(el);
      }

        
    }

/*      $.ajax({
        type: 'post',
        url: "{{url('home/ajax_get_ads_posts_init')}}",
        data: {_token: CSRF_TOKEN2}, 
        success: function(response)
        {
          var parsed = JSON.parse(response);

          $.each( parsed, function( i, l ){
            $( ".rellimg" ).append(l);
          });

        }
        
      });*/



  </script>

@endsection

@extends('home.layout')

@section('page-title')
 - {{$category_name}}
@endsection

@section('scripts_here')
  <script type="text/javascript" src="https://www.youtube.com/player_api"></script>
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
  margin:10px 25px 9px 31px;
}
section.latestgames .gameList .inner{
      padding-top: 35px;
}

#wrapper{
    top: 209px;
    width: 77.3%;
}

/** ============================================ SLOTS ============================================== **/
.ezslot-outermost{
margin: 21px 0 0 48px;
height: 178px;
overflow: hidden;
position: relative;
top: -19px;
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
#wrapper a img {
margin-top: -42px!important;
}
.slotwrapper a{
width: 100%!important;
height: 100%!important;
position: initial!important;
}
#playbig{
      top: 63%;
}
#playbig a{
height: 49px;
top: -15px;
left: -40px;
}
#playbig .button {
font: 24px;
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
                     <img src="{{$category_image}}">
                </div>

                <div id="wrapper">
                         <div class="topgames">
                            <h3> Top Rated Games </h3>
                        </div>  
                        <div class="ezslot-outermost">
                            <ul>
                              <li> <div id="ezslots19"></div> </li>
                              <li> <div id="ezslots20"></div> </li>
                              <li> <div id="ezslots21"></div> </li>                        
                            </ul>                                  
                        </div>

                        <div id="playbig">
                            <a id="playFancy" class="button pink serif round glass"> Play Now! </a>         
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

                <!--          <ul class="filters">
                          <li><a get-this-id="posts.slug" get-this-order="ASC"> <i class="fa fa-sort"></i> A - Z </a></li>
                          <li><a get-this-id="total_rating" get-this-order="ASC"> <i class="fa fa-star"></i> Ratings  </a></li>
                          <li><a get-this-id="posts.created_at" get-this-order="DESC"> <i class="fa fa-sort"></i> Date Added  </a></li>
                          <li id="api_count" data-url="{{url('')}}/{{$cat_slug}}"></li> 
                        </ul> -->
                        <section class="latestgames" style="background: transparent;border: none;">    
                          <div class="grid_19">  
                              <div class="gameList">
                                <div class="inner">
                                  <ul>

                                     @foreach($posts as $post)
                                        <li>           
                                          <a href="{{url('')}}/{{$post->slug}}">                  
                                            <img src="{{url('uploads')}}/{{$post->thumb_feature_image}}">
                                          </a>
                                      </li>  
                                    @endforeach

                                  

                                  </ul>
                                </div>
                              </div>
                          </div>
                        </section>
                        </div>
        	  
           
                  </div>
         
                  <img src="http://susanwins.com/images/homepage/singleFooter.png" class="singleFooter footer" />
            </div>
             

             <div class="popunder">
               <img src="http://susanwins.com/uploads/35599_scrollsusan.png" alt="Scroll down to see my videos and read my review!" />
              </div>

    </div>
</div>




@endsection


@section('footer_scripts')
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-xxxxxx-x']);
_gaq.push(['_trackPageview']);
(function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
</script>
<script type="text/javascript">

$(document).ready(function(){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  // FILTER SCRIPT
  $('.filters a').on('click',function(e){
    e.preventDefault();
    var $this = $(this),
        type = $this.attr('get-this-id'),
        order_by = $this.attr('get-this-order'),
        category_id = {{$current_category_id}};

      /*  $('#contents_here').css({'overflow' : 'hidden'}).children().each(function(i, l){

           $(this).animate({'opacity' : 0, 'top' : '-140px'}, 500 , function(){

           

           });

        });*/


contentHeight = $(contents_here).outerHeight() +'px';

//console.log(contentHeight);

     $('#contents_here').html(

            $('<div>').css({'height': contentHeight})
                .append(
                   $('<img src="{{url()}}/uploads/66058_default.gif">').css({'width' : '45px', 'margin' : '2em auto', 'display' : 'block'})
                  )     
        );

      $.ajax({ 
          type: 'post',
          url: "{{url('home/ajax_get_filter_posts')}}",
          data: {_token: CSRF_TOKEN,'type' : type,'order_by' : order_by,'category_id' : category_id}, 
          success: function(response)
          {
            var parsed = JSON.parse(response);
            $( "#contents_here" ).html('');
            $.each( parsed, function( i, l ){


              $( "#contents_here" ).append(

                $(l).css({'opacity' : 0, 'top' : '140px'}).animate({'opacity' : 1, 'top' : '0px'}, 500)

                );
            });

            if(order_by == 'ASC')
            {
               $this.attr('get-this-order','DESC');
            }
            else
            {
               $this.attr('get-this-order','ASC');
            }

          }
        });

  });

      // var images4 = [
      // '<div class="slotwrapper"><div class="details"><a href="#"><img src="http://susanwins.com/uploads/50904_category-reel-game1.jpg"></a></div></div>',
      // ];    

      // var images5 = [
      // '<div class="slotwrapper"><div class="details"><a href="#"><img src="http://susanwins.com/uploads/50904_category-reel-game1.jpg"></a></div></div>'
      // ];

      // var images6 = [
      // '<div class="slotwrapper"><div class="details"><a href="#"><img src="http://susanwins.com/uploads/50904_category-reel-game1.jpg"></a></div></div>'
      // ];


      // $("#playFancy").click(function(){
       
      //   ezslot19.spin();
      //   ezslot20.spin();
      //   ezslot21.spin();

      // });


      // var ezslot19 = new EZSlots("ezslots19",{"reelCount":1,"winningSet":[0,0,0,0],"symbols":images4,"height":220,"width":270});
      // var ezslot20 = new EZSlots("ezslots20",{"reelCount":1,"winningSet":[0,0,0,0],"symbols":images5,"height":220,"width":270});
      // var ezslot21 = new EZSlots("ezslots21",{"reelCount":1,"winningSet":[0,0,0,0],"symbols":images6,"height":220,"width":270});
  



    var CSRF_TOKEN2 = $('meta[name="csrf-token"]').attr('content');

              var finalSidebarContentHeight = 0, sidebarContentHeight = 0;
    contentOffset = 1;
    ajaxDone = false;
    sideBarHeightLeft = 0;
    sideBarCompleted = false;
    sideBarAjaxDone = true;

    pendingSideBarElements = [];

    sideBarSpacer = parseInt($('.rellimg').css('padding-bottom'));
    console.log('sideBarSpacer '+sideBarSpacer);

    sideBarSingleContentHeight = 117 + (sideBarSpacer);

    function updateSidebarHeight(){

      mainHeight = $('#main').height() - ($('.main').height()) - parseInt($('.singleFooter').css('padding-bottom').replace('px', ''));


             sideBarHeight = mainHeight + ( $('.postcontent').offset().top - $('.sidebar').offset().top );
        finalSidebarContentHeight = sideBarHeight - ( $('.sidebar').find('h3').height() + (sideBarSpacer) );
        $('.sidebar').css('height', sideBarHeight+'px');
        sidebarContentHeight = $('.rellimg').height();
        sideBarHeightLeft = finalSidebarContentHeight - sidebarContentHeight;

        lastElement = $('.rellimg').children(':visible').last();

        theImage = $(lastElement).find('img');

        if(sideBarHeightLeft <= 0){

          offsetBottom = ($('.sidebar').offset().top+sideBarHeight) - lastElement.offset().top - (sideBarSpacer);

            lastElement.css('visibility', 'hidden');

            if(!lastElement.hasClass('updateHeight')){
              lastElement.addClass('updateHeight').data('originalHeight', $(theImage).height());
              theImage.css('height', offsetBottom+'px');
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
                          theImage.css('height', lastElement.data('originalHeight')+'px');
                      }
                            
                       
                    }


                }
                

                lastElement.css('visibility', 'visible');

              }
        }
    


    startAddingSidebarInterval = null;
    setSidebarLoadInterval();
    maxSidebarAutoLoad = 10 * 10; //10 seconds
    maxSidebarCounter = 0;

    $(window).scroll(function(event){
      //console.log(sideBarCompleted);
            if(!sideBarCompleted){
                clearInterval(startAddingSidebarInterval);
                setSidebarLoadInterval();
            }

            else{
              console.log('sideBarCompleted');
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



      // APIS


  $('#share_via_pinterest').sharrre({
  share : {
    pinterest : true
  },
  template : '<img src="http://susanwins.com/uploads/76008_pinterestubtton.png" style="left:4px!important;top: -3px;">',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.openPopup('pinterest');
  }
});
  $('#share_via_facebook').sharrre({
  share : {
    facebook : true
    },
    template : '<img src="http://susanwins.com/uploads/34329_fb-button.png" style="left: 2px!important;top: -4px;">',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    popup = api.openPopup('facebook');
  }
});

  $('#share_via_twitter').sharrre({
  share : {
    twitter : true
    },
     template : '<img src="http://susanwins.com/uploads/70478_twitter-icon.png" style="top: -3px;left: 1px;">',
  enableHover: false,
  enableTracking: true,
  click: function(api, options){
    api.openPopup('twitter');
  }
});
  $('#share_via_googlePlus').sharrre({
    share : {
    googlePlus : true
    },
  template : '<img src="http://susanwins.com/uploads/79339_g+button.png" style="left: 3px;top: -2px;">',
  enableHover: false,
  enableTracking: false,
  click: function(api, options){
    api.openPopup('googlePlus');
  }
});


    $('#api_count').sharrre({
    share : {
      pinterest : true,
      facebook : true,
      twitter : true,
      googlePlus : true
    },
    enableTracking: true,
    template : 'Total Shares: {total}',
    enableHover: false
  });

      //ENDOF APIS

$(function(){
  

  var top_games = 
  [
    "{!! $top_games[0] !!}",
    "{!! $top_games[1] !!}",
    "{!! $top_games[2] !!}",
    "{!! $top_games[3] !!}",
    "{!! $top_games[4] !!}",
    "{!! $top_games[5] !!}",
    "{!! $top_games[6] !!}",
    "{!! $top_games[7] !!}"
  ];

  var images19 = 
  [
    top_games[0],
    top_games[3],
    top_games[6]
  ];

  var images20 = 
  [
    top_games[1],
    top_games[4],
    top_games[7]
  ];

  var images21 = 
  [
    top_games[2],
    top_games[5]
  ];


  var ezslot19 = new EZSlots("ezslots19",{"reelCount":1,"winningSet":[0,0,0,0],"symbols":images19,"height":220,"width":226});
  var ezslot20 = new EZSlots("ezslots20",{"reelCount":1,"winningSet":[0,0,0,0],"symbols":images20,"height":220,"width":226});
  var ezslot21 = new EZSlots("ezslots21",{"reelCount":1,"winningSet":[0,0,0,0],"symbols":images21,"height":220,"width":226});
  
  

   $("#playFancy").click(function(){ 
    console.log(ezslot19.spin());
    console.log(ezslot20.spin());
    console.log(ezslot21.spin());
  });
 

});


});

</script>

@endsection

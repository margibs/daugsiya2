<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AllLad" />
    <meta name="propeller" content="18cbecba5946cbcf8014a1a9c091968e" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible">    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="google-site-verification" content="ZsovtY5ezCxnStSn3xVYrsyYw7Jdt3pUHDhlV-qwKTY" />
    
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <!-- Document Title
    ============================================= -->
    <title> @yield('page-title') </title>
    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="{{ asset('css/reset.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid24.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newAll.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/clubhouse.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/960_24_col.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/master.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="{{ asset('js/modernizr.2.5.3.min.js') }}"></script>


  <!--   <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">    -->

<!--   <link rel="stylesheet" href="{{url('')}}/{{ elixir('css/all.css') }}" type="text/css" /> -->
    
   

    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>        
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='/js/jquery.js' type='text/javascript'%3E%3C/script%3E"));
    }
    </script>
    -->

   @yield('scripts_here')

   </head>

<body>
<!-- <img src="{{ asset('clubhouse/img/assets/livingroom.png') }}" alt=""> -->
<div class="container_24" style="width: 1010px;">
  <div class="grid_24">

 <header>
      <div class="grid_5" style="width: 215px;">
        <a href="#"><img class="logo" src="http://susanwins.com/uploads/52424_logo.png" alt="Logo" /></a>
      </div>
      <div class="grid_12">
        <div class="search">
          <input type="text" placeholder="Search Games" id="search" autocomplete="off">                  
        </div>
      </div>
      <div class="grid_5" style="width: 215px;    margin-left: 25px;">
          @yield('user-options')
      </div>
    </header>
  </div>
</div>


    @yield('split-content')
    @yield('background-content')

	
    <script src="{{ asset('js/jquery-1.12.0.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/basic.js') }}"></script>
    <script src="{{ asset('js/CSSPlugin.min.js') }}"></script> 
    <script src="{{ asset('js/TweenLite.min.js') }}"></script> 
    <script src="{{ asset('js/clubhouse.plugins.js') }}"></script>
    <script>

      /*var _nxlOptions = _nxlOptions || [];
      _nxlOptions.tracker_code = '$2y$10$54gEixgpLZjfaudmBZ6xceN5vA1jkLNztnLEEiRsmc5Zf.cK19KY6';
        
       (function(){


        _tracker = document.createElement('script');
        _tracker.type = 'text/javascript';
        _tracker.async = true;
        _tracker.src = ('https:' == document.location.protocol ? 'https://ssl.' : 'http://') + 'nexolytics.dev/js/tracker.js';

        var s = document.getElementsByTagName('script')[0];

        s.parentNode.insertBefore(_tracker,s);

       })();*/

    </script>
    <script src="{{ asset('js/ezslots.js') }}"></script>   
    <script src="{{ asset('js/jquery.unveil.js') }}"></script>   
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script> 
    

    <!--<script src="{{ asset('js/jquery.m.flip.js') }}"></script>   -->
    <!-- <script src="https://cdn.rawgit.com/nnattawat/flip/v1.0.19/dist/jquery.flip.min.js"></script> -->
    <script src="{{ asset('js/jquery.leanModal.min.js') }}"></script>   
    <script src="{{ asset('js/home.js') }}"></script>   
    <script src="{{ asset('js/jquery.lazyimage.js') }}"></script>   

   @yield('custom_scripts')
  
  <script>

    $.fn.preload = function() {
        this.each(function(){
            $('<img/>')[0].src = this;
        });
    }
    $(['http://susanwins.com/uploads/64878_click-header.png']).preload();





    $(document).ready(function(){

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $(".categ-button").click(function(){

        $(".categ-entries").fadeToggle();

      });

      $('body').on('click', function(e){


        if( $('.categ-entries').is(':visible') && ( !$(e.target).hasClass('categ-entries') && !$(e.target).hasClass('categ-button'))){
           $(".categ-entries").fadeOut();
        } 

      });

      // OLD SEARCH

      /*$('#search').keyup(function(e){

        var searchField = $('#search').val(),
            timer = $('#search').data('timeout');

     

        $("#mainhead").css({
           "position":"relative",
           "z-index":"999",
        });

        $(".overlay").css({
          "background-color":"rgba(0, 0, 0, 0.2)",
            "position": "fixed",
            "width": "100%",
            "height": "100%",
            "z-index": "98",
        });

        // $("#floatingCirclesG").css({
        //   "display":"block",
        // });

        $('#search_result').html('<div id="floatingCirclesG"  style="display:block;"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div>');

        $("#search").css({
          "position": "absolute",
          "z-index": "99"
        });

        if(timer) 
        {
            clearTimeout(timer);
            $('#search').removeData('timeout');
        }

        // if(e.which === 40)
        // {
        //   $("#search_result").focus();
        //   console.log('unsa ning 40?');
        // }
        // else
        // {

          if( searchField == 0 || searchField == '' || searchField == null ) 
          {
            $('#search_result').html('');
          } 
          else if (e.which == 13) 
          {
            e.preventDefault();
            get_search_result(searchField);
          }
          else 
          {
            $('#search').data('timeout', setTimeout(get_search_result, 1000 * 0.5,searchField));
          }

        // }
      });*/


// NEW SEARCH

$('#search').on('input', function(e){


          //console.log($(this).val());

           var searchField = $('#search').val(),
            timer = $('#search').data('timeout');

     

        $("#mainhead").css({
           "position":"relative",
           "z-index":"999",
        });

        $(".overlay").css({
          "background-color":"rgba(0, 0, 0, 0.2)",
            "position": "fixed",
            "width": "100%",
            "height": "100%",
            "z-index": "98",
        });

        // $("#floatingCirclesG").css({
        //   "display":"block",
        // });

        $('#search_result').html('<div id="floatingCirclesG"  style="display:block;"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div>');

        $("#search").css({
          "position": "absolute",
          "z-index": "99"
        });

        if(timer) 
        {
            clearTimeout(timer);
            $('#search').removeData('timeout');
        }

        // if(e.which === 40)
        // {
        //   $("#search_result").focus();
        //   console.log('unsa ning 40?');
        // }
        // else
        // {

          if( searchField == 0 || searchField == '' || searchField == null ) 
          {
            $('#search_result').html('');
          } 
          else if (e.which == 13) 
          {
            e.preventDefault();
            get_search_result(searchField);
          }
          else 
          {
            $('#search').data('timeout', setTimeout(get_search_result, 1000 * 0.5,searchField));
          }

        // }


     
      });



      function get_search_result(searchField)
      {
        $.ajax({
          type: 'post',
          url: "{{url('home/ajax_get_posts')}}",
          data: {_token: CSRF_TOKEN,'searchField' : searchField}, 
          success: function(response)
          {
            var parsed = JSON.parse(response),
            output = '';

            $.each( parsed, function( index, obj){

              output += '<a class="entry" tabindex="1" href="{{url('')}}/' +obj.slug+ '" ><p>' +obj.title+ '</p><img src="{{url('uploads')}}/'+obj.icon_feature_image+'" width="100px" height="100px"> <div class="searchratingouter"> <span class="searchrating" style="width:'+Math.floor(obj.total_rating)+'%;"> &nbsp; </span> </div> </a>';
            
            });
            $('#search_result').html(output);
          }
        });
      }


    });



// Highlighting search results

    // added tanbindex="1" to each entries

  $('#search').on('keyup', function(e){
      if(e.which == 40){
        $('#search_result').find('.entry:first-child').focus().trigger('keydown');

      }
  });

  $('#search_result').on('focusin', '.entry', function(){
        $(this).css({'outline' : 0, 'background' : '#ccc'});
  }).on('focusout','.entry', function(){
      $(this).css({'background' : '#fff'});
  });

  $('#search_result').on('keydown','.entry:focus', function(e){

    if(e.which == 40 || e.which == 38){

        if(e.which == 40){
            $(this).next().focus();
        }else{

          if($(this).index() == 0){
            $('#search').focus();
          }else{
               $(this).prev().focus();
          }

          
        }

        return false;

    }

  });

  // ENDOF Highlighting search results


  $(".overlay").click(function(){
      $(this).css({
           "background":"none",
            "z-index": "0"
          }); 

      $('#search_result').html('');
  });

  </script>

  @yield('footer_scripts')


</body>
</html>

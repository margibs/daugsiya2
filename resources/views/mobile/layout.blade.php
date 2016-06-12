<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AllLad" />
    <meta name="propeller" content="18cbecba5946cbcf8014a1a9c091968e" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible">    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="google-site-verification" content="ZsovtY5ezCxnStSn3xVYrsyYw7Jdt3pUHDhlV-qwKTY" />
    
    <link rel="shortcut icon" href="{{ asset('images/susanfav.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,600' rel='stylesheet' type='text/css'>
    
    <!-- Document Title
    ============================================= -->
    <title> @yield('page-title') </title>
    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="{{ asset('css/reset.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/960_24_col.css') }}">        
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">   

    <script src="{{ asset('js/modernizr.custom.js') }}"></script>

  </head>
<body>




 <header>
    <a href="#"> <img src="{{ asset('images/mobilelogo.png') }}" alt="" class="logo"> </a>
    <nav>
      <ul>
        <li> <a href="#"> <img src="http://susanwins.com/images/homepage/susan-club-icon.png" alt=""> </a> </li>
        <li> <a href="#"> <img src="http://susanwins.com/images/homepage/user-icon.png" alt=""> </a> </li>
        <li> <a href="#"> <img src="http://susanwins.com/images/homepage/notif-icon.png" alt=""> </a> </li>
        <li> <a href="#" id="messageLink"> <img src="http://susanwins.com/images/homepage/message-icon.png" alt=""> </a> </li>
        <li> <a href="#"> <img src="http://susanwins.com/images/homepage/key-icon.png" alt=""> </a> </li>
      </ul>
    </nav>


   <div class="globalNotif messageBox">
      <h6> Messages </h6>
      <ul>
        <li> 
          <div class="imgbox">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg">
          </div>
          <p> 
            <b> <em> Margot Robbie </em> <span> 10:10pm </span> </b>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </li>
        <li> 
          <div class="imgbox">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg">
          </div>
          <p> 
            <b> <em> Margot Robbie </em> <span> 10:10pm </span> </b>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </li>
        <li> 
          <div class="imgbox">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg">
          </div>
          <p> 
            <b> <em> Margot Robbie </em> <span> 10:10pm </span> </b>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </li>
        <li> 
          <div class="imgbox">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg">
          </div>
          <p> 
            <b> <em> Margot Robbie </em> <span> 10:10pm </span> </b>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </li>
      </ul>
      <a href="#" class="viewall"> View All </a>
   </div>

  </header>


 <div class="container" style="padding:0;">
  <div class="row">
    <div class="col-xs-24 center">

   
      @yield('background-content')


    </div>
  </div>
</div>


	
  <script src="{{ asset('js/jquery-1.12.0.js') }}"></script>
  <script src="{{ asset('js/slidereveal.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $( "#messageLink" ).click(function() {
        $( ".messageBox" ).toggle( "fast", function() {          
        });
      });
    });
  </script>

  @yield('custom_scripts')

</body>
</html>

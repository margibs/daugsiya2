<!DOCTYPE html>
<html>
  <head>
    <title>My App</title>
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1.0,
                                   maximum-scale=1.0,
                                   user-scalable=no,
                                   minimal-ui">

                                    <link rel="stylesheet" href="{{ asset('css/reset.min.css') }}">
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/grid24.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">        
    <link rel="stylesheet" href="{{ asset('css/clubhouse.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:800,900' rel='stylesheet' type='text/css'>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="{{ asset('css/mobile-app.css') }}">
      


  </head>
  <body>
    @yield('content-list')


    <!-- put your pages here -->
    <script src="{{ asset('js/mobile-zepto.js') }}"></script>
    <script src="{{ asset('js/mobile-app.js') }}"></script>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>


    @yield('script')

    <script type="text/javascript">
          USER_IMAGE = "{{ Auth::user()->user_detail->profile_picture }} ";
    console.log(USER_IMAGE);

    </script>

    
  
  </body>
</html>
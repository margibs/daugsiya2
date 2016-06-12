
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Alllad" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />   

    <!-- Stylesheets
    ============================================= -->

    <link rel="stylesheet" href="{{ asset('nexuspress/css/grid12.css') }}">    
    <link rel="stylesheet" href="{{ asset('nexuspress/css/reset.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('nexuspress/css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('nexuspress/css/modal.css') }}">    
    <link rel="stylesheet" href="{{ asset('nexuspress/css/rome.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('nexuspress/nexuspress.css') }}">
    <link rel="stylesheet" href="{{ asset('nexuspress/chosen/chosen.min.css') }}" type="text/css" />
    
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="{{ asset('nexuspress/css/typeahead.tagging.css') }}" type="text/css" /> -->  

    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script> 
    <![endif]-->

<!--     <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>        
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write(unescape("%3Cscript src='{{ asset('nexuspress/js/jquery.js') }}' type='text/javascript'%3E%3C/script%3E"));
    }
    </script>

    <!-- Document Title
    ============================================= -->
    <title> SusanWins </title>

</head>

<div class="container">
    <div class="wrapper">

    <div class="offsetlinks"> 
          <ul>  
            <li><a href="{{ url('/') }}" target="_blank" data-tooltip="tooltip" title="Open Site"> <i class="icon-line-eye"></i></a></li>
            <li><a href="{{ url('/logout') }}" data-tooltip="tooltip" title="Logout"> <i class="icon-line-cross"></i></a></li>                                   
          </ul>
      </div>

      <div class="row no-gutters">
          <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
            <div class="left">
                <nav>
                  <ul>
                    @if(Auth::user()->is_admin == 1)
                    <li> <a href="{{ url('/admin/posts') }}"> <i class="icon-line2-docs"></i> Posts </a> </li>
                    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-line2-layers">  </i> Categories </a> </li>
                    <!-- <li> <a href="{{ url('admin/widgets') }}"> <i class="icon-line-grid"></i> Widgets </a> </li> -->
                    <li> <a href="{{ url('admin/media_gallery') }}"> <i class="icon-line-image"></i> Images </a> </li>
                    <li> <a href="{{ url('admin/casino') }}"> <i class="fa fa-money"></i> Casino  </a> </li>
                    <li> <a href="{{ url('admin/comments') }}"> <i class="icon-line-speech-bubble"> </i> Comments  </a> </li>
                    <li> <a href="{{ url('admin/users') }}"> <i class="icon-line-head"></i> Users </a> </li>
                    <!-- <li> <a href="{{ url('admin/ladbrokes') }}"> <i class="icon-line-image"></i> ladbrokes </a> </li> -->
                    <li> <a href="{{ url('admin/chatroom') }}"> <i class="fa fa-comments-o"></i> Chatroom </a> </li>
                    <li> <a href="{{ url('admin/autoposts') }}"> <i class="icon-line2-docs"></i> Autoposts </a> </li>
                    <li> <a href="{{ url('admin/prize') }}"> <i class="fa fa-gift"></i> Prizes </a> </li>
                    <li> <a href="{{ url('admin/notification') }}"> <i class="fa fa-bell-o"></i> Notification </a> </li>
                    <li> <a href="{{ url('admin/question') }}"> <i class="fa fa-bell-o"></i> Question </a> </li>
                    <li> <a href="{{ url('admin/home_ads') }}"> <i class="fa fa-bell-o"></i> Home ADS </a> </li>
                    <li> <a href="{{ url('admin/dynamic/link') }}"> <i class="fa fa-bell-o"></i> Dynamic Link </a> </li>
            <!--         <li> <a href="{{ url('admin/settings') }}"> <i class="icon-line2-settings"></i> Settings </a> </li> -->
                  @endif
                  </ul>
                </nav>
            </div>
          </div> 
          <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
            <div class="right">               
                @yield('content')
            </div>    
          </div>
      </div>
    </div>
  </div>

<script>
  $('.searchlink').click(function(){
    $('.searchform').toggle();
    $('.searchbox').focus();

  })
</script>

 <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>



  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/moment.min.js') }}"></script> 
    <script src="{{ asset('js/moment-timezone.min.js') }}"></script> 
    <script src="{{ asset('js/livestamp.min.js') }}"></script> 

    <script type="text/javascript">
      timeZone = 'Europe/London';

// Comment ---------------
  
  $('.timestamp').each(function(){
      timestamp = this;
      datetime = $(timestamp).data('datetime');
      $(timestamp).find('.livetime').livestamp(moment.tz(datetime, timeZone).format() );
      $(timestamp).find('.readable_time').text(moment.tz(datetime, timeZone).format('MMM DD, YYYY'));
  });
  </script>
  
   <!-- App scripts -->
        @stack('scripts')

</body>
</html>




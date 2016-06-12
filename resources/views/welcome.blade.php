<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
      <script type="text/javascript">
         var formData = function() {  var query_string = (location.search) ? ((location.search.indexOf('#') != -1) ? location.search.substring(1, location.search.indexOf('#')) : location.search.substring(1)) : '';  
        var elements = [];  
        if(query_string) {     
            var pairs = query_string.split("&");     
            for(i in pairs) {     
                if (typeof pairs[i] == 'string') {           
                    var tmp = pairs[i].split("=");           
                    var queryKey = unescape(tmp[0]);           
                    queryKey = (queryKey.charAt(0) == 'c') ? queryKey.replace(/\s/g, "_") : queryKey;   
                    elements[queryKey] = unescape(tmp[1]);      
                     }    
               } 
         }  
        return {     
            display: function(key) {         
                if(elements[key]) {           
                     document.write(elements[key]);         
                 } 
                 else {         
                       document.write("<!--If desired, replace everything between these quotes with a default in case there is no data in the query string.-->");          
                  }     
          }   
        } 
        }
        (); </script>

        <script type="text/javascript">
        

        </script> 
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{ url('email/send') }}" method="POST" class="form-horizontal">
                    {!! csrf_field() !!}
                    <?php
                        $email = '';
                        if(isset($_GET['email'])) {
                            $email = $_GET['email'];
                        } 
                    ?>
                    <div class="row">   
                        <div class="col-xs-12 col-lg-6" style="padding: 20px 40px;">
                        <input id="name" type='hidden' name='email' value= "<?php echo $email?>">
                        <input id="check_post_submit" value="Confirm " class="submit" type="submit">
                </form>
            </div>
        </div>
    </body>
</html>

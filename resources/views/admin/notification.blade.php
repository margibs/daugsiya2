@extends('admin.layout')

@section('content')

<style type="text/css">

.form-group input[type=text], .form-group textarea, .form-group select, .form-group input[type=date]{
    border: 1px solid #ddd;
    border-radius: 2px;
    font-family: Roboto;    
    width: 100%;
    padding: 10px;
    font-size: 15px;
   margin-bottom: 1px!important;
}
input[type=submit]{
    margin-top: 17px;
    font-size: 20px
}
h2{
    font-size: 23px;
    margin-bottom: 30px;
}

.serverp{
    margin-top: 30px;
    text-align: center;
    margin-bottom: 30px;
}
</style>

<!-- modal -->
  <div class="modal">
    <header class="modal-header">
      <h1 class="modal-header-title left"></h1>
      <button class="modal-header-btn modal-close" title="Close Modal"> <i class="icon-line-cross"></i> Close </button>
      <!-- <button class="modal-header-btn uploadbtn" title="Upload" style="float:left;"> <i class="icon-line-outbox"></i> Upload </button> -->
      <button class="modal-header-btn" id="save_image_close_modal" title="Close Modal"> <i class="icon-line-check"></i> Select </button>        
    </header>
    <div class="modal-body">
      <section class="modal-content">      
          
          <div id="fileuploader">Upload</div>            

          <div id="image_list"></div>

      </section>
    </div>
  </div>
<!-- modal -->
                
                <div class="submenu">
                  <ul>
                    <li> <a href="{{ url('admin/autoposts/new_autopost') }}"> <i class="icon-line-search"></i> Search </a> </li>
                  </ul>
                </div>

                    
                <div class="row">

                   

                    <div class="col-lg-4">  

                    
                          <div class="panel">
      
                                 <h2> Custom Notification </h2>    

                                    <p class="serverp">  Server Time: <span>  {{ $datetime->format('Y-m-d H:i:s') }} </span> </p>
                            <div class="categform">
                              <form class="form-inline" method="POST" action="{{ url('admin/addNewCustomNotification') }}">
                                  {!! csrf_field() !!}
                                 <input type="hidden" name="category_id" id="category_id" value="">
                                    <div class="form-group"> 
                                      <h6> Notification Link </h6>                             
                                      <input type="text" name="link" id="edit_me" value="">
                                    </div>
                                    <div class="form-group">
                                      <h6> Description </h6>
                                      <textarea name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h6> Autonotify Date/Time </h6> 
                                         <input id='date' name="date_posting" class='input' type="text"> 
                                      </div> 
                                      <div class="form-group">
                                          <div class="panel">
                                              <h6> 
                                                <a title="Upload Image" id="load_media_files" class="featImageButton featimglink modal-trigger"> 
                                                <i class="icon-line-plus"></i> Add an image  </a> 
                                              </h6>         
                                               <div id="img_here">
                                                <img src="" alt="" style="display:none">
                                              </div>   
                                            </div>

                                          <input id="image_url" type='hidden' name='image' value="{{old('image')}}">
                                        </div>  
                                <input type="submit" value="Submit">
                              </form>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8">
                        
                        <table style="text-align:left">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Link</th>
                                    <th>Autonotify</th>
                                    <th>Sent</th>
                                    <th>Action</th>            
                                </tr>
                            </thead>
                            <tbody>
                                  
                                  @foreach($custom_notifications as $c)
                                    <tr>
                                      <td>{{ $c->description }}</td>
                                      <td>{{ $c->link }}</td>
                                      <td>{{ $c->date_posting }}</td>
                                      <td><input type="checkbox" onclick="return false" {{ $c->executed == 1 ? 'checked="checked"' : '' }}></td>
                                      <td>

                                      @if($c->executed == 0)
                                           <a href="{{ url('admin/notification') }}/{{ $c->id }}/delete"> <i class="fa fa-times"></i>  </a>
                                            <a href="{{ url('admin/notification') }}/{{ $c->id }}/edit" style="margin-left: 10px;"> <i class="fa fa-pencil"></i> </a>
                                      @endif
                                         

                                          </td>
                                    </tr>
                                  @endforeach
                         
                            </tbody>
                        </table>

                    </div>
                    

                </div>

<script src="{{ asset('nexuspress/js/draggabilly.pkgd.js') }}"></script>
<script src="{{ asset('nexuspress/js/modal.js') }}"></script>
<script src="{{ asset('nexuspress/js/jquery.uploadfile.min.js') }}"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{ asset('nexuspress/js/rome.min.js') }}"></script>
<script>
  $('.uploadbtn').click(function(){
    $('#fileuploader').toggle();
  });
  window.onload = function(e){         
      Modal.init();
  };

  </script>

  <script id="template_for_media_file" type="nexus/template">
  <div class="outer">
    <a href="#" class="remove_image" get-id="--id--"> <i class="icon-line-cross"> </i> </a>
    <div class="inner">
      <img src="{{ url('uploads') }}/--image_url--" get-this="--image_url--" />
    </div>                          
  </div>
</script>

<script>

  rome(date);

  $(document).ready(function(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    template_for_media_file = $.trim($("#template_for_media_file").html());


          $("#fileuploader").uploadFile({
    url:"{{url('admin/ajax_upload_image')}}",
      fileName:"myfile",
      formData: { _token: CSRF_TOKEN },
      onSuccess:function(files,data,xhr,pd)
      {
        var parsed = JSON.parse(data);

          var add_parent = 
          template_for_media_file.replace(/--image_url--/ig, parsed.image_url)
          .replace(/--id--/ig, parsed.id);

          $('#image_list').prepend(add_parent);

      }
    });

     $('#load_media_files').on('click',function(){
        $('#image_list').html('');
          $.ajax({ 
            type: 'get',
            url: "{{url('admin/ajax_get_media_file')}}",
            success: function(response)
            {
              var parsed = JSON.parse(response);

                $.each( parsed, function( index, obj){

                  var add_parent = 
                    template_for_media_file.replace(/--image_url--/ig, obj.image_url)
                    .replace(/--id--/ig, obj.id);

                  $('#image_list').append(add_parent);

              });
            }
          });
      });


      var url = '';
      $("#image_list").on("click", "img", function (event) {
          url = $(this).attr('get-this');
          $('.outer').removeClass('selected');
          $(this).parents('.outer').addClass('selected');
      });
    // Hide modal if "Okay" is pressed
      $('#save_image_close_modal').click(function() {

          // $('#myModal').modal('hide');
          Modal.close();

          $('#img_here').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#image_url').attr('value',url).css('display', 'block');

          

      });
    
  });
</script>

@endsection
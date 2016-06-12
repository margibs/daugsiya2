@extends('admin.layout')

@section('content')

<style>
  #image_container .outer, #image_list .outer, #media_wrapper .outer {
    width: 160px;
  }
  #fileuploader{
    display: block;
    margin-bottom: 20px;
    margin-top: 20px;
    margin-right: 25px;
    margin-left: 0;
  }
  .panel{
    padding-left: 0;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />


<div class="submenu">
                  
  <div class="searchform"> 
  <form action="">
    <a href=""> <i class="icon-angle-right"></i> </a>
    <input type="text" class="searchbox" />
  </form>
  </div>

  <ul>
    <li> <a href="{{ url('/admin/new_post') }}"> <i class="icon-line-square-plus"></i> Blog Post </a> </li>
    <li> <a href="{{ url('/admin/lol_post') }}"> <i class="icon-line2-emoticon-smile"></i> LOL Post </a> </li>    
    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-line2-layers">  </i> Category </a> </li>                   
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>

<div class="row">
  
  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">  	

     <div id="media_wrapper">                    

	    @foreach($media_files as $media_file)
			<!-- <a href=""><div class="outer">
        <div class="inner">
          <img src="{{ url('/uploads') }}/{{$media_file->image_url}}" />
        </div>                          
      </div>
      </a> -->

        <a href="#" class="image_gallery" data-id="{{ $media_file->id }}" id="{{ $media_file->id }}"><div class="outer">
      <input type="hidden" name="id" id="id" class="media_id" value="{{ $media_file->id }}">
        <div class="inner">
          <img src="{{ url('/uploads') }}/{{$media_file->image_url}}" id="{{ $media_file->id}}" class="image_id" />
        </div>                          
      </div>
      </a>
			
		@endforeach 		
    
    </div>

    {!! $media_files->render() !!}    

  </div>

  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

      <div id="fileuploader">Upload</div>

    <!--   <div class="panel">
      <h6> Selected Image Details </h6>
      <div class="details">
      <span> Title </span>
      <p> I'm an image </p>
      <span> Dimension </span>
      <p> 500 x 205 </p>
      <span> Url </span>
      <input type="text" value="http://alllad.com/uploads/13484_super glue for eye drops.png">
      <a href="#" class="delete"> Delete </a>
      </div>                        
    </div> -->
     <div class="panel">
        <input type="hidden" name="delete_id" id="delete_id" value="">
        <h6> Selected Image Details </h6>
        <div class="details">
        <span> Title </span>
        <p id="title"> </p>
        <span> Description </span>
        <p id="description"> </p>
        <span> Url </span>
        <input type="text" value="" id="url">
        <a href="#" class="delete"> Delete </a>
        </div>                        
      </div>
   
  </div>

</div>


<script src="{{ asset('nexuspress/js/jquery.uploadfile.min.js') }}"></script>
<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$("#fileuploader").uploadFile({
			url:"{{url('admin/ajax_upload_image')}}",
			fileName:"myfile",
			formData: { _token: CSRF_TOKEN },
			onSuccess:function(files,data,xhr,pd)
			{
				var parsed = JSON.parse(data);

				// var add_parent = 
				// template_for_media_file.replace(/--image_url--/ig, parsed.image_url)
				// .replace(/--id--/ig, parsed.id);

				$('#media_wrapper').prepend("<div class='outer'><div class='inner'><img src='{{ url('/uploads') }}/"+parsed.image_url+"'></div></div>");

			}
		});

      $('.image_gallery').on('click', function(){

      // ID = document.getElementById("id").value;
        var ID = $(this).attr('id');
        //console.log(id);
      BASE_URL = '{{ url('') }}';

      $.ajax({
        url: BASE_URL+'/admin/findMediaFiles/'+ID,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('#title').html('');
          $('#title').append($('<span>').text(data.title))
          $('#description').html('');
          $('#description').append($('<span>').text(data.description))
          $('#url').val(data.image_url);
          $('#delete_id').val(data.id);
        },
        error: function(exr) {
          console.log(exr);
        }
      });
    });

    $('.delete').on('click', function(){
       ID = document.getElementById("delete_id").value;
       if(ID == '') {
           alert("Please Select Image");    
       }

       BASE_URL = '{{ url('') }}';

      $.ajax({
        url: BASE_URL+'/admin/deleteMediaFiles/'+ID,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          console.log(data);
          location.reload(true);
        },
        error: function(exr) {
          console.log(exr);
        }
      });

    });
    
	});
</script>

@endsection
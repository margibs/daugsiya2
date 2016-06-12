@extends('admin.layout')

@section('content')
<style>
	.form-horizontal .form-group{
	width:100%;
	padding-bottom:10px;
	position: relative;
	font-family: Roboto;
	margin-bottom: 3px;
}

.form-horizontal .form-group .form-control{
	width:100%;
}

#searchResults{
	    position: absolute;
	    background: #fff;
	    width: 100%;
	    border: 1px solid #ccc;
	    padding: 3px 7px;
	    z-index: 2;
	    display: none;
}

#clearResult,
#clearResult:hover,
#clearResult:visited
{
	position: absolute;
	display: none;
    top: 33px;
    right: 9px;
    color:#000;
    text-decoration: none;
}


.form-group .form-control{
	border: 1px solid #ddd;
	border-radius: 2px;
	font-family: Roboto;	
	width: 100%;
	padding: 10px;
	font-size: 15px;
}
.form-group .panel{
	margin: 0px;
	padding: 0px;
}
.form-group .panel h6{
	margin: 0px;
}
.form-group .panel a{
	font-size: 14px;
	padding: 15px 10px;
}
#check_post_submit{
	width: 220px!important;
}
#searchResults li a{
	text-decoration: none;
    padding: 5px 0;
    margin-bottom: 5px;
    display: block;
    border-bottom: 1px solid #F5F4F4;
    color: #EC0505;
    font-weight: 600;
}
h2{
	font-size: 23px;
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
                  
  <div class="searchform"> 
  <form action="{{url('admin/posts')}}" method="get">
    <!-- <a href=""> <i class="icon-angle-right"></i> </a> -->
    <input type="text" name="q" class="searchbox" value="{{Request::input('q')}}"/>
    <input type="hidden" name="orderby" value="{{Request::input('orderby')}}"/>
    <input type="hidden" name="categories" value="{{Request::input('categories')}}" />
    <input type="hidden" name="date" value="{{Request::input('date')}}" />
  </form>
  </div>

<!-- SUB NAVIGATION -->
	@include('admin.navigations.biggestWinNav')
<!-- END SUB NAVIGATION -->

</div>
@if($errors && count($errors) > 0)
						<ul class="errors">
							@foreach($errors->all() as $err)
								<li>{{ $err }}</li>
							@endforeach
						</ul>
					@endif
<form action="{{ url('admin/biggest_wins') }}" method="POST" class="form-horizontal">
					{!! csrf_field() !!}

					<div class="row">	
						<div class="col-xs-12 col-lg-6" style="padding: 20px 40px;">
							<div class="panel">
			                	<h2> New Big Win </h2>	
								
								<div class="form-group">
									 <h6> Search Game </h6> 
									<input type="text" class="form-control" id="search" autocomplete="off">
									<input type="hidden" name="post_id" id="post_id">
									<ul id="searchResults">
									</ul>
									<a href="javascript:;" id="clearResult"> <i class="fa fa-times"></i> </a>
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

									<input id="image_url" type='hidden' name='custom_image' value="{{old('custom_image')}}">
								</div>
								<div class="form-group">
									<h6>Total Wins</h6>
									<input type="number" name="total_wins" class="form-control" min="0.00" value="0.00">
								</div>		
								
							<input id="check_post_submit" value="Submit " class="submit" type="submit">	
								
							</div>	
			                
						</div>
					</div>
					</form>
					<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-6">
						<div class="panel">
								<table style="text-align:left">
                                <thead>
                                    <tr>
                                        <th> Post Slug </th>                                                       
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($biggest_wins as $w)
                                        <tr>
                                            <td>{{ $w->post->slug }}</td>
                                            <td>
                                             <a href="{{ url('admin/biggest_wins/delete') }}/{{ $w->id }}" style="margin-left: 10px;"> <i class="fa fa-times"></i></a>
                                            <a href="{{ url('admin/biggest_wins/edit') }}/{{ $w->id }}" style="margin-left: 10px;"> <i class="fa fa-pencil"></i> </a>

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

	    $('#search').on('input', function(){

	    	var searchField = $(this).val(),
            timer = $(this).data('timeout');

            $('#searchResults').show().html('').append(
            	$('<li>').text('Loading')
            	);


            if(timer) 
		        {
		            clearTimeout(timer);
		            $(this).removeData('timeout');
		        }


		        if(searchField){

		        	$('#search').data('timeout', setTimeout(get_search_result, 1000 * 0.5,searchField));
		        }

	    });

	    $('#search').on('blur', function(){
	    	$('#searchResults').hide();
	    } );
	    $('#search').on('focus', function(){
	    	
	    	if($('#searchResults').find('li').length){
	    			$('#searchResults').show();
	    	}
	    } );

	    $('#searchResults').on('mousedown', 'a', function(){
	    	 $('#search').focus();

	    	 post_id = $(this).data('post');

	    	 $('#post_id').val(post_id);

	    	 $('#search').val($(this).text());

	    	 $('#clearResult').show();
	    });

	    $('#clearResult').on('click', function(){
	    	$('#post_id').val('');
			$('#search').val('');
			$(this).hide();
	    });

	    function get_search_result(searchField)
		      {	

		      	 

		      	 

		        $.ajax({
		          type: 'post',
		          url: "{{url('home/ajax_get_posts_for_big_wins')}}",
		          data: {_token: CSRF_TOKEN,'searchField' : searchField}, 
		          success: function(response)
		          {
		          	console.log(response);
		            var parsed = JSON.parse(response),
		            output = '';

		            $('#searchResults').html('');

		            $.each( parsed, function( index, obj){

		            	$('#searchResults').append(

		            	$('<li>')

				      	 	.append($('<a href="javascript:;">').data('post', obj.id).text(obj.slug)

				      	));
		              
		            });

		            $('#search_result').html(output);
		          }
		        });
		      }
		
	});
</script>

<!-- <div class="pagination">
  <ul>
    <li> <a href=""> <i class="icon-double-angle-left"></i></a> </li>
    <li> <a href=""> <i class="icon-angle-left"></i></a> </li>
    <li> <a href="" class="active"> 1 </a> </li>
    <li> <a href=""> 2 </a> </li>
    <li> <a href=""> <i class="icon-angle-right"></i></a> </li>
    <li> <a href=""> <i class="icon-double-angle-right"></i></a> </li>
  </ul>
</div>
 -->

 <script>
  // $(".blogtitle").hover(function(){
  //   $('.blogoptions').css('visibility','visible');
  //   }, function(){
  //       // change to any color that was previously used.
  //       $('.blogoptions').css('visibility','hidden');
  //   });
 </script>

@endsection
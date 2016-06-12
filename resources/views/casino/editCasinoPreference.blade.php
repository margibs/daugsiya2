@extends('admin.layout')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
@include('casino.__navigation')

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

  <div class="panel">
  <h6> 
    <a title="Upload Image" id="load_media_files" class="featImageButton featimglink modal-trigger"> 
    <i class="icon-line-plus"></i> After Youtube Image  </a> 
  </h6>         
   <div id="img_here">
    @if(old('image_url'))
    <img src="{{url('uploads')}}/{{old('image_url')}}" alt="">
    @elseif($casinoPreference->yt_image_url != '')
    <img src="{{url('uploads')}}/{{$casinoPreference->yt_image_url}}" alt="">
    @endif
  </div>   
</div>



<form action="{{url('admin/casino_preference')}}/{{$casinoPreference->id}}" method="post">
	{!! csrf_field() !!}
	<input id="image_url" type='hidden' name='image_url' value="{{ old('image_url') }}">
  <input type='text' name='yt_image_link' value="{{$casinoPreference->yt_image_link}}" placeholder="Youtube Ads Link">
	Category: {{$casinoPreference->name}} <br>
	Casino to show: <input type="text" name="number_to_show" value="{{$casinoPreference->number_to_show}}"> 
	<input type="submit" value="Submit">
</form>

{!! Form::select('casino_id', $select_casinos,null,['id' => 'select_casino']) !!}
<button id="add_casino">Add Casino</button>

<table>
	<thead>
		<tr>
			<th>Casino Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="sortable">
	@foreach($casinoPreferenceLists as $casinoPreferenceList)
		<tr>
			<td get-this="{{$casinoPreferenceList->casino_id}}">{{$casinoPreferenceList->name}}</td>
			<td class="remove_casino" get-this="{{$casinoPreferenceList->id}}">remove</td>
		</tr>
	@endforeach
	</tbody>
</table>

<script src="{{ asset('nexuspress/js/draggabilly.pkgd.js') }}"></script>
<script src="{{ asset('nexuspress/js/modal.js') }}"></script>
<script src="{{ asset('nexuspress/js/jquery.uploadfile.min.js') }}"></script>

<script>
  $('.uploadbtn').click(function(){
    $('#fileuploader').toggle();
  });
  window.onload = function(e){         
      Modal.init();
  };

  $(document).on('click','.addchoice',function(event){ 
      event.preventDefault();
      $('.pollul').append('<li> <input type="text" name="poll_choice[]" placeholder="Type here.." /> </li>');         
  });
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
  $(function() {
  	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
  		casino_preference_id = {{$casinoPreference->id}},
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
        $('#image_url').attr('value',url);
    });


    $( "#sortable" ).sortable({
  		update: function( event, ui ) { 
  			var arr = $('#sortable tr td:first-child').map(function () {
		    	return $.trim($(this).attr('get-this'))
			}).get();
  			
  			console.log(arr);

			$.ajax({ 
		      type: 'post',
		      url: "{{url('admin/casino/ajax/save_sort')}}",
		      data: {_token: CSRF_TOKEN,'array' : arr,'casino_preference_id' : casino_preference_id }, 
		      success: function(response)
		      {
		      	// console.log(arr);
		      }

		    });
  		}
	});

    $( "#sortable" ).disableSelection();

    $('#add_casino').on('click',function(){
    	var casino_id = $('#select_casino').val();

    	$.ajax({ 
		      type: 'post',
		      url: "{{url('admin/casino/ajax/save_casino_preferences_list')}}",
		      data: {_token: CSRF_TOKEN,'casino_id' : casino_id,'casino_preference_id' : casino_preference_id }, 
		      success: function(response)
		      {

		      	if(response != 'already added')
		      	{
		      		var parsed = JSON.parse(response);
		      		$('#sortable').append('<tr><td get-this='+parsed.casino_id+'>' + parsed.name + '</td><td class="remove_casino" get-this='+parsed.id+'>remove</td></tr>');
		      	}

		      }
		    });
    });

    $('#sortable').on('click','.remove_casino',function(){
    	$(this).parent().remove();

	    var arr2 = $('#sortable tr td:first-child').map(function () {
		    	return $.trim($(this).attr('get-this'))
			}).get();
  			
			$.ajax({ 
		      type: 'post',
		      url: "{{url('admin/casino/ajax/save_sort')}}",
		      data: {_token: CSRF_TOKEN,'array' : arr2,'casino_preference_id' : casino_preference_id }, 
		      success: function(response)
		      {
		      	// console.log(arr);
		      }

		});

    });

  });
</script>

@endsection
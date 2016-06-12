@extends('admin.layout')

@section('content')

 <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- modal -->
    <div class="modal">
      <header class="modal-header">
        <h1 class="modal-header-title left"></h1>
        <button class="modal-header-btn modal-close" title="Close Modal"> <i class="icon-line-cross"></i> Close </button>
        <button class="modal-header-btn" id="save_image_close_modal" title="Close Modal"> Select </button>
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
    <form action="">
      <a href=""> <i class="icon-angle-right"></i> </a>
      <input type="text" class="searchbox" />
    </form>
    </div>

<!-- SUB NAVIGATION -->
  @include('admin.navigations.biggestWinNav')
<!-- END SUB NAVIGATION -->
    
  </div>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

    <form method="POST" action="{{ url('admin/new_post') }}/{{$post->id}}" enctype="multipart/form-data">
       {!! csrf_field() !!}

        <input id="featured_image" type='hidden' name='feat_image_url' value='{{$post->feat_image_url}}'>
        <input id="thumb_feature_image" type='hidden' name='thumb_feature_image' value="{{ $post->thumb_feature_image }}">
        <input id="icon_feature_image" type='hidden' name='icon_feature_image' value="{{ $post->icon_feature_image }}">
        <input id="reels_image" type='hidden' name='reels_image' value="{{ $post->reels_image }}">
        
        <input type="hidden" id="widget_image_url" name="widget_image_url" value="{{$post->yt_image}}">
        
        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

      <div class="panel">
        <h6> Select a category </h6>
        <ul class="categories">

          @foreach($categories as $category)              
              <?php $check = false; ?>

              @if($category->post_id != null)
                <?php $check = true; ?>
              @endif
              
              <li>
                <div>
                  <!-- <input id="option1" type="checkbox" name="field1" value="option"> -->
                    {!! Form::checkbox('category_id[]', $category->id,$check) !!}     
                  <label for="option1"><span><span></span></span> {{ $category->name }}   </label>
                </div>
              </li>     
              
          @endforeach

                     
        </ul>
      </div>                    

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Featured Image  </a> </h6>         
         <div id="img_here">
          <img src="{{url('uploads')}}/{{$post->feat_image_url}}" alt="">
         </div>
      </div>

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files2" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Thumbnail Image  </a> </h6>         
         <div id="img_here2">
          <img src="{{url('uploads')}}/{{$post->thumb_feature_image}}" alt="">
         </div>
      </div>

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files3" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Icon Image  </a> </h6>         
         <div id="img_here3">
          <img src="{{url('uploads')}}/{{$post->icon_feature_image}}" alt="">
         </div>
      </div>

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files4" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Reel Image  </a> </h6>         
         <div id="img_here4">
          <img src="{{url('uploads')}}/{{$post->reels_image}}" alt="">
         </div>
      </div>



  <!--     <div class="panel">
        <h6> Image after video playback </h6>    
        <a id="load_media_files2" title="Upload Image" class="featImageButton featimglink"> <i class="icon-line2-plus"></i> </a>
         <div id="img_here2">
          @if($post->yt_image != '')
          <img src="{{url('uploads')}}/{{$post->yt_image}}" alt="">
          @endif
        </div>  
      </div>
 -->

<!--       <div class="panel">
        <h6 style="margin-bottom: 15px;"> Auto Post </h6>
          <span class="switchtitle fb"> <i class="icon-facebook-sign" style="margin-right: 9px;"></i> Facebook </span>
          <div class="onoffswitch">
               {!! Form::checkbox('shared_fb', 1,$shared_fb_status, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch'] ) !!}            
              <label class="onoffswitch-label" for="myonoffswitch"></label>
          </div>

          <span class="switchtitle twitter"> <i class="icon-twitter"></i> Twitter </span>
          <div class="onoffswitch">
              {!! Form::checkbox('shared_twitter', 1,$shared_twitter_status, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch2'] ) !!}     
              <label class="onoffswitch-label" for="myonoffswitch2"></label>
          </div>
         
      </div> -->

    <div class="panel panel-default">
           <div class="panel-heading">
                <h2 class="panel-title">  </h2>
            </div>
            <div class="panel-body">
                <div class="controls">
                  <?php $widget_visible_var = false; ?>
                    @if($widget_rating != null)
                     <!-- <img src="{{url('uploads')}}/{{$widget_rating->image_url}}" alt=""> -->
                      @if($widget_rating->enable == 1)
                        <?php $widget_visible_var = true; ?>
                      @endif
                    @endif 

                    <input type="hidden" id="widget_image_url" name="widget_image_url" value="{{ $widget_rating != null ? $widget_rating->image_url : '' }}">
                     <div class="switch pull-right">                              
                       {!! Form::checkbox('widget_visible', 1, $widget_visible_var, ['id'=>'cmn-toggle-1','class'=>'cmn-toggle cmn-toggle-round']) !!}
                      <label for="cmn-toggle-1"></label>
                    </div>

                    Enable Widget
                    <div class="clearfix"></div><br />
                    Music Sounds
                    {!! Form::select('music_sounds', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], $widget_rating != null ? $widget_rating->music_sounds : 1, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><br />
                    Fun Rate                              
                    {!! Form::select('fun_rate', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], $widget_rating != null ? $widget_rating->fun_rate : 1, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><br />  
                    Long term play                            
                    {!! Form::select('long_term_play', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], $widget_rating != null ? $widget_rating->long_term_play : 1, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><br />
                    Graphics
                    {!! Form::select('graphics', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], $widget_rating != null ? $widget_rating->graphics : 1, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><br />  
                     Final Verdict
                    <textarea name="final_verdict">{{  $widget_rating->final_verdict }} </textarea>
                    <div class="clearfix"></div><br />  
                    
                    <!-- <input type="text" name="slot_url" class="form-control"  placeholder="Enter slot game URL" value="{{ $widget_rating != null ? $widget_rating->slot_url : '' }}"> -->
                  

                </div>
            </div>

        </div>


         <div class="panel">
        <div class='parent'>
          <label for='dt'>Pick a date and a time: </label>
          <input id='dt' name="publish_date_time" class='input' value="{{$post->created_at}}">         
        </div>
      </div>

      <div class="panel">
        <h6> Publish </h6>                    
        <span class="switchtitle twitter"> <i class="icon-line-marquee"></i> Publish </span>


          <div class="onoffswitch">

              <?php $check_publish = false; ?>

                @if($post->status == 1)
                  <?php $check_publish = true; ?>
                @endif

              {!! Form::checkbox('status', 1,$check_publish, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch3']) !!}

              <label class="onoffswitch-label" for="myonoffswitch3"></label>
          </div>
        
          <button id="check_post" class="button button-3d"  style="display: none;">Check Post</button>
          <input id="check_post_submit" type="submit" value="Submit" class="submit">       
        
      </div>                    
  </div>

  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
    <a href="{{url('')}}/{{$post->slug}}">LINK</a>
      <div class="wysiwyg">                      
        <input type="text" value="{{$post->title}}" name="title" class="titlebox newPost newPostBox" placeholder="Enter Title Here.."  style="margin-bottom: 20px;" />                   
        <input type="text" value="{{$post->name}}" name="name" class="titlebox newPost newPostBox" placeholder="Game Name"  style="margin-bottom: 20px;" />
        <br />
        Slug
        <input type="text" value="{{$post->slug}}" name="slug" class="titlebox newPost newPostBox" placeholder="Enter Title Here.."  style="margin-bottom: 20px;" />                   
        
        <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="content" id="editor1" rows="10" cols="80">{!! $post->content !!}</textarea>
        </div>

        <textarea name="introduction" id="" class="excerptBox" placeholder="Introduction">{{$post->introduction}}</textarea>
        <textarea name="excerpt" id="" class="excerptBox" placeholder="Exceprt">{{$post->excerpt}}</textarea>           
      </div>

      </form>
  </div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
</script>



<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'editor1',{
  //     filebrowserBrowseUrl : 'media_file',

  // });

  var editorElem = document.getElementById("editorcontainer");
   var editor = CKEDITOR.replace("editor1", { 
      filebrowserBrowseUrl : 'media_file',
      on : {
         // maximize the editor on startup
         'instanceReady' : function( evt ) {
            evt.editor.resize("100%", editorElem.clientHeight);
         }
      }
   });

  CKEDITOR.skinName = 'minimalist';

</script>




<script id="template_for_media_file" type="nexus/template">
<div class="outer">
<a href="#" class="remove_image" get-id="--id--">X</a>
<div class="inner">
<img src="{{ url('uploads') }}/--image_url--" get-this="--image_url--" />
</div>                          
</div>
</script>

<script>
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
      template_for_media_file = $.trim($("#template_for_media_file").html()),
      load_file = 0;

  $('#load_media_files').on('click',function(){
    load_file = 1;
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

  $('#load_media_files2').on('click',function(){
    Modal.open();
      load_file = 2;
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

$('#load_media_files3').on('click',function(){
    Modal.open();
      load_file = 3;
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

$('#load_media_files4').on('click',function(){
    Modal.open();
      load_file = 4;
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



  // $('#load_media_files2').on('click',function(){
  //     load_file = 2;
  //   $('#image_list').html('');
  //     $.ajax({ 
  //       type: 'get',
  //       url: "{{url('admin/ajax_get_media_file')}}",
  //       success: function(response)
  //       {
  //         var parsed = JSON.parse(response);

  //           $.each( parsed, function( index, obj){

  //             var add_parent = 
  //               template_for_media_file.replace(/--image_url--/ig, obj.image_url)
  //               .replace(/--id--/ig, obj.id);

  //             $('#image_list').append(add_parent);

  //         });

  //       }
  //     });

  //   $('#myModal').modal('show');
  // });

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

  $("#image_list").on('click','.remove_image',function() {

    var current_image = $(this);
    var image_id = current_image.attr('get-id');

    if(confirm("Are you sure to delete this image?") == true)
    {

      $.ajax({ 
        type: 'post',
        url: "{{url('admin/ajax_delete_image')}}",
        data: {_token: CSRF_TOKEN,'image_id' : image_id},
        success: function(response) 
        {
           current_image.parent().remove();
        }
      });
    }

    return false;
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

        if(load_file == 1)
        {
          $('#img_here').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#featured_image').attr('value',url);
        }
        else if(load_file == 2)
        {
          $('#img_here2').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#thumb_feature_image').attr('value',url);
        }
        else if(load_file == 3)
        {
          $('#img_here3').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#icon_feature_image').attr('value',url);
        }
        else if(load_file == 4)
        {
          $('#img_here4').html("<img src='{{ url('uploads') }}/"+url+"'>");
          $('#reels_image').attr('value',url);
        }
        
        
        load_file = 0;
    });
});

</script>
@endsection
@extends('admin.layout')

@section('content')


<style>
  #loadmoreajaxloader{
    display: none;
  }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />

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
    <form action="">
      <a href=""> <i class="icon-angle-right"></i> </a>
      <input type="text" class="searchbox" />
    </form>
    </div>

    <ul>
      <li> <a href="{{ url('/admin/new_post') }}" class="active"> <i class="icon-line-square-plus"></i> Blog Post </a> </li>
      <li> <a href="{{ url('/admin/biggest_wins') }}"> <i class="fa fa-trophy"></i> Biggest Wins </a> </li>                    
      <li> <a href="{{ url('/admin/posts') }}"> <i class="icon-paperclip"></i> All </a> </li>
      <li> <a href="{{ url('/admin/drafts') }}"> <i class="icon-line-marquee"></i> Draft </a> </li>
      <li> <a href="{{ url('/admin/trash') }}"> <i class="icon-trash"></i> Trash </a> </li>                    
      <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
    </ul>

    
  </div>

  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

    <form method="POST" action="{{ url('admin/new_post') }}" enctype="multipart/form-data">
       {!! csrf_field() !!}

        <input id="featured_image" type='hidden' name='feat_image_url' value="{{ old('feat_image_url') }}">
        <input id="thumb_feature_image" type='hidden' name='thumb_feature_image' value="{{ old('thumb_feature_image') }}">
        <input id="icon_feature_image" type='hidden' name='icon_feature_image' value="{{ old('icon_feature_image') }}">
        <input id="reels_image" type='hidden' name='reels_image' value="{{ old('reels_image') }}">


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
         <li>
            <div>
              <!-- <input id="option1" type="checkbox" name="field1" value="option"> -->
                {!! Form::checkbox('category_id[]', $category->id) !!}     
              <label for="option1"><span><span></span></span> {{ $category->name }}   </label>
            </div>
          </li> 

                                  
                  
        @endforeach

                     
        </ul>
      </div>                    

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Featured Image  </a> </h6>         
         <div id="img_here">
          @if(old('feat_image_url'))
          <img src="{{url('uploads')}}/{{old('feat_image_url')}}" alt="">
          @endif
        </div>   
      </div>

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files2" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Thumbnail Image  </a> </h6>         
         <div id="img_here2">
          @if(old('thumb_feature_image'))
          <img src="{{url('uploads')}}/{{old('thumb_feature_image')}}" alt="">
          @endif
        </div>   
      </div>

      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files3" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Icon Image  </a> </h6>         
         <div id="img_here3">
          @if(old('icon_feature_image'))
          <img src="{{url('uploads')}}/{{old('icon_feature_image')}}" alt="">
          @endif
        </div>   
      </div>


    
      <div class="panel">
        <h6> <a title="Upload Image" id="load_media_files4" class="featImageButton featimglink modal-trigger"> <i class="icon-line-plus"></i> Reel Image  </a> </h6>         
         <div id="img_here4">
          @if(old('reels_image'))
          <img src="{{url('uploads')}}/{{old('reels_image')}}" alt="">
          @endif
        </div>   
      </div>


     <div class="panel panel-default">
           <div class="panel-heading">
                <h2 class="panel-title">  </h2>
            </div>
            <div class="panel-body">
                <div class="controls">
                 
                    <input type="hidden" id="widget_image_url" name="widget_image_url" value="">
                     <div class="switch pull-right">                              
                       {!! Form::checkbox('widget_visible', 1, null, ['id'=>'cmn-toggle-1','class'=>'cmn-toggle cmn-toggle-round']) !!}
                      <label for="cmn-toggle-1"></label>
                    </div>

                    Enable Widget
                    <div class="clearfix"></div><Br />
                    Music Sounds
                    {!! Form::select('music_sounds', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], null, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><Br />
                    Fun Rate                              
                    {!! Form::select('fun_rate', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], null, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><Br />
                    Long term play                              
                    {!! Form::select('long_term_play', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], null, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><Br />
                    Graphics
                    {!! Form::select('graphics', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',], null, ['class'=>'form-control']) !!} <br>
                    <div class="clearfix"></div><Br />
                    Final Verdict
                    <textarea name="final_verdict"></textarea>
                    <div class="clearfix"></div><Br />
                  
                </div>
            </div>

        </div>


      <div class="panel">
        <div class='parent'>
          <label for='dt'>Pick a date and a time: </label>
          <input id='dt' name="publish_date_time" class='input' value="{{date('Y-m-d H:i')}}">         
        </div>
      </div>

      <div class="panel">
        <h6> Publish </h6>                    
        <span class="switchtitle twitter"> <i class="icon-line-marquee"></i> Publish </span>
          <div class="onoffswitch">
              {!! Form::checkbox('status', 1, true, ['class'=>'onoffswitch-checkbox', 'ID'=>'myonoffswitch3']) !!}
              <label class="onoffswitch-label" for="myonoffswitch3"></label>
          </div>
        
          <button id="check_post" class="button button-3d"  style="display: none;">Check Post</button>
          <input id="check_post_submit" type="submit" value="Submit" class="submit">       
        
      </div>  

    


  </div>

  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

      <div class="wysiwyg">                      
        <input type="text" value="{{ old('title') }}"name="title" class="titlebox newPost newPostBox" placeholder="Enter Title Here.."  style="margin-bottom: 20px;" />                      
           <input type="text" value="{{ old('name') }}"name="name" class="titlebox newPost newPostBox" placeholder="Game Name"  style="margin-bottom: 20px;" /> 
        <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="content" id="editor1" rows="10" cols="80">{{ old('content') }}</textarea>
        </div>

        <textarea name="introduction" id="" class="excerptBox" placeholder="Introduction">{{ old('introduction') }}</textarea>
        <textarea name="excerpt" id="" class="excerptBox" placeholder="Excerpt">{{ old('excerpt') }}</textarea>
        
        
      
      </div>

      </form>
  </div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('nexuspress/js/draggabilly.pkgd.js') }}"></script>
<script src="{{ asset('nexuspress/js/modal.js') }}"></script>
<script src="{{ asset('nexuspress/js/jquery.uploadfile.min.js') }}"></script>
<script src="{{ asset('nexuspress/js/rome.min.js') }}"></script>
<script src="{{ asset('js/example.js') }}"></script>

<script>
  rome('.input');

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
    <a href="#" class="remove_image" get-id="--id--"> <i class="icon-line-cross"> </i> </a>
    <div class="inner">
      <img src="{{ url('uploads') }}/--image_url--" get-this="--image_url--" />
    </div>                          
  </div>
</script>

<script id="template_for_copyscape" type="nexus/template">
Matched site count: --count-- <br />
Matched words count: --allwordsmatched-- <br />
Matched percentage: --allpercentmatched--% <br />
Matched text: <br />
--alltextmatched-- <br />
</script>

<script>
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'),
      template_for_media_file = $.trim($("#template_for_media_file").html()),
      template_for_copyscape = $.trim($("#template_for_copyscape").html()),
      load_file = 0;

      Modal.init();

  // $(document).on('click','#check_post',function(e){
    
  //   // check_post_submit
  //   var content = $('iframe').contents().find("body").html();
    
  //   // console.log('check_post');
  //   // console.log(content);

  //   var content2 = $(content);
  //   $('blockquote').html('');

  //   content2 = content2.html();

  //   content2 = content2.replace(/(<([^>]+)>)/ig,"");

  //   // console.log(content2);

  //   $('#check_post').attr('disabled','disabled');

  //   e.preventDefault();

  //   $("#loadmoreajaxloader").css({'display':'block'});

  //   $.ajax({ 
  //     type: 'post',
  //     url: "{{url('admin/ajax_check_content')}}",
  //     data: {_token: CSRF_TOKEN,'content' : content2 }, 
  //     success: function(response)
  //     {
  //       var parsed = JSON.parse(response);
  //       var add_parent = 
  //         template_for_copyscape.replace(/--count--/ig, parsed.count)
  //         .replace(/--allwordsmatched--/ig, parsed.allwordsmatched)
  //         .replace(/--allpercentmatched--/ig, parsed.allpercentmatched)
  //         .replace(/--alltextmatched--/ig, parsed.alltextmatched);
  //         $("#loadmoreajaxloader").css({'display':'none'});

  //         $('#copyscape').html(add_parent);

  //         if(parsed.allpercentmatched < 10)
  //         {
  //           $('#check_post_submit').attr('style','display:block;');
  //           $('#check_post').attr('style','display:none;');
  //         }

  //         $('#check_post').removeAttr('disabled');

  //     }
  //   });

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
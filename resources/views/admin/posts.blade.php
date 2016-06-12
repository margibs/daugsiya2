@extends('admin.layout')

@section('content')
  
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


<table>
<form action="{{url('admin/posts')}}" method="get">
<input type="hidden" name="q" value="{{Request::input('q')}}">
  <thead>
    <td>
      <input name="" type="checkbox">     
      <label for="option1"><span><span></span></span> </label>
    </td>
    <td>
      {!! Form::select('orderby', ['all' => 'Title','ASC' => 'Ascending','DESC' => 'Descending'],Request::input('orderby')) !!}
    </td>
    <td>
      {!! Form::select('categories', $category_lists ,Request::input('categories')) !!}
    </td>
    <td>
    {!! Form::select('date', ['all' => 'Date','12' => 'December'],Request::input('date')) !!}
    </td>
    <td>
      Is Mobile
    </td>
    <td> <input type="submit" value="Filter"> </td>
  </thead>
  </form>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <td>         
          <input name="" type="checkbox">     
          <label for="option1"><span><span></span></span> </label>        
      </td>
      <td class="blogtitle"> 
        <a href="{{url('admin/posts')}}/{{$post->id}}"> {{$post->title}} </a> 
        <ul class="blogoptions">
          <li> <a href="#"> <a href="#"> <i class="icon-eye-open"></i> </a> </a> </li>
          <li> <a href="#"> <a href="#"> <i class="icon-bolt2"></i> </a> </a> </li>        
        </ul>         
      </td>
      <td>
      @if(isset($post->categories))
        @foreach($post->categories as $category)
          {{$category->name}}
        @endforeach 
      @else
        {{$post->name}}
      @endif
     </td>
      <td> {{ date( 'jS F Y', strtotime($post->created_at) ) }} </td>
      <td>
          @if($post->is_mobile == 0)
          <!--   <input type="checkbox"  class="is_mobile" value="{{ $post->id }}"><br> -->
           <input type="checkbox" name="is_mobile[]" id="is_mobile" value="{{ $post->id }}"><br>
          @else
           <!-- <input type="checkbox" class="is_mobile" value="{{ $post->id }}" checked><br> -->

           <input type="checkbox" name="is_mobile[]" id="is_mobile" value="{{ $post->id }}" checked><br>
          
          @endif
      </td>
      <td class="del" style="text-align: center;"> <a href="{{url('admin/posts')}}/{{$post->id}}/delete" style="font-size: 12px;color: #CAC8C8;"><i class="icon-line-cross"></i></a> </td>
    </tr>   
  @endforeach 
  </tbody>
</table>

{!! $posts->appends(Request::except('q'))->render() !!}

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

/*
*
* ADDING FUNCTION TO CHECK IF MOBILE 
* AUTHOR: IAN ROSALES
* DATA:  4/29/2016
*
*
*
*/
  
  $("input[type=checkbox]").change( function() {
    if($(this).is(":checked")){
      var value = $(this).val();
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'), template_for_media_file = $.trim($("#template_for_media_file").html());
     $.ajax({
          type: 'post',
          url: "{{ url('admin/posts/ismobile') }}",
          data: {_token: CSRF_TOKEN,'is_mobile' : 1, 'id': value},
          success: function(response)
          {
            console.log(response);
          },
          error: function(error)
          {
            console.log(error);
          }
        });
    }
    if ($(this).is(':checked') == false) {
      var value = $(this).val();
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'), template_for_media_file = $.trim($("#template_for_media_file").html());
      $.ajax({
        type: 'post',
        url: "{{ url('admin/posts/ismobile') }}",
        data: {_token: CSRF_TOKEN,'is_mobile' : 0, 'id': value},
        success: function(response)
        {
          console.log(response);
        },
        error: function(error)
        {
          console.log(error);
        }
      });
    }
  });
 
 </script>

@endsection
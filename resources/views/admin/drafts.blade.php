@extends('admin.layout')

@section('content')
  
 <div class="submenu">
                  
  <div class="searchform"> 
  <form action="{{url('admin/drafts')}}" method="get">
    <!-- <a href=""> <i class="icon-angle-right"></i> </a> -->
    <input type="text" name="q" class="searchbox" />
  </form>
  </div>

<!-- SUB NAVIGATION -->
  @include('admin.navigations.biggestWinNav')
<!-- END SUB NAVIGATION -->

</div>


<table>
  <thead>
    <td>
      <input name="" type="checkbox">     
      <label for="option1"><span><span></span></span> </label>
    </td>
    <td>
      <select name="" id="">
          <option value=""> Title </option>
          <option value=""> Ascending </option>
          <option value=""> Descending </option>
        </select>
    </td>
    <td> 
        <select name="" id="">
          <option value=""> Categories </option>
          <option value=""> Banter </option>
          <option value=""> News </option>
        </select>
    </td>
    <td>
      <select name="" id="">
          <option value=""> Date </option>
          <option value=""> October </option>
          <option value=""> September </option>
          <option value=""> August </option>
          <option value=""> July </option>
        </select>
    </td>
    <td> Action </td>
  </thead>
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
      <td> @foreach($post->categories as $category)
        {{$category->name}}
      @endforeach 
    </td>
      <td> {{ date( 'jS F Y', strtotime($post->created_at) ) }} </td>
      <td class="del" style="text-align: center;"> <a href="{{url('admin/posts')}}/{{$post->id}}/delete" style="font-size: 12px;color: #CAC8C8;"><i class="icon-line-cross"></i></a> </td>
    </tr>   
  @endforeach 
  </tbody>
</table>

{!! $posts->appends(Request::only('q'))->render() !!}

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
@extends('admin.layout')

@section('content')

<div class="submenu">
                  
  <div class="searchform"> 
  <form action="">
    <a href=""> <i class="icon-angle-right"></i> </a>
    <input type="text" class="searchbox" />
  </form>
  </div>

  <ul>
    <li> <a href="{{ url('admin/comments') }}" @if($comment_status2 == 3) class="active" @endif> <i class="icon-line-speech-bubble"></i> All </a> </li>
    <li> <a href="{{ url('admin/comments') }}?comment_status=approved" @if($comment_status2 == 1) class="active" @endif> <i class="icon-line-check"></i> Approved </a> </li>                    
    <li> <a href="{{ url('admin/comments') }}?comment_status=pending" @if($comment_status2 == 0) class="active" @endif> <i class="icon-line-cross"></i> Pending </a> </li>
    <li> <a href="{{ url('admin/comments') }}?comment_status=trashed" @if($comment_status2 == 2) class="active" @endif> <i class="icon-trash"></i> Trash </a> </li>                  
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>


<table>
  <thead>
    <tr><td style="width: 3%;"> <input type="checkbox"> </td>
    <td style="width: 10%;"> Name </td>
	<td> Content </td>				
	<td style="width: 10%;"> Date </td>
	<td style="width: 3%;"> Approved</td>
	<td style="width: 35%;text-align: center;"> Post </td>
	<td> Action </td>
  </tr>
  </thead>
  <tbody>
  @foreach($comments as $comment)
		<tr>
		 	<td> <input type="checkbox"> </td>
			<td>{{$comment->name}}</td>
			<td>{{$comment->content}}</td>					
			<td style="text-align: center;">{{$comment->created_at}}</td>
			<td style="text-align: center;">
				@if($comment->approved == 0)
					<a href=""><i class="icon-thumbs-down"></i></a>
				@else
					<a href="" style="color:green;"><i class="icon-thumbs-up"></i></a>
				@endif
			</td>
			<td> 
			<a href="{{ url('/') }}/{{ $comment->slug }}" traget="_blank" style="font-size: 13px;">{{ url('/') }}/{{ $comment->slug }}</a> </td>
			<td style="text-align: center;"><a href="#"><i class="icon-trash"></i></a></td>
		</tr>
	@endforeach	
  </tbody>
</table>

{!! $comments->appends(Input::except('page'))->render() !!}

@endsection
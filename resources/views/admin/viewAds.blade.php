@extends('admin.layout')

@section('content')

@include('admin.navigations.homeImageNav')

<ul>
	<li>{{ $home_image->image }}</li>
	<li>{{ $home_image->link}}</li>
	<li>{{ $home_image->position }}</li>
</ul>

 <div id="media_wrapper">                    

		<a href="{{ url('admin/homeads/'.$home_image->id) }}">
			<div class="outer">
				<div class="inner">
					<img src="{{$home_image->image}}" />
				</div>                          
			</div>
		</a>
</div>

<a href="{{ url('admin/edit/homeads/'.$home_image->id) }}">EDIT</a>
@endsection
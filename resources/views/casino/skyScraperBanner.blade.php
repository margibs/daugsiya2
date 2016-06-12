@extends('admin.layout')

@section('content')

@include('casino.__navigation')

<a href="{{url('admin/new_skyscraper_banner')}}">Add Skyscraper Banner</a>

<form action="{{url('admin/skyscraper_banner_option')}}" method="post">
	{!! csrf_field() !!}
	Option to set ratio of banner to pictures: 1 banner after ever X pictures <br />
	<input type="text" name="banner_ratio" placeholder="Enter Banner Ratio" value="{{$articleBannerRatio}}">
	<input type="submit" value="Submit">
</form>

<table>
	<thead>
		<th>Banner</th>
		<th>Banner Link</th>
		<th>Show Banner</th>
		<th>Priority</th>
		<th>Action</th>
	</thead>
	<tbody>
		@foreach($articleBanners as $articleBanner)
			<tr>
				<td>{{$articleBanner->image_url}}</td>
				<td>{{$articleBanner->image_link}}</td>
				<td>
					@if($articleBanner->show_banner == 0)
					No
					@else
					Yes
					@endif
				</td>
				<td>
					{!! Form::select('priority', $priority_list ,$articleBanner->priority,['get-this' => $articleBanner->id]) !!}
				</td>
				<td><a href="{{url('admin/skyscraper_banner')}}/{{$articleBanner->id}}">Edit</a></td>
			</tr>
		@endforeach
	</tbody>
</table>

<script>
	$(document).ready(function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$('select').on('change',function(){

			// console.log($(this).val() + " " + $(this).attr('get-this'));

			$.ajax({ 
	          type: 'post',
	          url: "{{url('admin/casino/ajax/save_priority')}}",
	          data: {_token: CSRF_TOKEN,'priority' : $(this).val(), 'id' : $(this).attr('get-this')}, 
	          success: function(response)
	          {

	            

	          }
	        });

		});
	});
</script>

@endsection
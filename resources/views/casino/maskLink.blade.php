@extends('admin.layout')

@section('content')

@include('casino.__navigation')

<a href="{{url('admin/casino/new-mask-link')}}">Add Mask Link</a>

<table>
	<tr>
		<th width="35%">Mask Link</th>
		<th>Redirect Link</th>
		<!-- <th>Mobile Redirect Link</th> -->
		<th>Action</th>
	</tr>
	<tr>
		@foreach($maskLinks as $maskLink)
			<tr>
				<td>{{$maskLink->mask_link}}</td>
				<td>{{$maskLink->desktop_redirect_link}}</td>
				<!-- <td>{{$maskLink->mobile_redirect_link}}</td> -->
				<td>
					<a href="{{url('admin/casino/mask-link/edit')}}/{{$maskLink->id}}">Edit</a>
				</td>
			</tr>
		@endforeach
	</tr>
</table>
@endsection
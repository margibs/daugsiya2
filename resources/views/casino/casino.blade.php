@extends('admin.layout')

@section('content')

@include('casino.__navigation')

<a href="{{url('admin/new_casino')}}">Add Casino</a>
<table>
	<thead>
		<tr>
			<th>Name</th>
<!-- 			<th>Image Url</th>
			<th>Desktop Link</th> -->
<!-- 			<th>Mobile Link</th>
			<th>Bonus Offer</th> -->
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($casinos as $casino)
			<tr>
				<td>{{$casino->name}}</td>
<!-- 				<td>{{url('uploads')}}/{{$casino->image_url}}</td>
				<td>{{$casino->link_desktop}}</td> -->
<!-- 				<td>{{$casino->link_mobile}}</td>
				<td>{{$casino->bonus_offer}}</td> -->
				<td><a href="{{url('admin/casino')}}/{{$casino->id}}">Edit</a></td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection
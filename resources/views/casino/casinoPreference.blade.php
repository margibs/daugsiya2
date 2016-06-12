@extends('admin.layout')

@section('content')

@include('casino.__navigation')

<!-- <form action="{{url('admin/casino_preference')}}" method="post">
	{!! csrf_field() !!}
	<select name="category_id">
		@foreach($categories as $category)
		<option value="{{$category->id}}">{{$category->name}}</option>
		@endforeach
	</select>
	<input type="submit" value="Submit">
</form> -->


<table>
	<thead>
		<tr>
			<th>Category</th>
			<th>Casino to show</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($casinoPreferences as $casinoPreference)
			<tr>
				<td>{{$casinoPreference->name}}</td>
				<td>{{$casinoPreference->number_to_show}}</td>
				<td><a href="{{url('admin/casino_preference')}}/{{$casinoPreference->id}}">Edit</a></td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection
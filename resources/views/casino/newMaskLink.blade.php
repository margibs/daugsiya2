@extends('admin.layout')

@section('content')

@include('casino.__navigation')

@if($errors && count($errors) > 0)
	<ul class="errors">
		@foreach($errors->all() as $err)
			<li>{{ $err }}</li>
		@endforeach
	</ul>
@endif

@if (Session::has('custom_image'))
    <ul class="errors">
		<li>{{ Session::get('custom_image') }}</li>
    </ul>
@endif


	<form action="{{url('admin/casino/mask-link')}}" method="post">
		{!! csrf_field() !!}

		<input type="text" name="mask_link" value="{{old('mask_link')}}" placeholder="Mask Link">
		<input type="text" name="desktop_redirect_link" value="{{old('desktop_redirect_link')}}" placeholder="Redirect Link">
		<!-- <input type="text" name="mobile_redirect_link" value="{{old('mobile_redirect_link')}}" placeholder="Mobile Redirect Link"> -->
		<input type="submit" value="Submit">
	</form>

@endsection
@extends('clubhouse.layout')




@section('page-title', 'Home')


@section('scripts_here')

<link rel="stylesheet" href="{{ asset('css/rateit.css') }}">

@endsection

@section('background-content')

	<div class="container background-container">	
<img src="{{ asset('images/chat_room.jpg') }}" alt="" class="background-image interactiveBackground">
	

	<!-- <a href="#userDetails" class="interactiveObj interactive" right="40%" top="40%" id="diary">
		<img src="{{ asset('images/diary.png') }}" alt="" class="diary">
		
	</a> -->
	
	<div class="interactiveObj panel-container col-sm-24">
		<div class="panel">
			<div class="col-sm-16">
				<div class="panel-header">Search Results</div>
				<div class="peopleList">
					@foreach($users as $user)
						<div class="people">{{ $user->firstname }} {{ $user->lastname }}</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

</div>

</div>

@endsection

@section('custom_scripts')


@endsection
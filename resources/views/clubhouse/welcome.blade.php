@extends('clubhouse.layout')




@section('page-title', 'Welcome')

 @section('switch-button')
 	  <button class="categ-button"> <a href="{{ url('welcome') }}">Login / Sign-Up</a></button>
@endsection

@section('background-content')


	<div class="container background-container">	
<img src="{{ asset('images/background-welcome.jpg') }}" alt="" class="background-image interactiveBackground">
	<a href="{{ url('clubhouse/login') }}" class="interactiveObj interactive" bottom="0" left="5%">
		<img src="{{ asset('images/susan.png') }}" alt="" class="susan">
		<div class="bubble" top="-45px" right="-80px"><span>Come on In!</span></div>
	</a>	
	<a href="{{ url('signup') }}" class="interactiveObj interactive" bottom="-3%" right="-10%">
		<img src="{{ asset('images/butler.png') }}" alt="" class="butler">
		<div class="bubble left" top="-109px" left="-49px"><span>Not a member? Sign Up Now For Free!</span></div>
	</a>	
</div>

</div>

@endsection
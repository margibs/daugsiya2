<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> 

@extends('admin.layout')

@section('content')

<div class="submenu">
  <ul>
    <li> <a href="{{ url('/admin/users') }}" class="active"> <i class="icon-line-head"></i> All </a> </li>
    <li> <a href=""> <i class="icon-line-star"></i> Admins </a> </li>                    
    <li> <a href=""> <i class="icon-line-cross"></i> Banned </a> </li>            
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>

<form action="{{url('admin/users')}}/{{$user->id}}" method="POST">
    {!! csrf_field() !!}
    <input type="checkbox" name="banned" value="1" @if($user->banned == 1) checked @endif>Banned<br>
    <input type="text" name="banned_reason" value="{{$user->banned_reason}}" placeholder="Banned Reason"><br />
    {!! Form::select('is_admin', 
      [
        1 => 'Admin',
        2 => 'Chat Host',
        0 => 'User'
      ], 
      $user->is_admin
      ) 
    !!}</br>
    <input type="submit" value="Submit">
</form>

@endsection
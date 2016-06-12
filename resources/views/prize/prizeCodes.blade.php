@extends('admin.layout')

@section('content')

@include('prize.navigation')

	<div class="row">

		<div class="col-lg-9">
		        @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Something went wrong.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

			<div class="panel">
				<h6> Generate Code </h6>

				<div class="categform">
					<form class="form-inline" method="POST" action="{{url('admin/prize/code')}}">
					{!! csrf_field() !!}
						<div class="form-group">                            
						<input type="number" name="qty" value="" placeholder="Enter Quantity of Code to Generate" style="width: 73%;" required>
						</div>
						<input type="submit" value="Submit">
					</form>
				</div>

			</div>

			<table style="text-align:left">
			<thead>
				<tr>
					<th>#</th>
					<th> Codes </th>                            
				</tr>
			</thead>
			<tbody>
				@foreach($codes as $code)
				<tr>
					<td> {{$counter}}</td>
					<?php $counter++; ?>
					<td> {{$code->code}} </td>
				</tr>
				@endforeach
			</tbody>
			</table>
		</div>



	</div>

@endsection
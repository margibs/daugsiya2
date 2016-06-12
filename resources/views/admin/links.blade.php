
@extends('admin.layout')

@section('content')
	
	
	<h2 class="adminTitle">
	 <i class="icon-link"></i> Links 	
	<a href="{{ url('/admin/new_link') }}"> <i class="icon-plus-sign"></i> Add new </a>
	</h2>
	<div class="clearfix"></div>
	   <div id="contentMainWrapper">
              <div class="table-responsive adminPosts">
                  <table class="table table-striped">
					<thead>
						<th> <input type="checkbox" /> </th>
						<th> Image </th>
						<th> URL </th>						
						<th> Description </th>
						<th> Website Name </th>
						<th> Visible </th>
						<th> Date </th>
					</thead>
					<tbody>
					@foreach($links as $link)
						<tr>
							<td> <input type="checkbox" /> </td>
							<td> <img src="{{ url('uploads')}}/{{$link->image}}" alt="" style="width: 100px;"></td> 
							<td> <a href="{{url('admin/edit_link')}}/{{$link->id}}">{{$link->url}}</a> </td>							
							<td class="subTD">{{$link->description}}</td>
							<td class="subTD">{{$link->website_url}}</td>
							<td class="subTD">@if($link->visible == 1) yes @else no @endif</td>
							<td class="subTD">  {{ date( 'jS F Y', strtotime($link->created_at) ) }}  </td>
						</tr>
					@endforeach	
					</tbody>
				</table>
			</div>
	</div>


@endsection
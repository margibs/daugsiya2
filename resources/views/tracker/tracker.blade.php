<h2>Link Visit</h2>

<h3>Games</h3>
	<table>
		<thead>
			<th>Link</th>
			<th>Count</th>
		</thead>
		<tbody>
			@if($homepage > 0 )
				<tr>
					<td>{{url('')}}</td>
					<td>{{$homepage}}</td>
				</tr>
			@endif
			@foreach($posts as $post)
				<tr>
					<td><a href="{{url('tracker')}}/{{$post->id}}">{{url('')}}/{{$post->slug}}</a></td>
					<td>{{$post->counter}}</td>
				</tr>
			@endforeach
		</tbody>

	</table>


<h3>Categories</h3>
	<table>
		<thead>
			<th>Link</th>
			<th>Count</th>
		</thead>
		<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{url('')}}/{{$category->slug}}</td>
					<td>{{$category->counter}}</td>
				</tr>
			@endforeach
		</tbody>

	</table>
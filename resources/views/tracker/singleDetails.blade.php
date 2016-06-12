<!-- 	1 postcontent image
	2 yes option 
	3 no option
	4 casino option 
	5 sidebar games
	6 related games
	7 Article Banner
	8 Skyscraper Banner -->

<h2>{{url('')}}/{{$post->slug}}</h2>


<h3>Post Content Image</h3>

<table>
	<thead>
		<th>Image Url</th>
		<th>Count</th>
	</thead>
	<tbody>
		@foreach($post_contents as $post_content)
			<tr>
				<td>{{$post_content->image_url}}</td>
				<td>{{$post_content->counter}}</td>
			</tr>
		@endforeach
	</tbody>

</table>

<h3>Yes Option</h3>

Count: @foreach($yes_options as $yes_option) <h4>{{$yes_option->counter}}</h4> @endforeach

<h3>No Option</h3>

Count: @foreach($no_options as $no_option) <h4>{{$no_option->counter}}</h4> @endforeach

<h3>Casino Option</h3>


<table>
	<thead>
		<th>Casino Name</th>
		<th>Count</th>
	</thead>
	<tbody>
		@foreach($casino_options as $casino_option)
			<tr>
				<td>{{$casino_option->name}}</td>
				<td>{{$casino_option->counter}}</td>
			</tr>
		@endforeach
	</tbody>

</table>


<h3>Sidebar Games</h3>

<table>
	<thead>
		<th>Game Link</th>
		<th>Count</th>
	</thead>
	<tbody>
		@foreach($sidebar_games as $sidebar_game)
			<tr>
				<td>{{$sidebar_game->site_url}}</td>
				<td>{{$sidebar_game->counter}}</td>
			</tr>
		@endforeach
	</tbody>

</table>


<h3>Related Games</h3>

<table>
	<thead>
		<th>Game Link</th>
		<th>Count</th>
	</thead>
	<tbody>
		@foreach($related_games as $related_game)
			<tr>
				<td>{{$related_game->site_url}}</td>
				<td>{{$related_game->counter}}</td>
			</tr>
		@endforeach
	</tbody>

</table>


<h3>Article Banner</h3>

<table>
	<thead>
		<th>Image Url</th>
		<th>Count</th>
	</thead>
	<tbody>
		@foreach($article_banners as $article_banner)
			<tr>
				<td>{{url('')}}/{{$article_banner->image_url}}</td>
				<td>{{$article_banner->counter}}</td>
			</tr>
		@endforeach
	</tbody>

</table>


<h3>SkyScraper Banner</h3>

<table>
	<thead>
		<th>Image Url</th>
		<th>Count</th>
	</thead>
	<tbody>
		@foreach($skyscraper_banners as $skyscraper_banner)
			<tr>
				<td>{{url('')}}/{{$skyscraper_banner->image_url}}</td>
				<td>{{$skyscraper_banner->counter}}</td>
			</tr>
		@endforeach
	</tbody>

</table>


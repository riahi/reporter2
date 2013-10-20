<!-- app/views/search.blade.php-->

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search Templates</title>

	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" 
		charset="utf-8"></script>
	<link type="text/css" rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>
	<header>
		<h1>BWH Radiology Template Search</h1>
		<nav id="top-nav">
			<ul>
				<li><a href="{{ url('search') }}">Search</a></li>
				<li><a href="{{ url('worklist') }}">Worklist</a></li>
			</ul>
		</nav>
	</header>

	<section>
		{{ Form::open(array('url' => 'search')) }}
			{{ Form::label('title_search', 'Search Template Titles') }}
			{{ Form::text('title_search') }}
			{{ Form::submit('Search') }}
		{{ Form::close() }}

		@if ($showResults)
			<p>{{ $searchResults->count() }} rows returned for search 
				<em> {{ $titleSearch }}</em>.</p>
			
			{{ Form::open(array('url' => 'compare')) }}
			<table>
				<tr>
					<td>LHS</td>
					<td>RHS</td>
					<td>Title</td>
					<td>Attending</td>
					<td>Template Status</td>
				</tr>
			@foreach ($searchResults as $row)
				<tr>
					<td>{{ Form::radio('LHS', $row->id) }}LHS</td>
					<td>{{ Form::radio('RHS', $row->id) }}RHS</td>
					<td><a href="{{ url('template', $row->id) }}">{{ $row->title }}</a></td>
					<td>{{ $row->attending }}</td>
					<td>{{ $row->template_status }}</td>
				</tr>
			@endforeach
			</table>
				{{ Form::submit('Compare') }}
			{{ Form::close() }}

			{{ Form::open(array('url' => 'worklist')) }}
			{{ Form::submit('Add to Worklist') }}
			{{ Form::close() }}
		@endif
	</section>

	<footer>
		Footer
	</footer>
</body>
</html>
{{-- app/views/worklist.blade.php --}}

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Worklist</title>

	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" 
		charset="utf-8"></script>
	<link type="text/css" rel="stylesheet" href="{{ asset('style.css') }}" />
</head>

<body>
	<header>
		<h1>BWH Radiology Template Worklist</h1>
		<nav id="top-nav">
			<ul>
				<li><a href="{{ url('search') }}">Search</a></li>
				<li><a href="{{ url('worklist') }}">Worklist</a></li>
			</ul>
		</nav>
	</header>

	<nav id="left-nav">
		<p> {{ Form::open(array('url' => 'worklist', 'method' => 'DELETE')) }}
				{{ Form::submit('Clear Worklist') }} 
			{{ Form::close() }}
		</p>
		<p> {{ Form::open(array('url' => 'review', 'method' => 'GET')) }}
				{{ Form::submit('Start Reviewing') }} 
			{{ Form::close() }}
		</p>
	</nav>


	<article>
		<table>
			<tr>
				<td>Template ID</td>
				<td>Title</td>
				<td>Attending</td>
				<td>Template Status</td>
			</tr>

		{{-- If worklist is empty --}}
		@if ($worklistEmpty)
			<tr>
				<td colspan="4">The worklist is empty</td>
			</tr>
		
		{{-- If worklist is not empty -> display rows --}}
		@else
			@foreach ($worklist as $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td><a href="{{ url('review', $row->id) }}">{{ $row->title }}</a></td>
					<td>{{ $row->attending }}</td>
					<td>{{ $row->template_status }}</td>
				</tr>
			@endforeach
		@endif
		</table>
	</article>

	<footer>
		Footer
	</footer>
</body>
</html>
<!-- app/views/review.blade.php-->

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Template</title>

	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" 
		charset="utf-8"></script>

	<script type="text/javascript" src="{{ asset('scripts/shCore.js') }}"></script>
	<script type="text/javascript" src="{{ asset('scripts/shBrushRadiology.js') }}"></script>
	<link type="text/css" rel="stylesheet" href="{{ asset('shCoreDefault.css') }}"/>
	<link type="text/css" rel="stylesheet" href="{{ asset('style.css') }}" />

	<script type="text/javascript">SyntaxHighlighter.all();</script>

	</script>
</head>

<body>
	<header>
		<h1>Viewing <strong>{{ $template->title }}</strong> by 
			<em>{{ $template->author }}</em></h1>
		<nav id="top-nav">
			<ul>
				<li><a href="{{ url('search') }}">Search</a></li>
				<li><a href="{{ url('worklist') }}">Worklist</a></li>
			</ul>
		</nav>
	</header>

	<nav id="left-nav">
		{{ Form::open(array('url' => url('review', $template->id), 'method' => 'PUT')) }}
			{{ Form::fieldStatus('indication_status', $template->indication_status) }}
			{{ Form::fieldStatus('technique_status', $template->technique_status) }}
			{{ Form::fieldStatus('comparison_status', $template->comparison_status) }}
			{{ Form::fieldStatus('findings_status', $template->findings_status) }}
			{{ Form::fieldStatus('impression_status', $template->impression_status) }}
			{{ Form::fieldStatus('template_status', $template->template_status) }}
			{{ Form::submit('Save and Next') }}
		{{ Form::close() }}
	</nav>

	<article>
		<pre class="brush: rads; gutter: false; white-space: pre-wrap; 
			 width: 500px;">{{{ $template->template }}}</pre>
	</article>

	<footer>
		Footer
	</footer>
</body>
</html>
@extends('layout')
@section('title')
Worklist | BWH Radiology Template Reporter
@stop
@section('content')

{{-- app/views/worklist.blade.php --}}
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
					<td>{{ $row->author }}</td>
					<td>{{ $row->template_status }}</td>
				</tr>
			@endforeach
		@endif
		</table>
	</article>
@stop
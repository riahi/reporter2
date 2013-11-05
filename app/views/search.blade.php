@extends('layout')
@section('title')
Search | BWH Radiology Template Reporter
@stop
@section('content')
	<section>
		@if ($showResults)
			<p>{{ $searchResults->count() }} rows returned for search 
				<em> {{ $titleSearch }}</em>.</p>

			{{-- Begin Add Selected to Worklist Form -----------------------------}}
			{{ Form::open(array('action' => 'WorklistController@postIndex')) }}
			<table>
				<tr>
					<td>Select</td>
					<td>Title</td>
					<td>Author Name</td>
					<td>Author Training</td>
					<td>Subspecialty</td>
					<td>Template Status</td>
				</tr>
			@foreach ($searchResults as $row)
				<tr>
					<td>{{ Form::checkbox('add_to_worklist[]', $row->id) }}</td>
					<td><a href="{{ url('template', $row->id) }}">{{ $row->title }}</a></td>
					<td>{{ $row->author }}</td>
					<td>{{ $row->author_training }}</td>
					<td>{{ $row->subspecialty }}</td>
					<td>{{ $row->template_status }}</td>
				</tr>
			@endforeach
			</table>
			{{ Form::submit('Add selected to Worklist') }}
			{{ Form::close() }}

		{{-- Begin Add All to Worklist Form --------------------------------------}}
		<p>
			{{ Form::open(array('url' => 'worklist')) }}
			{{ Form::submit('Add all to Worklist') }}
			{{ Form::close() }}
		</p>


		@endif

		{{-- Begin Search Form ---------------------------------------------------}}
		<p>Search for templates for review.</p>
		<p>{{ Form::open(array('url' => 'search')) }}
			{{ Form::label('template_title', 'Template Title') }}
			{{ Form::text('template_title') }} <br />
			
			{{ Form::label('template_author', 'Author Name') }}
			{{ Form::select('template_author', 
				array('All' => 'All') + Template::distinct()
					->lists('author', 'author')) }} <br />
			
			{{ Form::label('template_subspecialty', 'Subspecialty') }}
			{{ Form::select('template_subspecialty', 
				array('All' => 'All') + Template::distinct()
					->lists('subspecialty', 'subspecialty')) }} <br />
			
			{{ Form::label('template_level_of_training', 'Level of Training') }}
			{{ Form::select('template_level_of_training', array(
				'All' 	=>	'All',
				'Attending' =>	'Attending',
				'Fellow' => 'Fellow',
				'Resident' => 'Resident'), 'All') }} <br />
			
			{{ Form::label('template_status', 'Template Status') }}
			{{ Form::select('template_status', array(
				'All' 	=>	'All',
				'Needs Work' =>	'Needs Work',
				'Disapproved' => 'Disapproved',
				'Approved' => 'Approved'), 'All') }} <br />
			
			{{ Form::submit('Search') }}
		{{ Form::close() }}
		</p>
	</section>
@stop
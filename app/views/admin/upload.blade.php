@extends('layout')
@section('content')
    <h1>Template Upload</h1>
    <p>
        This form accepts template dumps from Powerscribe 4.x where 1 all of
        one attending's templates are in 1 .txt file and separated by '$$$'.  
        Please email Allen Dufault for more information.
    </p>
    {{ Form::open( [
        "url"     => "admin/upload",
        "method"  => "POST",
        'files'   => true 
    ]) }}
        {{ Form::label('template_export', 'File') }}
        {{ Form::file('template_export') }}
        
        <p>
        {{ Form::text('author') }}
        {{ Form::label('author', 'Template Author') }}
        </p>
        <p>
        {{ Form::text('subspecialty') }}
        {{ Form::label('subspecialty', 'Template Subspecialty') }}
        </p>
        <p>
        {{ Form::select('author_training', array(
            'All'   =>  'All',
            'Attending' =>  'Attending',
            'Fellow' => 'Fellow',
            'Resident' => 'Resident'), 'All') }}
        {{ Form::label('author_training', 'Template Level of Training') }}
        </p>

        {{ Form::submit('Upload File') }}
    {{ Form::close() }}

        @if ($error = $errors->first("password"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
@stop
@section('footer')
    @parent
    <script src="http://polyfill.io"></script>
@stop
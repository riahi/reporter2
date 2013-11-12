@extends('layout')
@section('content')
    <h1>Template Upload</h1>
    <p>
        This form accepts template dumps from Powerscribe 4.x where 1 all of
        one attending's templates are in 1 .txt file and separate by '$$$'.  
        Please email Allen Dufault for more information.
    </p>
    {{ Form::open( [
        "url"     => "",
        "method"  => "POST",
        'files'   => true 
    ]) }}
        {{ Form::label('file', 'File') }}
        {{ Form::file('file') }}
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
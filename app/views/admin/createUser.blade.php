@extends('layout')
@section('content')
    <h1>Create User</h1>
    <p>
        This form is for the creation of users to review templates.  
    </p>
    {{ Form::open( [
        "url"     => "admin/createuser",
        "method"  => "POST" 
    ]) }}
        
        <p>
        {{ Form::text('username') }}
        {{ Form::label('username', 'Username') }}
        </p>
        <p>
        {{ Form::text('password') }}
        {{ Form::label('password', 'Password') }}
        </p>
        <p>
        {{ Form::email('email') }}
        {{ Form::label('email', 'Email Address') }}
        </p>
        <p>
        {{ Form::select('user_level', array(
            '0'   =>  'Regular',
            '1' =>  'Final Signer'
            ), 'Regular') }}
        {{ Form::label('user_level', 'User Level') }}
        </p>

        {{ Form::submit('Create User') }}
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
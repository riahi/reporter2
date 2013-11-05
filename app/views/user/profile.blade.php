@extends('layout')
@section('content')
	<h2>Hello {{ Auth::user()->username }}</h2>
	<p>Templates Edited: {{ Auth::user()->templates_edited }}</p>
@stop
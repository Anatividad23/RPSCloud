@extends('layouts.appmaster')
@section('title','Login Passed Page')

@section('content')
	@if($model->getUsername() == 'Anthony')
	<h3>Anthony You Have logged in successfully</h3>
	@else
	<h3>Someone besides Anthony Logged in</h3>
	@endif
	<br>
	<a href="login2">Login Again</a>
@endsection


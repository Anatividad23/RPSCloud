@extends('layouts.appmaster') @section('title','Game Form')

@section('content')
<form action="play" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />
	<h2>Rock, Paper, Scissors</h2>
	<table>
		
		<tr>
			<td><input type="radio" name="operation" value="1" checked /></td>
			<td>Rock</td>
			<td><input type="radio" name="operation" value="2" /><br></td>
			<td>Paper</td>
			<td><input type="radio" name="operation" value="3" /><br></td>
			<td>Scissors</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Go" /></td>
		</tr>
	</table>
</form>

@if ($errors->count() != 0)
<h5>List of Errors</h5>
@foreach($errors->all() as $message) {{$message}}
<br />
@endforeach @endif @endsection

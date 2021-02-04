<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Calculator Form</title>
	</head>
	<body>
		<form action="calculate" method= "POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>
		<h2>Please Enter Your Values</h2>
		<table>
			<tr>
				<td>Operand 1: </td>
				<td><input type = "text" name= "operand1"/></td>
			</tr>
			<tr>
				<td>Operand 2: </td>
				<td><input type = "text" name= "operand2"/></td>
			</tr>
			<tr>
				<td>
					<input type="radio" name= "operation" value="Add" checked/>
				</td><td>Add</td>
				<td>
					<input type="radio" name= "operation" value="Subtract"/><br>
				</td><td>Subtract</td>
				<td>
					<input type="radio" name= "operation" value="Multiply"/><br>
				</td><td>Multiply</td>
				<td>
					<input type="radio" name= "operation" value="Divide"/><br>
				</td><td>Divide</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type = "submit" value = "Go" />
				</td>
			</tr>
		</table>
		</form>
		
		@if ($errors->count() != 0)
		<h5>List of Errors</h5>
			@foreach($errors->all() as $message)
				{{$message}}<br/>
			@endforeach
		@endif
	</body>
</html>
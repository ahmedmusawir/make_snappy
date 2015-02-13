@extends('layouts.master')

@section('content')
	<h3>REGISTER</h3>
	<hr>

	@if($errors->has())
		<p>The Following Errors have occurred:</p>
		<ul class="alert alert-danger">
			{{ $errors->first('username', '<li>:message</li>') }}
			{{ $errors->first('password', '<li>:message</li>') }}
			{{ $errors->first('password_confirmation', '<li>:message</li>') }}
		</ul>
	@endif

	<div class="col-sm-2"></div>

	<div class="col-sm-8">
	
		{{ Form::open(['route' => 'users.store', 'method' => 'POST']) }}
				{{ Form::label('username', 'User Name:') }}
				{{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Please Insert a Username']) }}

				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Please Insert a Password']) }}

				{{ Form::label('password_confirmation', 'Password Confirmation:') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Please Insert the Same Password Again ']) }}
				<hr>
				{{ Form::token() }}
				{{ Form::submit('REGISTER', ['class' => 'btn btn-info']) }}

		{{ Form::close() }}
	
	</div>
	
	<div class="col-sm-2"></div>
@stop
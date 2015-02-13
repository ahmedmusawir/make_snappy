@extends('layouts.master')

@section('content')
	<h3>USER LOGIN</h3>
	<hr>

	<!-- MESSAGE DISPLAY -->
		<div>
			@if(Session::has('message'))
				<p class="alert alert-danger">{{ Session::get('message') }}</p>
			@endif
		</div>
	<div class="col-sm-2"></div>

	<div class="col-sm-8">
	
		{{ Form::open(['route' => 'users.login', 'method' => 'POST']) }}
				{{ Form::label('username', 'User Name:') }}
				{{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Please Insert Your Username']) }}

				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Please Insert Your Password']) }}

				<hr>
				{{ Form::token() }}
				{{ Form::submit('LOGIN', ['class' => 'btn btn-info']) }}

		{{ Form::close() }}
	
	</div>
	
	<div class="col-sm-2"></div>
@stop
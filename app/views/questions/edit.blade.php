@extends('layouts.master')

@section('content')
	<h3>EDIT QUESTION</h3>
	<hr>

	<!-- MESSAGE DISPLAY -->
		<div>
			@if(Session::has('message'))
				<p class="alert alert-danger">{{ Session::get('message') }}</p>
			@endif
		</div>
	
	<!-- VALIDATION MESSAGE DISPLAY -->

		@if($errors->has())
			<!-- <p>The following errors occurred:</p> -->
			<ul class="alert alert-danger">
				{{ $errors->first('question', '<li>:message</li>') }}
				{{ $errors->first('subject', '<li>:message</li>') }}
			</ul>
		@endif
	<div class="col-sm-2"></div>

	<div class="col-sm-8">
	
		{{ Form::open(['route' => ['questions.update', $question->id], 'method' => 'PUT']) }}
				{{ Form::label('question', 'Question:') }}
				{{ Form::text('question', $question->question, ['class' => 'form-control', 'placeholder' => 'Please Insert Your Question']) }}
				
				{{ Form::label('subject', 'Subject:') }}
				{{ Form::text('subject', $question->subject, ['class' => 'form-control', 'placeholder' => 'Please Choose Your Subject']) }}

				{{ Form::label('solved', 'Solved:') }}

				@if($question->solved == 0)
					{{ Form::checkbox('solved', 1, false, ['class' => 'inline']) }}
				@elseif($question->solved == 1) 
					{{ Form::checkbox('solved', 1, true, ['class' => 'inline']) }}
				@endif
				

				<hr>
				{{ Form::token() }}
				{{ Form::submit('SUBMIT', ['class' => 'btn btn-info']) }}

		{{ Form::close() }}
	
	</div>
	
	<div class="col-sm-2"></div>
@stop
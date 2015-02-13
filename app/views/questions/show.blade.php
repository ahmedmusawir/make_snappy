@extends('layouts.master')

@section('content')
	<h3>{{ ucfirst($question->user->username) }} asks:</h3>
	<hr>
	<p class="well">
		{{ e($question->question) }}
	</p>	

	<article class="show_answer">
		
	<h4>Answers</h4>

		@if(!$question->answers)
			<p class="alert alert-info">This Question Has No Answer!</p>
		@else

			<ul class="list-group">
				@foreach($question->answers as $answer)
				<li class="list-group-item">
					{{ e($answer->answer) }} -- by {{ ucfirst($answer->user->username) }}
				</li>
				@endforeach
			</ul>

		@endif
		

	</article>


	<article class="ask_top">
	<h4>Answer This Question</h4>
	<!-- MESSAGE DISPLAY -->
		<div>
			@if(Session::has('message'))
				<p class="alert alert-success">{{ Session::get('message') }}</p>
			@endif
		</div>
	<!-- <hr> -->
	@if(Auth::check())
		@if($errors->has())
			<!-- <p>The following errors occurred:</p> -->
			<ul class="alert alert-danger">
				{{ $errors->first('answer', '<li>:message</li>') }}
			</ul>
		@endif

		{{ Form::open(['route' => 'answers.store', 'method' => 'POST']) }}
			{{ Form::label('answer', 'Answer:') }}
			{{ Form::textarea('answer', Input::old('answer'), ['class' => 'form-control input-sm', 'placeholder' => 'Who smokes the weed?']) }}
			
			<!-- <hr> -->

			{{ Form::token() }}
			{{ Form::hidden('question_id', $question->id)}}

			{{ Form::submit('Post Answer', ['class' => 'btn btn-info ask_btn']) }}

		{{ Form::close() }}
	@else 
		<p class="alert alert-info">Please login to ask or answer questions.</p>
	@endif
	<!-- <hr> -->
	</article>
@stop

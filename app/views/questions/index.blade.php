@extends('layouts.master')

@section('content')
	<article class="ask_top">
	<h3>ASK A QUESTION</h3>
	<!-- MESSAGE DISPLAY -->
		<div>
			@if(Session::has('message'))
				<p class="alert alert-warning">{{ Session::get('message') }}</p>
			@endif
		</div>
	<!-- <hr> -->
	@if(Auth::check())
		@if($errors->has())
			<!-- <p>The following errors occurred:</p> -->
			<ul class="alert alert-danger">
				{{ $errors->first('question', '<li>:message</li>') }}
				{{ $errors->first('subject', '<li>:message</li>') }}
			</ul>
		@endif

		{{ Form::open(['route' => 'questions.store', 'method' => 'POST']) }}
			{{ Form::label('question', 'User Question:') }}
			{{ Form::text('question', Input::old('question'), ['class' => 'form-control input-sm', 'placeholder' => 'Please Insert Your Question']) }}
			{{ Form::label('subject', 'Choose a Subject:') }}
			{{ Form::select('subject', 
				array(
				
				'' => '', 
				'CSS' => 'CSS', 
				'Js/jQ' => 'Js/jQ',
				'PHP' => 'PHP',
				'Microsoft' => 'Microsoft',
				'Mac OSX' => 'Mac OSX',
				'Mobile' => 'Mobile',
				'Others' => 'Others'),
				
				'',

				['class' => 'form-control input-sm']
			) 

			}}
			
			<!-- <hr> -->

			{{ Form::token() }}
			{{ Form::submit('Ask A Question', ['class' => 'btn btn-info ask_btn']) }}

		{{ Form::close() }}
	@else 
		<p class="alert alert-info">Please login to ask or answer questions.</p>
	@endif
	<!-- <hr> -->
	</article>
	<div>
		<h3>Unsolved Questions</h3>
		@if(!$questions->getTotal()) 
			<p>No Questions have been asked ...</p>
		@else
				
			
			<article class="">
			<table class="table table-striped">
	  			<thead>
	  				<tr>
	  					<td><strong>Subject</strong></td><td><strong>Question</strong></td><td><strong>Author</strong></td>
	  				</tr>
	  			</thead>
			
				@foreach ($questions as $question) 
						<tbody>
							<tr>

								<td><span class="label label-info">{{ $question->subject }}</span></td>
								<td>
									{{ link_to_route('questions.show', Str::limit($question->question, 35), $question->id) }}?
									[ {{ count($question->answers) }}  {{ Str::plural("Answer", count($question->answers)) }} ]
								</td>
								<td><span class="label label-default">{{ ucfirst($question->user->username) }}</span></td>
												
							</tr>
						</tbody>
				
				@endforeach

			</table>
			</article>
			{{ $questions->links() }}
		@endif
	</div>

	
@stop































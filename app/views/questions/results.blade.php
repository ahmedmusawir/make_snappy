@extends('layouts.master')

@section('content')

<h3>Search Results</h3>

	@if(!$questions->getTotal())
		<p class="alert alert-danger">Nothing found, please try a different search</p>
	@else 
		<ul class="list-group">
			@foreach($questions as $question)

			<li class="list-group-item">
				{{ link_to_route('questions.show', $question->question, $question->id) }}
				by {{ ucfirst($question->user->username) }}
			</li>
			@endforeach 
		</ul>

		{{ $questions->links() }}
	@endif

@stop
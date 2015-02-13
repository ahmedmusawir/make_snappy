@extends('layouts.master')

@section('content')
	<h3>{{ ucfirst($username) }} Questions</h3>

	<!-- MESSAGE DISPLAY -->
		<div>
			@if(Session::has('message'))
				<p class="alert alert-danger">{{ Session::get('message') }}</p>
			@endif
		</div>
	<!-- <hr> -->
	
	@if(!$questions->getTotal())
		<p>You've not posted any questions ...</p>
	@else 
		<table class="table">

		@foreach($questions as $question)
		<tr>
			<td>{{ Str::limit(e($question->question), 40) }} 
			{{ ($question->solved) ? ("<span class='label label-success'>Solved</span>") : ("") }}
			</td>
			<td>
				{{ link_to_route('questions.show', 'View', $question->id, ['class' => 'btn btn-sm btn-primary pull-left edit_view hidden-xs']) }} 
				{{ link_to_route('questions.edit', 'Edit Question', $question->id, ['class' => 'btn btn-sm btn-warning pull-left edit_view hidden-xs']) }} 
				{{ Form::open(['route' => ['questions.destroy', $question->id ], 'method' => 'DELETE'])  }}
				{{ Form::submit('Delete', [ 'class' => 'btn btn-danger btn-sm pull-right hidden-xs', 'onclick' => 'return confirm("Are you sure?");']) }}
				{{ Form::close() }}

				<!-- FOLLOWING IS FOR MOBILE ONLY -->

				{{ link_to_route('questions.show', 'View', $question->id, ['class' => 'btn btn-sm btn-primary visible-xs']) }} 
				{{ link_to_route('questions.edit', 'Edit Question', $question->id, ['class' => 'btn btn-sm btn-warning visible-xs']) }} 
				{{ Form::open(['route' => ['questions.destroy', $question->id ], 'method' => 'DELETE'])  }}
				{{ Form::submit('Delete', [ 'class' => 'btn btn-danger btn-sm btn-block  visible-xs', 'onclick' => 'return confirm("Are you sure?");']) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach

		</table> 
	
		
		{{ $questions->links() }}
	@endif
@stop

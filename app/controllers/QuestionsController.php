<?php

class QuestionsController extends \BaseController {

	public function __construct()
    {
        // $this->beforeFilter('csrf', ['on' => 'post']); SEE BaseController
        $this->beforeFilter('auth', ['on' => ['store', 'put', 'yourQuestions', 'edit', 'delete']]);
    }

	/**
	 * Display a listing of the resource.
	 * GET /questions
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('questions.index')
			->with('questions', Question::unsolved());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /questions/getYourQuestions
	 *
	 * @return Response
	 */
	public function getYourQuestions()
	{
		// return Question::yourQuestions()->getTotal(); THIS WORKS!
		return View::make('questions.yourQuestions')
			->with('username', Auth::user()->username)
			->with('questions', Question::yourQuestions());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /questions/results
	 *
	 * @return Response
	 */
	public function getResults($keyword)
	{
		// return Question::search($keyword); 

		return View::make('questions.results')
			->with('questions', Question::search($keyword));
		// return " this is your keyword $keyword";
	}

	/**
	 * Show the form for creating a new resource.
	 * POST /questions/search
	 *
	 * @return Response
	 */
	public function search()
	{
		$keyword = Input::get('keyword');

		if (empty($keyword)){

			return Redirect::route('questions.index')
				->with('message', 'No keyword entered, please try again...');
		}

		return Redirect::route('questions.results', $keyword);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /questions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /questions
	 *
	 * @return Response
	 */
	public function store()
	{
		// return View::make('questions.create');
		// return "User store method ...";
		$validation = Question::validate(Input::all());

		if($validation->passes()){
		    Question::create([
				'question' => Input::get('question'),
				'user_id' => Auth::user()->id,
				'subject' => Input::get('subject', 'other'),
				'solved' => 0
			]);

			// Auth::login($user);

			return Redirect::route('questions.index')->with('message', 'Your Question has been posted!');

		} else {

			return Redirect::route('questions.index')->withErrors($validation)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// return "Single Q Showing ...";

		// $question = Question::find($id);
		// return var_dump($question->answers);

		return View::make('questions.show')
			->with('question', Question::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	private function questionBelongsToUser($id)
	{
		$question = Question::find($id);

		if($question->user_id == Auth::user()->id) {
			return true;
		}

		return false;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!$this->questionBelongsToUser($id)) {
			return Redirect::route('questions.yourQuestions')
				->with('message', 'Wrong Owner');
		}

		return View::make('questions.edit')
			->with('question', Question::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// return "updating Q $id";
		if(!$this->questionBelongsToUser($id)) {
			return Redirect::route('questions.yourQuestions')
				->with('message', 'Wrong Owner');
		}

		$validation = Question::validate(Input::all());

		if($validation->passes()){
		   
		   $input = Input::all();

		   // return var_dump($input);

		   // $question = Question::find($id);

		   $question = Question::find($id);
		    $question->fill($input);  

		    $question->solved = Input::get('solved', false);
			// return var_dump($question->solved);
		    

		    $question->save();

		   	// return var_dump($question->solved);

			return Redirect::route('questions.show', $id)
				->with('message', 'Your Question has been updated!');

		} else {

			return Redirect::route('questions.edit', $id)
				->withErrors($validation)->withInput();
		}


	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// return "Deleting Q-id $id";
		Question::findOrFail($id)->delete();

		return Redirect::route('questions.yourQuestions');
	}

}
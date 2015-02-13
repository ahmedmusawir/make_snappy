<?php

class AnswersController extends \BaseController {

	public function __construct()
    {
        // $this->beforeFilter('csrf', ['on' => 'post']); SEE BaseController
        $this->beforeFilter('auth', ['on' => ['post', 'put', 'delete']]);
    }

	/**
	 * Display a listing of the resource.
	 * GET /answers
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('answers.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /answers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /answers
	 *
	 * @return Response
	 */
	public function store()
	{
		// return "Inserting you crazy answer ...";
		$validation = Answer::validate(Input::all());

		$question_id = Input::get('question_id');

		if($validation->passes()){
		    Answer::create([
				'answer' => Input::get('answer'),
				'user_id' => Auth::user()->id,
				'question_id' => $question_id
			]);

			// Auth::login($user);

			return Redirect::route('questions.show', $question_id)
				->with('message', 'Your Answer has been posted!');

		} else {

			return Redirect::route('questions.show', $question_id)
				->withErrors($validation)
				->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /answers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
<?php


class UsersController extends \BaseController {
// class UsersController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.index');

	}
	/**
	 * Show the form for creating a new resource.
	 * GET /users/login
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return View::make('users.login');
	}
	/**
	 * Show the form for creating a new resource.
	 * POST /users/login
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		$user = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];

		if(Auth::attempt($user)) {
			return Redirect::intended('questions')->with('message', 'You are logged in!');
		} else {
			return Redirect::route('users.login')
			->with('message', 'Your username/password combination was incorrect!')
			->withInput();
		}
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /users/logout
	 *
	 * @return Response
	 */
	public function logout()
	{
		// return View::make('users.login');
		if(Auth::check()) {
			
			Auth::logout();
			return Redirect::route('users.login')->with('message', 'You are now logged out!');

		} else {

			return Redirect::route('questions.index');
		}
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
			// ->with('uid', Auth::user()->id); WILL NOT WORK IF USER IS NOT LOGGED IN
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		// return "User store method ...";
		$validation = User::validate(Input::all());

		if($validation->passes()){
		    $user =	User::create([
						'username' => Input::get('username'),
						'password' => Hash::make(Input::get('password')),
						'remember_token' => 'default'
					]);

			Auth::login($user);

			return Redirect::route('questions.index')->with('message', 'Thanx for registering! You are now Logged in');

		} else {
			// return Redirect::route('users.create')->withErrors($validation);
			return Redirect::route('users.create')->withErrors($validation)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	

}	


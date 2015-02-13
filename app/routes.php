<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('layouts.master');
// });

// Route::get('/', array('as' => 'home', 'uses' =>'questions@index')); DOESN'T WORK CUZ IT'S FROM 3.X
Route::get('/', 'QuestionsController@index');
Route::get('users/login', array('as' => 'users.login', 'uses' => 'UsersController@getLogin'));
Route::post('users/login', array('as' => 'users.login', 'uses' => 'UsersController@postLogin'));
Route::get('users/logout', array('as' => 'users.logout', 'uses' => 'UsersController@logout'));

Route::get('questions/yourQuestions', array('as' => 'questions.yourQuestions', 'uses' => 'QuestionsController@getYourQuestions'));
Route::post('questions/search', ['as' => 'questions.search', 'uses' => 'QuestionsController@search']);
Route::get('questions/results/{keyword}', ['as' => 'questions.results', 'uses' => 'QuestionsController@getResults']);

Route::resource('users', 'UsersController');
Route::resource('questions', 'QuestionsController');
Route::resource('answers', 'AnswersController');

//THE FOLLOWING DIDN'T WORK DUE TO TOKEN MISMATCH

// Route::group(['before' => 'csrf'], function() {
//     Route::resource('users', 'UsersController');
// 	Route::resource('questions', 'QuestionsController');
// 	Route::resource('answers', 'AnswersController');
// });
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

Route::get('/', function()
{
	return View::make('hello');
});

Route::post('compare', function() 
{
	$data = Input::all();

	return var_dump($data);
});

Route::get('review', 'ReviewController@getIndex');
Route::get('review/{id}', 'ReviewController@showIndex');
Route::put('review/{id}', 'ReviewController@putIndex');
//Route::get('review/{id?}', 'ReviewController@showTemplate');

//Route::put('review/{id}', 'ReviewController@putIndex');

Route::controller('search', 'SearchController');

Route::resource('template', 'TemplateController');

Route::controller('worklist', 'WorklistController');




Route::get('first', function () 
{
	return var_dump(Session::get('worklist'));
});

Route::get('second', function() 
{
	return var_dump(Session::get('worklist')->get(12));
});

?>
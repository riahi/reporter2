<?php

/*
|------------------------------------------------------------------------------
| Application Routes
|------------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

/*Route::any('/', [
	"as" => "user/login",
	"uses" => "UserController@loginAction"
]);
*/

Route::group(["before" => "guest"], function() {
	Route::any('/', [
		"as" => "user/login",
		"uses" => "UserController@loginAction"
	]);
});

Route::group(["before" => "auth"], function () {
	Route::any('/profile', [
		"as" => "user/profile",
		"uses" => "UserController@profileAction"
	]);

	Route::any("/logout", [
		"as" => "user/logout",
		"uses" => "UserController@logoutAction"
	]);
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
	// pull the worklist and return array
	$w = User::find(1)
		->templates()
		->get();

	return var_dump($w->isEmpty());
});

Route::get('second', function() 
{
	$u = User::find(1);
	$t = Template::find(5);

	$u->templates()->save($t);

	return var_dump($u);

});

Route::get('third', function() {
	$user = Auth::user();
	$next = $user->templates()->first();

	//return var_dump($next->id);
	return Redirect::to(url('review', $next->id));
});

?>
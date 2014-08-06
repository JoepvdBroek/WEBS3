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

/*Route::get('/', function()
|{
|	return View::make('hello');
|});
*/

Route::get('todo', function()
{
	return View::make('home.todo')
		->with('title', 'TODO');
});

//product Routes
Route::get('product/{product}/image', array('as'=>'product.image', 'uses'=>'ProductController@image'));

Route::resource('product', 'ProductController');


Route::get('/', array('as'=>'home', 'uses'=>'HomeController@index'));

//user Routes
Route::get('login', array('as'=>'login', 'uses'=>'AuthController@getLogin'));

Route::post('login', array('before'=>'csrf', 'uses'=>'AuthController@postLogin'));

Route::get('register', array('as'=>'register', 'uses'=>'AuthController@getRegister'));

Route::post('register', array('before'=>'csrf', 'uses'=>'AuthController@postRegister'));

Route::get('logout', array('as'=>'logout', 'uses'=>'AuthController@logout'));

//Admin Routes
Route::group(array('before'=>'auth'), function()
{
	Route::get('admin', array('as'=>'admin', 'uses'=>'AdminController@getIndex'));

});

//category Routes
Route::resource('category', 'CategoryController');


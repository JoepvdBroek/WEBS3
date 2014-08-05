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

Route::get('error', array('as'=>'error', 'uses'=>'HomeController@error'));

//user Routes
Route::get('login', array('as'=>'login', 'uses'=>'HomeController@getLogin'));

Route::post('login', array('before'=>'csrf', 'uses'=>'HomeController@postLogin'));

Route::get('register', array('as'=>'register', 'uses'=>'HomeController@getRegister'));

Route::post('register', array('before'=>'csrf', 'uses'=>'HomeController@postRegister'));

Route::get('logout', array('as'=>'logout', 'uses'=>'HomeController@logout'));

//Admin Routes
Route::group(array('before'=>'auth'), function()
{
	Route::get('admin', array('as'=>'admin', 'uses'=>'AdminController@getIndex'));

	Route::get('category/create', array('as'=>'createCategory', 'uses'=>'AdminController@createCategory'));

	Route::post('category/create', array('as'=>'newCategory', 'before'=>'csrf', 'uses'=>'AdminController@newCategory'));

	Route::get('product/create', array('as'=>'createProduct', 'uses'=>'AdminController@createProduct'));

	Route::post('product/create', array('as'=>'newProduct', 'before'=>'csrf', 'uses'=>'AdminController@newProduct'));

	Route::get('category/edit/{category}', array('as'=>'editCategory', 'uses'=>'AdminController@editCategory'));

	Route::post('category/edit/{category}', array('as'=>'updateCategory', 'before'=>'csrf', 'uses'=>'AdminController@updateCategory'));

	Route::get('product/edit/{product}', array('as'=>'editProduct', 'uses'=>'AdminController@editProduct'));

	Route::post('product/edit/{product}', array('as'=>'updateProduct', 'before'=>'csrf', 'uses'=>'AdminController@updateProduct'));

	Route::get('product/image/{product}', array('as'=>'editImage', 'uses'=>'AdminController@editImage'));

	Route::post('product/update', array('as'=>'updateImage', 'uses'=>'AdminController@updateImage'));
});

//product Routes
Route::model('product', 'Product');

Route::get('/', array('as'=>'products', 'uses'=>'ProductController@getIndex'));

Route::get('product/{product}', array('as'=>'product', 'uses'=>'ProductController@getProduct'));

//category Routes
Route::model('category', 'Category');

Route::get('category/{category}', array('as'=>'category', 'uses'=>'CategoryController@getIndex'));


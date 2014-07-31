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

//Admin Routes
Route::group(array('before'=>'admin'), function()
{
	Route::get('admin', 'AdminController@getIndex');

	Route::get('category/create', array('as'=>'createCategory', 'uses'=>'AdminController@createCategory'));

	Route::post('category/create', array('as'=>'newCategory', 'uses'=>'AdminController@newCategory'));

	Route::get('product/create', array('as'=>'createProduct', 'uses'=>'AdminController@createProduct'));

	Route::post('product/create', array('as'=>'newProduct', 'uses'=>'AdminController@newProduct'));
});

//product Routes
Route::model('product', 'Product');

Route::get('/', array('as'=>'products', 'uses'=>'ProductController@getIndex'));

Route::get('product/{product}', array('as'=>'product', 'uses'=>'ProductController@getProduct'));

//category Routes
Route::model('category', 'Category');

Route::get('category/{category}', array('as'=>'category', 'uses'=>'CategoryController@getIndex'));

//user Routes
Route::get('login', array('as'=>'login', 'uses'=>'HomeController@getLogin'));

Route::post('login', array('uses'=>'HomeController@postLogin'));

Route::get('register', array('as'=>'register', 'uses'=>'HomeController@getRegister'));

Route::post('register', array('uses'=>'HomeController@postRegister'));

Route::get('logout', array('as'=>'logout', 'uses'=>'HomeController@logout'));


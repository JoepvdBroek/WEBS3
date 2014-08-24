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

Route::get('taakverdeling', array('as'=>'taakverdeling', 'uses'=>'HomeController@taakverdeling'));


// cart Routes
Route::get('cart', array('as'=>'cart', 'uses'=>'CartController@index'));

Route::post('cart/remove', array('as'=>'cart.remove', 'uses'=>'CartController@remove'));

Route::post('cart/add', array('as'=>'cart.add', 'uses'=>'CartController@add'));

Route::post('cart/delete', array('as'=>'cart.delete', 'uses'=>'CartController@delete'));

Route::get('cart/empty', array('as'=>'cart.empty', 'uses'=>'CartController@destroy'));

Route::get('cart/order', array('as'=>'cart.order', 'uses'=>'CartController@order'));

//product Routes
Route::post('search', array('as'=>'search', 'uses'=>'ProductController@search'));

Route::resource('product', 'ProductController');


Route::get('/', array('as'=>'home', 'uses'=>'HomeController@index'));

//user Routes
Route::get('login', array('as'=>'login', 'uses'=>'AuthController@getLogin'));

Route::post('login', array('before'=>'csrf', 'uses'=>'AuthController@postLogin'));

Route::get('register', array('as'=>'register', 'uses'=>'AuthController@getRegister'));

Route::post('register', array('before'=>'csrf', 'uses'=>'AuthController@postRegister'));

Route::get('logout', array('as'=>'logout', 'uses'=>'AuthController@logout'));

//Admin Routes
Route::group(array('before'=>'admin'), function()
{
	                     
	Route::get('admin', array('as'=>'admin', 'uses'=>'AdminController@getIndex'));

});

//category Routes
Route::resource('category', 'CategoryController');


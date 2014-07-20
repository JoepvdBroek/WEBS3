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


//product Routes
Route::get('products', array('as'=>'products', 'uses'=>'ProductController@getIndex'));

Route::get('product/{product}', array('as'=>'product', 'uses'=>'ProductController@getProduct'));

Route::get('products/create', array('as'=>'createProduct', 'uses'=>'ProductController@createProduct'));

Route::post('products/create', array('as'=>'newProduct', 'uses'=>'ProductController@newProduct'));

//category Routes
Route::get('category/{id}', array('as'=>'category', 'uses'=>'CategoryController@getIndex'));

Route::get('categories/create', array('as'=>'createCategory', 'uses'=>'CategoryController@createCategory'));

Route::post('categories/create', array('as'=>'newCategory', 'uses'=>'CategoryController@newCategory'));

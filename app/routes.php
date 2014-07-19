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

Route::get('products', array('as'=>'products', 'uses'=>'ProductController@getIndex'));

Route::get('product/{product}', array('as'=>'product', 'uses'=>'ProductController@getProduct'));

Route::get('products/create', array('as'=>'createProduct', 'uses'=>'ProductController@createProduct'));

Route::post('product/new', function()
{
	$product = Input::all();

		DB::insert('Insert into products (name, price, shortDescription, description, category_id, imageName) values (?,?,?,?,?,?)',
			array($input['name'], $input['price'], $input['shortDescription'], $input['description'], $input['category_id'], $input['image']));

		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
});
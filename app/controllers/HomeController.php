<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}

	public function taakverdeling()
	{
		return View::make('home.taakverdeling')
			->with('title', 'Taakverdeling');
	}

	public function frontend()
	{
		return View::make('home.frontend')
			->with('title', 'Frontend');
	}

	

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
}

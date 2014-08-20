<?php

class AdminController extends BaseController{


	public function getIndex()
	{
		return View::make('admin.admin')
			->with('title', 'Admin Page')
			->with('products', Product::all())
			->with('categories', Category::all())
			->with('orders', Order::all());
	}
}
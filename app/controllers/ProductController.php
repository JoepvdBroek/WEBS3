<?php

class ProductController extends BaseController {

	//public $restful = true;

	public function getIndex()
	{
		return View::make('product.index')
			->with('title', 'all products')
			->with('products', Product::all());
	}

	public function getProduct($id)
	{
		return View::make('product.view')
			->with('title', 'Product view page')
			->with('product', Product::find($id));
	}
}
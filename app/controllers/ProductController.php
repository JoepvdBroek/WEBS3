<?php

class ProductController extends BaseController {

	//public $restful = true;

	public function getIndex()
	{
		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}

	public function getProduct($prod)
	{
		return View::make('product.view')
			->with('title', 'Product View Page')
			->with('product', $prod);
	}

}
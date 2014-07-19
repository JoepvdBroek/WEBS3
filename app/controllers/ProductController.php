<?php

class ProductController extends BaseController {

	//public $restful = true;

	public function getIndex()
	{
		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}

	public function getProduct($id)
	{
		return View::make('product.view')
			->with('title', 'Product View Page')
			->with('product', Product::find($id));
	}

	public function createProduct()
	{
		return View::make('product.create')
			->with('title', 'Product Create Page');		
	}

	public function newProduct()
	{
		$product = Input::all();

		DB::insert('Insert into products (name, price, shortDescription, description, category_id, imageName) values (?,?,?,?,?,?)',
			array($input['name'], $input['price'], $input['shortDescription'], $input['description'], $input['category_id'], $input['image']));

		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}
}
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

		$array = array();
		foreach(Category::where('parent', '<>', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('product.create')
			->with('title', 'Product Create Page')
			->with('categories', $array);	//categorien met ouder
	}

	public function newProduct()
	{
		$product = Input::all();

		DB::insert('Insert into products (name, price, shortDescription, description, category_id, imageName) values (?,?,?,?,?,?)',
			array($product['name'], $product['price'], $product['shortDescription'], $product['description'], $product['category'], $product['image']));

		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}
}
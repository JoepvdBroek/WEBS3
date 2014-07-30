<?php

class AdminController extends BaseController{


	public function getIndex()
	{
		return View::make('admin.admin')
			->with('title', 'Admin Page');
	}


	public function createCategory()
	{
		$array = array();
		$array[0] = "Geen ouder";
		foreach(Category::where('parent', '=', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.createCategory')
			->with('title', 'Category Create Page')
			->with('categories', $array);	//categorien zonder ouder	
	}

	public function newCategory()
	{
		$category = Input::all();

		DB::insert('Insert into categories (name, parent) values (?,?)',
			array($category['name'], $category['parent']));

		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}

	public function createProduct()
	{

		$array = array();
		foreach(Category::where('parent', '<>', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.createProduct')
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
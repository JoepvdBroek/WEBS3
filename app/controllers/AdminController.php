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
		$input = Input::all();

		$category = new Category;
		$category->name = $input['name'];
		$category->parent = $input['parent'];

		$category->save();

		return Redirect::route('/');
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
		$input = Input::all();

		$product = new Product;
		$product->name = $input['name'];
		$product->price = $input['price'];
		$product->shortDescription = $input['shortDescription'];
		$product->description = $input['description'];
		$product->category_id = $input['category'];
		$product->imageName = $input['image'];

		$product->save();

		return Redirect::to('/');
	}
}
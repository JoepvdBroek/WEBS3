<?php

class CategoryController extends BaseController {

	public function getIndex($id)
	{
		return View::make('category.index')
			->with('title', 'Category Page')
			->with('products', Product::where('category_id', '=', $id)->get());
	}

	public function createCategory()
	{
		return View::make('category.create')
			->with('title', 'Category Create Page');		
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
}
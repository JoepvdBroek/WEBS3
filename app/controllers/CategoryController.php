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
		$array = array();
		$array[0] = "Geen ouder";
		foreach(Category::where('parent', '=', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('category.create')
			->with('title', 'Category Create Page')
			->with('categories', $array);		
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
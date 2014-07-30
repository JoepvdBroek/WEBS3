<?php

class CategoryController extends BaseController {

	public function getIndex($cat)
	{
		return View::make('category.index')
			->with('title', 'Category Page')
			->with('products', Product::where('category_id', '=', $cat->id)->get());
	}

}
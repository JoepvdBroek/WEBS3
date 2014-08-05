<?php

class CategoryController extends BaseController {

	public function index()
	{
		//
	}

	public function show($id)
	{
		$cat = Category::find($id);

		return View::make('category.index')
			->with('title', $cat->name)
			->with('products', Product::where('category_id', '=', $id)->get());
	}

	public function create()
	{
		$array = array();
		$array[0] = "Geen ouder";
		foreach(Category::where('parent', '=', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.category.createCategory')
			->with('title', 'Category Create Page')
			->with('categories', $array);	//categorien zonder ouder	
	}

	public function store()
	{
		$input = Input::all();

		$val = Validator::make($input, Category::$rules);

		if($val->fails())
		{
			return Redirect::to('category/create')->withInput()->withErrors($val);
		}
		else
		{
			$category = new Category;
			$category->name = $input['name'];
			$category->parent = $input['parent'];

			$category->save();

			return Redirect::to('/');
		}
	}

	public function edit($id)
	{
		$array = array();
		$array[0] = "Geen ouder";
		foreach(Category::where('parent', '=', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.category.editCategory')
			->with('title', 'Wijzig Categorie')
			->with('categories', $array)
			->with('category', Category::find($id));
	}

	public function update($id)
	{
		$input = Input::all();
		$category = Category::find($id);

		$category->name = $input['name'];
		$category->parent = $input['parent'];

		$category->save();

		return Redirect::route('category.show', array($id));
	}

	public function destroy($id)
	{
		# code...
	}


}
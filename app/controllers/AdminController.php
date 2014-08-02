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

		$rules = array('name'=>'required', 'parent'=>'required');

		$val = Validator::make($input, $rules);

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

			return Redirect::route('/');
		}
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

		$path = public_path();
		$path = $path + "\images";

		$rules = array('name'=>'required', 'price'=>'required|numeric', 'shortDescription'=>'required', 'description'=>'required', 'category'=>'required', 'image'=>'required|image');

		$val = Validator::make($input, $rules);

		if($val->fails())
		{
			return Redirect::to('product/create')->withInput()->withErrors($val);
		}
		else
		{

			$product = new Product;
			$product->name = $input['name'];
			$product->price = $input['price'];
			$product->shortDescription = $input['shortDescription'];
			$product->description = $input['description'];
			$product->category_id = $input['category'];
			$product->imageName = $input['image'];

			if(Input::hasFile('image'))
			{
				if(Input::file('image')->isValid())
				{
					try 
					{
	    				Input::file('photo')->upload('picture', $path, Input::file('photo')->getClientOriginalName());
					} 
					catch(Exception $e) 
					{
						Redirect::route('error', array($e->getMessage()));
						// Handle your error here.
						// You might want to log $e->getMessage() as that will tell you why the file failed to move.
					}				
				}
				else
				{
					Redirect::route('error', array('File is not valid'));
				}
			}
			else
			{
				Redirect::route('error', array('No file selected'));
			}

			$product->save();

			return Redirect::to('/');
		}
	}
}
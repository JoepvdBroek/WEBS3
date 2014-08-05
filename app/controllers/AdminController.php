<?php

class AdminController extends BaseController{


	public function getIndex()
	{
		return View::make('admin.admin')
			->with('title', 'Admin Page')
			->with('products', Product::all())
			->with('categories', Category::all());
	}


	public function createCategory()
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

	public function newCategory()
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

	public function createProduct()
	{
		$array = array();
		foreach(Category::where('parent', '<>', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.product.createProduct')
			->with('title', 'Product Create Page')
			->with('categories', $array);	//categorien met ouder
	}

	public function newProduct()
	{
		$input = Input::all();

		$path = public_path();
		$path = $path . "\images";

		$val = Validator::make($input, Product::$rules);

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
						$image = Input::file('image');
	    				$image->move($path, Input::file('image')->getClientOriginalName());
	    				$product->save();
					} 
					catch(Exception $e) 
					{
						return Redirect::route('error', array($e->getMessage()));
						// Handle your error here.
						// You might want to log $e->getMessage() as that will tell you why the file failed to move.
					}				
				}
				else
				{
					return Redirect::route('error', array('File is not valid'));
				}
			}
			else
			{
				return Redirect::route('error', array('No file selected'));
			}

			return Redirect::to('/');
		}
	}

	public function editCategory($category)
	{
		$array = array();
		$array[0] = "Geen ouder";
		foreach(Category::where('parent', '=', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.category.editCategory')
			->with('title', 'Wijzig Categorie')
			->with('category', $category);
	}

	public function updateCategory()
	{
		//update db
	}

	public function editProduct($product)
	{
		$array = array();
		foreach(Category::where('parent', '<>', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.product.editProduct')
			->with('title', 'Wijzig Product')
			->with('categories', $array)
			->with('product', $product);
	}

	public function updateProduct()
	{
		$input = Input::all();

		$val = Validator::make($input, Product::$rules);

		if($val->fails())
		{
			return Redirect::to('editProduct')->withInput()->withErrors($val);
		}
		else
		{

			$product = $input['id'];
			$product->name = $input['name'];
			$product->price = $input['price'];
			$product->shortDescription = $input['shortDescription'];
			$product->description = $input['description'];
			$product->category_id = $input['category'];
			$product->imageName = $input['image'];

			$product->save();
		}

		$this->getIndex();
	}

	public function editImage($product)
	{
		return View::make('admin.product.editImage')
			->with('title', 'Wijzig Afbeelding')
			->with('product', $product);
	}

	public function updateImage()
	{
		$input = Input::all();

		$product = Product::find($input['id']);
		$product->imageName = $input['image'];

			if(Input::hasFile('image'))
			{
				if(Input::file('image')->isValid())
				{
					try 
					{
						$image = Input::file('image');
	    				$image->move($path, Input::file('image')->getClientOriginalName());

	    				$product->save();
					} 
					catch(Exception $e) 
					{
						return Redirect::route('error', array($e->getMessage()));
						// Handle your error here.
						// You might want to log $e->getMessage() as that will tell you why the file failed to move.
					}				
				}
				else
				{
					return Redirect::route('error', array('File is not valid'));
				}
			}
			else
			{
				return Redirect::route('error', array('No file selected'));
			}

		return Redirect::to('admin');
		
	}
}
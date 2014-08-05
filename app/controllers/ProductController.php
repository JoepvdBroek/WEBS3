<?php

class ProductController extends BaseController {

	//public $restful = true;

	public function index()
	{
		return View::make('product.index')
			->with('title', 'All Products')
			->with('products', Product::all());
	}

	public function show($id)
	{
		return View::make('product.view')
			->with('title', 'Product View Page')
			->with('product', Product::find($id));
	}

	public function create()
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

	public function store()
	{
		$input = Input::all();

		$path = public_path();
		$path = $path . "\images";

		$val = Validator::make($input, Product::$rules);

		if($val->fails())
		{
			return Redirect::to('product/' . $id . '/create')
				->withErrors($val)
				->withInput();
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

	public function edit($id)
	{
		$array = array();
		foreach(Category::where('parent', '<>', '0')->get() as $category)
		{
			$array[$category->id] = $category->name;
		}

		return View::make('admin.product.editProduct')
			->with('title', 'Wijzig Product')
			->with('categories', $array)
			->with('product', Product::find($id));
	}

	public function update($id)
	{
		$input = Input::all();

		$rules = array('name'=>'required', 'price'=>'required|numeric', 'shortDescription'=>'required', 'description'=>'required', 'category'=>'required');

		$val = Validator::make($input, $rules);

		if($val->fails())
		{
			return Redirect::to('product/' . $id . '/edit')
				->withErrors($val)
				->withInput();
		}
		else
		{

			$product = Product::find($id);
			$product->name = $input['name'];
			$product->price = $input['price'];
			$product->shortDescription = $input['shortDescription'];
			$product->description = $input['description'];
			$product->category_id = $input['category'];

			if(Input::hasFile('image'))
			{
				if(Input::file('image')->isValid())
				{
					try 
					{
						$image = Input::file('image');
	    				$image->move($path, Input::file('image')->getClientOriginalName());

	    				$product->imageName = $input['image'];
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
			
		}
		$product->save();

		return Redirect::route('product.show', array($id));
	}

	public function image($id)
	{
		return View::make('admin.product.editImage')
			->with('title', 'Wijzig Afbeelding')
			->with('product', Product::find($id));
	}

	public function updateImage($id)
	{
		$input = Input::all();

		$product = Product::find($id);
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

	public function destroy($id)
	{
		# code...
	}

}
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
		$path = $path . "/images";

		$val = Validator::make($input, Product::$rules);

		if($val->fails())
		{
			return Redirect::to('product/create')
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
			//$product->imageName = $input['image'];

			if(Input::hasFile('image'))
			{
				if(Input::file('image')->isValid())
				{
					try 
					{
						$image = Input::file('image');

						Image::make($image->getRealPath())->resize('200','200')->save($path.'/200x200/'.$image->getClientOriginalName());
						Image::make($image->getRealPath())->resize('100','100')->save($path.'/100x100/'.$image->getClientOriginalName());

						$product->imageName = $image->getClientOriginalName();
	    				//$image->move($path, Input::file('image')->getClientOriginalName());
	    				$product->save();
					} 
					catch(Exception $e) 
					{
						return $e->getMessage();
						// Handle your error here.
						// You might want to log $e->getMessage() as that will tell you why the file failed to move.
					}				
				}
				else
				{
					return 'File is not valid';
				}
			}
			else
			{
				return 'No file selected';
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

		$path = public_path();
		$path = $path . "/images";

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

						Image::make($image->getRealPath())->resize('200','200')->save($path.'/200x200/'.$image->getClientOriginalName());
						Image::make($image->getRealPath())->resize('100','100')->save($path.'/100x100/'.$image->getClientOriginalName());

						$product->imageName = $image->getClientOriginalName();
	    				//$image->move($path, Input::file('image')->getClientOriginalName());
	
					} 
					catch(Exception $e) 
					{
						return $e->getMessage();
						// Handle your error here.
						// You might want to log $e->getMessage() as that will tell you why the file failed to move.
					}				
				}
				else
				{
					return 'File is not valid';
				}
			}
			
		}
		$product->save();

		return Redirect::route('product.show', array($id));
	}

	public function search()
	{
		$string = Input::get('search');

		if($string === '')
		{
			return View::make('product.search')
				->with('title', 'Zoek Resultaten');
		}

		$string = strtoupper($string); 
		$string = strip_tags($string); 
		$string = trim ($string);

		$products = Product::where('name', 'LIKE', '%'.$string.'%')->orWhere('description', 'LIKE', '%'.$string.'%')->orWhere('shortDescription', 'LIKE', '%'.$string.'%')->get();

		return View::make('product.search')
			->with('title', 'Zoek Resultaten')
			->with('products', $products);
	}

	public function destroy($id)
	{
		$product = Product::find($id);

		$product->delete();		
	}

}
<?php

class CartController extends BaseController{

	public function Index()
	{
		return View::make('cart.cart')
			->with('title', 'Winkelwagen');
	}

	public function add()
	{
		if(Request::ajax())
		{	
			$product = Product::find(Input::get('id'));

			$item = array(
			    'id' => $product->id,
			    'name' => $product->name,
			    'price' => $product->price,
			    'quantity' => 1
			);

			Cart::insert($item);

			foreach (Cart::contents() as $content) {
			    if($content->id === $product->id)
			    {
			    	$identifier = $content->identifier;
			    	$return = Cart::item($identifier)->toArray();
			    	return Response::json($return);
			    }
			}
			

			return Response::json($item);
			
		}
	}

	public function store()
	{

	}

	public function edit($id)
	{

	}

	public function update($id)
	{

	}

	public function destroy($id)
	{
	
	}

}
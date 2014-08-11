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

			if(Cart::has($item))
			{
				$Cart::item($item)->quantity = $Cart::item($item)->quantity + 1;
			}
			else
			{
				Cart::insert($item);
			}

			return Response::json($product);
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
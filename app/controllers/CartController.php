<?php

class CartController extends BaseController{

	public function index()
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
			    	$return['total'] = Cart::total();
			    	return Response::json($return);
			    }
			}
			

			return Response::json($item);
			
		}
	}

	public function remove()
	{
		if(Request::ajax())
		{	
			$product = Product::find(Input::get('id'));

			foreach (Cart::contents() as $content) {
			    if($content->id === $product->id)
			    {
			    	$identifier = $content->identifier;
			    	$item = Cart::item($identifier);
			    	if($item->quantity === 1){
			    		$item->remove();
			    		return Response::json(null);
			    	}
			    	else{
			    		$item->quantity = $item->quantity - 1;
			    		$return = $item->toArray();
			    		$return['total'] = Cart::total();
			    		return Response::json($return);
			    	}			    	

			    	
			    }
			}						
		}
	}

	public function destroy()
	{
		Cart::destroy();

		return View::make('cart.cart')
			->with('title', 'Winkelwagen');
	}

	public function delete($id)
	{
		foreach (Cart::contents() as $content) {
			if($content->id === $id)
			{
			    $identifier = $content->identifier;
				$item = Cart::item($identifier);			    
			    $item->remove();
			    	
			  	return View::make('cart.cart')
					->with('title', 'Winkelwagen');	 	
		    	
			}
		}			 
	}

	

}
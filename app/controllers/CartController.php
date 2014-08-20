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

	public function delete()
	{
		if(Request::ajax())
		{
			foreach (Cart::contents() as $content) {
				if($content->id === $id)
				{
				    $identifier = $content->identifier;
					$item = Cart::item($identifier);			    
				    $item->remove();
				    	
				  	return true;	 	
			    	
				}
			}	
		}					 
	}

	public function order()
	{
		if(Auth::user()){

			$order = new Order;

			$order->user_id = Auth::user()->id; 
			$order->price = Cart::total();

			$order->save();

			foreach(Cart::contents() as $item){
				DB::table('products_by_order')->insert(
						array('product_id'=>$item->id, 'order_id'=>$order->id, 'amount'=>$item->quantity, 'created_at'=>date('Y-m-d H:m:s'), 'updated_at'=>date('Y-m-d H:m:s'))
					);
			}


			Cart::destroy();

			return View::make('cart.cart')
				->with('title', 'Winkelwagen');
		}
		else
		{
			return Redirect::to('login');
		}

		
	}

	

}
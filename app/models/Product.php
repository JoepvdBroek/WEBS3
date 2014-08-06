<?php 

class Product extends Eloquent {

	public static $rules = array(
		'name'=>'required', 
		'price'=>'required|numeric', 
		'shortDescription'=>'required', 
		'description'=>'required', 
		'category'=>'required', 
		'image'=>'required');

	public function category()
	{
	    return $this->hasOne('Category');
	}
}
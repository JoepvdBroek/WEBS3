<?php 

class Product extends Eloquent {

	protected $rules = array('name'=>'required', 'price'=>'required|numeric', 'shortDescription'=>'required', 'description'=>'required', 'category'=>'required', 'image'=>'required');

	public function category()
	{
	    return $this->hasOne('Category');
	}
}
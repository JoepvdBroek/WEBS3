<?php 

class Category extends Eloquent {

	protected $table = 'categories';

	public static $rules = array('name'=>'required', 'parent'=>'required');

	public function products()
	{
	    return $this->hasMany('Product');
	}
}
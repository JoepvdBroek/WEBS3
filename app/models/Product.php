<?php 

class Product extends Eloquent {


	public function category()
	{
	    return $this->hasOne('Category');
	}
}
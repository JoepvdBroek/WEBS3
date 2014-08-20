<?php 

class Order extends Eloquent {

	public function user()
	{
	    return $this->hasOne('User');
	}

	public function products()
	{
		return $this->hasMany('Product');
	}
}
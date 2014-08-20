<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsByOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_by_order', function($table){
			$table->integer('product_id');
			$table->integer('order_id');
			$table->integer('amount');
			$table->dateTime('updated_at');
			$table->dateTime('created_at');
			$table->rememberToken();

			$table->primary(array('product_id', 'order_id'));
			//$table->foreign('order_id')->references('id')->on('orders');
			//$table->foreign('product_id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products_by_order');
	}

}

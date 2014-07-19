<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table){
			$table->increments('id');
			$table->string('name');
			$table->decimal('price', 6, 2);
			$table->text('description');
			$table->text('shortDescription');
			$table->string('imageName');
			$table->integer('category_id');
			//$table->foreign('category_id')->references('id')->on('categories');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('products');
	}

}

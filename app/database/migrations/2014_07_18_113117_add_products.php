<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('products')->insert(array(
			'name'=>'Tandenborstel',
			'price'=>9.99,
			'shortDescription'=>'Van het merk Oral',
			'description'=>'Een elektische tandenborstel om glanzende tanden te krijgen.',
			'imageName'=>'oral-b.png',
			'category_id'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Barbie',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'Barbie is de gewilde meisjes speelpop.',
			'imageName'=>'barbie.png',
			'category_id'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Harry Potter en de steen der wijze',
			'price'=>9.99,
			'shortDescription'=>'Een goede thriller',
			'description'=>'Een spannend verhaal over potter tegen voldemort.',
			'imageName'=>'harry.png',
			'category_id'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('products')->where('name', '=', 'Tandenborstel')->delete();
		DB::table('products')->where('name', '=', 'Barbie')->delete();
		DB::table('products')->where('name', '=', 'Harry Potter en de steen der wijze')->delete();
	}

}

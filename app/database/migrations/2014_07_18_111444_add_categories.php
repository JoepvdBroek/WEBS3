<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('categories')->insert(array(
			'name'=>'Verzorging',
			'parent'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('categories')->insert(array(
			'name'=>'Boeken',
			'parent'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('categories')->insert(array(
			'name'=>'Speelgoed',
			'parent'=>'0',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('categories')->insert(array(
			'name'=>'Mondsverzorging',
			'parent'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('categories')->insert(array(
			'name'=>'Thriller',
			'parent'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('categories')->insert(array(
			'name'=>'Poppen',
			'parent'=>'3',
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
		//childreren
		DB::table('categories')->where('name', '=', 'Poppen')->delete();
		DB::table('categories')->where('name', '=', 'Thriller')->delete();
		DB::table('categories')->where('name', '=', 'Mondsverzorging')->delete();

		//parents
		DB::table('categories')->where('name', '=', 'Speelgoed')->delete();
		DB::table('categories')->where('name', '=', 'Boeken')->delete();
		DB::table('categories')->where('name', '=', 'Verzorging')->delete();
	}

}

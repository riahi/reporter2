<?php

use Illuminate\Database\Migrations\Migration;

class AddTemplatesEdited extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) 
		{
			$table
				->integer('templates_edited');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table) 
		{
			$table
				->dropColumn('templates_edited');
		});
	}
}
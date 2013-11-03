<?php

use Illuminate\Database\Migrations\Migration;

class AddUserLevels extends Migration {

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
				->integer('user_level');
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
				->dropColumn('user_level');
		});
	}

}
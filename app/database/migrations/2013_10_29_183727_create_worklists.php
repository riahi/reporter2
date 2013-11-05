<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// Implemented as a pivottable between 'templates' and 'users' tables.  

class CreateWorklists extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('template_user', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('template_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('template_user');
	}

}

<?php

// app/database/migrations/2013_10_18_020309_add_timestamps_to_games.php

use Illuminate\Database\Migrations\Migration;

class AddTimestampsToGames extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('games', function($table)
		{
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('games', function($table)
		{
			$table->dropColumn('updated_at', 'created_at');
		});
	}

}
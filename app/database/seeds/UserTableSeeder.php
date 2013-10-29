<?php
// app/database/seeds/UserSeeder.php 

class UserTableSeeder extends DatabaseSeeder {
	public function run() {
		$users = [
			[
				"username" => "sht7",
				"password" => Hash::make("123456"),
				"email" => "stajmir@partners.org"
			]
		];

		foreach ($users as $user) {
			User::create($user);
		}
	}
}

?>
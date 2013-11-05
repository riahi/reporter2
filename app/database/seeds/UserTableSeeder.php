<?php
// app/database/seeds/UserTableSeeder.php 

class UserTableSeeder extends DatabaseSeeder 
{
	public function run() 
	{
		Eloquent::unguard();
		$users = [
			[
				"username" => "sht7",
				"password" => Hash::make("123456"),
				"email" => "stajmir@partners.org"
			]
		];

		foreach ($users as $user) 
		{
			User::create($user);
		}
	}
}

?>
<?php

use Faker\Factory as Faker;
use Cuitter\Statuses\Status;
use Cuitter\Users\User;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$userIds = User::lists('id');

		foreach(range(1, 50) as $index)
		{
			Status::create([
				'user_id' => $faker->randomElement($userIds),
				'body'	=>	$faker->sentence()
			]);
		}
	}

}
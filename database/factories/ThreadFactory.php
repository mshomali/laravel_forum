<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Thread::class, function (Faker $faker) {
	return [
		'user_id' => \App\Models\User::inRandomOrder()->first()->id,
		'title'   => $faker->word,
		'body'    => $faker->paragraph,
	];
});

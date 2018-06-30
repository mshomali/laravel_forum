<?php

use Faker\Generator as Faker;

$factory->define(\App\Thread::class, function (Faker $faker) {
	return [
		'user_id' => \App\User::inRandomOrder()->first()->id,
		'title'   => $faker->word,
		'body'    => $faker->paragraph,
	];
});

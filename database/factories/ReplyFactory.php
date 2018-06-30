<?php

use Faker\Generator as Faker;

$factory->define(\App\Reply::class, function (Faker $faker) {
	return [
		'thread_id' => \App\Thread::inRandomOrder()->first()->id,
		'user_id'   => \App\User::inRandomOrder()->first()->id,
		'body'      => $faker->paragraph,
	];
});

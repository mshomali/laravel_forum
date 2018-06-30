<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Reply::class, function (Faker $faker) {
	return [
		'thread_id' => \App\Models\Thread::inRandomOrder()->first()->id,
		'user_id'   => \App\Models\User::inRandomOrder()->first()->id,
		'body'      => $faker->paragraph,
	];
});

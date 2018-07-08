<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FavoritesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorites', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedInteger('favorited_id');
			$table->foreign('favorited_id')->references('id')->on('replies');
			$table->string('favorited_type', 50);
			$table->timestamps();

			$table->unique(['user_id', 'favorited_id', 'favorited_type']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
}

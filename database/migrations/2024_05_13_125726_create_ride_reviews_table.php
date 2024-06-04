<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('ride_reviews', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ride_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->smallInteger('rating');
			$table->string('review', 255)->nullable();
			$table->foreign('ride_id')->references('id')->on('rides')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ride_reviews');
	}
};

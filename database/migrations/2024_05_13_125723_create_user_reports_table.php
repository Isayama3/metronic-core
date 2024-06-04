<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('user_reports', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('reporter_id')->unsigned();
			$table->integer('reported_id')->unsigned();
			$table->string('description');
			$table->integer('ride_id')->unsigned();
			$table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('reported_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('ride_id')->references('id')->on('rides')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('user_reports');
	}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('ride_stopovers', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ride_id')->unsigned();
			$table->double('latitude', 9.6);
			$table->double('longitude', 9, 6);
			$table->string('name', 255)->nullable();
			$table->foreign('ride_id')->references('id')->on('rides')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ride_stopovers');
	}
};

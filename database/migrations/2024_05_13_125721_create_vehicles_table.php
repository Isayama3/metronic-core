<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('vehicles', function (Blueprint $table) {
			$table->increments('id');
			$table->mediumInteger('plate_number')->unique();
			$table->string('vehicle_name', 255);
			$table->string('image', 255);
			$table->string('color', 10);
			$table->integer('vehicle_model_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();
			$table->integer('vehicle_type_id')->unsigned()->nullable();
			$table->boolean('active')->default(true);
			$table->foreign('vehicle_model_id')->references('id')->on('vehicle_models')->onDelete('set null')->onUpdate('set null');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('vehicle_type_id')->references('id')->on('types')->onDelete('set null')->onUpdate('set null');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('vehicles');
	}
};

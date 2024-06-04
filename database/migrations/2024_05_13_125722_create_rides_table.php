<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('rides', function (Blueprint $table) {
			$table->increments('id');
			$table->string('pickup_address', 255);
			$table->decimal('pickup_latitude', 9, 6);
			$table->decimal('pickup_longitude', 9, 6);
			$table->string('dropoff_address', 255);
			$table->decimal('dropoff_latitude', 9, 6);
			$table->decimal('dropoff_longitude', 9, 6);
			$table->datetime('date_schedule');
			$table->smallInteger('passengers_limit');
			$table->boolean('instant_booking')->default(false);
			$table->double('price_per_seat');
			$table->boolean('is_publish')->default(false);
			$table->boolean('middle_seat_empty')->default(true);
			$table->string('notes', 255)->nullable();
			$table->double('total_price')->default('0');
			$table->integer('user_id')->unsigned();
			$table->integer('vehicle_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('rides');
	}
};

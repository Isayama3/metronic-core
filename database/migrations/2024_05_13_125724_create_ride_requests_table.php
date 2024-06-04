<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('ride_requests', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ride_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->double('price');
			$table->integer('status_id')->unsigned();
			$table->integer('payment_method_id')->unsigned();
			$table->foreign('ride_id')->references('id')->on('rides')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ride_requests');
	}
};

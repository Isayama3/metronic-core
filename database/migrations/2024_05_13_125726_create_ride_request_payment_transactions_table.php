<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('ride_request_payment_transactions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('ride_request_id')->unsigned();
			$table->string('status_id');
			$table->string('amount');
			$table->integer('payment_gateway_id')->unsigned()->nullable();
			$table->foreign('ride_request_id')->references('id')->on('ride_requests')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('payment_gateway_id')->references('id')->on('payment_gateways')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ride_request_payment_transactions');
	}
};

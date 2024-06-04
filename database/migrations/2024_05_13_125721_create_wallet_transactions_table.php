<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('wallet_transactions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('wallet_id')->unsigned();
			$table->integer('ride_id')->unsigned();
			$table->double('amount');
			$table->integer('status_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->foreign('wallet_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('ride_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('wallet_transactions');
	}
};

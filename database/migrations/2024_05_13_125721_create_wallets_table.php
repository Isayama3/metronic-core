<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('wallets', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->double('wallet_balance')->default('0');
			$table->double('withdraw_money')->comment('All withdrawn money.')->default('0');
			$table->double('to_be_deposit')->comment('Money that driver should deposit it.')->default('0');
			$table->double('deposited_money')->comment('Money that driver deposited it.')->default('0');
			$table->double('trip_used_money')->comment('All money that client used in trip.')->default('0');
			$table->double('fines_balance')->comment('The balance amount representing fines accrued by the user')->default('0');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('wallets');
	}
};

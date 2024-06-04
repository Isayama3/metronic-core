<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('safe_transactions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('safe_id')->unsigned();
			$table->double('amount');
			$table->enum('type', array('in', 'out'));
			$table->string('receipt')->nullable();
			$table->integer('bank_account_id')->unsigned();
			$table->foreign('safe_id')->references('id')->on('safes')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('safe_transactions');
	}
};

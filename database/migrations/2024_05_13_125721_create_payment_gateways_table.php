<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('payment_gateways', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->boolean('active')->default(true);
			$table->double('total_transactions', 12,2)->default('0');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payment_gateways');
	}
};
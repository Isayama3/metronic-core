<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('payment_methods', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50)->unique();
			$table->boolean('active')->default(true);
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payment_methods');
	}
};
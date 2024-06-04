<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('vehicle_models', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('vehicle_models');
	}
};
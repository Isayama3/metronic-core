<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('full_name');
			$table->string('email', 150);
			$table->string('message', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
};
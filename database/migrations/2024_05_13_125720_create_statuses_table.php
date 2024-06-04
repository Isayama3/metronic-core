<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('statuses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('table_name', 255);
			$table->string('name', 255);
			$table->boolean('active')->default(true);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('statuses');
	}
};
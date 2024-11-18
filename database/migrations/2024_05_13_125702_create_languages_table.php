<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('languages', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('active')->default(true);
			$table->string('name', 50);
			$table->string('locale', 3);
			$table->string('dir', 3);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('languages');
	}
};
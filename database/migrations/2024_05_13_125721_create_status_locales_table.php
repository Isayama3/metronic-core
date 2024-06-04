<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('status_locales', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('status_id')->unsigned();
			$table->integer('language_id')->unsigned();
			$table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('status_locales');
	}
};

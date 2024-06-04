<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('type_locales', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('type_id')->unsigned();
			$table->integer('language_id')->unsigned();
			$table->string('name');
			$table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('type_locales');
	}
};

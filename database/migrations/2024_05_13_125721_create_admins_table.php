<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('admins', function (Blueprint $table) {
			$table->increments('id');
			$table->string('full_name', 100);
			$table->string('email', 100)->nullable();
			$table->string('country_code', 5);
			$table->string('phone', 20);
			$table->string('password', 255);
			$table->boolean('active')->default(true);
			$table->integer('country_id')->unsigned()->nullable();
			$table->integer('language_id')->unsigned()->default(1);
			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')->onUpdate('set null');
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict')->onUpdate('restrict');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
};

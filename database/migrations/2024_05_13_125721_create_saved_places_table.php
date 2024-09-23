<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('saved_places', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->string('description', 255)->nullable();
			$table->decimal('latitude', 9, 6);
			$table->double('longitude', 9, 6);
			$table->string('address', 255);
			$table->integer('user_id')->unsigned();
			$table->integer('type_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('restrict');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('saved_places');
	}
};

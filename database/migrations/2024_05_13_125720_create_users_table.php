<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('full_name', 100)->nullable();
			$table->string('email', 150)->unique()->nullable();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('country_code', 5);
			$table->string('phone', 20)->unique();
			$table->string('password', 255)->nullable();
			$table->boolean('is_smoking')->nullable();
			$table->boolean('active')->default(true);
			$table->decimal('latitude', 9, 6)->nullable();
			$table->decimal('longitude', 9, 6)->nullable();
			$table->datetime('birthday')->nullable();
			$table->string('image', 255)->nullable();
			$table->string('fcm_token')->nullable();
			$table->integer('nationality_id')->unsigned()->nullable();
			$table->integer('language_id')->unsigned()->nullable();
			$table->foreign('nationality_id')->references('id')->on('countries')->onDelete('set null')->onUpdate('set null');
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('set null')->onUpdate('set null');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
};

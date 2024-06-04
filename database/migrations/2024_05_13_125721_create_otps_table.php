<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('otps', function (Blueprint $table) {
			$table->increments('id');
			$table->smallInteger('otp');
			$table->string('country_code')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->datetime('expired_at');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('otps');
	}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('safes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('admin_id')->unsigned();
			$table->double('money_in', 10, 2)->default('0');
			$table->double('money_out', 12, 2)->default('0');
			$table->double('balance', 12, 2)->default('0');
			$table->double('maximum_balance')->default('0');
			$table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('safes');
	}
};

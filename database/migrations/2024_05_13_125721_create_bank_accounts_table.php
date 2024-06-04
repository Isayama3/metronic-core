<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('bank_accounts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('account_number', 20)->unique();
			$table->string('account_holder_name', 100)->nullable();
			$table->boolean('active')->default(true);
			$table->string('bank_name', 100);
			$table->integer('admin_id')->unsigned();
			$table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bank_accounts');
	}
};

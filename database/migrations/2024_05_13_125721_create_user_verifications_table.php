<?php

use App\Enums\UserVerificationStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

	public function up()
	{
		Schema::create('user_verifications', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('email_status_id')->unsigned()->default(UserVerificationStatus::UNVERIFIED->value);
			$table->integer('phone_status_id')->unsigned()->default(UserVerificationStatus::UNVERIFIED->value);
			$table->integer('national_id_card_status_id')->unsigned()->default(UserVerificationStatus::UNVERIFIED->value);
			$table->integer('driving_license_status_id')->unsigned()->default(UserVerificationStatus::UNVERIFIED->value);
			$table->string('national_id_card_front_image', 255)->nullable();
			$table->string('national_id_card_back_image', 255)->nullable();
			$table->string('driving_license_back_image', 255)->nullable();
			$table->string('driving_license_front_image', 255)->nullable();
			$table->integer('user_id')->unsigned();
			$table->foreign('email_status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('phone_status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('national_id_card_status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('driving_license_status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('user_verifications');
	}
};

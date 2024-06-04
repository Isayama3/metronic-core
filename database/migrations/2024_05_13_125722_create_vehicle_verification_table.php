<?php

use App\Enums\VehicleVerificationStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('vehicle_verification', function (Blueprint $table) {
			$table->increments('id');
			$table->string('license_front_image', 255)->nullable();
			$table->string('license_back_image');
			$table->integer('license_status_id')->unsigned()->default(VehicleVerificationStatus::UNVERIFIED->value);
			$table->integer('vehicle_id')->unsigned();
			$table->foreign('license_status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
			$table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('vehicle_verification');
	}
};

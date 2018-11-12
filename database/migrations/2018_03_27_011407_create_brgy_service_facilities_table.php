<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyServiceFacilitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_service_facilities', function (Blueprint $table) {
			$table->increments('id');

			$table->string('name');
			$table->mediumText('description')->nullable();
			$table->date('date_established')->nullable();
			$table->string('condition')->nullable();
			$table->boolean('is_functional')->default(1);
			$table->integer('total_worker_m')->default(0);
			$table->integer('total_worker_f')->default(0);

			$table->string('centroid_points')->nullable();

			$table->integer('comp_id')->unsigned();
			$table->foreign('comp_id')->references('id')->on('components');
			$table->integer('brgy_id')->unsigned();
			$table->foreign('brgy_id')->references('id')->on('brgys');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('brgy_service_facilities');
	}
}

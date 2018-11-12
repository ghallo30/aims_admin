<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyEvacCentersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_evac_centers', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('centroid_points')->nullable();

			$table->integer('filled_by')->unsigned();
			$table->integer('brgy_id')->unsigned();

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
		Schema::dropIfExists('brgy_evac_centers');
	}
}

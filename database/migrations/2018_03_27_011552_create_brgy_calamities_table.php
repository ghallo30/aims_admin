<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyCalamitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_calamities', function (Blueprint $table) {
			$table->increments('id');

			$table->string('name');
			$table->mediumText('remarks')->nullable();
			$table->string('concern_cause')->nullable();
			$table->string('date_occured')->nullable();

			$table->integer('total_affected')->nullable();

			$table->string('centroid_points')->nullable();
			$table->string('status')->nullable();
			
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
		Schema::dropIfExists('brgy_calamities');
	}
}

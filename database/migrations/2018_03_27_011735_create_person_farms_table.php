<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonFarmsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_farms', function (Blueprint $table) {
			$table->increments('id');

			$table->string('crop')->nullable();
			$table->string('fertilizer')->nullable();

			$table->double('area_planted', 15, 4)->nullable();
			$table->string('irragetion_type')->nullable();

			$table->string('is_owned')->default(1);
			$table->string('land_owner')->nullable();

			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('people');
		
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
		Schema::dropIfExists('person_farms');
	}
}

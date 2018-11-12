<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipalities', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->double('land_area')->nullable();
			$table->string('classification')->nullable();
			$table->mediumText('physical_desc')->nullable();

			$table->integer('province_id')->unsigned();
			$table->foreign('province_id')->references('id')->on('provinces');
			
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
		Schema::dropIfExists('municipalities');
	}
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyHealthSurveysTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_health_surveys', function (Blueprint $table) {
			$table->increments('id');

			$table->string('name');
			$table->string('cause_type')->nullable();
			$table->string('heirarchy_m')->nullbale();
			$table->string('heirarchy_f')->nullbale();
			$table->date('date_conducted')->nullbale();



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
		Schema::dropIfExists('brgy_health_surveys');
	}
}

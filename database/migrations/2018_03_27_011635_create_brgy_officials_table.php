<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyOfficialsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_officials', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('person_id')->unsigned();
			$table->string('brgy_position')->default('Volunteer');
			$table->date('term_started')->nullable();
			$table->date('term_ended')->nullable();
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
		Schema::dropIfExists('brgy_officials');
	}
}

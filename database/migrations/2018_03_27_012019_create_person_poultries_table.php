<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonPoultriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_poultries', function (Blueprint $table) {
			$table->increments('id');

			$table->string('fish_name');
			$table->integer('total')->nullable();
			$table->integer('total_present')->nullable();

			$table->date('date_conducted')->nullable();

			$table->string('date_conducted_range')->nullable();// data range
			$table->integer('average_catch')->nullable();
			$table->string('fishing_gear')->nullable();

			$table->integer('person_id')->unsigned();

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
		Schema::dropIfExists('person_poultries');
	}
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonLivestocksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_livestocks', function (Blueprint $table) {
			
			$table->increments('id');

			$table->string('livestock', 75)->nullable();
			
			$table->integer('owned')->nullable();
			
			$table->integer('total')->nullable();
			$table->integer('total_present')->nullable();
			$table->integer('total_gone')->nullable();
			$table->string('food')->nullable();
			$table->string('water')->nullable();

			
			$table->double('area', 15, 4)->nullable();
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
		Schema::dropIfExists('person_livestocks');
	}
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonHealthsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_healths', function (Blueprint $table) {
			$table->increments('id');

			$table->double('weight', 4, 4)->nullable();
			$table->double('height', 4, 4)->nullable();
			$table->string('nutritional_status')->nullable();
			$table->boolean('is_pregnant')->default(0);
			$table->boolean('is_lactating')->default(0);
			$table->string('access_to_water')->nullable();
			$table->string('wra')->nullable();

			$table->integer('person')->unsigned();
			$table->date('date_conducted');
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
		Schema::dropIfExists('person_healths');
	}
}

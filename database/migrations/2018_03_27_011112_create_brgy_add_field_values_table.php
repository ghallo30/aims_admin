<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyAddFieldValuesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_add_field_values', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('add_field_id')->unsigned();
			$table->string('brgy_field_value')->nullable();

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
		Schema::dropIfExists('brgy_add_field_values');
	}
}

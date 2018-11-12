<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyIncomesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_incomes', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name');
			$table->double('income', 15, 4)->nullable();

			$table->double('ira', 15, 4)->nullable();
			$table->date('date_released', 15, 4)->nullable();
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
		Schema::dropIfExists('brgy_incomes');
	}
}

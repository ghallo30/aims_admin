<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonIncomesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('person_incomes', function (Blueprint $table) {
			$table->increments('id');
			
			$table->double('income_amount', 12, 4);
			$table->enum('income_type',[
				'yearly', 'quarterly', 'monthly'
				]);
			
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
		Schema::dropIfExists('person_incomes');
	}
}

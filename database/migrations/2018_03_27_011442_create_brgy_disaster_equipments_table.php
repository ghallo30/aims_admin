<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyDisasterEquipmentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_disaster_equipments', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name', 70);
			$table->mediumText('description')->nullable();
			$table->date('date_aquired')->nullable();
			$table->integer('total_functional')->default(0);
			$table->integer('quantity')->default(0);
			
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
		Schema::dropIfExists('brgy_disaster_equipments');
	}
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooperativesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hastable('cooperatives')){
			Schema::create('cooperatives', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('abbr')->nullable();
				$table->mediumText('description')->nullable();
				$table->date('date_registered')->nullable();
				$table->integer('brgy_id')->unsigned(); 
				$table->foreign('brgy_id')->references('id')->on('brgys');

				$table->string('centroid_points')->nullable();

				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('cooperatives');
	}
}

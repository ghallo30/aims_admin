<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hastable('agencies')){
			Schema::create('agencies', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('abbr')->nullable();
				$table->string('address')->nullable();
				$table->string('contact_no')->nullable();
				$table->string('centroid_points')->nullable();
				$table->longText('agency_description')->nullable();
				
				$table->integer('component_id')->unsigned(); 
			
				$table->foreign('component_id')->references('id')->on('components');
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
		Schema::dropIfExists('agencies');
	}
}

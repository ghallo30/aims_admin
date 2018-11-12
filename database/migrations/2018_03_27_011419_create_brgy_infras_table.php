<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyInfrasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_infras', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name', 70);
			$table->mediumText('description')->nullable();
			$table->string('type', 25)->nullable();;
			$table->double('distance', 11, 3)->nullable();

			$table->string('centroid_points', 150)->nullable();

			$table->integer('damaged')->nullable();//percent
			$table->string('damage_cause')->nullable();

			$table->integer('brgy_id')->unsigned(); 
			$table->foreign('brgy_id')->references('id')->on('brgys');

			$table->string('donated_by')->nullable();

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
		Schema::dropIfExists('brgy_infras');
	}
}

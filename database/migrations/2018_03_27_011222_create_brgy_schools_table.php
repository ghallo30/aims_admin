<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgySchoolsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_schools', function (Blueprint $table) {
			$table->increments('id');

			$table->string('school_id')->nullable();

			$table->string('name');
			$table->string('school_type')->nullable();
			$table->boolean('has_als')->default(0);
			$table->date('date_established')->nullable();
			$table->integer('total_chair')->nullable();
			$table->integer('total_enrollees')->nullable();
			$table->integer('total_teachers')->nullable();
			$table->string('school_head')->nullable();
			$table->string('contact_no')->nullable();



			$table->string('centroid_points')->nullable();


			$table->integer('brgy_id')->unsigned();
			$table->foreign('brgy_id')->references('id')->on('brgys');
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
		Schema::dropIfExists('brgy_schools');
	}
}

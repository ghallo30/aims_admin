<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyProposalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_proposals', function (Blueprint $table) {
			$table->increments('id');
			
			$table->string('name');
			$table->year('year_proposed')->nullable();
			$table->boolean('is_accepted')->default(0);

			$table->integer('accepted_by')->unsigned();
			$table->foreign('accepted_by')->references('id')->on('users');
			$table->integer('comp_id')->unsigned();
			$table->foreign('comp_id')->references('id')->on('components');
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
		Schema::dropIfExists('brgy_proposals');
	}
}

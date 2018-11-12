<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameBrgySchoolTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$from = "brgy_schools";
		$to = "schools";
		Schema::rename($from, $to);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$from = "schools";
		$to = "brgy_schools";
		Schema::rename($from, $to);
	}
}

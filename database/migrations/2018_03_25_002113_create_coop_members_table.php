<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoopMembersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	public function up()
	{
		Schema::create('coop_members', function (Blueprint $table) {
			$table->increments('id');
			$table->date('membership_added');
			$table->string('membership_status')->nullable();
			$table->string('position')->default('Member');
			
			//foreign keys
			$table->integer('coop')->unsigned();
			$table->integer('member')->unsigned();
			$table->foreign('coop')->references('id')->on('cooperatives');
			$table->foreign('member')->references('id')->on('people');
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
		Schema::dropIfExists('coop_members');
	}
}

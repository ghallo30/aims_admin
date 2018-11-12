<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */ 
	public function up()
	{
		if(!Schema::hastable('people')){
			Schema::create('people', function (Blueprint $table) {
				
				$table->increments('id');
				$table->string('fname', 75);
				$table->string('lname', 75);
				$table->string('mname', 75)->nullable();
				$table->integer('age')->nullable();
				$table->string('gender')->nullable();
				
				$table->enum('civil_status',
					['Single', 'Married', 'Separated', 
					])->nullable();
									
				$table->string('blood_type', 25)->nullable();

				$table->string('contact_no', 25)->nullable();
				$table->string('religion', 35)->nullable();
				$table->string('occupation', 50)->nullable();

				$table->string('centroid_points', 150)->nullable();

				// ala
				$table->date('birthDate')->nullable();
				$table->string('house_no', 20)->nullable();
				$table->string('occupation_address')->nullable();
				$table->string('spouse_name')->nullable();
				$table->string('educ_back')->nullable();
				$table->string('course')->nullable();
				$table->string('email')->nullable();
				$table->integer('total_HH')->nullable();
				$table->integer('total_male')->nullable();
				$table->integer('total_female')->nullable();
				$table->enum('has_books', ['Yes', 'No', 'Sharing'])->nullable();
				$table->string('name_school')->nullable();
				$table->integer('school_id')->nullable();
				$table->string('type_school')->nullable();
				$table->string('org_type')->nullable();
				$table->string('org_name')->nullable();



				$table->integer('brgy_id')->unsigned(); 
				$table->foreign('brgy_id')->references('id')->on('brgys');
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
		Schema::dropIfExists('people');
	}
}

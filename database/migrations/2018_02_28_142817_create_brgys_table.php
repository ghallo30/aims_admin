<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgysTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hastable('brgys')){
			Schema::create('brgys', function (Blueprint $table) {
				
				$table->increments('id');
				$table->string('name');
				$table->mediumText('physical_desc')->nullable();
				$table->date('ratification_date')->nullable();
				$table->date('date_brgy_created')->nullable();
				$table->date('market_day')->nullable();
				$table->date('fiest_day')->nullable();
				$table->double('latest_era', 10, 2)->nullable();
				
				$table->string('means_of_transpo')->nullable();
				$table->string('means_of_communication')->nullable();

				//types are rural or urban
				$table->string('brgy_classification')->default('Urban');
				
				//types are village or waterbody
				$table->string('brgy_type')->default('Village');

				$table->string('legal_creation_basis')->nullable();
				$table->string('land_area')->nullable();
				$table->string('boundaries_north')->nullable();
				$table->string('boundaries_south')->nullable();
				$table->string('boundaries_east')->nullable();
				$table->string('boundaries_west')->nullable();
				$table->string('congressional_district')->nullable();
				$table->integer('total_percints')->nullable();
				$table->integer('total_voters')->nullable();

				$table->string('major_crops')->nullable();
				$table->string('agricultural_land_utilized')->nullable();
				$table->string('agricultural_land_covered')->nullable();
				$table->string('anti_drug_council')->nullable();

				$table->string('contact_no')->nullable();
				$table->string('email_address')->unique()->nullable();
				$table->string('centroid_points')->nullable();
				// $table->double('distance_municipal_center_km', 10, 2);
				// $table->double('distance_prov_center_km', 10, 2);
				// $table->double('distance_reg_center_km', 10, 2);
				// $table->double('distance_district_hosp_km', 10, 2);
				// $table->double('distance_prov_hosp_km', 10, 2);
				// $table->double('distance_med_center_km', 10, 2);
				// $table->double('distance_police_center_km', 10, 2);
				// $table->double('distance_military_chkpoint_km', 10, 2);
				// $table->double('distance_college_km', 10, 2);
				// $table->double('distance_madrasah_km', 10, 2);
				

				$table->date('submission_date')->nullable();
				$table->string('armmhelps')->default('No');
				$table->integer('typeOfIncomeID')->nullable();
				$table->string('rough_road_percent')->nullable();
				$table->string('concrete_road_percent')->nullable();
				// $table->string('concrete_road_percent')->nullable();

				$table->string('water_source')->nullable();
				$table->string('access_to_water_percent')->nullable();
				$table->string('electric_source')->nullable();
				$table->string('access_to_electric_percent')->nullable();
				$table->string('brgy_category')->nullable();
				// $table->string('brgy_category')->nullable();

				// $table->double('latest_era', 10, 2);
				$table->integer('municipality_id')->unsigned();
				$table->foreign('municipality_id')->references('id')->on('municipalities');
				
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
		Schema::dropIfExists('brgys');
	}
}

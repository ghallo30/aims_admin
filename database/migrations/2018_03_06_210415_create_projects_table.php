<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hastable('projects')){
            Schema::create('projects', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
                $table->string('project_status')->nullable();
				$table->mediumText('remarks')->nullable();
				$table->decimal('cost', 10, 2)->nullable();

                $table->string('funding_source')->nullable();
                $table->string('project_constructor')->nullable();
                $table->string('percentage_completion')->nullable();
                $table->string('centroid_points')->nullable();
                $table->string('approved_budget')->nullable();
                $table->date('proposed_date_start')->nullable();
                $table->date('proposed_date_finished')->nullable();
                $table->date('proposed_date_turnover')->nullable();

                $table->date('date_finished')->nullable();
				$table->date('date_started')->nullable();

				$table->integer('agency_id')->unsigned(); 
				$table->foreign('agency_id')->references('id')->on('agencies');
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
        Schema::dropIfExists('projects');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyEducPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgy_educ_performances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('population_id');
            $table->integer('population_total')->nullable();
            $table->string('population_name')->nullable();
            $table->date('date_conducted')->nullable();
            $table->integer('total_male')->nullable();
            $table->integer('total_female')->nullable();
            $table->integer('year')->nullable();


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
        Schema::dropIfExists('brgy_educ_performances');
    }
}

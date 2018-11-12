<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_skills', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('skill_id')->unsigned();
            // $table->foreign('encoded_by')->references('id')->on('users');

            $table->string('certification', 150)->nullable();


            $table->integer('encoded_by')->unsigned();
            $table->foreign('encoded_by')->references('id')->on('users');

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
        Schema::dropIfExists('person_skills');
    }
}

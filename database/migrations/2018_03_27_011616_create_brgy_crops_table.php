<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgy_crops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('land_area')->nullable();
            $table->integer('total_owners')->nullable();
            $table->string('owners_area')->nullable();
            $table->string('tenant_area')->nullable();
            $table->string('production_volume')->nullable();
            $table->string('plantation_area')->nullable();
            $table->string('total_plantation')->nullable();
            $table->string('total_plantation_workers')->nullable();

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
        Schema::dropIfExists('brgy_crops');
    }
}

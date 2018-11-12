<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyAddFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgy_add_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('field_type')->default('text');
            $table->string('field_formula')->nullable();
            
            $table->boolean('is_enabled')->default(1);

            $table->integer('created_by')->unsigned();
            $table->integer('brgy_id')->unsigned();
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
        Schema::dropIfExists('brgy_add_fields');
    }
}

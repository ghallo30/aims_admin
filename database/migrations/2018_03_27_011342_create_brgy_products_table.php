<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgyProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brgy_products', function (Blueprint $table) {
			$table->increments('id');

			$table->string('product_name');
			$table->integer('production_quantity')->nullable();
			$table->double('total_net', 10, 3)->nullable();
			$table->enum('production',[
				'monthly','quarterly','yearly'
				])->nullable();
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
		Schema::dropIfExists('brgy_products');
	}
}

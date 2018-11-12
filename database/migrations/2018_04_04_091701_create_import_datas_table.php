<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportDatasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('import_datas', function (Blueprint $table) {
			
			$table->increments('id');
			$table->string('data_filename');
			$table->boolean('csv_header')->default(0);
			$table->longText('csv_data');
			$table->mediumText('csv_header_list')->nullable();
			$table->string('data_filetype')->nullable();
			$table->string('data_filepath')->nullable();
			$table->string('total_rows')->nullable();
			$table->string('append_to')->nullable();
			$table->string('columns_affected')->nullable();
			$table->string('entity_used', 75)->nullable();
			$table->boolean('is_import_complete')->default(true);
			$table->date('date_uploaded')->nullable();
			$table->boolean('is_deleted')->default(false);
			$table->date('date_append')->nullable();
			$table->timestamps(); 
			// add soft delete functions
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('import_datas');
	}
}

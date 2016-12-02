<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxas', function(Blueprint $table)
		{
			$table->smallInteger('id', true);
			$table->integer('user_id');
			$table->float('taxa', 8, 2);
			$table->smallInteger('tipo_taxa');
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
		Schema::drop('taxas');
	}

}

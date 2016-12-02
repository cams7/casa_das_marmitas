<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntregadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entregadores', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->smallInteger('empresa_id');
			$table->string('nome', 60);
			$table->string('cpf', 11);
			$table->string('rg', 10);
			$table->string('celular', 11);
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
		Schema::drop('entregadores');
	}

}

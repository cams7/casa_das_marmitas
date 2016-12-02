<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEntregadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entregadores', function(Blueprint $table)
		{
			$table->foreign('user_id', 'funcionarios_entregadores_fk')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('empresa_id', 'empresas_entregadores_fk')->references('id')->on('empresas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entregadores', function(Blueprint $table)
		{
			$table->dropForeign('funcionarios_entregadores_fk');
			$table->dropForeign('empresas_entregadores_fk');
		});
	}

}

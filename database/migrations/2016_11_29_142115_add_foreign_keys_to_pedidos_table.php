<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pedidos', function(Blueprint $table)
		{
			$table->foreign('user_id', 'funcionarios_pedidos_fk')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('taxa_id', 'taxas_pedidos_fk')->references('id')->on('taxas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('cliente_id', 'clientes_pedidos_fk')->references('id')->on('clientes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pedidos', function(Blueprint $table)
		{
			$table->dropForeign('funcionarios_pedidos_fk');
			$table->dropForeign('taxas_pedidos_fk');
			$table->dropForeign('clientes_pedidos_fk');
		});
	}

}

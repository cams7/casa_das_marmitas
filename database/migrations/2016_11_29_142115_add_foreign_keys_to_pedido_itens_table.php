<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPedidoItensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pedido_itens', function(Blueprint $table)
		{
			$table->foreign('produto_id', 'produtos_pedido_itens_fk')->references('id')->on('produtos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('pedido_id', 'pedidos_pedido_itens_fk')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pedido_itens', function(Blueprint $table)
		{
			$table->dropForeign('produtos_pedido_itens_fk');
			$table->dropForeign('pedidos_pedido_itens_fk');
		});
	}

}

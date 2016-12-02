<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('user_id');
			$table->integer('cliente_id');
			$table->smallInteger('taxa_id');
			$table->integer('quantidade_total');
			$table->float('total_pedido', 8, 2);
			$table->smallInteger('situacao_pedido');
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
		Schema::drop('pedidos');
	}

}

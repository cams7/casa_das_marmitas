<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidoItensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedido_itens', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('pedido_id');
			$table->integer('produto_id');
			$table->integer('quantidade');
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
		Schema::drop('pedido_itens');
	}

}

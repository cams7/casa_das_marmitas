<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->smallInteger('id', true);
			$table->integer('user_id');
			$table->string('nome', 60);
			$table->string('cnpj', 14);
			$table->string('email', 50);
			$table->string('telefone', 11);
			$table->string('cep', 8);
			$table->string('cidade', 60);
			$table->string('bairro', 60);
			$table->string('logradouro', 100);
			$table->string('numero_imovel', 30);
			$table->string('complemento_endereco', 30)->nullable();
			$table->string('ponto_referencia', 30)->nullable();
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
		Schema::drop('empresas');
	}

}

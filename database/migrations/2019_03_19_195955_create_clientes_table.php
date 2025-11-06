<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nome");
            $table->string("telefone1");
            $table->string("telefone2")->nullable();
            $table->string("cep");
            $table->string("endereco");
            $table->integer("numero");
            $table->string("complemento")->nullable();
            $table->string("bairro");
            $table->string("cidade");
            $table->string("estado");
            $table->enum("tipo",['pessoa_fisica','pessoa_juridica']);
            $table->string("data_nascimento");
            $table->string("cpf")->nullable();
            $table->string("cnpj")->nullable();
            $table->string("nome_empresa")->nullable();
            $table->string("observacao")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}

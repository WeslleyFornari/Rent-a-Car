<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("sigla_grupo");
            $table->string("nome_grupo");
            $table->unsignedDecimal('valor_padrao', 10, 2);    
            $table->enum("status",['ativo','inativo']);
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
        Schema::dropIfExists('grupos_veiculos');
    }
}

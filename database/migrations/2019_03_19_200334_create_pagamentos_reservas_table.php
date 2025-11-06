<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos_reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_reserva");
            $table->enum("tipo_pagamento",["boleto","cartao"]); 
            $table->string("token_pagseguro");
            $table->string("status_pagamento");
            $table->string("valor_liquido");
            $table->string("taxa_pagseguro");
            $table->string("data_valor_disponivel");
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
        Schema::dropIfExists('pagamentos_reservas');
    }
}

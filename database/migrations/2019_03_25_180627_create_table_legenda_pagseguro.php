<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLegendaPagseguro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legenda_pagseguro', function (Blueprint $table) {
            $table->increments('id');
            $table->string("cod_pagseguro");
            $table->string("titulo_pagamento");
            $table->string("descricao_pagamento");
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
        Schema::dropIfExists('legenda_pagseguro');
    }
}

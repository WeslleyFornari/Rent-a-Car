<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecosGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precos_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_veiculos_id');
            $table->string("qtd_inicio");
            $table->string("qtd_fim");
            $table->unsignedDecimal('valor_padrao', 10, 2);    
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
        Schema::dropIfExists('precos_veiculos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug_menu');
            $table->string('ordem');
            $table->integer('id_conteudo');
            $table->string('status');
            $table->integer('ocultar_texto');
            $table->string('icone_texto');
            $table->string('class_custom');
            $table->string('link_custom');
            $table->integer('id_custom');
            $table->integer('id_menu_pai');
            $table->integer('tipo_menu_id');
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
         Schema::dropIfExists('menu');
    }
}

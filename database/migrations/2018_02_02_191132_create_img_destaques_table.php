<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgDestaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_destaques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conteudo_id');
            $table->string('arquivo');
            $table->string('style')->nullable();
            $table->integer('mostrar_artigo')->nullable();
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
        Schema::dropIfExists('img_destaques');
    }
}

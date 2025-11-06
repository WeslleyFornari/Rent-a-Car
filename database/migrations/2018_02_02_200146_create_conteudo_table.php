<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConteudoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_conteudo')->nullable();
            $table->string('slug_conteudo')->unique();
            $table->longText('texto')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('destaque')->default('0');
            $table->integer('sessao_id')->default('0');
            $table->integer('status')->default('0');
            
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
        Schema::dropIfExists('conteudo');
    }
}

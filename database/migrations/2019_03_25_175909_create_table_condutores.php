<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCondutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condutores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_cliente");
            $table->string("nome");
            $table->string("cnh");
            $table->string("data_cnh");
            $table->string("cpf");
            $table->string("data_nascimento");
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
        Schema::dropIfExists('condutores');
    }
}

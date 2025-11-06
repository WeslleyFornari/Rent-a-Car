<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('arquivo');
            $table->string('titulo');
            $table->text('texto');
            $table->string('label_link');
            $table->string('link');
            $table->text('style_link');
            $table->text('style_bg');
            $table->text('style_texto');
            $table->text('style_titulo');
            $table->text('overlayer');
            $table->enum('img_fundo',['0','1']);
            $table->string('status');
            $table->string('posicao');
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
        Schema::dropIfExists('banners');
    }
}

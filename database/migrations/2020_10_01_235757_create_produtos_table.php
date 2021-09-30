<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categoria_produtos');
            $table->foreignId('id_tipo');
            $table->foreign('id_tipo')->references('id')->on('tipo_produtos');
            $table->text('descricao');
            $table->string('nome',100);
            $table->double('vlr_aquisicao',8 ,2);
            $table->string('img_produto');
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
        Schema::dropIfExists('produtos');
    }
}

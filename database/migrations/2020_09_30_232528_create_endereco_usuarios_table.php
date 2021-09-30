<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_usuarios', function (Blueprint $table) {
            $table->primary(['id_usuario','id_endereco']);
            $table->foreignId('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreignId('id_endereco');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
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
        Schema::dropIfExists('endereco_usuarios');
    }
}

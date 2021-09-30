<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario');
            $table->foreignId('id_endereco');
            $table->foreignId('id_pagamento');
            $table->foreignId('id_status');
            $table->string('numero_pedido',30);
            $table->date('data_emissao');
            $table->double('valor_total',8,2);
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
            $table->foreign('id_pagamento')->references('id')->on('pagamentos');
            $table->foreign('id_status')->references('id')->on('pedido_status');
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
        Schema::dropIfExists('pedidos');
    }
}

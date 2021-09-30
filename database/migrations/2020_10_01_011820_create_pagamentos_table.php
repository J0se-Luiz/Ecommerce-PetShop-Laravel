<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo_pagamento');
            $table->foreign('id_tipo_pagamento')->references('id')->on('tipo_pagamentos');
            $table->foreignId('id_cartao')->nullable();
            $table->foreign('id_cartao')->references('id')->on('cartoes');
            $table->integer('quantidade_parcelas')->default(1);
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
        Schema::dropIfExists('pagamentos');
    }
}

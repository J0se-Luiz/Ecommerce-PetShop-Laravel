<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisVendidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mais_vendidos', function (Blueprint $table) {
            $table->foreignId('id_produto')->primary();
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->integer('qtd_vendida');
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
        Schema::dropIfExists('mais_vendidos');
    }
}

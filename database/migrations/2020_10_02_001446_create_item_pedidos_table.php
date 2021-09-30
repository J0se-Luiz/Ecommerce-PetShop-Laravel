<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->integer('nr_item_pedido');
            $table->primary(['nr_item_pedido','id_pedido']);
            $table->foreignId('id_pedido');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreignId('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->integer('quantidade');
            $table->double('vlr_unitario',8,2);
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
        Schema::dropIfExists('item_pedidos');
    }
}

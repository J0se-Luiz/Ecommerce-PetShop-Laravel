<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemNfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_nfs', function (Blueprint $table) {
            $table->integer('nr_nota_item');
            $table->primary(['nr_nota_item','id_nota']);
            $table->foreignId('id_nota');
            $table->foreign('id_nota')->references('id')->on('nota_fiscals');
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
        Schema::dropIfExists('item_nfs');
    }
}

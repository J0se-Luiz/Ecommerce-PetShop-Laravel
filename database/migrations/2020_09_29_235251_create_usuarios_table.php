<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('sobrenome', 50);
            $table->string('CPF', 11)->unique();
            $table->string('genero', 12);
            $table->date('data_nascimento');
            $table->string('telefone', 13);
            $table->string('email')->unique();
            $table->string('senha', 30);
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
        Schema::dropIfExists('usuarios');
    }
}

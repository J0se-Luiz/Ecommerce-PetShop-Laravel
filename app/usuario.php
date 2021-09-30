<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $fillable = [
        'nome', 'sobrenome', 'CPF','genero','data_nascimento','telefone','email','senha'
        ]; 

    public function endereco_usuario()
    {
        return $this->hasMany(Endereco_usuario::class);
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{


    protected $fillable = [
        'id_usuario','id_pagamento', 'id_status', 'id_endereco', 'numero_pedido', 'data_emissao','valor_total'
   
        
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }


    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

    public function usuario()
    {
        return $this->hasOne(usuario::class);
    }

    public function pedido_status()
    {
        return $this->hasMany(pedido_status::class);
    }

    public function item_pedido()
    {
        return $this->hasMany(Item_pedido::class);
    }
}

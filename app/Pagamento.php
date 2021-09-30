<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    public function cartao()
    {
        return $this->hasOne(Cartao::class);
    }

    public function tipo_pagamento()
    {
        return $this->hasOne(tipo_pagamento::class);
    }

    public function pedido()
    {
        return $this->hasOne(Pedido::class);
    }
}

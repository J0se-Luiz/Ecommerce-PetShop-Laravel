<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_pagamento extends Model
{
    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }
}

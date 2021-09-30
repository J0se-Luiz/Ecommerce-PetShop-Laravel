<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mais_vendido extends Model
{
    public function produto()
    {
        return $this->hasMany(Produto::class);
    }
}

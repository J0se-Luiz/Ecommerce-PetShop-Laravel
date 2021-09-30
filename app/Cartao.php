<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
  
    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }
}

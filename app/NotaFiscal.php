<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    public function item_nota_fiscal()
    {
        return $this->hasMany(Item_nf::class);
    }
}

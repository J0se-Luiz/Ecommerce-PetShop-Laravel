<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_nf extends Model
{
    public function nota_fiscal()
    {
        return $this->hasOne(NotaFiscal::class);
    }
}

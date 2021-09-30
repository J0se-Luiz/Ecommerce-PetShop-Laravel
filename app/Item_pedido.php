<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_pedido extends Model
{


    protected $fillable = [
        'nr_item_pedido','id_pedido', 'id_produto', 'quantidade', 'vlr_unitario'
   
        
    ];





    public function pedido()
    {
        return $this->hasOne(Pedido::class);
    }

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }
}

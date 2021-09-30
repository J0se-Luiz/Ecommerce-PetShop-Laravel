<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = [
        'id_categoria','id_tipo','descricao','nome','vlr_aquisicao','img_produto'
    ];

    public function item_pedido()
    {
        return $this->hasOne(Item_pedido::class);
    }

    public function categoria_produto()
    {
        return $this->hasOne(CategoriaProduto::class);
    }

    public function tipo_produto()
    {
        return $this->hasOne(Tipo_produto::class);
    }

    public function estoque()
    {
        return $this->hasOne(Estoque::class);
    }

    public function mais_vendido()
    {
        return $this->hasOne(Mais_vendido::class);
    }
}

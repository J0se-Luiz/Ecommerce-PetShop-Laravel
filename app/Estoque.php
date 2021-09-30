<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{

    protected $fillable = [
        'id_produto', 'quantidade'
    ];

    public function produto()
    {
        return $this->hasOne(Produto::class);
    }
}

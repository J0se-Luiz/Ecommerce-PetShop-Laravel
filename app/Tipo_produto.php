<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_produto extends Model
{

    protected $fillable = [
        'descricao'
    ];

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }
}

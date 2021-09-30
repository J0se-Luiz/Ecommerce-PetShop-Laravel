<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{

    protected $fillable = [
        'descricao'
    ];

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }
}

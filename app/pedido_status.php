<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido_status extends Model
{
    protected $table = 'pedido_status';

    public function pedido()
    {
        return $this->hasOne(Pedido::class);
    }


    protected $fillable = [
        'descricao'
    ];



}

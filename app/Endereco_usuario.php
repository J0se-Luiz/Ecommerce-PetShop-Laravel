<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco_usuario extends Model
{

    protected $fillable = [
        'id_usuario','id_endereco'
    ];

    public function usuario()
    {
        return $this->hasOne(usuario::class);
    }

    public function endereco()
    {
        return $this->hasMany(Endereco::class);
    }
}

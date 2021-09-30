<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'id','numero','rua','bairro','complemento','cidade','UF', 'CEP'
    ];

   public function endereco_usuario()
   {
       return $this->hasOne(Endereco_usuario::class);
   }
}

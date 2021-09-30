<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_pessoa;

class TipoPessoaController extends Controller
{
    public function listar()
    {
        $dados = tipo_pessoa::all();
        dd ($dados);
    }
}

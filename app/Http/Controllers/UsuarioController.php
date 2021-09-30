<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;

class UsuarioController extends Controller
{
    public function listar()
    {
        $dados = usuario::all();
        // dd ($dados);
        return view ('Usuario.index', compact('dados'));
    }


}

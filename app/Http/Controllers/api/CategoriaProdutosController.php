<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoriaProduto; // model importada
use Exception;

/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;

class CategoriaProdutosController extends Controller
{

                // listar categorias
                // tipo GET
    public function ListarCategorias()
    {
        try {
            //$categoria = CategoriaProduto::all();
            $categoria = DB::table('categoria_produtos')
            ->orderBy('descricao','asc')->get();

            return response()->json($categoria, 200);
        } catch (\Exception $e) {
            return response()->json(['erro'=>$e->getMessage()]);
        }
    }
}

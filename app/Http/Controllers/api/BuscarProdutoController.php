<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produto;

class BuscarProdutoController extends Controller
{

    

    public function buscarProdutoTermo($termo)
    {
        try {
            

            $resultado = DB::table('produtos')
                ->join('estoques as est','produtos.id','est.id_produto')
                ->where('nome','like','%'.$termo.'%')
                ->orderBy('vlr_aquisicao','asc')->paginate(12);
                // ->limit(20)
                // ->get();

               
                

        if (is_null($resultado) || $resultado->count() == 0){
            throw new \Exception('Produto não encontrado a partir do termo da busca');
        }
            return response()->json($resultado,200);

        }catch(\Exception $e) {
            return response()->json(['erro' => $e->getMessage()], 404);
       }
      
    }
}
    /* API traz os 20 primeiros produtos(valor variavel de acordo com a regra de negócio) 
    produtos em ordem de preço, a partir do termo buscado.*/
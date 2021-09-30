<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mais_vendido; // model importada
use Exception;
/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;

class MaisVendidoController extends Controller
{

    // listar Maisvendido
    // tipo GET
    public function ListarMaisVendido($descricaoTipoProduto)
    {
        try {
            $maisvendidos = DB::table('produtos as p')
            ->join('mais_vendidos as mv','mv.id_produto', 'p.id')
            ->join('categoria_produtos as cp','cp.id', 'p.id_categoria')
            ->join('tipo_produtos as tp','tp.id','p.id_tipo')
            ->join('estoques as est', 'est.id_produto', 'p.id')
            ->where('tp.descricao',$descricaoTipoProduto)
            ->select('p.id as id','p.id_categoria','p.id_tipo','p.nome', 'p.descricao', 'p.vlr_aquisicao','p.img_produto','mv.qtd_vendida','cp.descricao as descricaoCategoria','tp.descricao as descricaoTipo', 'est.quantidade')
            ->orderBy('tp.descricao','asc')
            ->orderBy('mv.qtd_vendida', 'desc')
            ->get();

            return response()->json($maisvendidos, 200);
        } catch (\Exception $e) {
            return response()->json(['erro'=>$e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Pedido;
/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;


class HistoricoController extends Controller
{
    

    public function listar(Request $req,$id) //dados pro historico de pedidos
    {

        try{

            if (is_null($req ) || is_null($id ) ) {
                throw new \Exception ('Requisao ou ID não encontrado');
            }

            $dados = DB::table('pedidos AS p')
            ->join('pedido_status AS ps','p.id_status','ps.id')
            ->join('pagamentos AS pag','p.id_pagamento','pag.id')
            ->join('tipo_pagamentos AS tipag','pag.id_tipo_pagamento','tipag.id')
            ->where('id_usuario',$id)
            ->orderBy('id','asc')

            //o que será listado:
            ->select( 'tipag.descricao as formaPagamento', 'p.valor_total',
                    'p.data_emissao','ps.descricao as descricaoStatus','p.numero_pedido',
                    'p.id'
                )->get();

            if (is_null($dados ) || count($dados)==0) {
                throw new \Exception ('Nenhum resultado encontrado');
            }

            return response()->json($dados, 200);

        }
        catch(\Exception $e){

            return response()->json($e->getMessage(),404);

        }


    }




}

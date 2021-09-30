<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Pedido;
Use App\Item_pedido;
use App\Estoque;

/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{


    public function listar(Request $req) //dados pro historico de pedidos
    {

        $dados = DB::table('pedidos AS p')
        ->join('pedido_status AS ps','p.id_status','ps.id')
        ->join('pagamentos AS pag','p.id_pagamento','pag.id')
        ->join('tipo_pagamentos AS tipag','pag.id_tipo_pagamento','tipag.id')

        //o que será listado:
        ->select( 'tipag.descricao as formaPagamento', 'p.valor_total',
                  'p.data_emissao','ps.descricao as descricaoStatus','p.numero_pedido',
                  'p.id'
            )->get();

         return response()->json($dados, 200);

    }




    public function gerar(Request $req, $id)
    {


        try{
            $dados = $req->all();

            if (is_null($dados)) {
                throw new \Exception ('Recurso não encontrado');
            }

            $pedidoCriado= Pedido::create($dados[0]);



            foreach($dados[1] as $dado)
            {
                $dado['id_pedido']= $pedidoCriado->id;
                $itempedido = Item_pedido::create($dado);


                $ProdutoEstoque = Estoque::where('id_produto',$itempedido->id_produto);
                DB::table('estoques')->where('id_produto',$itempedido->id_produto)->decrement('quantidade', $itempedido->quantidade);

            }

            $item = Pedido::find($pedidoCriado->id);
            
            //GERA UM NUMERO DE PEDIDO NÃO EXISTENTE NA TABELA
            do{
                $numeroPedido = ($pedidoCriado->id)*mt_rand(50,900);
            }while(is_null(Pedido::where('numero_pedido',$numeroPedido)));

            $item->update(['numero_pedido' => DB::raw(strval($numeroPedido))]);

            return response()->json('Sucesso',201);

        }catch(\Exception $e){
            return response()->json($e->getMessage(),404);

        }





    }







    public function editar($id) //Preencher com um pedido procurado pelo id
    {
        $pedido = Pedido::find($id);

        return response()->json($pedido, 200);
    }



    public function atualizar(Request $req, $id)
    {

        $dados = $req->all();

        $item = Pedido::find($id); //achar o que vc quer atuzalizar pelo id

        if(is_null($item))
        {
            return response()->json(['erro' => 'Recurso não encontrado'],404);
        }
        else
        {

            return response()->json($item->update($dados),200);

        }

    }


    public function deletar($id)
    {

        $item = Pedido::find($id);

        if(is_null($item)){

            return response()->json(['erro' => 'pedido nao encontrado'],404);
        }

        $item->delete();

        return response()->json('Item removido', 200);

    }













}

<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\pedido_status;
use Illuminate\Http\Request;
/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    
    public function listar()
    {

        $pedidos = DB::table('pedidos AS p')
        ->join('usuarios AS u','p.id_usuario','u.id')
        ->join('pedido_status AS ps','p.id_status','ps.id')
        ->select('ps.descricao as descricaoStatus', 'u.nome as nomeCliente',
                  'p.numero_pedido','p.data_emissao','p.valor_total', 'p.id'
            )->orderBy('p.id','desc')
            ->get();


        return view ('Pedido.index', compact('pedidos'));
    }


    public function editar($id)
    {
        $statusPedido = pedido_status::all();
        $pedido = Pedido::find($id);

        return view('Pedido/edita_pedido', compact('statusPedido','pedido'));
    }

    public function atualizar(Request $req, $id)
    {
        $pedido = $req->all();
        Pedido::find($id)->update($pedido);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Status atualizado com sucesso!'
            );
        
        return redirect()->route('admin.listarPedido');
    }





}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\pedido_status;
class StatusPedido extends Controller
{
    
    

    public function listar()
    {
        $dados = pedido_status::all();
        // dd ($dados);
        return view ('StatusPedido.index', compact('dados'));
    }


    public function adicionar()
    {
        return view('StatusPedido/insere_status');
    }

    public function salvar(Request $req)
    {
        $tipoStatus = $req->all();
        pedido_status::create($tipoStatus);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Status adicionado com sucesso!'
            );

        return redirect()->route('admin.listarStatusPedido');
    }

    public function editar($id)
    {
        $tipoStatus = pedido_status::find($id);

        return view('StatusPedido.edita_status', compact('tipoStatus'));
    }

    public function atualizar(Request $req, $id)
    {
        $tipoStatus = $req->all();
        pedido_status::find($id)->update($tipoStatus);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Status atualizado com sucesso!'
            );
        
        return redirect()->route('admin.listarStatusPedido');
    }

    public function excluir(Request $req, $id)
    {
        $tipoStatus = $req->all();
        pedido_status::find($id)->delete($tipoStatus);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Status excluido com sucesso!'
            );

        return redirect()->route('admin.listarStatusPedido');
    }





}

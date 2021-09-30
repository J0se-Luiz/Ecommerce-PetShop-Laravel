<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_produto;

class TipoProdutoController extends Controller
{
    public function index(Request $req)
    {
        $tiposProduto = Tipo_produto::all();
        $mensagem = $req->session()->get('mensagem');

        return view('TiposProduto/index', compact('tiposProduto', 'mensagem'));
    }

    public function adicionar()
    {
        return view('TiposProduto/insere_produto');
    }

    public function salvar(Request $req)
    {
        $tipoProduto = $req->all();
        Tipo_produto::create($tipoProduto);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Tipo de Produto adicionado com sucesso!'
            );

        return redirect()->route('admin.listarTipoProduto');
    }

    public function editar($id)
    {
        $tipoProduto = Tipo_produto::find($id);

        return view('TiposProduto/edita_produto', compact('tipoProduto'));
    }

    public function atualizar(Request $req, $id)
    {
        $tipoProduto = $req->all();
        Tipo_produto::find($id)->update($tipoProduto);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Tipo de Produto atualizado com sucesso!'
            );
        
        return redirect()->route('admin.listarTipoProduto');
    }

    public function excluir(Request $req, $id)
    {
        $tipoProduto = $req->all();
        Tipo_produto::find($id)->delete($tipoProduto);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Tipo de Produto excluido com sucesso!'
            );

        return redirect()->route('admin.listarTipoProduto');
    }
}

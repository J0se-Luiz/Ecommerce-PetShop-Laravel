<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProduto; 

class CategoriaProdutoController extends Controller
{
    public function index(Request $req)
    {
        $categoriasProduto = CategoriaProduto::all();
        $mensagem = $req->session()->get('mensagem');

        return view('CategoriasProduto/index', compact('categoriasProduto', 'mensagem'));
    }

    public function adicionar()
    {
        return view('CategoriasProduto/insere_produto');
    }

    public function salvar(Request $req)
    {
        $categoriaProduto = $req->all();
        CategoriaProduto::create($categoriaProduto);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Categoria de Produto adicionado com sucesso!'
            );

        return redirect()->route('admin.listarCategoriaProduto');
    }

    public function editar($id)
    {
        $categoriaProduto = CategoriaProduto::find($id);

        return view('CategoriasProduto/edita_produto', compact('categoriaProduto'));
    }

    public function atualizar(Request $req, $id)
    {
        $categoriaProduto = $req->all();
        CategoriaProduto::find($id)->update($categoriaProduto);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Categoria de Produto atualizado com sucesso!'
            );

        return redirect()->route('admin.listarCategoriaProduto');
    }

    public function excluir(Request $req, $id)
    {
        $categoriaProduto = $req->all();
        CategoriaProduto::find($id)->delete($categoriaProduto);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Categoria de Produto excluida com sucesso!'
            );

        return redirect()->route('admin.listarCategoriaProduto');
    }
}

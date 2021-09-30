<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Tipo_produto;
use App\CategoriaProduto;
use App\Estoque;
use App\Mais_vendido;

/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;


class ProdutoController extends Controller
{
    /* EXIBE PAGINA COM TODOS OS PRODUTOS LISTADOS NO BD */
    public function index(Request $req)
    {

        //$produtos = Produto::all();

        /* INNER JOIN DA TABELA PRODUTO COM TABELAS TIPOS_PRODUTOS E CATEGORIA_PRODUTOS*/
        $produtos = DB::table('produtos AS p')
        ->join('tipo_produtos AS tp','p.id_tipo','tp.id')
        ->join('categoria_produtos AS cp','p.id_categoria','cp.id')
        ->join('estoques as est', 'est.id_produto', 'p.id')
        ->select('p.id AS idProd',
                'p.id_categoria',
                'p.id_tipo',
                'p.descricao AS descricaoProd',
                'p.nome',
                'p.vlr_aquisicao',
                'p.img_produto',
                'tp.descricao AS descricaoTP',
                'cp.descricao AS descricaoCP',
                'est.quantidade as qtdEstoque'
            )->orderBy('p.id', 'asc')
            ->get();
        

        $mensagem = $req->session()->get('mensagem');

        return view('Produtos/index', compact('produtos', 'mensagem'));
    }


    /* REDIRECIONA USUARIO PARA PAGINA DE ADC PRODUTO */
    public function adicionar()
    {
        $tipos_produto = Tipo_produto::all();
        $categorias_produto = CategoriaProduto::all();
        $estoque = Estoque::all();

        return view('Produtos/insere_produto', compact('tipos_produto','categorias_produto', 'estoque'));
    }


    /* SALVA PRODUTO - TANTO EDITADO COMO NOVO */
    public function salvar(Request $req)
    {
        //Realiza insert no BD
        $produto = $req->all();

        /* dd($produto); */

        $dadosProduto = ['nome' => $produto['nome'], 'descricao' => $produto['descricao'],
        'vlr_aquisicao' => $produto['vlr_aquisicao'], 'id_tipo' => $produto['id_tipo'],
        'id_categoria' => $produto['id_categoria'], 'img_produto' => $produto['img_produto']];

        $produtoCriado = Produto::create($dadosProduto);

        $dadosEstoque = ['id_produto' => $produtoCriado->id, 'quantidade' => $produto['quantidade']];
        Estoque::create($dadosEstoque);

        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Produto adicionado com sucesso!'
            );

        //Retorna para pagina de listar produtos
        return redirect()->route('admin.listarProdutos');
    }


    /* RECUPERA DADOS DO BD E REDIRECIONA PARA PAG DE EDICAO */
    public function editar($id)
    {
        $produto = Produto::find($id);

        $tipos_produto = Tipo_produto::all();
        $categorias_produto = CategoriaProduto::all();
        $estoque = Estoque::where('id_produto', $produto->id)->first();

        return view('Produtos/edita_produto', compact('produto','tipos_produto','categorias_produto','estoque'));
    }


    public function atualizar(Request $req, $id)
    {

        $produto = $req->all();


        $dadosProduto = ['nome' => $produto['nome'], 'descricao' => $produto['descricao'],
        'vlr_aquisicao' => $produto['vlr_aquisicao'], 'id_tipo' => $produto['id_tipo'],
        'id_categoria' => $produto['id_categoria'], 'img_produto' => $produto['img_produto']];

        Produto::find($id)->update($dadosProduto);

        $produtoCriado = Produto::find($id);

        $dadosEstoque = ['id_produto' => $produtoCriado->id, 'quantidade' => $produto['quantidade']];
        Estoque::where('id_produto', $produtoCriado->id)->update($dadosEstoque);

        
            
        $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Produto atualizado com sucesso!'
            );

        return redirect()->route('admin.listarProdutos');
    }


    /* DELETA PRODUTOS */
    public function deletar(Request $req, $id)
    {
        try{

            Estoque::where('id_produto', $id)->delete();
            $maisVendido = Mais_vendido::where('id_produto', $id);
            
            
            if($maisVendido != null)
            {
                $maisVendido->delete();
            }

            Produto::where('id',$id)->delete();


            $mensagem = $req->session()
            ->flash(
                'mensagem',
                'Produto deletado com sucesso!'
            );

        }catch(\Exception $e){

            $mensagem = $req->session()
            ->flash(
                'mensagem',
                $e->getMessage()
            );
        }

       
        
        return redirect()->route('admin.listarProdutos');
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use App\Tipo_produto;
use App\CategoriaProduto;
use App\usuario;

/* importar classe para realizar uma query customizada */
use Illuminate\Support\Facades\DB;

class ListarProdutosCategoria extends Controller
{
    public function listarProdutosPorCategoria($descricaoTipoProduto, $descricaoCategoriaProduto)
    {
        try{
            $tipoProduto = Tipo_produto::where('descricao',$descricaoTipoProduto)->first();
            $categoriaProduto = CategoriaProduto::where('descricao',$descricaoCategoriaProduto)->first();


            //Verifica se alguma das consultas acima retornaram um resultado nulo
            if (is_null($tipoProduto) || is_null($categoriaProduto)) {
                throw new \Exception('Categoria ou tipo de produto não foram encontrados');
            }

            //Pega todos os produtos com a categoria E tipo selecionado
            $produtos = DB::table('produtos as p')
                            ->join('estoques as est', 'est.id_produto', 'p.id')
                            ->where('p.id_tipo',$tipoProduto->id)
                            ->where('p.id_categoria', $categoriaProduto->id)
                            ->paginate(12);

            //verifica se foram ou não encontrados produtos com os filtros selecionados
            if (count($produtos) == 0) {
                throw new \Exception('Não foram encontrados resultados para a busca solicitada');
            }

            //retorna JSON dos produtos encontrados na pesquisa
            return response()->json($produtos, 200);

        } catch(\Exception $e) {
            return response()->json(['erro' => $e->getMessage()], 200);
        }
    }
}

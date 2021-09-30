@extends('includes.pagina_mae')

@section('titulo','Todos os Produtos')

@section('conteudo')

{{-- {{ dd($produtos)}} --}}

    <div class="container">
        <div class="container text-center mt-4">
            <h3>Lista de Produtos<h3>
        </div>

        @if (!@empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif

        <div class="row mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">Nome</th>
                        <th class="text-center" scope="col">Preço</th>
                        <th class="text-center" scope="col">Tipo Produto</th>
                        <th class="text-center" scope='col'>Categoria</th>
                        <th class="text-center" scope='col'>Estoque</th>
                        <th class="text-center" scope='col'>Imagem</th>
                        <th class='text-center' scope="col" style="width: 100px">Ações</th>
                    </tr>
                </thead>

                @foreach($produtos as $produto)
                    <tr>
                        <td class="text-center"> {{ $produto->idProd }} </td>
                        <td class="text-center"> {{ $produto->nome }} </td>
                        <td class="text-center"> R$ {{ money_format('%n', $produto->vlr_aquisicao) }} </td>
                        <td class="text-center"> {{ $produto->descricaoTP}} </td>
                        <td class="text-center"> {{ $produto->descricaoCP}} </td>
                        <td class="text-center"> {{ $produto->qtdEstoque}} </td>
                        <td class="text-center">
                            <img width="130" src="{{asset($produto->img_produto)}}">
                        </td>



                        <td class='text-center'>
                            <div class="row">
                                <div class="col-12">
                                   <a class="btn btn-primary btn-block" href="{{ route('admin.editarProdutos', $produto->idProd) }}" style="color: white">Editar</a>
                                </div>
                            
                                <div class="col-12 mt-2">
                                    <form action="{{ route('admin.deletarProdutos', $produto->idProd) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block" style="color: white">Deletar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection
@extends('includes.pagina_mae')

@section('titulo','Tipos de Produtos')

@section('conteudo')

{{-- {{ dd($tiposProduto)}} --}}

    <div class="container">
        <div class="container text-center mt-4">
            <h3>Tipos de Produtos<h3>
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
                        <th class="text-center" scope="col">Descrição</th>
                        <th class="text-center" scope="col" style="width: 100px">Ações</th>
                    </tr>
                </thead>

                @foreach($tiposProduto as $tipoProduto)
                    <tr>
                        <td class="text-center"> {{ $tipoProduto->id }} </td>
                        <td class="text-center"> {{ $tipoProduto->descricao }} </td>

                        <td class='text-center'>
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a class="btn btn-primary btn-block" href="{{ route('admin.editarTipoProduto', $tipoProduto->id) }}" style="color: white">Editar</a>
                                </div>

                                <div class="col-12 text-left mt-2">
                                    <form action="{{ route('admin.deletarTipoProduto', $tipoProduto->id) }}" method="post">
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
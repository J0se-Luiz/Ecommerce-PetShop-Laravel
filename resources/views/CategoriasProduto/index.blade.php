@extends('includes.pagina_mae')

@section('titulo','Categorias do Produto')

@section('conteudo')

{{-- {{ dd($categoriasProduto)}} --}}

    <div class="container">
        <div class="container text-center mt-4">
            <h3>Categorias do Produto<h3>
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
                        <th class="text-center" scope="col"  style="width: 100px">Ações</th>
                    </tr>
                </thead>

                @foreach($categoriasProduto as $categoriaProduto)
                    <tr>
                        <td class="text-center"> {{ $categoriaProduto->id }} </td>
                        <td class="text-center"> {{ $categoriaProduto->descricao }} </td>

                        <td class='text-center'>
                            <div class="row ">
                                <div class="col-12 text-right">
                                <a class="btn btn-primary btn-block" href="{{ route('admin.editarCategoriaProduto', $categoriaProduto->id) }}" style="color: white">Editar</a>
                                </div>
                             
                                <div class="col-12 text-left mt-2">
                                    <form action="{{ route('admin.deletarCategoriaProduto', $categoriaProduto->id) }}" method="post">
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
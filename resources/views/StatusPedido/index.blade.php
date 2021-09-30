@extends('includes.pagina_mae')

@section('titulo','Todos os Status de Pedido')

@section('conteudo')

{{-- {{ dd($dados)}} --}}

    <div class="container">
        <div class="container text-center mt-4">
            <h3>Lista de Status<h3>
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

                @foreach($dados as $dado)
                    <tr>
                        <td class="text-center"> {{ $dado->id }} </td>
                        <td class="text-center"> {{ $dado->descricao }} </td>

                        <td class='text-center'>
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a class="btn btn-primary btn-block" href="{{ route('admin.editarTeste2', $dado->id) }}" style="color: white">Editar</a>
                                </div>

                                <div class="col-12 text-left mt-2">
                                    <form action="{{ route('admin.deletarStatusPedido', $dado->id) }}" method="post">
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
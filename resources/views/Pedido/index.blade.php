@extends('includes.pagina_mae')

@section('titulo','Lista de Pedidos')

@section('conteudo')

{{-- {{ dd($produtos)}} --}}

    <div class="container">
        <div class="container text-center mt-4">
            <h3>Lista de Pedidos<h3>
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
                        <th class="text-center" scope="col">Numero do Pedido</th>
                        <th class="text-center" scope="col">Nome do Cliente</th>
                        <th class="text-center" scope="col">Valor</th>
                        <th class="text-center" scope="col">Data de Emissão</th>
                        <th class="text-center" scope='col'>Status</th>
                        <th class='text-center' scope="col" style="width: 100px">Ações</th>
                    </tr>
                </thead>

                @foreach($pedidos as $pedido)
                    <tr>
                        <td class="text-center"> {{ $pedido->numero_pedido }} </td>
                        <td class="text-center"> {{ $pedido->nomeCliente}} </td>
                        <td class="text-center"> R$ {{ money_format('%n', $pedido->valor_total) }} </td>
                        <td class="text-center"> {{ $pedido->data_emissao = implode("/",array_reverse(explode("-",$pedido->data_emissao)))}} </td>
                        <td class="text-center"> {{ $pedido->descricaoStatus}} </td>

                        <td class='text-center'>
                            <div class="row">
                                <div class="col-12">
                                   <a class="btn btn-primary btn-block" href="{{ route('admin.editarPedido', $pedido->id) }}" style="color: white">Editar</a>
                                </div>
                                      
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection
@extends('includes.pagina_mae')

@section('titulo','Lista de usuários')

@section('conteudo')

{{-- {{ dd($categoriasProduto)}} --}}

    <div class="container">
        <div class="container text-center mt-4">
            <h3>Lista de Clientes<h3>
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
                        <th class="text-center" scope="col">Sobrenome</th>
                        <th class="text-center" scope="col">E-mail</th>
                        <th class="text-center" scope="col">CPF</th>
                        <th class="text-center" scope="col">Telefone</th>
                       
                    </tr>
                </thead>

                @foreach($dados as $dado)
                    <tr>
                        <td class="text-center"> {{ $dado->id }} </td>
                        <td class="text-center"> {{ $dado->nome }} </td>
                        <td class="text-center"> {{ $dado->sobrenome }} </td>
                        <td class="text-center"> {{ $dado->email }} </td>
                        <td class="text-center"> {{ $dado->CPF }} </td>
                        <td class="text-center"> {{ $dado->telefone }} </td>
                        
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection

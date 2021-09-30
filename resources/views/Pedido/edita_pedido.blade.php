@extends('includes.pagina_mae')

@section('titulo','Editar Status do Pedido')

@section('conteudo')

{{-- {{dd($tipoProduto)}} --}}

<form action="{{ route('admin.atualizarStatusDoPedido', $pedido->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="container mt-3">
        
        <div class="row">
        
        <div class="col-12 col-sm-4">
            <div class="form-group">
                <label>Status do Pedido</label>
                <select class="form-control" name='id_status'>
                    <option value='NULL'>Selecionar</option>

                    @foreach($statusPedido as $status)
                        @if ($status->id == $pedido->id_status)
                            <option value={{$status->id}} selected>{{$status->descricao}}</option>
                        @else
                            <option value={{$status->id}}>{{$status->descricao}}</option>
                        @endif
                    @endforeach

                  </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-search" style="color: #fff">Salvar</button>
</form>

@endsection
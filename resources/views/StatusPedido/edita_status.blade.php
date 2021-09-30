@extends('includes.pagina_mae')

@section('titulo','Editar Status de Pedido')

@section('conteudo')

{{-- {{dd($produto)}} --}}

<form action="{{ route('admin.atualizarStatusPedido', $tipoStatus->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="container mt-3">
        
        <div class="row">

           
    
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input class='form-control' type="text" name="descricao"
                    value="{{ $tipoStatus->descricao }}">
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-search" style="color: #fff">Salvar</button>
    </div>
</form>

@endsection
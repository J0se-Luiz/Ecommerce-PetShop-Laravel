@extends('includes.pagina_mae')

@section('titulo','Editar Produtos')

@section('conteudo')

{{-- {{dd($categoriaProduto)}} --}}

<form action="{{ route('admin.atualizarCategoriaProduto', $categoriaProduto->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="container mt-3">
        
        <div class="row">
    
            <div class="col-12">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input class='form-control' type="text" name="descricao"
                    value="{{$categoriaProduto->descricao}}">
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-search" style="color: #fff">Salvar</button>
    </div>
</form>

@endsection
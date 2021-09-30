@extends('includes.pagina_mae')

@section('titulo','Cadastrar Categoria Produto')

@section('conteudo')


<form action="{{route('admin.salvarCategoriaProduto')}}" method="post">
    @csrf
    <div class="container mt-3">
        
        <div class="row">
    
            <div class="col-12">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input class='form-control' type="text" name="descricao">
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-search" style="color: #fff">Salvar</button>
    </div>
</form>

@endsection
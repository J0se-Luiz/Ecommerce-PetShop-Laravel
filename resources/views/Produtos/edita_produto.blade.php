@extends('includes.pagina_mae')

@section('titulo','Editar Produtos')

@section('conteudo')

{{-- {{dd($produto)}} --}}

<form action="{{ route('admin.atualizarProdutos', $produto->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">

    <div class="container mt-3">
        
        <div class="row">

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class='form-control' type="text" name="nome"
                    value="{{ $produto->nome }}">
                </div>
            </div>
    
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input class='form-control' type="text" name="descricao"
                    value="{{ $produto->descricao }}">
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input class='form-control' type="text" name="vlr_aquisicao"
                    value="{{ $produto->vlr_aquisicao }}">
                </div>
            </div>

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label>Tipo Produto</label>
                    <select class="form-control" name='id_tipo'>
                        <option value='NULL'>Selecionar</option>

                        @foreach($tipos_produto as $tipo_produto)
                            @if ($produto->id_tipo == $tipo_produto->id)
                                <option value={{$tipo_produto->id}} selected>{{$tipo_produto->descricao}}</option>
                            @else
                                <option value={{$tipo_produto->id}}>{{$tipo_produto->descricao}}</option>
                            @endif
                        @endforeach

                      </select>
                </div>
            </div>

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control" name='id_categoria'>
                        <option value='NULL'>Selecionar</option>

                        @foreach($categorias_produto as $categoria_produto)
                            @if ($produto->id_categoria == $categoria_produto->id)
                                <option value={{$categoria_produto->id}} selected>{{$categoria_produto->descricao}}</option>
                            @else
                                <option value={{$categoria_produto->id}}>{{$categoria_produto->descricao}}</option>
                            @endif
                        @endforeach

                      </select>
                </div>
            </div>

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label for="preco">Quantidade em Estoque</label>
                    <input class='form-control' type="number" min=1 name="quantidade"
                    value = {{$estoque->quantidade}}>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-6">
                <label for="img_produto">Link público da imagem</label>
                <input class='form-control' min=1 name="img_produto" value={{$produto->img_produto}}>
            </div>
        </div>

        <div class="form-group">
            <img width="120" src="{{asset($produto->img_produto)}}" />
        </div>

        <button type="submit" class="btn btn-search" style="color: #fff">Salvar</button>
    </div>
</form>

@endsection
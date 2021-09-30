@extends('includes.pagina_mae')

@section('titulo','Cadastrar Produtos')

@section('conteudo')


<form action="{{route('admin.salvarProdutos')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mt-3">
        
        <div class="row">

            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class='form-control' type="text" name="nome">
                </div>
            </div>
    
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input class='form-control' type="text" name="descricao">
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input class='form-control' type="text" name="vlr_aquisicao">
                </div>
            </div>

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label>Tipo Produto</label>
                    <select class="form-control" name='id_tipo'>
                        <option value='NULL'>Selecionar</option>

                        @foreach($tipos_produto as $tipo_produto)
                            <option value={{$tipo_produto->id}}>{{$tipo_produto->descricao}}</option>
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
                            <option value={{$categoria_produto->id}}>{{$categoria_produto->descricao}}</option>
                        @endforeach

                      </select>
                </div>
            </div>

            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label for="preco">Quantidade em Estoque</label>
                    <input class='form-control' type="number" min=1 name="quantidade">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-6">
                <label for="img_produto">Link público da imagem</label>
                <input class='form-control' min=1 name="img_produto">
                {{-- <input type="file" class="form-control-file" id="img_produto" name="img_produto"> --}}
            </div>
        </div>

        <div class="form-group">
            {{--                    exibir imagem--}}
        </div>

        <button type="submit" class="btn btn-search" style="color: #fff">Salvar</button>
    </div>
</form>

@endsection
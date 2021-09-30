<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'], function (){

    /* ROTA Listar PRODUTOS */
    Route::get('/home', 'ProdutoController@index')
    ->name('admin.listarProdutos');

    /* ROTA ADICIONAR PRODUTO*/
    Route::get('/produtos/adicionar', 'ProdutoController@adicionar')
    ->name('admin.adicionarProdutos');

    /* ROTA POST PRODUTO */
    Route::post('/produtos/salvar', 'ProdutoController@salvar')
    ->name('admin.salvarProdutos');

    /* ROTA PARA EDITAR PRODUTO */
    Route::get('/produtos/editar/{id}', 'ProdutoController@editar')
    ->name('admin.editarProdutos');

    /* ROTA PARA SALVAR PRODUTO EDITADO */
    Route::put('/produtos/atualizar/{id}', 'ProdutoController@atualizar')
    ->name('admin.atualizarProdutos');

    /* ROTA PARA EXCLUIR PRODUTO */
    Route::delete('/produtos/excluir/{id}', 'ProdutoController@deletar')
    ->name('admin.deletarProdutos');



    /* ROTA PARA LISTAR TIPOS DE PRODUTOS (ANIMAIS) CADASTRADOS */
    Route::get('/tipos_produto', 'TipoProdutoController@index')
    ->name('admin.listarTipoProduto');

    /* ROTA PARA ADICIONAR TIPOS DE PRODUTOS (ANIMAIS) */
    Route::get('/tipos_produto/adicionar', 'TipoProdutoController@adicionar')
    ->name('admin.adicionarTipoProduto');

    /* ROTA PARA SALVAR NOVO TIPO DE PRODUTO CADASTRADO */
    Route::post('/tipos_produto/salvar', 'TipoProdutoController@salvar')
    ->name('admin.salvarTipoProduto');

    /* ROTA PARA EDITAR TIPO PRODUTO */
    Route::get('/tipos_produto/editar/{id}', 'TipoProdutoController@editar')
    ->name('admin.editarTipoProduto');

    /* ROTA PARA SALVAR TIPO DE PRODUTO EDITADO */
    Route::put('/tipos_produto/salvar/{id}', 'TipoProdutoController@atualizar')
    ->name('admin.atualizarTipoProduto');

    /* ROTA PARA DELETAR TIPO PRODUTO */
    Route::delete('/tipos_produto/excluir/{id}', 'TipoProdutoController@excluir')
    ->name('admin.deletarTipoProduto');



    /* ROTA PARA LISTAR CATEGORIAS DE PRODUTOS CADASTRADOS */
    Route::get('/categorias_produto', 'CategoriaProdutoController@index')
    ->name('admin.listarCategoriaProduto');

    /* ROTA PARA ADICIONAR CATEGORIA DE PRODUTOS */
    Route::get('/categorias_produto/adicionar', 'CategoriaProdutoController@adicionar')
    ->name('admin.adicionarCategoriaProduto');

    /* ROTA PARA SALVAR NOVA CATEGORIA DE PRODUTO CADASTRADO */
    Route::post('/categorias_produto/salvar', 'CategoriaProdutoController@salvar')
    ->name('admin.salvarCategoriaProduto');

    /* ROTA PARA EDITAR CATEGORIA PRODUTO */
    Route::get('/categorias_produto/editar/{id}', 'CategoriaProdutoController@editar')
    ->name('admin.editarCategoriaProduto');

    /* ROTA PARA SALVAR CATEGORIA DE PRODUTO EDITADO */
    Route::put('/categorias_produto/atualizar/{id}', 'CategoriaProdutoController@atualizar')
    ->name('admin.atualizarCategoriaProduto');

    /* ROTA PARA DELETAR CATEGORIA DE PRODUTO */
    Route::delete('/categorias_produto/excluir/{id}', 'CategoriaProdutoController@excluir')
    ->name('admin.deletarCategoriaProduto');

    

    
     /* ROTA PARA LISTAR TIPOS DE STATUSPEDIDO CADASTRADOS */
     Route::get('/statuspedido', 'StatusPedido@listar')
     ->name('admin.listarStatusPedido');
 
     /* ROTA PARA ADICIONAR STATUSPEDIDO */
     Route::get('/statuspedido/adicionar', 'StatusPedido@adicionar')
     ->name('admin.adicionarStatusPedido');
 
     /* ROTA PARA SALVAR NOVO STATUSPEDIDO CADASTRADO */
     Route::post('/statuspedido/salvar', 'StatusPedido@salvar')
     ->name('admin.salvarStatusPedido');
 
     /* ROTA PARA EDITAR STATUSPEDIDO */
     Route::get('/statuspedido/editar/{id}', 'StatusPedido@editar')
     ->name('admin.editarTeste2');
 
     /* ROTA PARA ATUALIZAR STATUSPEDIDO EDITADO */
     Route::put('/statuspedido/atualizar/{id}', 'StatusPedido@atualizar')
     ->name('admin.atualizarStatusPedido');
 
     /* ROTA PARA DELETAR STATUSPEDIDO */
     Route::delete('/status_pedido/excluir/{id}', 'StatusPedido@excluir')
     ->name('admin.deletarStatusPedido');



     /* ROTA PARA LISTAR PEDIDOS CADASTRADOS */
     Route::get('/pedido', 'PedidoController@listar')
     ->name('admin.listarPedido');

     /* ROTA PARA SALVAR PEDIDO CADASTRADO */
     Route::post('/pedido/salvar', 'PedidoController@salvar')
     ->name('admin.salvarStatusDoPedido');
 
     /* ROTA PARA EDITAR STATUS DO PEDIDO CADASTRADO*/
     Route::get('/pedido/editar/{id}', 'PedidoController@editar')
     ->name('admin.editarPedido');

    /* ROTA PARA SALVAR STATUS DO PEDIDO EDITADO */
     Route::put('/pedido/salvar/{id}', 'PedidoController@atualizar')
    ->name('admin.atualizarStatusDoPedido');
     




    Route::get('/usuarios', 'UsuarioController@listar')
    ->name('admin.usuarios');
});



Auth::routes();



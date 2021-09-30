<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});


// API PARA BUSCAR CATEGORIA
Route::get('produto/listarcategorias','api\CategoriaProdutosController@ListarCategorias');

//API DA TABELA MAIS VENDIDOS
Route::get('produto/maisvendido/{descricaoTipoProduto}','api\MaisVendidoController@ListarMaisVendido');

//API PARA BUSCAR PRODUTO(BARRA DE PESQUISA)
Route::get('produto/buscarProdutoTermo/{termo}','api\BuscarProdutoController@buscarProdutoTermo');

//API DE ENDEREÇO
Route::get('endereco/buscar/{id}','api\EnderecoController@BuscarEndereco');
Route::post('endereco/salvar/{id}','api\EnderecoController@SalvarEndereco');
Route::delete('endereco/deletar/{id}','api\EnderecoController@DeletarEndereco');
Route::put('endereco/atualizar/{id}','api\EnderecoController@atualizarEndereco');


//API DE USUÁRIO/CLIENTE
Route::get('usuario/listar/{id}', 'api\UsuarioController@listarUsuarioEndereco');
Route::post('usuario/cadastrar', 'api\UsuarioController@cadastrar');
Route::put('usuario/atualizar/{id}', 'api\UsuarioController@atualizar');
Route::get('usuario/recuperarsenha/{emailOuCPF}', 'api\UsuarioController@resetaSenhaUsuario');

// API PARA SALVAR PEDIDO CADASTRADO
 Route::post('/pedido/gerar/{id}', 'api\CheckoutController@gerar');

//   API PARA LISTAR PEDIDOS CADASTRADOS(HISTORICO DE PEDIDOS)
 Route::get('/historico/listar/{id}', 'api\HistoricoController@listar');

 //API PARA LISTAR PRODUTO POR CATEGORIA E TIPO
 Route::get('produto/listar/{descricaoTipoProduto}/{descricaoCategoriaProduto}', 'api\ListarProdutosCategoria@listarProdutosPorCategoria');

 //API DE LOGIN(VERIFICAR USUÁRIO CADASTRADO)
 Route::get('/login/{dado1}/{dado2}', 'api\LoginController@login');

 //API DE ENVIAR EMAIL
 Route::get('/faleconosco/email/enviar/{nome}/{remetente}/{mensagem}', 'api\EmailController@enviar');
 Route::get('/sucessopedido/email/enviar/{nome}/{destinatario}/{numeroPedido}', 'api\EmailController@enviarPedido');
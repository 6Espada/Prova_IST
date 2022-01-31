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

//pessoas
Route::get('/pessoas/listar', 'api\PessoasController@listar');
Route::post('/pessoas/salvar', 'api\PessoasController@salvar');
Route::get('/pessoas/buscar/{id}', 'api\PessoasController@buscar');
Route::put('/pessoas/atualizar/{id}', 'api\PessoasController@atualizar');
Route::delete('/pessoas/deletar/{id}', 'api\PessoasController@deletar');

//contas
Route::get('/contas/listar', 'api\ContaController@listar');
Route::post('/contas/salvar', 'api\ContaControllerr@salvar');
Route::get('/contas/buscar/{id}', 'api\ContaController@buscar');
Route::put('/contas/atualizar/{id}', 'api\ContaController@atualizar');
Route::delete('/contas/deletar/{id}', 'api\ContaController@deletar');

//movimentacoes
Route::get('/movimentacoes/listar', 'api\MovimentacaoController@listar');
Route::post('/movimentacoes/salvar', 'api\MovimentacaoController@salvar');
Route::get('/movimentacoes/buscar/{id}', 'api\MovimentacaoController@buscar');
Route::put('/movimentacoes/atualizar/{id}', 'api\MovimentacaoController@atualizar');
Route::delete('/movimentacoes/deletar/{id}', 'api\MovimentacaoController@deletar');

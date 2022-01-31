<?php

use Illuminate\Support\Facades\Route;


//Pessoa
Route::get('/pessoas', 'PessoaController@index')
->name('pessoas');
Route::get('/pessoas/adicionar', 'PessoaController@adicionar')
->name('pessoas.adicionar');
Route::post('/pessoas/salvar', 'PessoaController@salvar')
->name('pessoas.salvar');
Route::get('/pessoas/editar/{id}', 'PessoaController@editar')
->name('pessoas.editar');
Route::put('/pessoas/atualizar/{id}', 'PessoaController@atualizar')
->name('pessoas.atualizar');
Route::delete('/pessoas/deletar/{id}', 'PessoaController@deletar')
->name('pessoas.deletar');

//Conta
Route::get('/contas', 'ContaController@listar')
->name('contas');
Route::get('/contas/adicionar', 'ContaController@adicionar')
->name('contas.adicionar');
Route::post('/contas/salvar', 'ContaController@salvar')
->name('contas.salvar');
Route::get('/contas/editar/{id}', 'ContaController@editar')
->name('contas.editar');
Route::put('/contas/atualizar/{id}', 'ContaController@atualizar')
->name('contas.atualizar');
Route::delete('/contas/deletar/{id}', 'ContaController@deletar')
->name('contas.deletar');

//movimentacoes
Route::get('/movimentacoes', 'MovimentacaoController@listar')
->name('movimentacoes');
Route::get('/movimentacoes/adicionar', 'MovimentacaoController@adicionar')
->name('movimentacoes.adicionar');
Route::post('/movimentacoes/salvar', 'MovimentacaoController@salvar')
->name('movimentacoes.salvar');
Route::get('/movimentacoes/{idPessoa}/{idConta}', 'MovimentacaoController@listarContas')
->name('movimentacoes.carregar');

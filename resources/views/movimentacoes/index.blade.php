@extends('layout.site')

@section('titulo', 'Cadastro de Movimentações')

@section('conteudo')
@include('movimentacoes.adicionar')
<div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
                <h3> Lista de Movimentações</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if(!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
            </div>

        </div>
        @include('movimentacoes.listar')
    </div>
@endsection

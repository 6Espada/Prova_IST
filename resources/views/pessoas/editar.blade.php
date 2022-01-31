@extends('layout.site')

@section('titulo', 'Cadastro de Pessoa')


@section('conteudo')
<div class="container">
    <h3>Editar Pessoa</h3>
    <div class="row">
        <form action="{{route('pessoas.atualizar', $item->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            @include('pessoas.form')
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
<div class="container">
    <div class="row mt-5 mb-2">
        <div class="col-9">
            <h3>Lista de Pessoas</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        </div>
    </div>
    @include('pessoas.listar')
</div>
@endsection()
<div class="container">
    <h3>Cadastro de Movimentação</h3>
    <div class="row">
        <form id="form-movimentacao" onsubmit="confirmarMovimentacao()" method="post" enctype="multipart/form-data">
            <input id="hidden-salvar-movimentacao" type="hidden" value="{{ route('movimentacoes.salvar') }}">
            @csrf
            @include('movimentacoes.form')
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
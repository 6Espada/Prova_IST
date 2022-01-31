<div class="container">
    <h3>Cadastro de Conta</h3>
    <div class="row">
        <form action="{{ route('contas.salvar') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('contas.form')
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
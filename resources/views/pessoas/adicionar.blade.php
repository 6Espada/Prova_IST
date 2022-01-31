<div class="container">
    <h3>Cadastro de Pessoa</h3>
    <div class="row">
        <form action="{{ route('pessoas.salvar') }}" id="submit-pessoa" method="post" enctype="multipart/form-data">
            @csrf
            @include('pessoas.form')
            <button type="submit" class="btn btn-success" id="btn-salvar">Salvar</button>
        </form>
    </div>
</div>
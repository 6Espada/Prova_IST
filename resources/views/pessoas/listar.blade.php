<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Endereço</th>
                <th scope="col">Editar</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pessoas as $item)
            <tr>
                <td>{{ $item->nm_pessoa }}</td>
                <td>{{ $item->cpf }}</td>
                <td>{{ $item->nm_endereco}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('pessoas.editar', $item->id)}}">
                        Editar</a>
                </td>
                <td>
                    <form id="form-deletar{{$item->id}}" onsubmit="deletarPessoa('{{$item->id}}')"method="post" action="{{ route('pessoas.deletar', 0)}}">
                        <input id="hidden-deletar-pessoa{{$item->id}}" type="hidden" value="{{ route('pessoas.deletar', $item->id)}}">
                        @csrf
                        @method('DELETE')
                        <button id="btn-deletar" type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
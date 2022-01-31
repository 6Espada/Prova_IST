<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Número da Conta</th>
                <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contas as $item)
            <tr>
                <td>{{ $item->nm_pessoa}}</td>
                <td>{{ $item->cpf}}</td>
                <td>{{ $item->id}}</td>
                <td>
                    <form id="form-deletar{{$item->id}}" onsubmit="deletarConta('{{$item->id}}')"method="post" action="{{ route('contas.deletar', 0)}}">
                        <input id="hidden-deletar-conta{{$item->id}}" type="hidden" value="{{ route('contas.deletar', $item->id)}}">
                        @csrf
                        @method('DELETE')
                        @if($item->conta_iniciada == 0)
                            <button id="btn-deletar" type="submit" class="btn btn-danger">Deletar</button>
                        @else
                            <a>Conta movimentada</a>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
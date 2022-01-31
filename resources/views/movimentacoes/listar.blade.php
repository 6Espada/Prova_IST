<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movimentacoes as $item)
            <tr>
                <td>{{ $item->created_at ?? ''}}</td>
                @if ($item->vl_movimentacao < 0)
                    <td class="negativo">R$ {{ $item->vl_movimentacao ?? ''}}</td>
                @else
                    <td>R$ {{ $item->vl_movimentacao ?? ''}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
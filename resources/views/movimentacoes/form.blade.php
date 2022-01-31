<div class="form-group">
    <label for="pessoa-movimentacao">Pessoa:</label>
    <select id="pessoa-movimentacao" class="form-control" name="num_pessoa" required>
        <option></option>
        @foreach ($pessoas as $item)
            @if ($idPessoa == $item->id)
                <option value="{{$item->id?? ''}}" selected>{{$item->nome_cpf?? ''}}</option>
            @else
                <option value="{{$item->id?? ''}}">{{$item->nome_cpf?? ''}}</option>
            @endif
        @endforeach
    </select>
    <br>
    <label for="conta-movimentacao">Número da conta:</label>
    <select id="conta-movimentacao" class="form-control" name="num_conta" required>
    <option></option>
        @foreach ($contas as $item)
            @if ($idConta == $item->id)
                <option class="{{$item->vl_saldo ?? ''}}" value="{{$item->id?? ''}}" selected>{{$item->num_conta_saldo?? ''}}</option> 
            @else
                <option value="{{$item->id?? ''}}">{{$item->num_conta_saldo?? ''}}</option> 
            @endif
        @endforeach
    </select>
    <br>
    <label for="vl-transacao">Valor:</label>
    <input type="text" class="form-control" id="vl-transacao" name="vl_transacao" required>
    <br>
    <label for="transacao">Depositar/Retirar:</label>
    <select id="transacao" class="form-control" name="tp_transacao" required>
        <option></option>
        <option value="0">Depositar</option>
        <option value="1">Retirar</option>
    </select>
    <br>
</div>
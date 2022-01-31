<div class="form-group">
    <label for="nm-tabeliao">Pessoa:</label>
    <select id="pessoa" class="form-control" name="nm_pessoa_cpf" required>
    <option></option>
        @foreach ($pessoas as $item)
            <option value="{{$item->id?? ''}}">{{$item->nome_cpf?? ''}}</option> 
        @endforeach
    </select>
    <br>
    <label for="num-conta">Número da Conta:</label>
    <input type="text" class="form-control" id="num-conta" name="num_conta" value="" required>
</div>
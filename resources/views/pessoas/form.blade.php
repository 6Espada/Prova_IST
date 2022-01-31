<div class="form-group">
    <label for="nm-pessoa">Nome:</label>
    <input type="text" class="form-control" id="nm-pessoa" name="nm_pessoa" value="{{$item->nm_pessoa ?? ''}}" required>
    <br>
    <label for="cpf">CPF:</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$item->cpf ?? ''}}" required>
    <br>
    <label for="nm-endereco">Endereço:</label>
    <input type="text" class="form-control" id="nm-endereco" name="nm_endereco" value="{{$item->nm_endereco ?? ''}}" required>
</div>
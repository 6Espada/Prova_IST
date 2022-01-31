function deletarPessoa(pessoa) {
    if (confirm("Tem certeza que deseja deletar?")) {
        var id = document.getElementById('hidden-deletar-pessoa' + pessoa);
        var form = document.getElementById('form-deletar' + pessoa);
        form.action = id.value;
        return true;
    }
};

function deletarConta(conta) {
    if (confirm("Tem certeza que deseja deletar?")) {
        var id = document.getElementById('hidden-deletar-conta' + conta);
        var form = document.getElementById('form-deletar' + conta);
        form.action = id.value;
        return true;
    }
};

function confirmarMovimentacao() {
    var tpTransacao = document.getElementById('transacao');

    if (tpTransacao == 1) {
        var conta = document.getElementById('conta-movimentacao');
        var transacao = document.getElementById('vl-transacao');

        var valConta = conta.options[conta.selectedIndex].className;
        var valTransacao = transacao.value;

        if (parseInt(valConta) > parseInt(valTransacao)) {
            alert("O seu saldo é menor que o valor de retirada!");
            return false;
        } else {
            var form = document.getElementById('form-movimentacao');
            var id = document.getElementById('hidden-salvar-movimentacao');
            form.action = id.value;
            return true;
        }
    } else {
        var form = document.getElementById('form-movimentacao');
        var id = document.getElementById('hidden-salvar-movimentacao');
        form.action = id.value;
        return true;
    }

};

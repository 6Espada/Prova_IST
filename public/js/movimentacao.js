var pessoa = document.getElementById('pessoa-movimentacao');
var conta = document.getElementById('conta-movimentacao');

pessoa.onchange = function () {
    var value = pessoa.options[pessoa.selectedIndex].value;
    window.location.href = 'http://prova-laravel.test/movimentacoes/' + value + '/0';
};

conta.onchange = function () {
    var numPessoa = pessoa.options[pessoa.selectedIndex].value;
    var numConta = conta.options[conta.selectedIndex].value;

    window.location.href = 'http://prova-laravel.test/movimentacoes/' + numPessoa + '/' + numConta;
};
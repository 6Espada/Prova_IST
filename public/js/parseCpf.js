var btn = document.getElementById("submit-pessoa");

btn.onsubmit = function () {
    var cpf = document.getElementById("cpf");
    var aux = cpf.value;
    aux = aux.replace('-', '');
    aux = aux.replaceAll('.', '');
    cpf.value = aux;
};

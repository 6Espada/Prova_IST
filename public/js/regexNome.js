var nome = document.getElementById("nm-pessoa");

nome.onkeyup = function () {
    let aux = nome.value;

    aux = aux.toLowerCase().replace(/(?:^|\s)\S/g, function (a) { return a.toUpperCase(); });
    nome.value = aux;
};

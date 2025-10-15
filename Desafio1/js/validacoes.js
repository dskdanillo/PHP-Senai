function validaFormulario() {
    var produto = document.getElementById("produto");
    var preco = document.getElementById("preco");

    if (produto.value.trim() === "") {
        alert("Por favor, preencha o nome do produto.");
        produto.focus();
        return false;
    }

    if (preco.value.trim() === "") {
        alert("Por favor, preencha o preço: .");
        preco.focus();
        return false;
    }

    // Regex para validar preço: apenas números, ponto ou vírgula, e no mínimo um número
    var regexPreco = /^[0-9]+([.,][0-9]{1,2})?$/;

    if (!regexPreco.test(preco.value.trim())) {
        alert("Preço inválido. Use somente números e vírgula ou ponto.");
        preco.focus();
        return false;
    }

    return true;
}

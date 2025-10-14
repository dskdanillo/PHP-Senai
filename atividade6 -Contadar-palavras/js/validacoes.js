function contarPalavras() {
    var texto = document.getElementById("texto").value;

    // Regex para contar palavras com acentos, cedilha etc.
    var palavras = texto.trim().match(/\b[\wÀ-ÿ']+\b/g);
    var total = palavras ? palavras.length : 0;

    document.getElementById("contador").innerText = "Palavras: " + total;
}

function validaTexto() {
    var texto = document.getElementById("texto").value.trim();
    var palavras = texto.match(/\b[\wÀ-ÿ']+\b/g);
    var total = palavras ? palavras.length : 0;

    if (total === 0) {
        alert("Digite algum texto antes de enviar.");
        return false;
    }

    return true;
}

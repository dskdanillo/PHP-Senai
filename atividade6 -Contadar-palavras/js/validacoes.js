const textarea = document.getElementById("texto");
const contador = document.getElementById("contador");

// Contagem em tempo real
textarea.addEventListener("input", function() {
    const texto = textarea.value.trim();
    // separa palavras usando regex (espaços e quebras de linha)
    const palavras = texto.match(/\b\w+\b/g);
    const total = palavras ? palavras.length : 0;
    contador.textContent = `Palavras: ${total}`;
});

// Validação antes do envio
function validaTexto() {
    const texto = textarea.value.trim();
    if (texto === "") {
        alert("O campo de texto está vazio!");
        textarea.focus();
        return false;
    }
    return true;
}

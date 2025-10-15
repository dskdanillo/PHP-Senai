const textarea = document.getElementById("texto");
const contador = document.getElementById("contador");


textarea.addEventListener("input", function() {// Contagem em tempo real
    const texto = textarea.value.trim();


    
    const palavras = texto.match(/\b\w+\b/g);// separa palavras usando regex (espaços e quebras de linha)
    const total = palavras ? palavras.length : 0;
    contador.textContent = `Palavras: ${total}`;
});


function validaTexto() {// Validação antes do envio
    const texto = textarea.value.trim();
    if (texto === "") {
        alert("O campo de texto está vazio!");
        textarea.focus();
        return false;
    }
    return true;
}

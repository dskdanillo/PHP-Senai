function validarFormulario() {
    let numero = document.getElementById("numero").value;
    if (isNaN(numero) || numero.trim() === "") {
        alert("Digite um número válido!");
        return false; // bloqueia o envio
    } 
    return true;
}

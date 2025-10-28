function validaFormulario() {

    const camponumero = document.getElementById("numero");
    const numero = camponumero.value.trim();

    const campolimite = document.getElementById("limite");
    const limite = campolimite.value.trim();

    const regexNumero = /^[0-9]+$/;

    if (numero === "") {

        alert("Por favor, preencha o campo início");
        camponumero.focus();
        return false;

    } else if (limite === "") {

        alert("Por favor, preencha o campo limite");
        campolimite.focus();
        return false;

    } else if (!regexNumero.test(numero)) {

        alert("Digite apenas valores inteiros e positívos no campo início");
        camponumero.focus();
        return false;

    } else if (!regexNumero.test(limite)) {

        alert("Digite apenas valores inteiros e positívos no campo limite");
        campolimite.focus();
        return false;

    } else if (parseInt(numero) > parseInt(limite)) {

        alert("A valor inicial não pode ser maior que o valor final");
        return false;

    }
    return true;
}
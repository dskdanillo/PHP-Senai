function validaFormulario() {

    
    const campoInicio = document.getElementById("inicio");
    const campoFim = document.getElementById("fim");

    const inicio = campoInicio.value.trim();
    const fim = campoFim.value.trim();

    const regexNumero = /^-?\d+$/;

    if (inicio === "" || fim === "") {
        alert("Preencha todos os campos");
        if (inicio === "") campoInicio.focus();
        else campoFim.focus();
        return false;
    }

    if (!regexNumero.test(inicio) || !regexNumero.test(fim)) {
        alert("Digite somente números válidos");
        return false;
    }

    if (parseInt(inicio) > parseInt(fim)) {
        alert("O número inicial deve ser menor ou igual ao número final");
        campoInicio.focus();
        return false;
    }

    return true;
}

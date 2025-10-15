function validaFormulario() {

    const campoInicio = document.getElementById("inicio");
    let inicio = campoInicio.value.trim();
    const campoFim = document.getElementById("fim");
    let fim = campoFim.value.trim();

    



    if (inicio === "") {// Verifica se o 1º campo está vazio
        alert("Por favor, insira o 1º valor!");
        campoInicio.focus();
        return false;
    }

       if (fim === "") {// Verifica se o 2º campo está vazio
 
        alert("Por favor, insira o 2º valor!");
        campoFim.focus();
        return false;
    }


    inicio = Number(inicio); // Converte os valores para número
    fim = Number(fim);


    if (isNaN(inicio) || isNaN(fim)) {// Verifica se são números válidos
        alert("Digite apenas números válidos!");
        return false;
    }


    if (fim < inicio) {
        alert("Erro: o 2º valor não pode ser menor que o 1º valor!");
        campoFim.focus();
        return false;
    }


    return true;
}

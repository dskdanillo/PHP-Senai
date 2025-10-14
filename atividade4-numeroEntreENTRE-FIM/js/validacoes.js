function validaFormulario() {
    let campoinicio = document.getElementById("inicio");
    let inicio = campoinicio.value.trim();

    let campofim = document.getElementById("fim");
    let fim = campofim.value.trim();

    
    if (inicio === '') {
        alert("Preencha o Campo INICIO : ");
        campoinicio.focus();
        return false;
    }


    
    if (fim === '') {
        alert("Preencha o Campo FIM : ");
        campofim.focus();
        return false;
    }


    
    if (Number(inicio) >= Number(fim)) {
        alert("O valor de Início deve ser menor que o valor de Fim.");
        campoinicio.focus();
        return false;
    }

    return true; 
}

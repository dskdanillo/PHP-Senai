function validaFormulario(){

    const v1 = document.getElementById('valor').value;
    const v2 = document.getElementById('valor').value;


    // Regex para número (inteiro ou decimal, com sinal opcional)
    const numRegex = /^\s*[+-]?\d+(?:[\.,]\+)?\s*$/;

    if (!numRegex.test(v1) || !numRegex.test(v2)){
        alert('Por favor, insira número válido (ex: 12, -3.5).');
        return false;
    }
    return true;
}
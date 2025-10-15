function validaFormulario() {
  const campoNumero = document.getElementById("numero");
  const campoLimite = document.getElementById("limite");

  const valorNumero = campoNumero.value.trim();
  const valorLimite = campoLimite.value.trim();

  const regex = /^[0-9]+$/; // Apenas números inteiros positivos

  if (valorNumero === "") {
    alert("Por favor, preencha o campo Número!");
    campoNumero.focus();
    return false;
  }

  if (valorLimite === "") {
    alert("Por favor, preencha o campo Limite!");
    campoLimite.focus();
    return false;
  }

  if (!regex.test(valorNumero) || !regex.test(valorLimite)) {
    alert("Digite apenas números inteiros positivos!");
    campoNumero.focus();
    return false;
  }

  if (parseInt(valorLimite) <= parseInt(valorNumero)) {
    alert("O limite deve ser maior que o número!");
    campoLimite.focus();
    return false;
  }

  return true; 
}

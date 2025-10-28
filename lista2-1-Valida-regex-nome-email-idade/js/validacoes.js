function validaFormulario() {
  
  var nome = document.getElementById("nome");
  var email = document.getElementById("email");
  var idade = document.getElementById("idade");

  var valorNome = nome.value.trim();
  var valorEmail = email.value.trim();
  var valorIdade = idade.value.trim();

  var regexNome = /^[A-Za-zÀ-ÿ\s]+$/;         // Letras e acentos
  var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var regexIdade = /^\d+$/;                   // Apenas números

  // Verifica se os campos estão vazios
  if (valorNome === "") {
    alert("Por favor, preencha o campo Nome.");
    nome.focus();
    return false;
  }

  if (valorEmail === "") {
    alert("Por favor, preencha o campo Email.");
    email.focus();
    return false;
  }

  if (valorIdade === "") {
    alert("Por favor, preencha o campo Idade.");
    idade.focus();
    return false;
  }

  // Valida formato dos campos
  if (!regexNome.test(valorNome)) {
    alert("Nome inválido! Use apenas letras.");
    nome.focus();
    return false;
  }

  if (!regexEmail.test(valorEmail)) {
    alert("E-mail inválido!");
    email.focus();
    return false;
  }

  if (!regexIdade.test(valorIdade)) {
    alert("Idade inválida! Use apenas números.");
    idade.focus();
    return false;
  }

  return true; // Tudo certo
}

function validarFormulario() {
  const botao = document.activeElement.value; // Descobre qual botão foi clicado
  const produto = document.getElementById("produto").value.trim();
  const preco = document.getElementById("preco").value.trim();


  if (botao === "finalizar") {
    return true;
  }

  if (produto === "" || preco === "") {
    alert("Preencha produto e preço antes de adicionar.");
    return false;
  }

  const regex = /^[0-9]+([.,][0-9]{1,2})?$/;
  if (!regex.test(preco)) {
    alert("Preço inválido. Use apenas números e vírgula ou ponto.");
    return false;
  }

  return true;
}


function resetarLista() {
  if (confirm("Deseja realmente limpar toda a lista?")) {
    window.location.href = "processa.php?reset=1";
  }
}

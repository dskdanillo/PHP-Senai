function validarFormulario() {

    /*A função trim()serve para remover possiveis espaços em 
    branco no início ou no final do input do campo*/

    let nome = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    let mensagem = document.getElementById("mensagem").value.trim();

    if (nome === "" || email === "" || mensagem === "") {

        alert("Preencher todos os campos Obrigatórios ");
        
        return false;
    }


    return true;

}
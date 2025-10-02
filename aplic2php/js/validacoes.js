function validarFormulario() {
    let nome = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    if (nome ==="" || email ==="") {

        alert("Preencha todos os campos obrigatórios");
        return false;
    }

    return true;

}

/*function validarFormulario() {
    let nome = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    if (nome === "") {

        alert("Preencha o campo Nome obrigatórios");
        return false;
    }
    else if (email === "") {
        alert("Preencha o campo email obrigatórios");
        return false;

    }
    return true;

}*/
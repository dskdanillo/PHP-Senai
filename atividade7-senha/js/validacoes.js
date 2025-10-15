function validarSenha() {
    var senha = document.getElementById("senha").value.trim();

    if (senha === "") {
        alert("Por favor, preencha o campo senha.");
        return false;
    }

    var regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    if (!regex.test(senha)) {
        alert("Senha fraca: mínimo 8 caracteres, uma maiúscula e um número.");
        return false;
    }

    
    return true;
}

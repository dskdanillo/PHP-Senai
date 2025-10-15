function validaFormulario() {
    var email = document.getElementById("email").value.trim();

    
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

   
    if (email === "") { // Verifica se o campo está vazio
        alert("O campo de e-mail está vazio!");
        document.getElementById("email").focus();
        return false;
    }

    
    if (!emailRegex.test(email)) {// Verifica se o formato é válido
        alert("Preencha o campo de e-mail corretamente!");
        document.getElementById("email").focus();
        return false;
    }

        return true;
}

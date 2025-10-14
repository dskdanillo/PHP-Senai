function validaFormulario() { 

var email = document.getElementById("email").value.trim();
var emailRegex = new RegExp("^([A-z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$");

 if (email === "") {
        alert("O campo de email está vazio!");
        document.getElementById("email").focus();
        return false;


if (!emailRegex.test(email)) {

    alert("Preencha o campo de e-mail correntamente!");
    document.getElementById("email").focus();
    return false;
}
return true;
}
}
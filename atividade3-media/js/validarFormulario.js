function validaFormulario() {


    let camponum1 = document.getElementById("num1");
    let num1 = camponum1.value.trim();

    let camponum2 = document.getElementById("num2");
    let num2 = camponum2.value.trim();

    let camponum3 = document.getElementById("num3");
    let num3 = camponum3.value.trim();

    let camponum4 = document.getElementById("num4");
    let num4 = camponum4.value.trim();

    if (!isFinite(num1) || num1 === "") {

        alert("Por favor, digite um número 1!");
        camponum1.focus();
        return false;

    } else if (!(num1 >= 0 && num1 <= 10)) {
        alert("Digite no campo 1  de 0 a 10");
        camponum1.focus();
        return false;

    } else if (!isFinite(num2) || num2 === "") {

        alert("Por favor, digite um número 2!");
        camponum2.focus();
        return false;

    } else if (!(num2 >= 0 && num2 <= 10)) {
        alert("Digite no campo 2  de 0 a 10");
        camponum2.focus();
        return false;

    } else if (!isFinite(num3) || num3 === "") {

        alert("Por favor, digite um número 3!");
        camponum3.focus();
        return false;

    } else if (!(num3 >= 0 && num3 <= 10)) {
        alert("Digite no campo 3  de 0 a 10");
        camponum3.focus();
        return false;

    } else if (!isFinite(num4) || num4 === "") {

        alert("Por favor, digite um número 4!");
        camponum4.focus();
        return false;

    } else if (!(num4 >= 0 && num4 <= 10)) {
        alert("Digite no campo 4  de 0 a 10");
        camponum4.focus();
        return false;


    } else{
    return true;
}
}








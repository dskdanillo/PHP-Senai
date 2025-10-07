function validaFormulario(){
    let camponumero= document.getElementById("numero");
    let numero= camponumero.value.trim();
    
    if(!isFinite(numero)|| numero ===""){
        
        alert("Por favor, digite um número inteiro");
        camponumero.focus();
        return false;
    }
}
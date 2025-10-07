function validaFormulario(){
    
    let camponome= document.getElementById("nome");
    let nome= camponome.value.trim();
    
    if(nome===""){
        
        alert("Por favor, digite seu nome");
        camponome.focus();
        return false;
    }
}
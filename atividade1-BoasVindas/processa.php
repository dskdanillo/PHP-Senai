<?php



if($_SERVER['REQUEST_METHOD']==='POST'){

    $nome = $_POST['nome'] ?? '';
    
   

    if(empty($nome)){ //verifica se o campo está vazio

        echo "Por favor, digite seu nome.<br>";

        sair();
    }else if(!empty($nome)){
        
        echo "Bem vindo(a), " . htmlspecialchars($nome). "<br>";

        sair();
    }
}

function sair(){
    
    echo "<br><a href='index.html'>Voltar</a>";
    
}
?>
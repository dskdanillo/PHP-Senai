<?php

//Declarando a Função

function sair (){

    echo "<br><a href='index.html'>Voltar</a>";
}

//------------------------------------------------------
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['txnome'] ?? '';
    $email = $_POST['txemail'] ?? '';

    //verifica se o campo está vazio

    if(empty($nome)){

        echo "O Campo nome está vazio.<br>";
        
        sair();//chamando a função sair

    }else if(empty($email)){

        echo "O campo email está vazio.<br>";
        
        sair();//chamando a função sair

    }else if(!empty($nome)&& ! empty($email)){

        echo "Nome : ". htmlspecialchars($nome). "<br>";
        echo "Email ; ". htmlspecialchars($email). "<br>";
        
        sair();//chamando a função sair



    }
}

?>
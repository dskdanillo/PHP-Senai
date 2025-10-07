<?php

//Declarando a Função

function sair (){

    echo "<br><a href='index.html'>Voltar</a>";
}

//------------------------------------------------------
if($_SERVER[' RESQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    //verifica se o campo está vazio

    if(empty($nome)){

        echo "O Campo nome está vazio.<br>";
        echo "<br><a href='index.html'>Voltar</a>";
        sair();//chamando a função sair

    }else if(empty($email)){

        echo "O campo email está vazio.<br>";
        echo "<br><a href ='index.html'>Voltar</a>";
        sair();//chamando a função sair
        
    }else if(!empty($nome)&& ! empty($email)){

        echo "Nome : ". htmlspecialchars($nome). "<br>";
        echo "Email ; ". htmlspecialchars($email). "<br>";
        echo "<br><a href= 'index.html'>Voltar</a>";
        sair();//chamando a função sair



    }
}

?>
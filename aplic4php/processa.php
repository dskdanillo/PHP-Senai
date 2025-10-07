<?php

function sair(){

    echo "<br><a href='index.html'>Voltar</a>";
}

if($_SERVER['REQUEST_METHOD']==='POST'){

    $numero = $_POST['numero'] ?? '';
    
    //verifica se o campo está vazio

    if($numero % 2 === 0){

        echo "É um número par.<br>";
        sair();

    }else{
        echo "É um número impar.<br>";
        sair();

    }
}
?>
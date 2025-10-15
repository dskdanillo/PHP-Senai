<?php

function sair()
{
    echo "<br><a href='index.html'>Voltar</a>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {//vereifica se o campo esta vazio.
    $numero = $_POST['numero'] ?? '';

  

    if ($numero % 2 === 0) {  //verificação se é par 
        echo "Este número é Par";
        sair();
        
    } else {
        echo "Este número é Impar";//Ser não for Par, verifica se é Impar .
        sair();
    }
}

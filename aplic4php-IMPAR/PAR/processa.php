<?php

    function sair(){
        echo "<br><a href='index.html'>Voltar</a>";

    }
     //vereifica se o campo esta vazio.
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $numero = $_POST['numero'] ?? '';
       
        //verificação se é par 

        if($numero % 2 === 0){
            echo "Este número é Par";
            sair();
        //Ser não for Par, verifica se é Impar .
        }else{
            echo "Este número é Impar";
            sair();
        }
    }

?>
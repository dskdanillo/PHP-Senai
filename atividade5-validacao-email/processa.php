<?php

function sair()
{
    echo '<br><a href="index.html"><button type="button">Voltar</button></a>';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    echo "<h1>Resultado da Validação</h1>";


    if (empty($email)) {     //  Verifica se o campo está vazio
        echo "<p>Nenhum e-mail foi informado</p>";
        sair();
    } else {   // Verifica se contém "@" usando explode
        $partes = explode("@", $email); // explode separa as partes do email no @

        if (count($partes) < 2) { // count contas as separações e neste caso Se não houver pelo menos duas partes, não contém "@"

            echo "<p>Formato inválido :</p>";
            sair();
        } else {
       
            echo "<p>E-mail recebido : $email</p>";     // email ok
            sair();
        }
    }
}

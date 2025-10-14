<?php

function sair()
{
    echo "<br><a href='index.html'>Voltar</a>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // puxa os valores e evita erro caso não enviados

   
    $inicio = $_POST['inicio'] ?? '';
    $fim = $_POST['fim'] ?? '';

   
    if ($inicio === '' || $fim === '') { // validacao de preenchimento
        echo "<p>ATENÇÃO: Por favor, preencha ambos os campos.</p>";
        sair();
        exit;
    }

    if ($inicio >= $fim) {
        echo "<p>ATENÇÃO: O valor inicial deve ser menor que o valor final.</p>";
        sair();
        exit;
    }

    echo "<h1>Contagem de $inicio até $fim</h1>";
    for ($i = $inicio; $i <= $fim; $i++) {
        echo $i . "<br>";
    }

    sair();

} else {
    echo "<p>Grtatidao.</p>";
    sair();
}
?>

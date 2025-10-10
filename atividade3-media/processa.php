<?php

function sair()
{

    echo "<br><a href='index.html'>Voltar</a>";
}


$numeros = [
    $num1 = $_POST['num1'] ?? '',
    $num2 = $_POST['num2'] ?? '',
    $num3 = $_POST['num3'] ?? '',
    $num4 = $_POST['num4'] ?? '', //puxa os dados dos compos de de texto numericos
];                 //LEMBRNADO QUE $numero = [] >>>>>" ESTA ENTRE [ ]" INICIANDO  UM ARRAY

$soma = 0;
$quantidade = count($numeros); //utilizando nesse formato de escrita estamos inicializando a 
//variavel soma informanado que ela nesse momento é 0
//Iniciando a variavel quantidade  e dizendo que ela recebe o 
//valor da função count() que nada mais é que um contador das variaveis acima



if (empty($num1)) {

    echo "O Campo de número 1 está vázio.<br>";
    sair();
} else if (empty($num2)) {

    echo "O Campo de número 2 está vázio.<br>";
    sair();
} else if (empty($num3)) {

    echo "O Campo de número 3 está vázio.<br>";
    sair();
} else if (empty($num4)) {

    echo "O Campo de número 4 está vázio.<br>";
    sair();
} else if (!empty($num1) && !empty($num2) && !empty($num3) && !empty($num4)) {



    $media = $soma / $quantidade;
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Resultado da Média</title>
        <link rel="stylesheet" href="./css/estilo.css">
    </head>

    <body>

        <form>

            <?php echo "Número 1: " . htmlspecialchars($num1) . "<br>";
            echo "Número 2: " . htmlspecialchars($num2) . "<br>";
            echo "Número 3: " . htmlspecialchars($num3) . "<br>";
            echo "Número 4: " . htmlspecialchars($num4) . "<br><br>";
            ?>


            <h1>Resultado do Cálculo</h1>


            <?php
            for ($i = 0; $i < $quantidade; $i++) {
                $soma += $numeros[$i];
            }

            $media = $soma / $quantidade;

            echo "Média: " . htmlspecialchars($media) . "<br>";

            if ($media >= 7) {
                echo "Situação: Aprovado! <br>";
                sair();
            } else {
                echo "Situação: REPROVADO! <br>";
                sair();
            }


            ?>

        </form>

    </body>

    </html>


<?php


}

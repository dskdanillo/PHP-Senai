<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Contagem</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Resultado</h1>

        <?php

        $inicio = htmlspecialchars($_POST["inicio"] ?? "");
        $fim = htmlspecialchars($_POST["fim"] ?? "");


        // validação no servidor
        if ($inicio === "" || $fim === "") {
            echo "<p style='color:red;'>Erro: Preencha todos os campos!</P>";

        } elseif (!is_numeric($inicio) || !is_numeric($fim)) {
            echo "<p style='color:red;'>Erro: apenas números são permitidos!</P>";

        } elseif ($inicio > $fim) {
            echo "<p style='color red; '>Erro : o número inicial deve ser menor ou igual ao fim!</p>";
            
        } else {
            $inicio = (int)$inicio;
            $fim = (int)$fim;

            echo "<p>Contando de <strong>$inicio</strong> até <strong>$fim</strong>:</P>";


            //Estrutura Do...While ()

            $contador = $inicio;
            echo "<div style='margin: top 10px;'>";

            do {

                echo $contador . "<br>";
                $contador++;
            } while ($contador <= $fim);
            echo "</div>";
        }
        ?>

        <a href="index.html"><button>Voltar</button></a>

    </div>
</body>

</html>
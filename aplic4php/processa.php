<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Múltiplos</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <h1>Resultado</h1>
  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero = $_POST["numero"] ?? "";
        $limite = $_POST["limite"] ?? "";

        if (!ctype_digit($numero) || !ctype_digit($limite)) {
            echo "<p style='color: red;'>ERRO: Insira apenas números inteiros positivos.</p>";
            echo "<a href='index.html'><button>Voltar</button></a>";
            exit;
        }

        $numero = (int)$numero;
        $limite = (int)$limite;

        if ($limite <= $numero) {
            echo "<p style='color: red;'>ERRO: O limite deve ser maior que o número.</p>";
            echo "<a href='index.html'><button>Voltar</button></a>";
            exit;
        }

        echo "<p><strong>Múltiplos de $numero até $limite:</strong></p>";
      
        for ($i = $numero; $i <= $limite; $i += $numero) {
            echo "<p>$i</p>";
        }
        echo "</p>";
        echo "<a href='index.html'><button>Voltar</button></a>";
    }
  ?>
</body>
</html>

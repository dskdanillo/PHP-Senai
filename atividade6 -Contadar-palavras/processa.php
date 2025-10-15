<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST["texto"] ?? '';

    $total = str_word_count($texto, 0); // Conta palavras

    echo "<h1>Resultado</h1>";
    echo "<p>Total de palavras: $total</p>";

    if ($total < 20) {
        echo "<p>Texto curto.</p>";
    } elseif ($total <= 50) {
        echo "<p>Texto médio.</p>";
    } else {
        echo "<p>Texto longo.</p>";
    }

    echo "<br><a href='index.html'>Voltar</a>";
} else {
    echo "Acesso inválido.";
}
?>
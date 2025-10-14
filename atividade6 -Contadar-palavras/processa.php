<?php
function sair() {
    echo '<br><a href="index.html"><button type="button">Voltar</button></a>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';

    echo "<h1>Resultado da Contagem</h1>";

    if (empty($texto)) {
        echo "<p>Nenhum texto foi informado.</p>";
        sair();
    } else {
        // separa palavras
        $palavras = preg_split('/\s+/', trim($texto));
        $total = count($palavras);
        echo "<p><strong>Texto enviado:</strong><br>$texto</p>";
        echo "<p><strong>Total de palavras:</strong> $total</p>";
        sair();
    }
}
?>

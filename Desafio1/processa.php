<?php
session_start();

if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'] ?? '';
    $preco = $_POST['preco'] ?? '';

    if ($produto === '' || $preco === '') {
        echo "<p>Por favor, preencha todos os campos.</p>";
        echo "<a href='index.html'>Voltar</a>";
        exit;
    }

    $_SESSION['produtos'][] = ['nome' => $produto, 'preco' => $preco];

    echo "<h1>Produtos cadastrados</h1>";
    echo "<div class='lista-produtos'>";
    for ($i = 0; $i < count($_SESSION['produtos']); $i++) {
        $p = $_SESSION['produtos'][$i];
        echo "<p><strong>" . htmlspecialchars($p['nome']) . "</strong> - R$ " . htmlspecialchars($p['preco']) . "</p>";
    }
    echo "</div>";

    echo "<br><a href='index.html'>Adicionar outro produto</a>";
} else {
    echo "Envie os dados pelo formulário.";
}
?>

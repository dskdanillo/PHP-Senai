<?php
session_start();

// Resetar lista
if (isset($_GET['reset'])) {
    unset($_SESSION['produtos']); // Limpa apenas os produtos
    header("Location: index.html");
    exit;
}

// Inicializa array de produtos
if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}

// Captura dados
$produto = $_POST['produto'] ?? '';
$preco = $_POST['preco'] ?? '';
$acao = $_POST['acao'] ?? '';

// Função para validar preço
function precoValido($valor) {
    return preg_match('/^[0-9]+([.,][0-9]{1,2})?$/', $valor);
}

// Adicionar produto
if ($acao === 'adicionar') {
    if (empty($produto) || empty($preco)) {
        echo "<h2>Preencha todos os campos antes de adicionar.</h2>
        <a href='index.html'><button type='button'>Voltar</button></a>";
        exit;
    }

    if (!precoValido($preco)) {
        echo "<h2>Preço inválido. Use apenas números e vírgula ou ponto.</h2>
        <a href='index.html'><button type='button'>Voltar</button></a>";
        exit;
    }

    $_SESSION['produtos'][] = "$produto — R$ $preco";
    header("Location: index.html");
    exit;
}

// Finalizar lista
if ($acao === 'finalizar') {
    echo "<h1>Lista Final de Produtos</h1>";

    if (!empty($_SESSION['produtos'])) {
        for ($i = 0; $i < count($_SESSION['produtos']); $i++) {
            echo "<p><strong>Produto " . ($i + 1) . ":</strong> " . $_SESSION['produtos'][$i] . "</p><hr>";
        }
    } else {
        echo "<p>Nenhum produto foi adicionado.</p>";
    }

    echo "<a href='index.html'><button type='button'>Voltar</button></a>";

    // Limpa apenas os produtos após finalizar
    unset($_SESSION['produtos']);
}
?>

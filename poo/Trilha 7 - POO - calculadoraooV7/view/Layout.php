<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Resultado - Calculadora</title>
    <link rel="stylesheet" href="styles.css">

 
</head>

<body>
    <main class="container">
        <div class="container_form">


            <?php
            session_start();

            if (!isset($_SESSION['resultado'])) {
                header('Location: index.html');
                exit;
            }

            $sessao = $_SESSION['resultado'];
            unset($_SESSION['resultado']); // Limpa os sessao da sessão
            ?>
            <!DOCTYPE html>
            <html lang="pt-br">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Resultado</title>
                <link rel="stylesheet" href="../css/style.css">
            </head>

            <body>

                <h1>Resultado</h1>
                <?php if (!empty($sessao['error'])): ?>
                    <p class="error"><?= htmlspecialchars($sessao['error']) ?></p>
                <?php else: ?>
                    <p>Operação: <strong><?= htmlspecialchars($sessao['operacao']) ?></strong></p>
                    <p><?= htmlspecialchars($sessao['val1']) ?>
                        <?= $sessao['operacao'] === 'somar' ? '+' : ($sessao['operacao'] === 'subtrair' ? '-' : ($sessao['operacao'] === 'multiplicar' ? '×' : '÷')) ?>
                        <?= htmlspecialchars($sessao['val2']) ?>
                        = <strong><?= htmlspecialchars($sessao['result']) ?></strong>
                    </p>
                <?php endif; ?>
                <a href="index.html"><button>Voltar</button></a>
                    <?php
                    session_destroy();
                    ?>
            </body>

            </html>
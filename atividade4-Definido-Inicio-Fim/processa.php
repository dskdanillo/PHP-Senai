<?php
function sair()
{
    echo '<br><a href="index.html"><button type="button">Voltar</button></a>';
}

$numeros = []; // array para armazenar os números
$contagem = 0;
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inicio = $_POST['inicio'] ?? '';
    $fim = $_POST['fim'] ?? '';

    if (empty($inicio)) {

        $erro = "O 1º valor não foi preenchido.";

    } elseif (empty($fim)) {
       
        $erro = "O 2º valor não foi preenchido.";

    } elseif ($fim < $inicio) {
        
        $erro = "Erro: o segundo número não pode ser menor que o primeiro!";
        
    } else {
        for ($i = $inicio; $i <= $fim; $i++) {
            $numeros[] = $i; // adiciona no array
            $contagem++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cálculo</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form>
        <h1>Resultado do Cálculo</h1>

        <?php if ($erro): ?>
            <p style="color:red;"><strong><?php echo $erro; ?></strong></p>
            <?php sair(); ?>
        <?php else: ?>
            <p><strong>Valores informados:</strong><br>
                <?php echo implode("<br>", $numeros); ?>
            </p>

            <p><strong>Total de números:</strong>
                <?php echo $contagem; ?>
            </p>

            <?php sair(); ?>
        <?php endif; ?>
    </form>
</body>
</html>

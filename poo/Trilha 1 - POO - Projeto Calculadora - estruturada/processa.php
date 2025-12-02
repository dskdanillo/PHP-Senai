<?php

//Programação estrutuada: cada operação é implementada em função separada.
// Recebe via POST: valor1, valor2, operação


//Função de operação (cada uma recebe dois números e retorna o resultado)
function somar($a, $b)
{
    return $a + $b;
}

function subtrair($a, $b)
{
    return $a - $b;
}

function multiplicar($a, $b)
{
    return $a * $b;
}

function dividir($a, $b) 
{
    if ($b == 0) {
        return null; // sinaliza erro
    }
    return $a / $b;
}

//-------------------------------------------------

// Função utilitária: Limpa/normaliza entra
function parse_num($val)
{
    //remove espaços
    $s = trim($val);
    //troca virgula por ponto(aceitar 1,5)
    $s = str_replace(',', '.', $s);
    // remove qualquer caracter que não seja digito, sinal, ou ponto - assim mantemos entrada simples
    // importante: para fins didático - em produção, use validação mais robusto

    if (!preg_match('/^\s*[+-]?\d+(?:[\.,]\d+)?\s*$/', $s)) {
        return null;
    }
    return floatval($s);
}

//Recepção dos dados

$valor1 = $_POST['valor1'] ?? '';
$valor2 = $_POST['valor2'] ?? '';
$operacao = $_POST['operacao'] ?? '';

$val1 = parse_num($valor1);

$val2 = parse_num($valor2);

$result = null;
$error = null;


//--------------------------------------------

if ($val1 === null || $val2 === null) {
    $error = 'Entrada Invalida. Certifique - se de informar números válidos.';
} else {
    switch ($operacao) {
        case 'somar':
            $result = somar($val1, $val2);

            break;

        case 'subtrair':
            $result = subtrair($val1, $val2);
            break;

        case 'multiplicar':
            $result = multiplicar($val1, $val2);
            break;

        case 'divisao':
           
            if ($val2 == 0) {
                $error = 'Divisão por zero não permitida.';
            } else {
                $result = dividir($val1, $val2);
            }
            break;
        default:
            $error = 'Operação desconhecida.';
    }
}

// Saida  HTMML simples com  o resultado 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Calculadora</title>
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
</head>
<body>
    <main class="container">
    <h1>Resultado</h1>

    <?php if ($error !== null): ?>
           <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8');?></p>
       
        <?php else: ?>
        
            <p>Operação: <strong><?php echo htmlspecialchars($operacao); ?></strong></p>
            <p><?php echo htmlspecialchars($val1);?>
        
            <?php
            switch ($operacao) {
                case 'somar': echo ' + '; break;
                case 'subtrair': echo ' - '; break;
                case 'multiplicar': echo ' x ';  break;
                case 'divisao': echo ' ÷ '; break;

            }
            ?>
            <?php echo htmlspecialchars($val2); ?> =
            <strong><?php echo htmlspecialchars($result); ?></strong>

        </p>
        <?php endif; ?>

        <p><a href="index.html"><button>Voltar</button></a></p>
        </main>
</body>
</html>
<?php 
function sair()
{
    echo "<br><a href='index.html'>Voltar</a>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = trim($_POST["senha"] ?? '');

    if ($senha === '') {
        echo "<p>ATENÇÃO: O campo senha não pode ficar vazio.</p>";
        sair();
       
    }

    if (preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $senha)) {
        echo "<h1>Senha aceita</h1>";
    } else {
        echo "<h1>Senha fraca</h1>";
    }

    sair();
} else {
    echo "Envie o formulário corretamente.";
    sair();
}
?>

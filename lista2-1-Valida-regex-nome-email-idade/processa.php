<!DOCTYPE html><!--html para resposta cabeçario comum -->
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado do Cadastro</title>
  <link rel="stylesheet" href="css/estilo.css"><!--Precisa estar linkado com o css estilizado-->
</head>

<body>

  <h1>Resultado do Cadastro</h1>

  <?php

  //Comentei tudo para ir entendendo kkk
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome  = $_POST["nome"]  ?? ""; // cria a variavel $nome que será carrgada pelo method $_POST trazendo informações
    $email = $_POST["email"] ?? ""; // do formulário nos inputs nome, email, idade ~~ ?? significar que se nao tvernada 
    $idade = $_POST["idade"] ?? ""; // nos campos ele agrega vazio a variavel "" = vazio

    //validação de regex. salvando em uma nova variavel .
    $nomeValido  = preg_match("/^[A-Za-zÀ-ÿ\s]+$/", $nome); // preg_match = serve para conferir se o texto condiz com o regex
    $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL); // filter_var = usada para validar ou filtrar valores, como emails, URLs, números, IPs, etc.
    $idadeValida = ctype_digit($idade); // ctype_digit = verifica se todos digitos são numéricos.
  ?>

    <div class="resposta">
    <?php
    //SE dentro de SE 
    if ($nomeValido && $emailValido && $idadeValida) { // Se as novas variaveis estiverem ok ele imprime os resultados.
      echo "<p>Cadastro realizado com sucesso!</p>";
      echo "<p>Nome: $nome</p>";
      echo "<p>Email: $email</p>";
      echo "<p>Idade: $idade</p>";
    } else { // Senão ele apresenta um Erro  mandando a mensagem a baixo.
      echo "<p style='color:red;'>Erro: Dados inválidos. Verifique as informações e tente novamente.</p>";
    }

    // botão de voltar estilizado igual ao CSS
    echo "<a class='botaoResposta' href='index.html'><button>Voltar</button></a>";
  } else {
    echo "<p style='color: red;'>Acesso inválido.</p>";
    echo "<a class='botaoResposta' href='index.html'><button>Voltar</button></a>";
  }
    ?>
    </div>
</body>

</html>

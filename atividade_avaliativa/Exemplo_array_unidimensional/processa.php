<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }

        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgb(40, 43, 46);
        }

        h2 {
            text-align: center;
            color: white;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: aliceblue;
        }

        .input_text {

            height: 20px;
            border: 2px solid rgb(65, 70, 75);
            padding: 5px;
            background-color: rgb(224, 226, 230);

        }

        .buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;

        }

        textarea {
            padding: 5px;
            border: 2px solid rgb(65, 70, 75);
            background-color: rgb(224, 226, 230);
            border-radius: 2px;
            padding: 5px;

        }

        .container_form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            width: 250px;
            border-radius: 5px;
            background-color: rgb(57, 60, 63);
            border: 2px solid rgb(65, 70, 75);
            box-shadow: 0px 0px 5px rgba(26, 29, 31, 0.87);
            padding: 30px;

        }

        .resultado {
            width: 250px;
            border-radius: 5px;
            background-color: rgb(57, 60, 63);
            border: 2px solid rgb(65, 70, 75);
            box-shadow: 0px 0px 5px rgba(26, 29, 31, 0.87);
            padding: 30px;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        span {
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 10px 30px;
            background-color: rgb(230, 95, 95);
            border-radius: 2px;
            border: none;
            transition: transform 0.2s ease;

        }

        button:hover {
            transform: scale(1.05);
            transition: 0.2s;
            background-color: rgb(202, 67, 67);
            cursor: pointer;

        }
    </style>
</head>

<body>
    <div class="container_form">
        <h2>Inserindo dados em um vetor</h2>
        <?php
        session_start(); // Inicia uma sessão para salvar os dados inseridos no input do html


        // Adicionar um valor para o vetor
        if (isset($_POST['gerar'])) { //isset verifica se a variavel gerar recebeu um valor do html

            $valor = $_POST['vetor'] ?? ''; //pega o valor enviado pelo formulário HTML e insere na variavel $valor

            // Validação ctype_digit($valor): Verifica se o valor na variavel $valor é um número inteiro e positivo
            if (!ctype_digit($valor)) { //se não for, ele entra no if e mostra o erro

                echo "<p style='color:#ff7373;'>Erro: insira apenas números inteiros positivos.</p>";
                return sair();
            }

            // !isset verifica se a variavel $vetor já está na sessão e se ela é uma array com a função !is_array
            if (!isset($_SESSION['vetor']) || !is_array($_SESSION['vetor'])) {

                $_SESSION['vetor'] = []; //se não tiver, ele utiliza =[] para transformar a variavel vetor em um vetor

            }

            // Adiciona o novo número dentro da variavel valor e exibe o vetor
            $_SESSION['vetor'][] = (int)$valor; //assim como em javascript, é necessário converter a string do campo de texto em inteiro

            echo "<p>Valor <strong>$valor</strong> adicionado</p>";
            echo "<p>Vetor atual:</p>";
            echo "<p><strong>[" . implode(", ", $_SESSION['vetor']) . "]</strong></p>"; //implode serve pra mostrar o vetor inteiro
            return sair();
        }
        // Adicionar um valor para o vetor


        // Excluir o vetor da session
        if (isset($_POST['limpar'])) { //isset verifica a variavel limpar foi enviada pelo formulário html

            unset($_SESSION['vetor']); //unset serve para excluir a variavel vetor da sessão
            echo "<p>Vetor limpo com sucesso</p>";
            return sair();
        }

        // === ORDENAR O VETOR ===
        if (isset($_POST['ordenar'])) {

            //se já tiver uma variavel no vetor dentro de session E ela for uma array E a quantidade de valores nela for maior que 0:
            if (isset($_SESSION['vetor']) && is_array($_SESSION['vetor']) && count($_SESSION['vetor']) > 0) { //count conta quantos valores existem dentro do vetor

                sort($_SESSION['vetor']); // Sort ordena em ordem crescente se forem int e alfabética se forem string

                echo "<p>Vetor organizado em ordem crescente</p>";
                echo "<p><strong>[" . implode(", ", $_SESSION['vetor']) . "]</strong></p>"; //implode serve pra mostrar o vetor inteiro

            } else {

                echo "<p>O vetor ainda está vazio. Adicione valores primeiro.</p>";
            }
            return sair();
        }

        // === se nenhum botão for clicado ===
        echo "<p>Nenhuma ação foi selecionada.</p>";

        function sair()
        {

            echo "<a href='index.html'><button>Voltar</button></a>";
            exit; //encerra o script php

        }
        ?>
    </div>



</body>

</html>
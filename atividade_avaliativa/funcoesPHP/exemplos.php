<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo dados em um vetor</title>
    <style>
        /* ======== ESTILO VISUAL ======== */
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

        .input_text {
            height: 20px;
            border: 2px solid rgb(65, 70, 75);
            padding: 5px;
            background-color: rgb(224, 226, 230);
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
            background-color: rgb(202, 67, 67);
            cursor: pointer;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container_form">
        <h2>Inserindo dados em um vetor</h2>

        <?php
        // ======== INÍCIO DO PHP ========

        // Inicia a sessão para armazenar o vetor na memória do servidor
        session_start();

        /* =====================================================
           FUNÇÕES PRINCIPAIS
        ===================================================== */

        // Função: Adiciona um valor ao vetor salvo na sessão
        function adicionarValor($valor)
        {
            // Verifica se o valor é um número inteiro positivo
            // ctype_digit() retorna true apenas se a string contém dígitos 0–9
            if (!ctype_digit($valor)) {
                mensagem("Erro: insira apenas números inteiros positivos.", true);
            }

            // Caso o vetor ainda não exista na sessão, cria um vetor vazio
            if (!isset($_SESSION['vetor']) || !is_array($_SESSION['vetor'])) {
                $_SESSION['vetor'] = [];
            }

            // Adiciona o número convertido para inteiro dentro do vetor da sessão
            $_SESSION['vetor'][] = (int)$valor;

            // Mostra mensagem com o vetor atualizado
            mensagem("Valor <strong>$valor</strong> adicionado.<br>Vetor atual:<br><strong>[" . implode(", ", $_SESSION['vetor']) . "]</strong>");
        }

        // Função: Ordena o vetor em ordem crescente
        function ordenarVetor()
        {
            // Verifica se o vetor existe, é um array e possui ao menos 1 valor
            if (isset($_SESSION['vetor']) && is_array($_SESSION['vetor']) && count($_SESSION['vetor']) > 0) {

                // sort() organiza os valores em ordem crescente (numérica)
                sort($_SESSION['vetor']);

                // Mostra o vetor ordenado
                mensagem("Vetor organizado em ordem crescente:<br><strong>[" . implode(", ", $_SESSION['vetor']) . "]</strong>");
            } else {
                // Caso o vetor ainda não tenha elementos
                mensagem("O vetor ainda está vazio. Adicione valores primeiro.");
            }
        }

        // Função: Limpa (exclui) o vetor da sessão
        function limparVetor()
        {
            // unset() remove completamente a variável 'vetor' da sessão
            unset($_SESSION['vetor']);

            // Exibe mensagem de sucesso
            mensagem("Vetor limpo com sucesso!");
        }

        // Função: Mostra mensagens na tela (com opção de cor vermelha para erros)
        function mensagem($texto, $erro = false)
        {
            // Define a cor de acordo com o tipo de mensagem
            $cor = $erro ? '#ff7373' : 'white';

            // Exibe o texto formatado com cor
            echo "<p style='color:$cor;'>$texto</p>";

            // Chama a função sair() para encerrar o script
            sair();
        }

        // Função: Mostra o botão de voltar e encerra o PHP
        function sair()
        {
            echo "<a href='index.html'><button>Voltar</button></a>";
            // exit encerra o processamento do código imediatamente
            exit;
        }

        /* =====================================================
           LÓGICA PRINCIPAL DO PROGRAMA
        ===================================================== */

        // Verifica qual botão foi clicado no formulário HTML

        // 1️⃣ Botão "Gerar" (adicionar valor)
        if (isset($_POST['gerar'])) {
            // Captura o valor digitado no campo "vetor"
            $valor = $_POST['vetor'] ?? '';
            // Chama a função que adiciona o valor
            adicionarValor($valor);

        // 2️⃣ Botão "Ordenar"
        } elseif (isset($_POST['ordenar'])) {
            ordenarVetor();

        // 3️⃣ Botão "Limpar"
        } elseif (isset($_POST['limpar'])) {
            limparVetor();

        // 4️⃣ Caso nenhum botão tenha sido clicado
        } else {
            mensagem("Nenhuma ação foi selecionada.");
        }

        ?>
    </div>
</body>

</html>

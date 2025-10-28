<?php
// --- INÍCIO DO DOCUMENTO HTML E CSS ---
echo <<<HTML
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo PHP: Arrays e Funções</title>
<style>
    /* Adiciona rolagem suave ao clicar nos links do índice */
    html { 
        scroll-behavior: smooth; 
    }
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        line-height: 1.6;
        background-color: #f9f9f9;
        color: #333;
        margin: 0;
        padding: 0;
    }
    
    /* Título Principal da Página */
    .main-title {
        color: #4F5B93; /* Cor do PHP */
        text-align: center;
        font-size: 2.5em;
        margin: 30px 0;
    }

    /* --- Layout de 2 Colunas --- */
    .page-wrapper {
        display: flex;
        flex-wrap: wrap; /* Para telas menores */
        max-width: 1300px;
        margin: 20px auto;
        align-items: flex-start;
        gap: 30px;
        padding: 0 20px;
    }

    /* Coluna do Conteúdo Principal */
    main.content {
        flex: 1; /* Ocupa o espaço restante */
        min-width: 60%; /* Garante que o conteúdo não fique muito espremido */
        background-color: #fff;
        border-radius: 8px;
        padding: 20px 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    /* --- Estilos para o Índice Lateral Fixo --- */
    nav.sidebar-index {
        flex: 0 0 280px; /* Largura fixa de 280px */
        position: sticky; /* Efeito "grudento" */
        top: 20px; /* Distância do topo */
        
        /* Estilos do 'card' do índice */
        background: #fdfdfd;
        border: 1px solid #ddd;
        padding: 10px 25px 20px 25px;
        border-radius: 8px;
        
        /* Para o caso de o índice ser muito alto */
        max-height: 90vh; /* Altura máxima de 90% da tela */
        overflow-y: auto; /* Adiciona barra de rolagem interna se necessário */
    }
    
    nav.sidebar-index h2 {
        border-bottom: none;
        padding-top: 5px;
        margin-bottom: 15px;
    }
    nav.sidebar-index > ul {
        list-style-type: none;
        padding-left: 0;
        margin: 0;
    }
    nav.sidebar-index > ul > li {
        font-weight: bold;
        font-size: 1.1em;
        margin-top: 15px;
    }
    nav.sidebar-index > ul > li > ul {
        font-weight: normal;
        font-size: 0.9em;
        padding-left: 15px;
        list-style-type: disc;
        margin-top: 8px;
    }
    nav.sidebar-index ul li a {
        text-decoration: none;
        color: #007bff;
    }
    nav.sidebar-index ul li a:hover {
        text-decoration: underline;
    }
    
    /* --- Estilos de Conteúdo Padrão --- */
    h1 {
        color: #4F5B93;
        border-bottom: 2px solid #EEE;
        padding-bottom: 10px;
        margin-top: 10px; /* Ajuste para o primeiro h1 */
    }
    h2 {
        color: #666;
        border-bottom: 1px solid #EEE;
        padding-top: 15px;
    }
    h3, h4 {
        color: #333;
        font-size: 1.1em;
        margin-top: 15px;
        margin-bottom: 5px;
    }
    h4 {
        font-size: 1.0em;
        color: #555;
    }
    pre {
        background-color: #2d2d2d;
        color: #f1f1f1;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
        font-family: "Courier New", Courier, monospace;
    }
    /* Estilo para pre de análise */
    pre.analysis-box {
        background-color: #f0f0f0; 
        color: #333; 
        border: 1px solid #ccc;
    }
    textarea {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fdfdfd;
        font-family: "Courier New", Courier, monospace;
        font-size: 0.9em;
        resize: vertical;
        min-height: 80px;
    }
    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
        margin-bottom: 5px;
    }
    .result {
        border: 1px dashed #ccc;
        padding: 0 15px 15px 15px;
        border-radius: 5px;
        background: #fafafa;
    }
    ul { padding-left: 20px; }
    li { margin-bottom: 5px; }
    hr {
        border: 0;
        height: 1px;
        background: #ddd;
        margin-top: 30px;
    }
    table {
        width: 300px; 
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    th { background-color: #eee; }
    
    /* Responsividade simples para o layout de 2 colunas */
    @media (max-width: 900px) {
        .page-wrapper {
            flex-direction: column; /* Empilha as colunas */
        }
        nav.sidebar-index {
            width: 100%;
            box-sizing: border-box;
            position: static; /* Remove o 'sticky' */
            max-height: none; /* Remove altura máxima */
        }
    }
</style>
</head>
<body>
HTML;

// --- TÍTULO PRINCIPAL ---
echo '<h1 class="main-title">Estudo PHP: Arrays e Funções</h1>';

// --- INÍCIO DO WRAPPER DE 2 COLUNAS ---
echo '<div class="page-wrapper">';

// --- COLUNA 1: O ÍNDICE (NAVEGAÇÃO) ---
// *** LINK PARA ARRAY_COLUMN REMOVIDO DAQUI ***
echo <<<HTML
<nav class="sidebar-index">
    <h2>Índice da Apresentação</h2>
    <ul>
        <li><a href="#intro-debug">Introdução: Funções de Debug</a>
            <ul>
                <li><a href="#func-echo">echo</a></li>
                <li><a href="#func-print_r">print_r</a></li>
                <li><a href="#func-var_dump">var_dump</a></li>
            </ul>
        </li>
        <li><a href="#tipos-arrays">1. Tipos de Arrays em PHP</a>
            <ul>
                <li><a href="#array-numerico">Array Numérico (Indexado)</a></li>
                <li><a href="#array-associativo">Array Associativo</a></li>
                <li><a href="#add-array-numerico">Adicionando a Array Numérico</a></li>
                <li><a href="#add-array-associativo">Adicionando a Array Associativo</a></li>
                <li><a href="#array-multi">Array Multidimensional</a></li>
                <li><a href="#acessando-valores">Acessando Valores</a></li>
            </ul>
        </li>
        <li><a href="#funcoes">2. Funções e Estruturas de Controle</a>
            <ul>
                <li><a href="#funcoes-arrays">Funções de Manipulação</a></li>
                <li><a href="#funcoes-ordenacao">Funções de Ordenação</a></li>
                <li><a href="#func-foreach">Estrutura (foreach)</a></li>
            </ul>
        </li>
        <li><a href="#programas-praticos">3. Exemplos Práticos (Programas)</a>
            <ul>
                <li><a href="#programa-1">Programa 1: Array Unidimensional</a></li>
                <li><a href="#programa-2">Programa 2: Array Multidimensional</a></li>
                <li><a href="#programa-3">Programa 3: Uso de Funções</a></li>
                <li><a href="#analise-funcao-parametro">Análise de Função (Parâmetros)</a></li>
            </ul>
        </li>
    </ul>
</nav>
HTML;

// --- COLUNA 2: CONTEÚDO PRINCIPAL ---
echo '<main class="content">';

// --- SEÇÃO 0: FUNÇÕES DE SAÍDA E DEBUG (AGORA NO INÍCIO) ---
echo '<h1 id="intro-debug">Introdução: Funções de Saída e Debug</h1>';
echo '<p>Antes de manipular arrays, precisamos saber como "vê-los". Estas são funções essenciais para exibir informações e depurar o código.</p>';

// --- echo ---
echo '<h2 id="func-echo">echo</h2>';
echo '<p><code>echo</code> é um construtor de linguagem usado para exibir uma ou mais strings. Ele não é tecnicamente uma função (por isso não precisa de parênteses, embora possam ser usados).</p>';
echo '<h3>Quando utilizar:</h3>';
echo '<ul>';
echo '<li>Para exibir a saída final que o usuário deve ver (HTML, texto simples).</li>';
echo '<li>Para exibir o valor de uma variável simples dentro de uma frase.</li>';
echo '<li>É a forma mais comum e rápida de exibir dados formatados.</li>';
echo '</ul>';


$code = <<<EOT
\$texto = "Olá, mundo!";
\$numero = 123;

echo \$texto;
echo "<br>"; // Também pode exibir HTML
echo "O número é: " . \$numero;
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="7">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result" style="padding: 15px;">';
$texto = "Olá, mundo!";
$numero = 123;
echo $texto;
echo "<br>";
echo "O número é: " . $numero;
echo '</div>';

echo '<hr>';

// --- print_r ---
echo '<h2 id="func-print_r">print_r</h2>';
echo '<p><code>print_r()</code> exibe informações sobre uma variável em um formato legível para humanos. É especializada em exibir arrays e objetos de forma estruturada.</p>';
echo '<h3>Quando utilizar:</h3>';
echo '<ul>';
echo '<li>Durante o desenvolvimento e debug.</li>';
echo '<li>Para inspecionar rapidamente o <strong>conteúdo</strong> de um array ou objeto.</li>';
echo '<li>Quando você quer ver as chaves e os valores de um array, mas não precisa saber o tipo de dado de cada valor (diferente do `var_dump`).</li>';
echo '</ul>';


$code = <<<EOT
\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

echo "<pre>"; // Usar <pre> formata a saída do print_r
print_r(\$dados);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$dados_debug = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];
print_r($dados_debug);
echo '</pre></div>';

echo '<hr>';

// --- var_dump ---
echo '<h2 id="func-var_dump">var_dump</h2>';
echo '<p><code>var_dump()</code> exibe informações estruturadas sobre uma ou mais variáveis, incluindo seu <strong>tipo</strong>, <strong>tamanho</strong> e <strong>valor</strong>.</p>';
echo '<h3>Quando utilizar:</h3>';
echo '<ul>';
echo '<li>Durante o desenvolvimento e debug (é a ferramenta de debug mais detalhada).</li>';
echo '<li>Quando você precisa saber <em>exatamente</em> o que uma variável contém.</li>';
echo '<li>Essencial para diferenciar <code>0</code> (int), <code>"0"</code> (string), <code>false</code> (bool) e <code>null</code>, algo que `echo` ou `print_r` podem não mostrar claramente.</li>';
echo '</ul>';


$code = <<<EOT
\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];
\$fruta = "banana";

echo "<pre>"; // Usar <pre> formata a saída do var_dump
var_dump(\$fruta);
var_dump(\$dados);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="12">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$fruta_debug = "banana";
var_dump($fruta_debug);
var_dump($dados_debug);
echo '</pre></div>';

echo '<hr>';


// --- SEÇÃO 1: TIPOS DE ARRAYS ---
echo '<h1 id="tipos-arrays">1. Tipos de Arrays em PHP</h1>';

// --- Array Numérico ---
echo '<h2 id="array-numerico">Array Numérico (ou Indexado)</h2>';
echo '<p>É o tipo mais comum de array. As chaves são números inteiros, e se não forem especificadas, o PHP as atribui automaticamente, começando do índice <code>0</code>.</p>';

$code = <<<EOT
\$arrayNum = [
    'banana', // Chave 0
    'goiaba', // Chave 1
    'morango' // Chave 2
];

echo "<pre>";
print_r(\$arrayNum);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result"><pre>';
$arrayNum = [
    'banana',
    'goiaba',
    'morango'
];
print_r($arrayNum);
echo '</pre></div>';

echo '<hr>';

// --- Array Associativo ---
echo '<h2 id="array-associativo">Array Associativo</h2>';
echo '<p>Neste tipo de array, nós mesmos definimos as chaves. Elas são strings (texto) que "associamos" a um valor. É extremamente útil para organizar dados de forma clara.</p>';

$code = <<<EOT
\$arrayAssoc = [
    'nome' => 'Mauricio Rosa',
    'idade' => '31'
];

echo "<pre>";
print_r(\$arrayAssoc);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result"><pre>';
$arrayAssoc = [
    'nome' => 'Mauricio Rosa',
    'idade' => '31'
];
print_r($arrayAssoc);
echo '</pre></div>';

echo '<hr>';

// --- Adicionando em Array Numérico ---
echo '<h2 id="add-array-numerico">Adicionando valores a um Array Numérico</h2>';
echo '<p>Temos duas formas principais:</p>
<ul>
    <li>Usando <code>$array[] = "valor"</code>: O PHP adiciona o valor no final do array, pegando o próximo índice numérico disponível.</li>
    <li>Usando <code>$array[5] = "valor"</code>: Nós especificamos o índice exato. Note que o PHP permite "pular" índices (neste exemplo, o índice 4 não existirá).</li>
</ul>';

$code = <<<EOT
\$array = [
    'banana', // 0
    'goiaba', // 1
    'morango' // 2
];

// Adiciona 'pera' no próximo índice disponível (3)
\$array[] = 'pera'; 

// Adiciona 'abacaxi' especificamente no índice 5
\$array[5] = 'abacaxi';

echo "<pre>";
print_r(\$array);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="16">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result"><pre>';
$array = [
    'banana',
    'goiaba',
    'morango'
];
$array[] = 'pera';
$array[5] = 'abacaxi';
print_r($array);
echo '</pre></div>';

echo '<hr>';

// --- Adicionando em Array Associativo ---
echo '<h2 id="add-array-associativo">Adicionando/Alterando valores em Array Associativo</h2>';
echo '<p>Podemos adicionar novos pares chave-valor ou alterar valores existentes:</p>
<ul>
    <li><code>$array[\'nova_chave\'] = "valor"</code>: Cria um novo item no array.</li>
    <li><code>$array[\'chave_existente\'] = "novo_valor"</code>: Sobrescreve o valor daquela chave.</li>
    <li><strong>CUIDADO:</strong> Usar <code>$array[] = "valor"</code> em um array associativo faz o PHP criar um <em>índice numérico</em>. Se não houver nenhum, ele começa do <code>0</code>.</li>
</ul>';

$code = <<<EOT
\$array = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31
];

// 1. Adiciona uma nova chave 'instagram'
\$array['instagram'] = '@mauriciorosaa_';

// 2. Altera (sobrescreve) o valor da chave 'idade'
\$array['idade'] = '18';

// 3. (CUIDADO!) Adiciona um item usando [], o PHP cria a chave numérica [0]
\$array[] = 'bagunça';

echo "<pre>";
print_r(\$array);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="18">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result"><pre>';
$array = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31
];
$array['instagram'] = '@mauriciorosaa_';
$array['idade'] = '18';
$array[] = 'bagunça';
print_r($array);
echo '</pre></div>';

echo '<hr>';

// --- Array Multidimensional ---
echo '<h2 id="array-multi">Array Multidimensional</h2>';
echo '<p>Um array multidimensional é simplesmente um array que contém outros arrays. É muito usado para representar tabelas de dados (linhas e colunas), como um resultado de um banco de dados.</p>';

$code = <<<EOT
\$arrayMulti = [
    'pessoas' => [
        [
            'id'    => 1,
            'nome'  => 'Pedro Henrique',
            'idade' => 18
        ],
        [
            'id'    => 2,
            'nome'  => 'Danillo',
            'idade' => 30
        ],
        [
            'id'    => 3,
            'nome'  => 'Gustavo Zella',
            'idade' => 15
        ],
        [
            'id'    => 4,
            'nome'  => 'Maurício Rosaa',
            'idade' => 31
        ]
    ]  
];

echo "<pre>";
print_r(\$arrayMulti);
echo "</pre>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="28">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result"><pre>';
$arrayMulti = [
    'pessoas' => [
        [
            'id'    => 1,
            'nome'  => 'Pedro Henrique',
            'idade' => 18
        ],
        [
            'id'    => 2,
            'nome'  => 'Danillo',
            'idade' => 30
        ],
        [
            'id'    => 3,
            'nome'  => 'Gustavo Zella',
            'idade' => 15
        ],
        [
            'id'    => 4,
            'nome'  => 'Maurício Rosaa',
            'idade' => 31
        ]
    ]  
];
print_r($arrayMulti);
echo '</pre></div>';

echo '<hr>';

// --- Acessando Valores ---
echo '<h2 id="acessando-valores">Acessando Valores (Arrays Multidimensionais)</h2>';
echo '<p>Para acessar valores em arrays "aninhados" (um dentro do outro), usamos múltiplos colchetes <code>[]</code>, "mergulhando" um nível de cada vez.</p>';

$code = <<<EOT
// Usando o array da seção anterior...
// \$arrayMulti está definida acima
\$array = \$arrayMulti; // Apenas para encurtar

// 1. Acessando a lista (array) de 'pessoas'
echo "--- Lista completa de pessoas --- \n";
print_r(\$array['pessoas']);

// 2. Acessando a primeira pessoa (índice 0) da lista 'pessoas'
echo "\n--- Dados da primeira pessoa (índice 0) --- \n";
print_r(\$array['pessoas'][0]);

// 3. Acessando o 'nome' da primeira pessoa (índice 0)
echo "\n--- Nome da primeira pessoa --- \n";
echo \$array['pessoas'][0]['nome'];
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="15">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result"><pre>';
// Usando o array da seção anterior...
$array = $arrayMulti; // Apenas para encurtar

// 1. Acessando a lista (array) de 'pessoas'
echo "--- Lista completa de pessoas --- \n";
print_r($array['pessoas']);

// 2. Acessando a primeira pessoa (índice 0) da lista 'pessoas'
echo "\n--- Dados da primeira pessoa (índice 0) --- \n";
print_r($array['pessoas'][0]);

// 3. Acessando o 'nome' da primeira pessoa (índice 0)
echo "\n--- Nome da primeira pessoa --- \n";
echo $array['pessoas'][0]['nome'];
echo '</pre></div>';

echo '<hr>';


// --- SEÇÃO 2: FUNÇÕES E ESTRUTURAS ---
echo '<h1 id="funcoes">2. Funções e Estruturas de Controle</h1>';

// --- SEÇÃO DE ARRAYS ---
echo '<h2 id="funcoes-arrays">Funções de Manipulação de Arrays</h2>';

// --- ARRAYS DE EXEMPLO (Definição principal) ---
$frutas = [
    'banana',
    'goiaba',
    'morango'
];

$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null // 'email' existe, mas é nulo (importante para 'isset')
];

// --- count ---
echo '<h3 id="func-count">Função count</h3>';
echo '<p>Conta o número de elementos em um array.</p>';

$code = <<<EOT
// Arrays de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

echo 'Array frutas possui ' . count(\$frutas) . ' posições.';
echo "\n";
echo 'Array dados possui ' . count(\$dados) . ' posições.';
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="15">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo 'Array frutas possui ' . count($frutas) . ' posições.';
echo "\n";
echo 'Array dados possui ' . count($dados) . ' posições.';
echo '</pre></div>';
echo '<br>';

// --- array_keys ---
echo '<h3 id="func-array_keys">Função array_keys</h3>';
echo '<p>Retorna todas as chaves (índices) de um array.</p>';

$code = <<<EOT
// Arrays de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

echo "Chaves de \$frutas:\n";
print_r(array_keys(\$frutas));
echo "\nChaves de \$dados:\n";
print_r(array_keys(\$dados));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="18">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo "Chaves de \$frutas:\n";
print_r(array_keys($frutas));
echo "\nChaves de \$dados:\n";
print_r(array_keys($dados));
echo '</pre></div>';
echo '<br>';

// --- array_values ---
echo '<h3 id="func-array_values">Função array_values</h3>';
echo '<p>Retorna todos os valores de um array, resetando as chaves para índices numéricos.</p>';

$code = <<<EOT
// Arrays de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

echo "Valores de \$frutas:\n";
print_r(array_values(\$frutas));
echo "\nValores de \$dados:\n";
print_r(array_values(\$dados));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="18">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo "Valores de \$frutas:\n";
print_r(array_values($frutas));
echo "\nValores de \$dados:\n";
print_r(array_values($dados));
echo '</pre></div>';
echo '<br>';

// --- in_array ---
echo '<h3 id="func-in_array">Função in_array</h3>';
echo '<p>Verifica se um <strong>valor</strong> existe em um array. Retorna `true` ou `false`.</p>';

$code = <<<EOT
// Arrays de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

// Verifica se o *valor* 'banana' existe em \$frutas
echo "Valor 'banana' existe em \$frutas? ";
var_dump(in_array('banana', \$frutas));

// Verifica se o *valor* 'banana' existe em \$dados
echo "Valor 'banana' existe em \$dados? ";
var_dump(in_array('banana', \$dados));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="20">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo "Valor 'banana' existe em \$frutas? ";
var_dump(in_array('banana', $frutas));
echo "\nValor 'banana' existe em \$dados? ";
var_dump(in_array('banana', $dados)); echo ' // Retorna false, pois "banana" não é um *valor* em $dados.';
echo '</pre></div>';
echo '<br>';

// --- array_search ---
echo '<h3 id="func-array_search">Função array_search</h3>';
echo '<p>Procura por um <strong>valor</strong> em um array e retorna a <strong>chave</strong> (índice) correspondente se encontrado. Retorna `false` se não encontrar.</p>';

$code = <<<EOT
// Arrays de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

// Procura 'goiaba' em \$frutas e retorna a chave
echo "Chave do valor 'goiaba' em \$frutas: ";
var_dump(array_search('goiaba', \$frutas));

// Procura 32 em \$dados (não existe)
echo "Chave do valor 32 em \$dados: ";
var_dump(array_search(32, \$dados));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="20">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo "Chave do valor 'goiaba' em \$frutas: ";
var_dump(array_search('goiaba', $frutas)); echo ' // Retorna int(1), a chave do valor.';
echo "\nChave do valor 32 em \$dados: ";
var_dump(array_search(32, $dados)); echo ' // Retorna false, o valor não existe.';
echo '</pre></div>';
echo '<br>';


// --- isset vs array_key_exists ---
echo '<h3 id="func-isset-vs-array_key_exists">Funções isset vs. array_key_exists</h3>';
echo '<p>Uma confusão comum. <code>isset</code> verifica se uma chave existe <strong>E SEU VALOR NÃO É NULO</strong>. <code>array_key_exists</code> verifica <strong>APENAS</strong> se a chave existe, independentemente do valor.</p>';
echo '<p>Veja o exemplo com <code>$dados[\'email\']</code>, que existe mas tem o valor <code>null</code>:</p>';

$code = <<<EOT
// O array \$dados é:
\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

// Testando a chave 'email' (que é null):
echo "isset(\$dados['email']): ";
var_dump(isset(\$dados['email'])); // Retorna FALSE, pois o valor é null.

echo "array_key_exists('email', \$dados): ";
var_dump(array_key_exists('email', \$dados)); // Retorna TRUE, pois a chave 'email' existe.

echo "\n";

// Testando a chave 'idade' (que não é null):
echo "isset(\$dados['idade']): ";
var_dump(isset(\$dados['idade'])); // Retorna TRUE.

echo "array_key_exists('idade', \$dados): ";
var_dump(array_key_exists('idade', \$dados)); // Retorna TRUE.

echo "\n";

// Testando a chave 'cpf' (que não existe):
echo "isset(\$dados['cpf']): ";
var_dump(isset(\$dados['cpf'])); // Retorna FALSE.

echo "array_key_exists('cpf', \$dados): ";
var_dump(array_key_exists('cpf', \$dados)); // Retorna FALSE.
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="28">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
// Testando a chave 'email' (que é null):
echo "isset(\$dados['email']): ";
var_dump(isset($dados['email'])); // Retorna FALSE, pois o valor é null.

echo "array_key_exists('email', \$dados): ";
var_dump(array_key_exists('email', $dados)); // Retorna TRUE, pois a chave 'email' existe.

echo "\n";

// Testando a chave 'idade' (que não é null):
echo "isset(\$dados['idade']): ";
var_dump(isset($dados['idade'])); // Retorna TRUE.

echo "array_key_exists('idade', \$dados): ";
var_dump(array_key_exists('idade', $dados)); // Retorna TRUE.

echo "\n";

// Testando a chave 'cpf' (que não existe):
echo "isset(\$dados['cpf']): ";
var_dump(isset($dados['cpf'])); // Retorna FALSE.

echo "array_key_exists('cpf', \$dados): ";
var_dump(array_key_exists('cpf', $dados)); // Retorna FALSE.
echo '</pre></div>';
echo '<br>';


// --- array_key_first / array_key_last ---
echo '<h3 id="func-array_key_first_last">Funções array_key_first e array_key_last</h3>';
echo '<p>Retornam a primeira e a última chave de um array, respectivamente. (PHP 7.3+)</p>';

$code = <<<EOT
// Arrays de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

\$dados = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'email' => null
];

echo "Primeira chave de \$frutas: " . array_key_first(\$frutas);
echo "\n";
echo "Primeira chave de \$dados: " . array_key_first(\$dados);
echo "\n\n";
echo "Última chave de \$frutas: " . array_key_last(\$frutas);
echo "\n";
echo "Última chave de \$dados: " . array_key_last(\$dados);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="20">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo "Primeira chave de \$frutas: " . array_key_first($frutas);
echo "\n";
echo "Primeira chave de \$dados: " . array_key_first($dados);
echo "\n\n";
echo "Última chave de \$frutas: " . array_key_last($frutas);
echo "\n";
echo "Última chave de \$dados: " . array_key_last($dados);
echo '</pre></div>';
echo '<br>';

// --- array_flip ---
echo '<h3 id="func-array_flip">Função array_flip</h3>';
echo '<p>Inverte as chaves de um array com seus valores.</p>';

$code = <<<EOT
// Array de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

// Note que os valores devem ser tipos válidos para chaves (string ou int)
print_r(array_flip(\$frutas));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
print_r(array_flip($frutas));
echo '</pre></div>';
echo '<br>';

// --- implode ---
echo '<h3 id="func-implode">Função implode</h3>';
echo '<p>Junta os elementos de um array em uma única string, usando um "separador" (cola).</p>';

$code = <<<EOT
// Array de exemplo
\$frutas = [
    'banana',
    'goiaba',
    'morango'
];

// Junta o array \$frutas com ", "
echo(implode(', ', \$frutas));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
echo(implode(', ', $frutas));
echo '</pre></div>';
echo '<br>';

// --- explode ---
echo '<h3 id="func-explode">Função explode</h3>';
echo '<p>Divide uma string em um array, usando um "delimitador". É o oposto de `implode`.</p>';

$code = <<<EOT
$string = "maçã,banana,laranja";
// Separa a string em um array usando a vírgula ',' como delimitador
print_r(explode(',', \$string));
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="3">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$string = "maçã,banana,laranja";
print_r(explode(',', $string));
echo '</pre></div>';
echo '<br>';

// --- array_push ---
echo '<h3 id="func-array_push">Função array_push</h3>';
echo '<p>Adiciona um ou mais elementos ao <strong>final</strong> de um array. Esta função altera o array original.</p>';

$code = <<<EOT
\$frutas_push = ['banana', 'goiaba', 'morango'];
echo "Array antes:\n";
print_r(\$frutas_push);

// Adiciona 'abacaxi' e 'uva' ao final
array_push(\$frutas_push, 'abacaxi', 'uva');

echo "\nArray depois:\n";
print_r(\$frutas_push);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="10">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$frutas_push = ['banana', 'goiaba', 'morango'];
echo "Array antes:\n";
print_r($frutas_push);

// Adiciona 'abacaxi' e 'uva' ao final
array_push($frutas_push, 'abacaxi', 'uva');

echo "\nArray depois:\n";
print_r($frutas_push);
echo '</pre></div>';
echo '<br>';

// --- array_merge ---
echo '<h3 id="func-array_merge">Função array_merge</h3>';
echo '<p>Junta (mescla) dois ou mais arrays em um <strong>novo</strong> array. O comportamento difere entre chaves numéricas e chaves string (associativas).</p>
<ul>
    <li><strong>Chaves numéricas:</strong> Os arrays são adicionados ao final e as chaves são reindexadas (começando do zero).</li>
    <li><strong>Chaves string:</strong> Se a mesma chave string existir em mais de um array, o valor do <strong>último</strong> array sobrescreverá os anteriores.</li>
</ul>';

$code = <<<EOT
// Exemplo 1: Arrays numéricos (chaves são reindexadas)
\$array1 = ['a', 'b'];
\$array2 = [1 => 'c', 2 => 'd', 3 => 'e']; // Chaves 1, 2, 3
\$resultado_num = array_merge(\$array1, \$array2);

echo "Mesclagem de arrays numéricos (reindexados):\n";
print_r(\$resultado_num); // Resultado terá chaves 0, 1, 2, 3, 4

// Exemplo 2: Arrays associativos (chaves string)
\$user1 = ['nome' => 'Mauricio', 'idade' => 31];
\$user2 = ['idade' => 32, 'profissao' => 'Analista']; // 'idade' vai sobrescrever
\$resultado_assoc = array_merge(\$user1, \$user2);

echo "\nMesclagem de arrays associativos (chaves iguais são sobrescritas):\n";
print_r(\$resultado_assoc);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="16">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
// Exemplo 1: Arrays numéricos (chaves são reindexadas)
$array1 = ['a', 'b'];
$array2 = [1 => 'c', 2 => 'd', 3 => 'e'];
$resultado_num = array_merge($array1, $array2);

echo "Mesclagem de arrays numéricos (reindexados):\n";
print_r($resultado_num);

// Exemplo 2: Arrays associativos (chaves string)
$user1 = ['nome' => 'Mauricio', 'idade' => 31];
$user2 = ['idade' => 32, 'profissao' => 'Analista']; // 'idade' vai sobrescrever
$resultado_assoc = array_merge($user1, $user2);

echo "\nMesclagem de arrays associativos (chaves iguais são sobrescritas):\n";
print_r($resultado_assoc);
echo '</pre></div>';

echo '<br>';

// --- *** SEÇÃO array_column (NO LUGAR CORRETO) *** ---
echo '<h3 id="func-array_column">Função array_column</h3>';
echo '<p>Extrai os valores de uma única coluna (chave) de um array multidimensional. É extremamente útil para isolar dados, como fizemos no "Programa 3" para pegar apenas as notas.</p>';

$code = <<<EOT
// Array multidimensional de exemplo
\$alunos = [
    [ 'id' => 1, 'nome' => 'Ana', 'nota' => 9.5 ],
    [ 'id' => 2, 'nome' => 'Bruno', 'nota' => 7.0 ],
    [ 'id' => 3, 'nome' => 'Carla', 'nota' => 8.5 ]
];

// 1. Extrai apenas os valores da coluna 'nome'
\$nomes = array_column(\$alunos, 'nome');

echo "Array apenas com os nomes:\n";
print_r(\$nomes);

// 2. Extrai as notas, mas usa a coluna 'id' como chave do NOVO array
\$notas_por_id = array_column(\$alunos, 'nota', 'id');

echo "\nArray de notas, indexado pelo ID do aluno:\n";
print_r(\$notas_por_id);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="18">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
// Array multidimensional de exemplo
$alunos_column_ex = [
    [ 'id' => 1, 'nome' => 'Ana', 'nota' => 9.5 ],
    [ 'id' => 2, 'nome' => 'Bruno', 'nota' => 7.0 ],
    [ 'id' => 3, 'nome' => 'Carla', 'nota' => 8.5 ]
];

// 1. Extrai apenas os valores da coluna 'nome'
$nomes = array_column($alunos_column_ex, 'nome');

echo "Array apenas com os nomes:\n";
print_r($nomes);

// 2. Extrai as notas, mas usa a coluna 'id' como chave do NOVO array
$notas_por_id = array_column($alunos_column_ex, 'nota', 'id');

echo "\nArray de notas, indexado pelo ID do aluno:\n";
print_r($notas_por_id);
echo '</pre></div>';

echo '<hr>';
// --- FIM DA SEÇÃO ---


// --- Bloco de Ordenação ---
echo '<h2 id="funcoes-ordenacao">Funções de Ordenação</h2>';

// --- sort ---
echo '<h3 id="func-sort">Função sort</h3>';
echo '<p>Ordena os valores de um array em ordem crescente (A-Z, 0-9). As chaves são perdidas/resetadas.</p>';

$code = <<<EOT
\$frutas_sort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r(\$frutas_sort);

sort(\$frutas_sort); // Ordena

echo "\nDepois:\n";
print_r(\$frutas_sort);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$frutas_sort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r($frutas_sort);
sort($frutas_sort);
echo "\nDepois:\n";
print_r($frutas_sort);
echo '</pre></div>';
echo '<br>';

// --- asort ---
echo '<h3 id="func-asort">Função asort</h3>';
echo '<p>Ordena os valores de um array em ordem crescente (A-Z, 0-9), <strong>mantendo a associação chave-valor</strong>.</p>';

$code = <<<EOT
\$frutas_asort = [
    0 => 'banana', 
    1 => 'goiaba', 
    2 => 'morango', 
    3 => 'abacaxi'
];
echo "Antes:\n";
print_r(\$frutas_asort);

asort(\$frutas_asort); // Ordena

echo "\nDepois (note que as chaves 3, 0, 1, 2 foram mantidas):\n";
print_r(\$frutas_asort);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="14">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$frutas_asort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r($frutas_asort);
asort($frutas_asort);
echo "\nDepois (note que as chaves 3, 0, 1, 2 foram mantidas):\n";
print_r($frutas_asort);
echo '</pre></div>';
echo '<br>';

// --- rsort ---
echo '<h3 id="func-rsort">Função rsort</h3>';
echo '<p>Ordena os valores de um array em ordem decrescente (Z-A, 9-0). As chaves são perdidas/resetadas.</p>';

$code = <<<EOT
\$frutas_rsort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r(\$frutas_rsort);

rsort(\$frutas_rsort); // Ordena

echo "\nDepois:\n";
print_r(\$frutas_rsort);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$frutas_rsort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r($frutas_rsort);
rsort($frutas_rsort);
echo "\nDepois:\n";
print_r($frutas_rsort);
echo '</pre></div>';
echo '<br>';

// --- arsort ---
echo '<h3 id="func-arsort">Função arsort</h3>';
echo '<p>Ordena os valores de um array em ordem decrescente (Z-A, 9-0), <strong>mantendo a associação chave-valor</strong>.</p>';

$code = <<<EOT
\$frutas_arsort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r(\$frutas_arsort);

arsort(\$frutas_arsort); // Ordena

echo "\nDepois (note que as chaves 2, 1, 0, 3 foram mantidas):\n";
print_r(\$frutas_arsort);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="9">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$frutas_arsort = ['banana', 'goiaba', 'morango', 'abacaxi'];
echo "Antes:\n";
print_r($frutas_arsort);
arsort($frutas_arsort);
echo "\nDepois (note que as chaves 2, 1, 0, 3 foram mantidas):\n";
print_r($frutas_arsort);
echo '</pre></div>';
echo '<br>';

// --- ksort ---
echo '<h3 id="func-ksort">Função ksort</h3>';
echo '<p>Ordena um array pelas <strong>chaves</strong> em ordem crescente (A-Z, 0-9).</p>';

$code = <<<EOT
\$dados_ksort = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'a_chave' => 'b',
    'email' => null
];
echo "Antes:\n";
print_r(\$dados_ksort);

ksort(\$dados_ksort); // Ordena pelas chaves

echo "\nDepois ('a_chave', 'email', 'idade', 'nome'):\n";
print_r(\$dados_ksort);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="14">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$dados_ksort = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'a_chave' => 'b',
    'email' => null
];
echo "Antes:\n";
print_r($dados_ksort);
ksort($dados_ksort);
echo "\nDepois ('a_chave', 'email', 'idade', 'nome'):\n";
print_r($dados_ksort);
echo '</pre></div>';
echo '<br>';

// --- krsort ---
echo '<h3 id="func-krsort">Função krsort</h3>';
echo '<p>Ordena um array pelas <strong>chaves</strong> em ordem decrescente (Z-A, 9-0).</p>';

$code = <<<EOT
\$dados_krsort = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'a_chave' => 'b',
    'email' => null
];
echo "Antes:\n";
print_r(\$dados_krsort);

krsort(\$dados_krsort); // Ordena pelas chaves

echo "\nDepois ('nome', 'idade', 'email', 'a_chave'):\n";
print_r(\$dados_krsort);
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="14">' . htmlspecialchars($code) . '</textarea>';

echo '<h4>Resultado:</h4>';
echo '<div class="result"><pre>';
$dados_krsort = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31,
    'a_chave' => 'b',
    'email' => null
];
echo "Antes:\n";
print_r($dados_krsort);
krsort($dados_krsort);
echo "\nDepois ('nome', 'idade', 'email', 'a_chave'):\n";
print_r($dados_krsort);
echo '</pre></div>';
echo '<hr>';

// --- foreach ---
echo '<h2 id="func-foreach">Estrutura de Controle (foreach)</h2>';
echo '<p><code>foreach</code> não é uma função, mas sim um <strong>construtor de linguagem</strong> (<em>language construct</em>) essencial para iterar (percorrer) facilmente arrays e objetos.</p>';
echo '<ul>';
echo '<li><strong>Sintaxe 1 (<code>foreach ($array as $valor)</code>):</strong> Usada para obter apenas os valores. Ideal para arrays numéricos simples.</li>';
echo '<li><strong>Sintaxe 2 (<code>foreach ($array as $chave => $valor)</code>):</strong> Usada para obter tanto a chave quanto o valor. Essencial para arrays associativos.</li>';
echo '</ul>';

$code = <<<EOT
// Arrays de exemplo
\$frutas_foreach = ['banana', 'goiaba', 'morango'];
\$dados_foreach = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31
];

echo "<h3>Sintaxe 1: Percorrendo \$frutas (apenas valores)</h3>";
echo "<ul>";
foreach (\$frutas_foreach as \$fruta) {
    echo "<li>" . \$fruta . "</li>";
}
echo "</ul>";

echo "\n<h3>Sintaxe 2: Percorrendo \$dados (chave e valor)</h3>";
echo "<ul>";
foreach (\$dados_foreach as \$chave => \$valor) {
    echo "<li><strong>" . \$chave . ":</strong> " . \$valor . "</li>";
}
echo "</ul>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="20">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result" style="padding: 15px;">';
// Arrays de exemplo
$frutas_foreach = ['banana', 'goiaba', 'morango'];
$dados_foreach = [
    'nome' => 'Mauricio Rosa',
    'idade' => 31
];

echo "<h3>Sintaxe 1: Percorrendo \$frutas (apenas valores)</h3>";
echo "<ul>";
foreach ($frutas_foreach as $fruta) {
    echo "<li>" . $fruta . "</li>";
}
echo "</ul>";

echo "\n<h3>Sintaxe 2: Percorrendo \$dados (chave e valor)</h3>";
echo "<ul>";
foreach ($dados_foreach as $chave => $valor) {
    echo "<li><strong>" . $chave . ":</strong> " . $valor . "</li>";
}
echo "</ul>";
echo '</div>';
echo '<hr>';


// --- SEÇÃO 3: PROGRAMAS PRÁTICOS ---
echo '<h1 id="programas-praticos">3. Exemplos Práticos (Programas)</h1>';

// --- Programa 1: Array Unidimensional ---
echo '<h2 id="programa-1">Programa 1: Array Unidimensional (Lista de Frutas)</h2>';
echo '<p>Este programa demonstra a <strong>criação</strong> de uma lista de frutas (array numérico). Em seguida, ele <strong>manipula</strong> o array adicionando dois novos itens. Finalmente, ele <strong>exibe</strong> a lista completa e o total de itens.</p>';

$code = <<<EOT
// 1. Criação do Array
\$frutas_prog1 = ['Maçã', 'Banana', 'Uva'];

echo "<h3>Lista Inicial:</h3>";
echo "<pre>";
print_r(\$frutas_prog1);
echo "</pre>";

// 2. Manipulação (Adicionando itens)
array_push(\$frutas_prog1, 'Laranja', 'Morango');

// 3. Exibição
echo "<h3>Minha Cesta de Frutas Atualizada:</h3>";
echo "<ul>";

foreach (\$frutas_prog1 as \$fruta) {
    echo "<li>" . \$fruta . "</li>";
}

echo "</ul>";
echo "<p><strong>Total de frutas:</strong> " . count(\$frutas_prog1) . "</p>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="19">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result" style="padding: 15px;">';
// 1. Criação do Array
$frutas_prog1 = ['Maçã', 'Banana', 'Uva'];

echo "<h3>Lista Inicial:</h3>";
echo "<pre>";
print_r($frutas_prog1);
echo "</pre>";

// 2. Manipulação (Adicionando itens)
array_push($frutas_prog1, 'Laranja', 'Morango');

// 3. Exibição
echo "<h3>Minha Cesta de Frutas Atualizada:</h3>";
echo "<ul>";

foreach ($frutas_prog1 as $fruta) {
    echo "<li>" . $fruta . "</li>";
}

echo "</ul>";
echo "<p><strong>Total de frutas:</strong> " . count($frutas_prog1) . "</p>";
echo '</div>';

echo '<hr>';

// --- Programa 2: Array Multidimensional ---
echo '<h2 id="programa-2">Programa 2: Array Multidimensional (Notas de Alunos)</h2>';
echo '<p>Este programa <strong>cria</strong> um array multidimensional para armazenar nomes e notas de alunos. Cada item do array principal é um array associativo. Ele <strong>manipula</strong> a lista adicionando um novo aluno. Por fim, <strong>exibe</strong> todos os alunos e suas notas em uma tabela HTML.</p>';

$code = <<<EOT
// 1. Criação do array multidimensional
\$alunos_prog2 = [
    [ 'nome' => 'Ana', 'nota' => 9.5 ],
    [ 'nome' => 'Bruno', 'nota' => 7.0 ],
    [ 'nome' => 'Carla', 'nota' => 8.5 ]
];

// 2. Manipulação (Adicionar novo aluno)
// Usando a sintaxe [] para adicionar ao final
\$alunos_prog2[] = [ 'nome' => 'Daniel', 'nota' => 6.0 ];

// 3. Exibição (em uma tabela)
echo "<h2>Notas da Turma</h2>";
echo "<table>";
echo "<tr><th>Aluno</th><th>Nota</th></tr>";

foreach (\$alunos_prog2 as \$aluno) {
    echo "<tr>";
    echo "<td>" . \$aluno['nome'] . "</td>";
    echo "<td>" . \$aluno['nota'] . "</td>";
    echo "</tr>";
}

echo "</table>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="22">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result" style="padding: 15px;">';
// 1. Criação do array multidimensional
$alunos_prog2 = [
    [ 'nome' => 'Ana', 'nota' => 9.5 ],
    [ 'nome' => 'Bruno', 'nota' => 7.0 ],
    [ 'nome' => 'Carla', 'nota' => 8.5 ]
];

// 2. Manipulação (Adicionar novo aluno)
$alunos_prog2[] = [ 'nome' => 'Daniel', 'nota' => 6.0 ];

// 3. Exibição (em uma tabela)
echo "<h2>Notas da Turma</h2>";
echo "<table>";
echo "<tr><th>Aluno</th><th>Nota</th></tr>";

foreach ($alunos_prog2 as $aluno) {
    echo "<tr>";
    echo "<td>" . $aluno['nome'] . "</td>";
    echo "<td>" . $aluno['nota'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo '</div>';

echo '<hr>';

// --- Programa 3: Função Definida pelo Usuário ---
echo '<h2 id="programa-3">Programa 3: Uso de Funções (Calcular Média)</h2>';
echo '<p>Este programa demonstra a <strong>criação</strong> de uma função reutilizável chamada <code>calcularMedia()</code>. Esta função recebe um array de números e retorna a média. Em seguida, usamos essa função para <strong>calcular e exibir</strong> a média das notas dos alunos (do exemplo anterior).</p>';

$code = <<<EOT
// Array de alunos (o mesmo do Programa 2)
\$alunos_prog3 = [
    [ 'nome' => 'Ana', 'nota' => 9.5 ],
    [ 'nome' => 'Bruno', 'nota' => 7.0 ],
    [ 'nome' => 'Carla', 'nota' => 8.5 ],
    [ 'nome' => 'Daniel', 'nota' => 6.0 ]
];

// 1. Criação da Função
// Esta função recebe um array de números e retorna a média
function calcularMedia(\$notas) {
    // Garante que não haverá divisão por zero
    if (count(\$notas) == 0) {
        return 0; 
    }
    
    \$total = 0;
    foreach (\$notas as \$nota) {
        \$total += \$nota; // Soma todas as notas
    }
    
    \$quantidade = count(\$notas);
    return \$total / \$quantidade; // Retorna o resultado
}

// 2. Manipulação (Extrair as notas do array)
// Usamos array_column para pegar só a coluna 'nota'
\$notas_apenas = array_column(\$alunos_prog3, 'nota');

echo "Array de notas extraído para o cálculo:\n";
echo "<pre>";
print_r(\$notas_apenas);
echo "</pre>";

// 3. Chamada da Função
\$media_turma = calcularMedia(\$notas_apenas);

// Exibe o resultado formatado
echo "<h3>A média da turma é: " . number_format(\$media_turma, 2, ',', '.') . "</h3>";
EOT;
echo '<label>Código:</label>';
echo '<textarea readonly rows="34">' . htmlspecialchars($code) . '</textarea>';

echo '<h3>Resultado:</h3>';
echo '<div class="result" style="padding: 15px;">';
// Array de alunos (o mesmo do Programa 2)
$alunos_prog3 = [
    [ 'nome' => 'Ana', 'nota' => 9.5 ],
    [ 'nome' => 'Bruno', 'nota' => 7.0 ],
    [ 'nome' => 'Carla', 'nota' => 8.5 ],
    [ 'nome' => 'Daniel', 'nota' => 6.0 ]
];

// 1. Criação da Função
// Esta função recebe um array de números e retorna a média
if (!function_exists('calcularMedia')) { // Evita redeclarar a função se já existir
    function calcularMedia($notas) {
        if (count($notas) == 0) {
            return 0; 
        }
        
        $total = 0;
        foreach ($notas as $nota) {
            $total += $nota; 
        }
        
        $quantidade = count($notas);
        return $total / $quantidade; 
    }
}

// 2. Manipulação (Extrair as notas do array)
$notas_apenas = array_column($alunos_prog3, 'nota');

echo "Array de notas extraído para o cálculo:\n";
echo "<pre>";
print_r($notas_apenas);
echo "</pre>";

// 3. Chamada da Função
$media_turma = calcularMedia($notas_apenas);

// Exibe o resultado formatado
echo "<h3>A média da turma é: " . number_format($media_turma, 2, ',', '.') . "</h3>";
echo '</div>';


// --- SEÇÃO DE ANÁLISE DA FUNÇÃO ---
echo '<hr>';
echo '<h2 id="analise-funcao-parametro">Análise de Função: O que é um Parâmetro?</h2>';
echo '<p>Vamos "destrinchar" a função <code>calcularMedia()</code> do Programa 3. Ela é um exemplo perfeito de como e por que usamos <strong>parâmetros</strong>.</p>';

echo '<h3>O que é um Parâmetro?</h3>';
echo '<p>Um parâmetro é como uma <strong>"caixa de entrada"</strong> ou um <strong>"placeholder"</strong> para uma função. É uma variável especial que a função declara entre parênteses <code>()</code>.</p>';
echo '<ul>';
echo '    <li>A função <code>calcularMedia(<strong>$notas</strong>)</code> diz: "Eu sou uma máquina de calcular médias. Para eu funcionar, você <strong>precisa</strong> me entregar um valor, e qualquer valor que você me entregar, eu vou chamar de <code>$notas</code> aqui dentro."</li>';
echo '    <li>O objetivo é tornar a função <strong>reutilizável</strong>. A função não sabe e não se importa se o array lá fora se chama <code>$notas_apenas</code>, <code>$notas_turma_A</code> ou <code>$teste</code>. Ela só sabe que o que ela *recebe*, ela vai tratar pelo nome de <code>$notas</code>.</li>';
echo '</ul>';

echo '<p>Vamos analisar o fluxo passo a passo:</p>';

echo '<h3>Passo 1: A Definição da Função</h3>';
echo '<p>Aqui, nós criamos a "receita" ou o "manual de instruções" da nossa máquina.</p>';
echo '<pre class="analysis-box">
function calcularMedia(<strong>$notas</strong>) {
    // ... código aqui dentro ...
    // A variável $notas SÓ EXISTE aqui dentro.
}
</pre>';
echo '<p>A variável <code>$notas</code> é o <strong>parâmetro</strong> (o placeholder).</p>';

echo '<h3>Passo 2: A Preparação do Dado (O Valor Real)</h3>';
echo '<p>Antes de chamar a função, precisamos ter o dado que vamos enviar para ela. Em nosso exemplo, usamos <code>array_column()</code> para extrair apenas as notas do array de alunos.</p>';
echo '<pre class="analysis-box">
// $alunos_prog3 é o array multidimensional...
$notas_apenas = array_column($alunos_prog3, \'nota\');

// Agora, $notas_apenas vale: [9.5, 7.0, 8.5, 6.0]
</pre>';
echo '<p>A variável <code>$notas_apenas</code> é chamada de <strong>argumento</strong>. É o *valor real* que vamos passar.</p>';


echo '<h3>Passo 3: A Chamada da Função (A "Mágica")</h3>';
echo '<p>Esta é a linha mais importante, onde conectamos o "valor real" com o "placeholder".</p>';
echo '<pre class="analysis-box">
$media_turma = calcularMedia(<strong>$notas_apenas</strong>);
</pre>';
echo '<p>Quando o PHP lê essa linha, ele faz o seguinte:</p>';
echo '<ol>';
echo '    <li>Pega o valor da variável-argumento (<code>$notas_apenas</code>, que é o array <code>[9.5, 7.0, 8.5, 6.0]</code>).</li>';
echo '    <li>"Entrega" esse valor para a função <code>calcularMedia</code>.</li>';
echo '    <li>A função <code>calcularMedia</code> recebe esse array e o armazena em sua variável-parâmetro (<code>$notas</code>).</li>';
echo '    <li>Neste exato momento, <strong>dentro da função</strong>, <code>$notas</code> passa a valer <code>[9.5, 7.0, 8.5, 6.0]</code>.</li>';
echo '</ol>';


echo '<h3>Passo 4: A Execução e o Retorno</h3>';
echo '<p>Agora, a função executa seu código interno usando a variável <code>$notas</code> (que contém nosso array):</p>';
echo '<pre class="analysis-box">
    // ...
    // $total = 0;
    // foreach (<strong>$notas</strong> as $nota) { ... }
    // ...
    // $quantidade = count(<strong>$notas</strong>);
    // return $total / $quantidade; // Ex: 31 / 4 = 7.75
}
</pre>';
echo '<ul>';
echo '    <li>O <code>foreach</code> percorre o array <code>$notas</code>.</li>';
echo '    <li>A função calcula o resultado (ex: 7.75).</li>';
echo '    <li>A palavra-chave <code>return</code> "cospe" esse resultado para <strong>fora</strong> da função.</li>';
echo '</ul>';

echo '<h3>Passo 5: O Resultado Final</h3>';
echo '<p>O valor retornado (7.75) é então armazenado na variável que "pediu" a chamada, a <code>$media_turma</code>.</p>';
echo '<pre class="analysis-box">
// $media_turma = 7.75;
echo "A média da turma é: " . number_format($media_turma, 2, \',\', \'.\');
</pre>';

echo '<hr>';
echo '<h3>Conclusão: As funções precisam de parâmetros?</h3>';
echo '<p><strong>Sim, funções precisam de parâmetros sempre que precisam de dados externos para realizar sua tarefa.</strong></p>';
echo '<p>Se a função <code>calcularMedia</code> não tivesse um parâmetro, ela não teria como saber *quais* notas ela deveria calcular. O parâmetro é a "porta de entrada" dos dados. Isso nos permite usar a *mesma função* para calcular a média de qualquer array:</p>';


// --- Código de Exemplo da Análise ---
$code_reuso = <<<EOT
// Array de notas da Turma A
\$notas_turma_A = [9.5, 7.0, 8.5, 6.0];

// Array de notas da Turma B
\$notas_turma_B = [10.0, 8.0, 5.5];

// Usamos A MESMA FUNÇÃO para ambos!
\$media_A = calcularMedia(\$notas_turma_A);
\$media_B = calcularMedia(\$notas_turma_B);

echo "Média Turma A: " . \$media_A;
echo "<br>";
echo "Média Turma B: " . number_format(\$media_B, 2);
EOT;

echo '<label>Exemplo de Reutilização:</label>';
echo '<textarea readonly rows="14">' . htmlspecialchars($code_reuso) . '</textarea>';

echo '<h3>Resultado da Reutilização:</h3>';
echo '<div class="result" style="padding: 15px;">';

// Array de notas da Turma A
$notas_turma_A = [9.5, 7.0, 8.5, 6.0];
// Array de notas da Turma B
$notas_turma_B = [10.0, 8.0, 5.5];

// Usamos A MESMA FUNÇÃO para ambos!
$media_A = calcularMedia($notas_turma_A);
$media_B = calcularMedia($notas_turma_B);

echo "Média Turma A: " . $media_A;
echo "<br>";
echo "Média Turma B: " . number_format($media_B, 2);

echo '</div>';


// --- FIM DO CONTEÚDO PRINCIPAL ---
echo '</main>';

// --- FIM DO WRAPPER DE 2 COLUNAS ---
echo '</div>'; 

// --- FIM DO DOCUMENTO HTML ---
echo '</body></html>';

?>
<?php

require_once 'trataeMostra.php';
require_once 'calculadora.php';
/*Neste trexo do programa temos o programa principal da solução ou código de controle
este, por sua vez é responsavel por receber dados, validar e exibir o resultado.
*/

// recepção dos dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //RECEBENDO OS VALORES E A OPERAÇÃO

    $valor1 = $_POST['valor1'] ?? '';
    $valor2 = $_POST['valor2'] ?? '';
    $operacao = $_POST['operacao'] ?? '';




    /* converte e valida os números recebidos a partir  
    da chamada do método estático parse_num()
    que encontra-se na classe estática Calculadora*/


    $val1 = trataeMostra::parse_num($valor1);
    $val2 = trataeMostra::parse_num($valor2);

    $result = null;
    $error = null;

    //Verificar se há erro de entrada ou de operação.

    if ($val1 === null || $val2 === null) {
        $error = 'Entrada Inválida. Certifique-se de informar números válidos';
    } else {
        /*De acordo com a operção escolhida, executa a operação a partir da chamada do métoda estático correspondente 
    da operação que encontra-se na classe estática Calculadora.*/

        switch ($operacao) {

            case 'somar':
                $result = Calculadora::somar($val1, $val2);
                /*A linha $result = Calculadora::somar($val1, $val2); 
                    chama o método estático somar da classe Calculadora 
                    para somar dois valores e armazenar o resultado em 
                    $result. Esse método recebe dois parâmetros, $val1 e 
                    $val2, e retorna a soma deles. */
                break;
            case 'subtrair':
                $result = Calculadora::subtrair($val1, $val2);
                break;
            case 'multiplicar':
                $result = Calculadora::multiplicar($val1, $val2);
                break;
            case 'dividir':
                if ($val2 == 0) {
                    $error = 'Divisão por zero não permitido';
                } else {
                    $result = Calculadora::dividir($val1, $val2);
                }
                break;
            default:
                $error = 'Operação desconhecida.';
        } //Finaliza o Switch
    } //Finaliza o else


    /*Exibir resultado chamado o método estático exibirResultado()
 que encontra-se na classe estática Calculadora.
*/
    trataeMostra::exibirResultado($error, $operacao, $val1, $val2, $result);
}

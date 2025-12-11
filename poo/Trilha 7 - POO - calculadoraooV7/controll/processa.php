

<?php

require_once '../model/Operacoes.php';
require_once '../view/TrataeMostra.php';
require_once '../model/Soma.php';
require_once '../model/Subtracao.php';
require_once '../model/Multiplicacao.php';
require_once '../model/Divisao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $valor1 = $_POST['valor1'] ?? '';
    $valor2 = $_POST['valor2'] ?? '';
    $operacao = $_POST['operacao'] ?? '';

    /*Conver e valida os numeros recebidos da chamada do método estático 
    parse-num() que encontra-se na classe estatica Calculadora */
    $val1 = TrataeMostra::parse_num($valor1);
    $val2 = TrataeMostra::parse_num($valor2);

    $result = null;
    $error = null;



    /*Cria o objeto oper e inicializa com null pois 
    este, dependendo da operação escolhida, assumirá 
    como valor esta operação*/

    $oper = null;

    //verifica se há erro de entrada ou de operacão

    if ($val1 === null || $val2 === null) {

        $error = 'Entrada inválida. Certifica-se de informar números válidos.';
    } else {
        /*De acordo com a opreração escolhida, criará a instancia de classe
        correspondente a opração escolhida, e a partir dai,
        por inermedio do objeto da classe, vai acessar os métodos da classe 
        instanciada para efetuar o cálculo da operação*/

        switch ($operacao) {
            case 'somar':
                        $oper = new Soma();
                break;

            case 'subtrair':
                        $oper = new Subtracao();
                break;

            case 'multiplicar':
                        $oper = new Multiplicacao();
                break;

            case 'dividir':
                if ($val2 == 0) {
                    $error = 'Não é permitido divisão por zero!';
                    break;
                } else {
                    $oper = new Divisao();
                }

                break;
            default:
                $error = 'Operação desconhecida';
        }//finaliza o Switch
        if($error === null){
        $oper->setNum1($val1);
        $oper->setNum2($val2);
        $result = $oper->calcula();
        
        $_SESSION['resultado']=[
            'error'=>$error,
            'operacao'=>$operacao,
            'val1'=>$val1,
            'val2'=>$val2,
            'result'=>$result,
        ];

    }//finaliza o else
    }
    header("Location: ../view/Layout.php");
    exit;
}
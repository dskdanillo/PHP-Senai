<?php

// --- CLASS: Calculadora (métodos estático) ---

final class Calculadora {
    //Método estático Soma
    public static function somar(float $a, float $b) : float{
        return $a + $b;
    }
    //Método estático Subtração
    public static function subtrair(float $a, float $b) : float{
        return $a - $b;
    }
    //Método estático para Multiplicação
    public static function multiplicar(float $a, float $b) : float{
        return $a * $b;
    }
    //Método estática Diivisão com chegaram de divisão por zero
    public static function dividir(float $a, float $b) : float{
      if ($a === 0.0){
        //Retormnamos string com erro para tipo informativo
        return"Erro : divisão por zero";

      }
      return $a / $b;

    }

    public static function exibirResultado(?string $er, string $oper, ?float $v1, ?float $v2, ?float $resultado){

        echo "<h1>Resultado</h1>";

        if (!empty($er)){
            echo '<p class="error">' . htmlspecialchars($er,ENT_QUOTES, 'UTF-8') . "</P>";

        }else{
                echo '<p>Operação: <strong>' .htmlspecialchars($oper, ENT_QUOTES, 'UTF-8') . '</strong></p>';
                echo '<p>' . htmlspecialchars($v1, ENT_QUOTES, 'UTF-8') . '';

                switch ($oper) {
                    case 'somar':
                    echo'+';
                break;
                    case 'subtrair':
                    echo'-';
                break;
                    case 'multiplicar':
                    echo '*';
                break;
                case 'dividir':
                    echo '÷';
                break;
                }

            echo ' ' . htmlspecialchars($v2, ENT_QUOTES, 'UTF-8');
            echo ' = <strong>' . htmlspecialchars($resultado, ENT_QUOTES, 'UTF-8') . '</strong></p>';
        
         }

         echo '<p><a href="index.html">Voltar</a></P>';
        }

        //Método estático que Limpa/valida os dados de entrada
        public static function parse_num($val) : ?float{
            // remove espaço
            $s = trim($val);
            // troca virgula por ponto (aceitar 1,5)
            $s = str_replace(',', '.', $s);
            /*remove qualquer caractere que não seja digito, sinal, ou ponto -
            assim mantemos entrada simples */
            // importante : para fins didático  - em podução, use validação mais robusta
            
            if (!preg_match('/^\s*[+-]?\d+(?:[\.,]\d+)?\s*$/',$s)){
                return null;
            }
            return floatval($s);
        }
            
   

} // Fechamento a classe estática calculadora



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


    $val1 = Calculadora::parse_num($valor1);
    $val2 = Calculadora::parse_num($valor2);

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
    Calculadora::exibirResultado($error, $operacao, $val1, $val2, $result);
}

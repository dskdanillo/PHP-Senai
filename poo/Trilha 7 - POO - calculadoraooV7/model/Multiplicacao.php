<?php 

/*extends na declaração da classe significa que esta classe
está em uma relação de herança com a classe filha e Operacoes, no caso , a classe 
soma é a classe filha e Operacoes e a classe mãe */
final class Multiplicacao extends Operacoes {


public function calcula(): float {
    return $this->num1 * $this->num2;
}
}
?>
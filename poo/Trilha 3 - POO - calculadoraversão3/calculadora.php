<?php


// --- CLASS: Calculadora (métodos estático) ---

final class Calculadora {
    //Método estático Soma
    public function somar(float $a, float $b) : float{
        return $a + $b;
    }
    //Método estático Subtração
    public function subtrair(float $a, float $b) : float{
        return $a - $b;
    }
    //Método estático para Multiplicação
    public function multiplicar(float $a, float $b) : float{
        return $a * $b;
    }
    //Método estática Diivisão com chegaram de divisão por zero
    public function dividir(float $a, float $b) : float{
      if ($a === 0.0){
        //Retormnamos string com erro para tipo informativo
        return"Erro : divisão por zero";

      }
      return $a / $b;

    }

   
   

} // Fechamento a classe estática calculadora
?>

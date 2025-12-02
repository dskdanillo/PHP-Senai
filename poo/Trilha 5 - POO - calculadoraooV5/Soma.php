<?php 
final class Soma implements IOperacao {

    /* Criando os atributos (variável criada direto na classe para o objeto $soma, seja , estes valores 
    só podem ser acessados a partir do objeto, são atributos do objeto)*/

private float $num1;
private float $num2;

/* Método que permite retirar valor do atriibuto num1
e retornar seu valor para quem estiver solicitando*/

public function getNum1(): float {
    return $this->num1;

}
/* Método que permite receber o valor para que seja 
armazenado no atributo $num1*/

public function setNum1(float $num1): void {
    $this->num1 = $num1;
}
/* Método que permite retirar valor do atributo num2
e retornar seu valor para quem estiver solicitando*/

public function getNum2(): float {
    return $this->num2;
}
/*Método que permite receber valor para que seja
armazenado no atributo $num2*/
public function setNum2(float $num2): void {
    $this->num2 = $num2;
}
/*Método que faz o calculo da soma os valores 
armazena nos atributos $num1 e $num2*/


public function calcula(): float {
    return $this->num1 + $this->num2;
}
}
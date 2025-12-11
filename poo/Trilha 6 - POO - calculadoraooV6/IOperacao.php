<?php


//Declaração de interface IOperacao

interface IOperacao

{
    //Declaração das assinaturas dos métodas
    public function setNum1(float $num1): void;
    public function setNum2(float $num2): void;
    public function calcula(): float;

}

?>
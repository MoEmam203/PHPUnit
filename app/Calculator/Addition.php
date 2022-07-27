<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOPerandsException;

class Addition implements OperationsInterface{
    
    protected $operands = [];
    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    public function calculate()
    {
        if(count($this->operands) === 0){
            throw new NoOPerandsException();
        }
        return array_sum($this->operands);
    }
}
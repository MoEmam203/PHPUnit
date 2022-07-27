<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOPerandsException;

class Addition extends OperationAbstract implements OperationsInterface{
    public function calculate()
    {
        if(count($this->operands) === 0){
            throw new NoOPerandsException();
        }
        return array_sum($this->operands);
    }
}
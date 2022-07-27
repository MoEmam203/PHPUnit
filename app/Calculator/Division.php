<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOPerandsException;

class Division extends OperationAbstract implements OperationsInterface{
    public function calculate()
    {
        if(count(array_filter($this->operands)) === 0){
            throw new NoOPerandsException();
        }

        return array_reduce(array_filter($this->operands),function($a,$b){
            if($a !== null && $b !== null){
                return $a/$b;
            }

            return $b;
        },null);
    }
}
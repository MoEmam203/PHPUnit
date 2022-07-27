<?php

use App\Calculator\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase{

    /** @test */
    public function adds_up_given_operands()
    {
        $addition = new Addition();

        $addition->setOperands([5,10]);

        $this->assertEquals(15,$addition->calculate());
    }

    /** @test */
    public function no_operands_given_throw_an_exception_when_calculate()
    {
        $this->expectException(App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new Addition();
        $addition->calculate();
    }
}
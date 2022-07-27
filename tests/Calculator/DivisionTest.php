<?php

use App\Calculator\Division;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase {

    /** @test */
    public function division_has_operands()
    {
        $division = new Division();
        $division->setOperands([100,2]);

        $this->assertEquals(50,$division->calculate());
    }

    /** @test */
    public function removes_zeros_operands_in_calculation()
    {
        $division = new Division();
        $division->setOperands([100,0,0,2,0]);

        $this->assertEquals(50,$division->calculate());
    }

    /** @test */
    public function throw_exception_when_entering_all_zeros()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOPerandsException::class);
        $division = new Division();
        $division->setOperands([0,0,0,0,0]);
        $division->calculate();
    }

    /** @test */
    public function no_operands_given_throw_an_exception_when_calculate()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOPerandsException::class);

        $division = new Division();
        $division->calculate();
    }
}
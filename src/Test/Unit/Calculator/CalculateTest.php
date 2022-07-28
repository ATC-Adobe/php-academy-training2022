<?php

namespace Test\Unit\Calculator;

use Calculator\Calculate;

class CalculateTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideCalculateData
     */

    public function testCalculate($a, $b, $action, $expected)
    {
        $calculatorObject = new Calculate();
        $result = $calculatorObject->calculate($a, $b, $action);
        $this->assertSame($expected, $result);
    }

    public function provideCalculateData() : array
    {
        return [
            [5, 10, '+', 15],
            [5, 11, '+', 17],
            [5, 10, '-', -5],
            [55, 11, '-', 46],
            [5, 10, '*', 50],
            [5, 11, '*', 50]
        ];
    }
}
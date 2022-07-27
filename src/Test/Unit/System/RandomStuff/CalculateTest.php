<?php

namespace Test\Unit\System\RandomStuff;

use PHPUnit\Framework\TestCase;
use System\RandomStuff\Calculate;

class CalculateTest extends TestCase {

    //@dataProvider calcTestDataFalse

    /**
     * @dataProvider calcTestDataTrue
     *
     */
    public function testCalculate(int $a, int $b, string $op, int $expected):void {
        $this->assertEquals($expected, (new Calculate())->calculate($a, $b, $op));
    }

    public function calcTestDataTrue() : array {

        return [
            [4, 5, '+', 9],
            [4, 5, '-', -1],
            [4, 5, '*', 20],
        ];
    }


    public function calcTestDataFalse() : array {

        return [
            [4, 5, '+', 10],
            [4, 5, '-', 0],
            [4, 5, '*', 50],
        ];
    }
}

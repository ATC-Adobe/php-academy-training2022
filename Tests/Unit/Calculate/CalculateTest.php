<?php

use PHPUnit\Framework\TestCase;
use Calculate\Calculate;

class CalculateTest extends TestCase
{
    /**
     * @dataProvider sumPassDataProvider
     * @return void
     */
    public function testSum_Pass($number1, $number2, $expectedValue)
    {
        $calculate = new Calculate();
        $result = $calculate->sum($number1, $number2);

        $this->assertEquals($expectedValue, $result);
    }

    public function sumPassDataProvider()
    {
        return
            [
                [2, 3, 5],
                [5, 5, 15]
            ];
    }

    /**
     * @dataProvider subtractionPassDataProvider
     * @return void
     */
    public function testSubtraction_Pass($number1, $number2, $expectedValue)
    {
        $calculate = new Calculate();
        $result = $calculate->subtraction($number1, $number2);

        $this->assertEquals($expectedValue, $result);
    }

    public function subtractionPassDataProvider()
    {
        return
            [
                [5, 3, 2],
                [15, 5, 5]
            ];
    }

    /**
     * @dataProvider multiplicationPassDataProvider
     * @return void
     */
    public function testMultiplication_Pass($number1, $number2, $expectedValue)
    {
        $calculate = new Calculate();
        $result = $calculate->multiplication($number1, $number2);

        $this->assertEquals($expectedValue, $result);
    }

    public function multiplicationPassDataProvider()
    {
        return
            [
                [2, 3, 6],
                [5, 5, 15]
            ];
    }

    /**
     * @dataProvider divisionPassDataProvider
     * @return void
     */
    public function testDivision_Pass($number1, $number2, $expectedValue)
    {
        $calculate = new Calculate();
        $result = $calculate->division($number1, $number2);

        $this->assertEquals($expectedValue, $result);
    }

    public function divisionPassDataProvider()
    {
        return
            [
                [6, 3, 2],
                [15, 5, 4]
            ];
    }
}
<?php

namespace Test\Unit\Repository;

require_once '../../../autoloading.php';

use PHPUnit\Framework\TestCase;
use Repository\Calculate;

class CalculateTest extends TestCase
{
    /**
     * @param $num1
     * @param $num2
     * @param $expected
     * @dataProvider calculateAddPassDataProvider
     * @return void
     */
    public function testCalculateAdd_Pass($num1, $num2, $expected): void
    {
        $calculate = new Calculate();
        $result = $calculate->calculateAdd($num1, $num2);
        $this->assertEquals($expected, $result);
    }

    public function calculateAddPassDataProvider(): array
    {
        return [
            [5, 10, 15],
            [1, 5, 6],
            [1, 2, 3],
        ];
    }

    /**
     * @param $num1
     * @param $num2
     * @param $expected
     * @return void
     * @dataProvider calculateAddFailDataProvider
     */
    public function testCalculateAdd_Fail($num1, $num2, $expected): void
    {
        $calculate = new Calculate();
        $result = $calculate->calculateAdd($num1, $num2);
        $this->assertEquals($expected, $result);
    }

    public function calculateAddFailDataProvider(): array
    {
        return [
            [1, 2, 2],
            [12, 2, 22],
            [1, 4, 9],
        ];
    }

    /**
     * @param $num1
     * @param $num2
     * @param $expected
     * @return void
     * @dataProvider calculateSubstrPassDataProvider
     */
    public function testCalculateSubstr_Pass($num1, $num2, $expected)
    {
        $calculate = new Calculate();
        $result = $calculate->calculateSubstr($num1, $num2);
        $this->assertEquals($expected, $result);
    }

    public function calculateSubstrPassDataProvider()
    {
        return [
            [1, 1, 0],
            [12, 2, 10],
        ];
    }

    /**
     * @param $num1
     * @param $num2
     * @param $expected
     * @return void
     * @dataProvider calculateSubstrFailDataProvider
     */
    public function testCalculateSubstr_Fail($num1, $num2, $expected)
    {
        $calculate = new Calculate();
        $result = $calculate->calculateSubstr($num1, $num2);
        $this->assertEquals($expected, $result);
    }

    public function calculateSubstrFailDataProvider()
    {
        return [
            [10, 2, 4],
            [23, 20, 2],
        ];
    }

    /**
     * @param $num1
     * @param $num2
     * @param $expected
     * @return void
     * @dataProvider calculateMultiPassDataProvider
     */
    public function testCalculateMulti_Pass($num1, $num2, $expected)
    {
        $calculate = new Calculate();
        $result = $calculate->calculateMulti($num1, $num2);
        $this->assertEquals($expected, $result);
    }

    public function calculateMultiPassDataProvider()
    {
        return [
            [2, 2, 4],
            [10, 10, 100],
        ];
    }

    /**
     * @param $num1
     * @param $num2
     * @param $expected
     * @return void
     * @dataProvider calculateMultiFailDataProvider
     */
    public function testCalculateMulti_Fail($num1, $num2, $expected)
    {
        $calculate = new Calculate();
        $result = $calculate->calculateMulti($num1, $num2);
        $this->assertEquals($expected, $result);
    }

    public function calculateMultiFailDataProvider()
    {
        return [
            [2, 6, 13],
            [4, 4, 4]
        ];
    }
}

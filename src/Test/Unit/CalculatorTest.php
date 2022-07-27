<?php
namespace App\Test\Unit;
require_once 'types.php';


use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider CalculatePassDataProvider
     */
    public function testCalculatePass(int $a, int $b, string $sign, int $expected)
    {
        $result = (new Calculator())->calculate($a, $b, $sign);
        $this->assertEquals($result, $expected);

    }

    public function CalculatePassDataProvider()
    {
        return [
            [1,2,"+",3],
            [1,2,"-",-1],
            [4,2,"*",8],
        ];
    }

    /**
     * @dataProvider CalculateFailDataProvider
     * @return void
     */
    public function testCalculateFail(int $a, int $b, string $sign, int $expected)
    {
        $result = (new Calculator())->calculate($a, $b, $sign);
        $this->assertNotEquals($result, $expected);
    }

    public function CalculateFailDataProvider()
    {
        return[
            [1,2,'+', 4],
            [6,2,'-', 3],
            [5,2,"*", 7],
        ];
    }
}
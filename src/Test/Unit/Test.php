<?php

namespace App\Test\Unit;
require_once 'types.php';


use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function test_sum() {
        $expected = 10;
        $sum = 7 + 3;
        $this->assertEquals($expected, $sum);
    }
}
<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class TestOne extends TestCase {

    public function testGreetings() {
        $greetings = 'Hello World';
        $this->assertEquals('Hello World', $greetings);
    }

    public function testDeMorgan() {

        // DeMorgan rule
        $e1 = (!true || !false);
        $e2 = !(true && false);

        $this->assertTrue($e1 == $e2);
    }

    public function testCount() {

        $arr = [1, 2, 3];

        array_pop($arr);
        array_pop($arr);

        $this->assertCount(1, $arr);
    }

    public function testNewtonSqrt() {

        // test the accuracy of calculating sqrt using NewtonsMethod

        $x = $n = 2.0;
        $root = 1;
        $count = 0;

        while ($count < 10) {
            $count++;
            $root = 0.5 * ($x + ($n / $x));
            $x = $root;
        }


        $this->assertEqualsWithDelta(1.4142, $root, 0.0001);
    }

    public function testIntval() {

        $this->assertIsInt(intval('1'));
    }
}
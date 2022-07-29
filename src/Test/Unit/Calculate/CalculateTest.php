<?php

    namespace Test\Unit\Calculate;

    use PHPUnit\Framework\TestCase;
    use Utils\Calculate;

    class CalculateTest extends TestCase {

        /**
         * @dataProvider calculatePassDataProvider
         * @param int $a
         * @param int $b
         * @param int $expected
         * @param string $action
         * @return void
         */

        public function testCalculate_Pass (int $a, int $b, int $expected, string $action) :void {
            $calculateObject = new Calculate();
            $result = $calculateObject->calculate($a, $b, $action);
            $this->assertEquals($result, $expected);
        }

        public function calculatePassDataProvider () :array {
            return [
                [ 2, 4, 6 , "+"],
                [ 11, 22, 43, "+"],
                [ 6, 4, 2 , "-"],
                [ 43, 22, 11, "-"],
                [ 2, 4, 8 , "*"],
                [ 11, 22, 43, "*"],
            ];
        }
    }
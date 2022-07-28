<?php

namespace Test\Unit\TestedClasses;

use TestedClasses\ArrayHasKey;

class ArrayHasKeyTest extends \PHPUnit\Framework\TestCase
{
    public function testArrayHasKey_Pass(){
        $key = 6;
        $array = ['5' => 'hello', '8' => 'world'];

        $this->assertArrayHasKey($key, $array);
    }
}